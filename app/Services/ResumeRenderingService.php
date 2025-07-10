<?php

namespace App\Services;

use App\Models\Resume;
use Illuminate\Support\Str;

class ResumeRenderingService
{
    /**
     * The main public method to render a resume.
     *
     * @param Resume $resume
     * @param bool $forPdf  // <-- NEW: A flag to determine the output format
     * @return string
     */
    public function render(Resume $resume, bool $forPdf = false): string
    {
        // Eager load all necessary relationships for efficiency.
        $resume->load(['contactInfo', 'experiences', 'educations', 'skills', 'template']);

        $template = $resume->template;
        if (!$template || !$template->template_html) {
            throw new \Exception('The template content for this resume could not be found.');
        }

        // Build the data structure from the Eloquent models.
        $resumeData = [
            'contact'     => $resume->contactInfo,
            'experiences' => $resume->experiences,
            'education'   => $resume->educations,
            'skills'      => $resume->skills,
        ];

        // Process the template with the data, passing the format flag down.
        return $this->processTemplate($template->template_html, $resumeData, $forPdf);
    }

    /**
     * Processes a custom template by replacing loops and placeholders.
     */
    private function processTemplate(string $html, array $data, bool $forPdf): string
    {
        // Expand loops like {{--experience-loop-start--}}
        $html = preg_replace_callback('/\{\{--(\w+)-loop-start--\}\}(.*?)\{\{--\1-loop-end--\}\}/s', function ($matches) use ($data, $forPdf) {
            $singular = $matches[1]; // "experience"
            $content  = $matches[2];
            $plural   = Str::plural($singular); // "experiences"

            $items = $data[$plural] ?? collect();
            if ($items->isEmpty()) return '';

            $output = '';
            foreach ($items as $item) {
                // Pass the format flag to the placeholder renderer inside the loop.
                $output .= $this->processSimplePlaceholders($content, [$singular => $item], $forPdf);
            }
            return $output;
        }, $html);

        // Process any remaining top-level placeholders.
        return $this->processSimplePlaceholders($html, $data, $forPdf);
    }

    /**
     * Replaces dot-notation placeholders like {{ contact.phone }} in a block of HTML.
     */
    private function processSimplePlaceholders(string $html, array $data, bool $forPdf): string
    {
        return preg_replace_callback('/\{\{\s*([\w.-]+)\s*\}\}/', function ($matches) use ($data, $forPdf) {
            $key = $matches[1];
            $value = data_get($data, $key);

            // *** THIS IS THE CRITICAL FIX FOR THE PHOTO IN PDFS ***
            if (Str::endsWith($key, '.photo_path') && $value) {
                if ($forPdf) {
                    // --- For PDF Generation: Embed the image directly ---
                    $imagePath = storage_path('app/public/' . $value);
                    if (file_exists($imagePath)) {
                        $imageData = file_get_contents($imagePath);
                        $mimeType = mime_content_type($imagePath);
                        // Return a Base64 encoded Data URI
                        return 'data:' . $mimeType . ';base64,' . base64_encode($imageData);
                    }
                    return ''; // Return empty string if file not found
                } else {
                    // --- For Web View: Use the standard public URL ---
                    return asset('storage/' . $value);
                }
            }

            // For all other values, escape them for security.
            return e($value ?? '');
        }, $html);
    }
}