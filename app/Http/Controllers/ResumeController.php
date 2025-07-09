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
use App\Services\ResumeRenderingService;




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
        // Authorize that the current user owns this resume
        if (request()->user()->id !== $resume->user_id) {
            abort(403);
        }

        return view('resumes.share', compact('resume'));
    }

    /**
     * Enable or Disable the public share link for a resume.
     */
    public function updateShareSettings(Request $request, Resume $resume)
    {
        // Authorize that the current user owns this resume
        if ($request->user()->id !== $resume->user_id) {
            abort(403);
        }

        $action = $request->input('action');
        $message = 'No changes were made.';

        if ($action === 'enable') {
            // Generate a unique token and store it.
            // This is better than storing the full URL.
            $resume->share_url = $resume->share_url ?? (string) Str::uuid();
            $message = 'Share link has been generated and is now active!';

        } elseif ($action === 'disable') {
            // Clear the sharing information to disable the link
            $resume->share_url = null;
            $message = 'Share link has been successfully disabled.';
        }

        $resume->save();

        // Redirect back to the share page with a success message
        return back()->with('status', $message);
    }
   


public function processDownload(Request $request, Resume $resume, ResumeRenderingService $renderer)
{
    if ($resume->status !== 'public' && (Auth::guest() || Auth::id() !== $resume->user_id)) {
        abort(403, 'You do not have permission to download this resume.');
    }

    $request->validate(['format' => 'required|in:pdf,png']);
    $format = $request->input('format');

    try {
        $renderedTemplateHtml = $renderer->render($resume);
    } catch (\Exception $e) {
        return back()->with('error', 'Could not generate resume: ' . $e->getMessage());
    }

    // --- FINAL EMBEDDED CSS SOLUTION ---

    // 1. Get the path to the Vite manifest file.
    $manifestPath = public_path('build/manifest.json');

    // 2. Check if the manifest exists (has `npm run build` been run?).
    if (!file_exists($manifestPath)) {
        return back()->with('error', 'Vite manifest not found. Please run "npm run build".');
    }

    // 3. Read and decode the manifest file.
    $manifest = json_decode(file_get_contents($manifestPath), true);
    
    // 4. Find the path to our specific CSS file from the manifest.
    $cssAssetPath = $manifest['resources/css/app.css']['file'] ?? null;
    
    if (!$cssAssetPath) {
        return back()->with('error', 'CSS asset not found in Vite manifest.');
    }

    // 5. Get the full server path and read the CSS content.
    $cssContent = file_get_contents(public_path('build/' . $cssAssetPath));

    // 6. Assemble the full HTML, embedding the CSS content inside a <style> tag.
    $fullHtml = <<<HTML
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Resume - {$resume->name}</title>
        <style>
            {$cssContent}
        </style>
    </head>
    <body>
        {$renderedTemplateHtml}
    </body>
    </html>
    HTML;

    // --- END OF FINAL SOLUTION ---

    $filename = Str::slug($resume->name);

    if ($format === 'pdf') {
        $pdf = Pdf::loadHTML($fullHtml)->setOption(['isRemoteEnabled' => true]);
        return $pdf->stream($filename . '.pdf');
    }
    
    if ($format === 'png') {
        $image = Browsershot::html($fullHtml)->fullPage()->screenshot();
        return response($image)->header('Content-Type', 'image/png')->header('Content-Disposition', 'attachment; filename="' . $filename . '.png"');
    }
    
    return back()->with('error', 'That download format is not yet supported.');
}
    /**
     * Redirects the user to the public view of a resume based on a shareable link.
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */


   public function redirectFromLink(Request $request)
    {
        // 1. Validate that the user submitted a valid URL.
        $request->validate([
            'shareable_link' => 'required|url',
        ]);

        // 2. Get the full URL from the form input.
        $fullUrl = $request->input('shareable_link');

        // 3. Extract the last part of the URL, which is the share token.
        // For example, from "http://.../resumes/public/xxx-yyy-zzz", it gets "xxx-yyy-zzz".
        $shareToken = basename($fullUrl);

        // 4. Find a resume that has this share_url and is active.
        $resume = Resume::where('share_url', $shareToken)->first();

        // 5. If a resume is found, redirect to the public view page.
        if ($resume) {
            return redirect()->route('resumes.public.show', ['shareUrl' => $shareToken]);
        }

        // 6. If no resume is found, redirect back to the homepage with an error message.
        return redirect()->route('home')
                         ->with('error', 'The provided resume link is invalid or has been disabled.');
    }


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

    // 3. Ensure the resume has a contactInfo record.
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
