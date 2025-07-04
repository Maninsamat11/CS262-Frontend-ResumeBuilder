<?php

namespace App\Http\Controllers;

use App\Models\Resume;
use App\Models\Template;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\ViewCount;
use Barryvdh\DomPDF\Facade\Pdf;
use Spatie\Browsershot\Browsershot;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\JsonResponse; 
use Illuminate\Support\Facades\Storage;

class ResumeController extends Controller
{

    
    public function store(Request $request)
{
    $request->validate([
        'template_id' => 'required|exists:templates,template_id',
    ]);

    $resume = Auth::user()->resumes()->create([
        'template_id' => $request->template_id,
        'name' => 'Untitled Resume'
    ]);

    return redirect()->route('resumes.edit', ['resume' => $resume, 'fresh' => true]);
}

public function edit(Resume $resume)
    {
        if ($resume->user_id !== Auth::id()) {
            abort(403, 'Unauthorized Action');
        }

        // CORRECTED: Use the exact relationship names from the model.
        $resume->load(['contactInfo', 'experiences', 'educations', 'skills']);
        
        return view('resumes.edit', [
            'resume'      => $resume,
            'contactInfo' => $resume->contactInfo,
            'experiences' => $resume->experiences,
            'education'   => $resume->educations, // Use plural 'educations' here
            'skills'      => $resume->skills,
        ]);
    }

    public function update(Request $request, Resume $resume)
    {
        if ($resume->user_id !== Auth::id()) {
            abort(403, 'Unauthorized Action');
        }

        $validated = $request->validate([
            'name'        => 'required|string|max:255',
            'contact'     => 'nullable|array',
            'experiences' => 'nullable|array',
            'education'   => 'nullable|array',
            'skills'      => 'nullable|array',
        ]);

        DB::transaction(function () use ($resume, $validated) {
            $resume->update(['name' => $validated['name']]);
            
            if (isset($validated['contact'])) {
                $resume->contactInfo()->updateOrCreate([], $validated['contact']);
            }

            // CORRECTED: Use the plural relationship methods
            $resume->experiences()->delete();
            if (!empty($validated['experiences'])) {
                $validExperiences = array_filter($validated['experiences'], fn($exp) => !empty($exp['company_name']));
                if (!empty($validExperiences)) {
                    $resume->experiences()->createMany($validExperiences);
                }
            }

            $resume->educations()->delete();
            if (!empty($validated['education'])) {
                $validEducation = array_filter($validated['education'], fn($edu) => !empty($edu['school_name']));
                if (!empty($validEducation)) {
                    $resume->educations()->createMany($validEducation);
                }
            }

            $resume->skills()->delete();
            if (!empty($validated['skills'])) {
                $validSkills = array_filter($validated['skills'], fn($skill) => !empty($skill['skill_name']));
                if (!empty($validSkills)) {
                    $resume->skills()->createMany($validSkills);
                }
            }
        });
        
        return response()->json(['message' => 'Resume updated successfully!']);
    }




