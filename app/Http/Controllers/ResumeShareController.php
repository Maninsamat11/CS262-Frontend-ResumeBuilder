<?php

namespace App\Http\Controllers;

use App\Models\Resume;
use App\Services\ResumeRenderingService; // <-- Import the service
use Illuminate\View\View;

class ResumeShareController extends Controller
{
    protected $renderer;

    // Use dependency injection to get the service automatically.
    public function __construct(ResumeRenderingService $renderer)
    {
        $this->renderer = $renderer;
    }

    public function publicShow(string $shareUrl): View
    {
        $resume = Resume::where('share_url', $shareUrl)->firstOrFail();

        try {
            // Simply ask the service to render the resume.
            $previewHtml = $this->renderer->render($resume);
        } catch (\Exception $e) {
            abort(500, $e->getMessage());
        }

        return view('resumes.public-show', [
            'resume'      => $resume,
            'previewHtml' => $previewHtml,
        ]);
    }
}