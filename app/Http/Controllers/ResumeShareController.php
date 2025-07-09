<?php

namespace App\Http\Controllers;

use App\Models\Resume;
use App\Services\ResumeRenderingService; // <-- Import the service
use Illuminate\View\View;
use App\Models\ViewCount;

class ResumeShareController extends Controller
{
        public function publicShow(string $shareUrl, ResumeRenderingService $renderer): View
    {
        // This correctly finds the resume using its share_url
        $resume = Resume::where('share_url', $shareUrl)
        ->where('status', 'public') // Ensure the resume is public
        ->firstOrFail();

        // --- VIEW COUNT LOGIC ---
              
                    // 1. Log the individual view event (good for analytics).
                    ViewCount::create(['resume_id' => $resume->resume_id]);

                    // 2. Directly increment the counter on the resumes table.
                    $resume->increment('views');
               

        // --- VIEW COUNT LOGIC ---
                    // 1. Record a new view for this resume using the correct primary key.
                    ViewCount::create(['resume_id' => $resume->resume_id]); 

                    // 2. Get the total number of views for this resume.
                    $viewCount = ViewCount::where('resume_id', $resume->resume_id)->count();
                    

        try {
            $previewHtml = $renderer->render($resume, false);
        } catch (\Exception $e) {
            abort(500, $e->getMessage());
        }

        return view('resumes.public-show', [
            'resume'      => $resume,
            'previewHtml' => $previewHtml,
             'viewCount'   => $resume->views, 
        ]);
    }
}