 public function preview(Request $request, Resume $resume)
    {
        // 1. Authorization: Ensure the user owns this resume.
        if ($resume->user_id !== Auth::id()) {
            abort(403, 'Unauthorized Access.');
        }

        // 2. Load the base HTML from the selected template.
        $resume->load('template');
        $html = $resume->template->template_html;
        
        // 3. Determine the data source: real-time 'payload' or saved database data.
        if ($request->has('payload')) {
            // Data is coming from the live editor form.
            $payload = json_decode($request->input('payload'), true);
            $contact = (object) ($payload['contact'] ?? []);
            $experiences = collect($payload['experiences'] ?? []);
            $education = collect($payload['education'] ?? []);
            $skills = collect($payload['skills'] ?? []);
        } else {
            // No payload, so load the saved data from the database relationships.
            $resume->load(['contactInfo', 'experiences', 'educations', 'skills']);
            $contact = $resume->contactInfo;
            $experiences = $resume->experiences;
            $education = $resume->educations;
            $skills = $resume->skills;
        }

        // 4. Replace simple, non-looping placeholders.
        $replacements = [
            '{{ contact.full_name }}' => e($contact->full_name ?? ''),
            '{{ contact.email }}'     => e($resume->user->email ?? ''), // Email is linked to the user account
            '{{ contact.phone }}'     => e($contact->phone ?? ''),
            '{{ contact.address }}'   => e($contact->address ?? ''),
            '{{ contact.summary }}'   => nl2br(e($contact->summary ?? '')), // nl2br converts newlines to <br> tags
            '{{ contact.photo_path }}'=> (isset($contact->photo_path) && $contact->photo_path) ? e(asset('storage/' . $contact->photo_path)) : '',
        ];
        $html = str_replace(array_keys($replacements), array_values($replacements), $html);
        
        // 5. Process repeating sections (loops) using the helper function.
        $html = $this->processLoop($html, 'experience', $experiences);
        $html = $this->processLoop($html, 'education', $education);
        $html = $this->processLoop($html, 'skill', $skills);

        // 6. Return the Blade view for the A4 layout, passing the final HTML as 'content'.
        return view('resumes.preview_layout', [
            'content' => $html
        ]);
    }

private function processLoop($html, $loopName, $items)
{
    $startTag = "{{--{$loopName}-loop-start--}}";
    $endTag = "{{--{$loopName}-loop-end--}}";

    // Find the HTML block for a single loop item
    if (!preg_match("/".preg_quote($startTag, '/')."(.*?)".preg_quote($endTag, '/')."/s", $html, $matches)) {
        return $html; // If no loop block is found, do nothing.
    }
    
    $loopBlockTemplate = $matches[1];
    $allBlocksHtml = '';

    // Loop through the data (experiences, skills, etc.)
    if ($items) {
        foreach ($items as $item) {
            $currentBlock = $loopBlockTemplate;
            // The item can be an object from the DB or an array from the form, so we handle both.
            $itemData = is_object($item) ? $item->toArray() : $item;

            // Replace all placeholders inside the loop item (e.g., {{ experience.job_title }})
            foreach ($itemData as $key => $value) {
                $currentBlock = str_replace("{{ {$loopName}.{$key} }}", e($value ?? ''), $currentBlock);
            }
            $allBlocksHtml .= $currentBlock;
        }
    }

    // Replace the entire loop placeholder with the generated HTML
    return preg_replace("/".preg_quote($startTag, '/')."(.*?)".preg_quote($endTag, '/')."/s", $allBlocksHtml, $html);
}
    public function toggleStatus(Resume $resume)
    {
        // Security Check
        if ($resume->user_id !== \Illuminate\Support\Facades\Auth::id()) {
            abort(403);
        }

        // The Logic
        $resume->status = ($resume->status === 'public') ? 'private' : 'public';
        $resume->save();

        // Redirect back
        return back()->with('status', 'Resume visibility updated!');
    }

     public function getDataForImport(Resume $resume)
    {
        // 1. Authorization: Ensure the user owns the resume they are trying to import from.
        if ($resume->user_id !== Auth::id()) {
            return response()->json(['error' => 'Unauthorized'], 403);
        }

        // 2. Eager load all the relationships to get all the data in one query.
        $resume->load(['contactInfo', 'experiences', 'educations', 'skills']);

        // 3. Return the data in a structured JSON format.
        return response()->json([
            'contactInfo' => $resume->contactInfo,
            'experiences' => $resume->experiences,
            'educations'  => $resume->educations,
            'skills'      => $resume->skills,
        ]);
    }


    public function showSharePage(Resume $resume)
    {
        // Security check
        if ($resume->user_id !== Auth::id()) {
            abort(403);
        }
        return view('resumes.share', ['resume' => $resume]);
    }

