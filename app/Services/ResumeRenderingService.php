<?php

namespace App\Services;

use App\Models\Resume;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage; // <-- Add this import

class ResumeRenderingService
{
    public function render(Resume $resume, bool $forPdf = false): string
    {
        $resume->load(['contactInfo', 'experiences', 'educations', 'skills', 'template']);

        $template = $resume->template;
        if (!$template || !$template->template_html) {
            throw new \Exception('The template content for this resume could not be found.');
        }

        $resumeData = [
            'contact'     => $resume->contactInfo,
            'experiences' => $resume->experiences,
            'education'   => $resume->educations,
            'skills'      => $resume->skills,
        ];

        return $this->processTemplate($template->template_html, $resumeData, $forPdf);
    }

    private function processTemplate(string $html, array $data, bool $forPdf): string
    {
        // ... (the processTemplate method remains unchanged) ...
        $html = preg_replace_callback('/\{\{--(\w+)-loop-start--\}\}(.*?)\{\{--\1-loop-end--\}\}/s', function ($matches) use ($data, $forPdf) {
            $singular = $matches[1];
            $content  = $matches[2];
            $plural   = Str::plural($singular);
            $items = $data[$plural] ?? collect();
            if ($items->isEmpty()) return '';

            $output = '';
            foreach ($items as $item) {
                $output .= $this->processSimplePlaceholders($content, [$singular => $item], $forPdf);
            }
            return $output;
        }, $html);

        return $this->processSimplePlaceholders($html, $data, $forPdf);
    }

    private function normalizePhotoPath($value): string
    {
        if (!$value) {
            return '';
        }

        if (Str::startsWith($value, ['http://', 'https://'])) {
            $parsed = parse_url($value, PHP_URL_PATH);
            return ltrim(str_replace('/storage/', '', $parsed ?? ''), '/');
        }

        if (Str::startsWith($value, '/storage/')) {
            return ltrim(str_replace('/storage/', '', $value), '/');
        }

        return ltrim($value, '/');
    }

    private function processSimplePlaceholders(string $html, array $data, bool $forPdf): string
    {
        return preg_replace_callback('/\{\{\s*([\w.-]+)\s*\}\}/', function ($matches) use ($data, $forPdf) {
            $key = $matches[1];
            $value = data_get($data, $key);

            // *** THE FINAL, BULLETPROOF FIX FOR THE PHOTO ***
            if (Str::endsWith($key, '.photo_path') && $value) {
                $normalizedValue = $this->normalizePhotoPath($value);
                if ($forPdf && Storage::disk('public')->exists($normalizedValue)) {
                    // For PDF generation, read the file, base64 encode it, and create a Data URL.
                    $fileContent = Storage::disk('public')->get($normalizedValue);
                    $mimeType = Storage::disk('public')->mimeType($normalizedValue);
                    $base64 = base64_encode($fileContent);
                    return "data:{$mimeType};base64,{$base64}";
                } else {
                    // For normal web display, just use the public asset URL.
                    return asset('storage/' . ltrim($normalizedValue, '/'));
                }
            }

            return e($value ?? '');
        }, $html);
    }
}