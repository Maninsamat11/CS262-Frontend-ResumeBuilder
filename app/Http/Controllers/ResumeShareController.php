<?php

namespace App\Http\Controllers;

use App\Models\Resume;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class ResumeShareController extends Controller
{
    /**
     * Show the share settings for a resume.
     */
    public function show(Resume $resume)
    {
        // Check if user owns this resume
        if ($resume->user_id !== Auth::id()) {
            abort(403, 'Unauthorized access to resume.');
        }

        return view('resumes.share', compact('resume'));
    }

    /**
     * Update the share settings for a resume.
     */
    public function update(Request $request, Resume $resume)
    {
        // Check if user owns this resume
        if ($resume->user_id !== Auth::id()) {
            abort(403, 'Unauthorized access to resume.');
        }

        $request->validate([
            'status' => 'required|in:public,private',
            'expires' => 'required|in:never,1_day,7_days,30_days,90_days'
        ]);

        $isPublic = $request->status === 'public';
        
        // Generate share URL if making public and doesn't have one
        if ($isPublic && !$resume->share_url) {
            $resume->generateShareUrl();
        }

        // Set expiration date
        $expiresAt = null;
        if ($isPublic && $request->expires !== 'never') {
            $expiresAt = match($request->expires) {
                '1_day' => Carbon::now()->addDay(),
                '7_days' => Carbon::now()->addWeek(),
                '30_days' => Carbon::now()->addMonth(),
                '90_days' => Carbon::now()->addMonths(3),
                default => null
            };
        }

        $resume->update([
            'is_public' => $isPublic,
            'expires_at' => $expiresAt
        ]);

        return redirect()->back()->with('success', 'Share settings updated successfully!');
    }

    /**
     * Show a public resume by share URL.
     */
    public function publicShow(string $shareUrl)
    {
        $resume = Resume::where('share_url', $shareUrl)->firstOrFail();

        // Check if resume is publicly accessible
        if (!$resume->isPubliclyAccessible()) {
            abort(404, 'Resume not found or no longer available.');
        }

        // Increment view count
        $resume->incrementViewCount(request()->ip());

        // Load all related data
        $resume->load([
            'user',
            'template',
            'contactInfo',
            'experiences',
            'education',
            'skills'
        ]);

        return view('resumes.public', compact('resume'));
    }
}