    public function updateShareSettings(Request $request, Resume $resume)
    {
        // Security check
        if ($resume->user_id !== Auth::id()) {
            abort(403);
        }

        $request->validate([
            'status' => 'required|in:public,private',
            // Add validation for 'expires' if you implement that feature
        ]);

        // The 'status' field already exists from our dashboard toggle feature
        $resume->status = $request->input('status');
        
        // Logic for generating a unique share_url if it doesn't exist
        if (is_null($resume->share_url)) {
            $resume->share_url = 'r/' . uniqid(); // Example: resumeforge.com/r/60b8e2...
        }
        
        $resume->save();

        return redirect()->route('resumes.share', $resume)->with('status', 'Settings saved!');
    }

    public function showDownloadPage(Resume $resume)
    {
        // Security check
        if ($resume->user_id !== Auth::id()) {
            abort(403);
        }
        return view('resumes.download', ['resume' => $resume]);
    }

        public function processDownload(Request $request, Resume $resume)
{   
    // 1. SECURITY CHECK: Allow if public or if the user is the owner.
    if ($resume->status !== 'public' && (Auth::guest() || Auth::id() !== $resume->user_id)) {
        abort(403);
    }

    // 2. VALIDATION: Make sure we have a valid format.
    $request->validate([
        'format' => 'required|in:pdf,png',
    ]);
    
    $format = $request->input('format');

    // ===================================================================
    // 3. CRITICAL STEP: Build the full HTML string for the resume.
    // ===================================================================

    // A. Load ALL necessary data. This includes the template, user info, and all resume sections.
    $resume->load(['template', 'user', 'contactInfo', 'experiences', 'educations', 'skills']);

    // B. Start with the base HTML from the template. This is what provides the styling.
    $templateHtml = $resume->template->template_html;

    // C. Replace single-value placeholders.
    // Check if contactInfo exists before trying to use it.
    if ($resume->contactInfo) {
        // Loop through all attributes of contactInfo and replace them.
        foreach ($resume->contactInfo->toArray() as $key => $value) {
            $templateHtml = str_replace("{{ contact.{$key} }}", e($value ?? ''), $templateHtml);
        }
    }
    
    // Also replace placeholders related to the User model.
    if ($resume->user) {
        $templateHtml = str_replace("{{ user.name }}", e($resume->user->name ?? ''), $templateHtml);
        // Add email if your template uses it (e.g., {{ user.email }})
        $templateHtml = str_replace("{{ user.email }}", e($resume->user->email ?? ''), $templateHtml);
    }

    // D. Replace repeating sections (loops) using your helper function.
    $templateHtml = $this->processLoop($templateHtml, 'experience', $resume->experiences);
    $templateHtml = $this->processLoop($templateHtml, 'education', $resume->educations);
    $templateHtml = $this->processLoop($templateHtml, 'skill', $resume->skills);

    // E. Clean up any remaining/unfilled placeholders just in case.
    // This regex will find any remaining {{ ... }} tags and remove them.
    $templateHtml = preg_replace('/\{\{.*?\}\}/', '', $templateHtml);


    // --- 4. GENERATE THE FILE ---

    $filename = Str::slug($resume->name);

    if ($format === 'pdf') {
        $pdf = Pdf::loadHTML($templateHtml);
        return $pdf->stream($filename . '.pdf');
    }
    
    if ($format === 'png') {
        $image = Browsershot::html($templateHtml)
            ->fullPage()
            ->setScreenshotType('png')
            ->screenshot();
        
        return response($image)
            ->header('Content-Type', 'image/png')
            ->header('Content-Disposition', 'attachment; filename="' . $filename . '.png"');
    }
    
    return back()->with('error', 'That download format is not yet supported.');
}
    public function showPublic(Resume $resume)
{
    // 1. Security Check: If resume is private, deny access.
    //    (The owner can still see it because they are not a guest and their ID will match)
    if ($resume->status !== 'public' && (auth()->guest() || auth()->id() !== $resume->user_id)) {
        abort(404, 'Resume not found.');
    }

    // 2. Track view count if the viewer is not the owner
    if (auth()->guest() || auth()->id() !== $resume->user_id) {
        $resume->increment('views'); // Assuming you have a 'views' column on your resumes table
    }

    // 3. Prepare the HTML for display (this logic should already exist from your preview function)
    $resume->load(['template', 'user', 'contactInfo', 'experiences', 'educations', 'skills']);
    $templateHtml = $resume->template->template_html;

    // ... (Your replacement and processLoop logic) ...
    if ($resume->contactInfo) {
        foreach ($resume->contactInfo->toArray() as $key => $value) {
            $templateHtml = str_replace("{{ contact.{$key} }}", e($value ?? ''), $templateHtml);
        }
    }
    $templateHtml = $this->processLoop($templateHtml, 'experience', $resume->experiences);
    $templateHtml = $this->processLoop($templateHtml, 'education', $resume->educations);
    $templateHtml = $this->processLoop($templateHtml, 'skill', $resume->skills);
    
    // 4. Return the public view with all the necessary data
    return view('resumes.public_view', [
        'resume' => $resume,
        'previewHtml' => $templateHtml,
    ]);
}

