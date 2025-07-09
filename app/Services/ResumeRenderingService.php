<?php

namespace App\Services;

use App\Models\Resume;
use Illuminate\Support\Str;

class ResumeRenderingService
{
    /**
     * The main public method to render a resume.
     */
    public function render(Resume $resume): string
    {
        // Eager load all necessary relationships for efficiency.
        $resume->load(['contactInfo', 'experiences', 'educations', 'skills']);

        $template = $resume->template;
        if (!$template || !$template->template_html) {
            // Throw an exception if the template is missing.
            throw new \Exception('The template content for this resume could not be found.');
        }

        // Build the data structure from the Eloquent models.
        $resumeData = [
            'contact'     => $resume->contactInfo,
            'experiences' => $resume->experiences,
            'education'   => $resume->educations, // Assuming relationship is named 'educations'
            'skills'      => $resume->skills,
        ];

        // Process the template with the data.
        return $this->processTemplate($template->template_html, $resumeData);
    }

    /**
     * Processes a custom template by replacing loops and placeholders.
     */
    private function processTemplate(string $html, array $data): string
    {
        // Expand loops like {{--experience-loop-start--}}
        $html = preg_replace_callback('/\{\{--(\w+)-loop-start--\}\}(.*?)\{\{--\1-loop-end--\}\}/s', function ($matches) use ($data) {
            $singular = $matches[1]; // "experience"
            $content  = $matches[2];
            $plural   = Str::plural($singular); // "experiences"

            $items = $data[$plural] ?? collect();
            if ($items->isEmpty()) return '';

            $output = '';
            foreach ($items as $item) {
                $output .= $this->processSimplePlaceholders($content, [$singular => $item]);
            }
            return $output;
        }, $html);

        // Process any remaining top-level placeholders.
        return $this->processSimplePlaceholders($html, $data);
    }

    /**
     * Replaces dot-notation placeholders like {{ contact.phone }} in a block of HTML.
     */
    private function processSimplePlaceholders(string $html, array $data): string
    {
        return preg_replace_callback('/\{\{\s*([\w.-]+)\s*\}\}/', function ($matches) use ($data) {
            $key = $matches[1];
            $value = data_get($data, $key);

            // *** THIS IS THE FIX FOR THE PHOTO ***
            // If the key is a photo path and a value exists, build the full public URL.
            if (Str::endsWith($key, '.photo_path') && $value) {
                return asset('storage/' . $value);
            }

            // For all other values, escape them for security.
            return e($value ?? '');
        }, $html);
    }
}