    public function destroy(Resume $resume)
    {
        // Security check: Make sure the user owns the resume they are trying to delete.
        if ($resume->user_id !== Auth::id()) {
            abort(403);
        }

        $resume->delete();

        // Redirect back to the dashboard with a success message.
        return redirect()->route('dashboard')->with('status', 'Resume deleted successfully!');
    }

     public function redirectFromLink(Request $request)
    {
        // 1. Validate that the link was actually submitted
        $request->validate([
            'share_link' => 'required|url',
        ]);

        // 2. Get the full URL from the form input
        $fullUrl = $request->input('share_link');

        // 3. Extract the path from the URL (e.g., "/r/685bbc29bb37f")
        $path = parse_url($fullUrl, PHP_URL_PATH);

        // 4. Use `basename()` to get just the last part of the path (the unique share_url)
        $shareUrl = basename($path);

        // 5. Find the resume with that share_url. If it doesn't exist,
        //    the `findOrFail` will automatically throw a 404 Not Found error.
        $resume = Resume::where('share_url', $shareUrl)->firstOrFail();

        // 6. Redirect to the clean, public route for that resume.
        return redirect()->route('resumes.public.show', ['resume' => $resume]);
    }

    // In app/Http/Controllers/ResumeController.php

// In app/Http/Controllers/ResumeController.php

// In app/Http/Controllers/ResumeController.php

public function updatePhoto(Request $request, Resume $resume): JsonResponse
{
    // 1. Security check
    if ($resume->user_id !== Auth::id()) {
        abort(403);
    }

    // 2. Validate the uploaded file.
    $request->validate([
        'photo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    // =========================================================================
    // 3. CORRECTED LOGIC: Provide default values for creation.
    // =========================================================================
    $contactInfo = $resume->contactInfo()->firstOrCreate(
        // First array: The condition to FIND the record.
        ['resume_id' => $resume->resume_id],
        // Second array: The data to use IF a new record must be CREATED.
        [
            'full_name' => Auth::user()->name, // A great default!
            'phone'     => '',
            'address'   => '',
            'summary'   => ''
        ]
    );

    // 4. If an old photo exists, delete it.
    if ($contactInfo->photo_path) {
        Storage::disk('public')->delete($contactInfo->photo_path);
    }

    // 5. Store the new photo.
    $path = $request->file('photo')->store('photos', 'public');

    // 6. Save the new path to the 'photo_path' column.
    $contactInfo->update(['photo_path' => $path]);

    // 7. Return a success response.
    return response()->json([
        'message' => 'Photo uploaded successfully!',
        'photo_path' => $path,
        'full_url' => asset('storage/' . $path)
    ]);
}
}
