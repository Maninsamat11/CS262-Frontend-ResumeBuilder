<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Template;

class TemplateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // --- Template 1: Classic Professional ---
        Template::create([
            'name' => 'Classic Professional',
            'status' => true,
            'template_url' => '/images/templates/classic.png', // Example path
            'template_html' => <<<'HTML'
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <style> body { font-family: 'Times New Roman', serif; } </style>
</head>
<body class="bg-white text-gray-800">
    <div class="max-w-4xl mx-auto p-8">
        <header class="text-center border-b-2 border-gray-800 pb-4 mb-6">
            <h1 class="text-4xl font-bold tracking-widest">{{ contact.full_name }}</h1>
            <div class="flex justify-center space-x-4 mt-2 text-sm">
                <span>{{ contact.phone }}</span>
                <span>•</span>
                <span>{{ contact.email }}</span>
                <span>•</span>
                <span>{{ contact.address }}</span>
            </div>
        </header>
        
        <section class="mb-6">
            <h2 class="text-xl font-bold border-b border-gray-400 pb-1 mb-3">PROFESSIONAL SUMMARY</h2>
            <p class="text-sm leading-relaxed">{{ contact.summary }}</p>
        </section>

        <section class="mb-6">
            <h2 class="text-xl font-bold border-b border-gray-400 pb-1 mb-3">WORK EXPERIENCE</h2>
            {{--experience-loop-start--}}
            <div class="mb-4">
                <div class="flex justify-between items-baseline">
                    <h3 class="text-lg font-semibold">{{ experience.job_title }}</h3>
                    <p class="text-sm font-light">{{ experience.start_date }} - {{ experience.end_date }}</p>
                </div>
                <h4 class="text-md font-medium italic">{{ experience.company_name }}</h4>
                <p class="text-sm mt-1">{{ experience.description }}</p>
            </div>
            {{--experience-loop-end--}}
        </section>

        <section class="mb-6">
            <h2 class="text-xl font-bold border-b border-gray-400 pb-1 mb-3">EDUCATION</h2>
            {{--education-loop-start--}}
            <div class="mb-4">
                <div class="flex justify-between items-baseline">
                    <h3 class="text-lg font-semibold">{{ education.degree }} in {{ education.field }}</h3>
                    <p class="text-sm font-light">{{ education.start_date }} - {{ education.end_date }}</p>
                </div>
                <h4 class="text-md font-medium italic">{{ education.school_name }}</h4>
                <p class="text-sm mt-1">{{ education.description }}</p>
            </div>
            {{--education-loop-end--}}
        </section>

        <section>
            <h2 class="text-xl font-bold border-b border-gray-400 pb-1 mb-3">SKILLS</h2>
            <div class="flex flex-wrap -mx-2">
            {{--skill-loop-start--}}
                <span class="text-sm bg-gray-200 rounded-full px-3 py-1 m-2">{{ skill.skill_name }}</span>
            {{--skill-loop-end--}}
            </div>
        </section>
    </div>
</body>
</html>
HTML
        ]);

        // --- Template 2: Modern Minimalist ---
        Template::create([
            'name' => 'Modern Minimalist',
            'status' => true,
            'template_url' => '/images/templates/modern.png', // Example path
            'template_html' => <<<'HTML'
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <style> body { font-family: 'Helvetica', 'Arial', sans-serif; } </style>
</head>
<body class="bg-gray-50 text-gray-700">
    <div class="max-w-4xl mx-auto p-10">
        <div class="grid grid-cols-12 gap-10">
            <div class="col-span-4 text-center">
                <!-- User Photo Placeholder -->
                <div class="w-32 h-32 mx-auto rounded-full bg-gray-300 mb-4 bg-cover bg-center" style="background-image: url({{ contact.photo_path }})"></div>
                <h1 class="text-3xl font-bold text-gray-900">{{ contact.full_name }}</h1>
                <p class="text-lg text-red-600">{{ experience.job_title }}</p>
                
                <div class="mt-6 text-left space-y-3">
                    <div>
                        <h3 class="font-bold text-gray-900 text-sm uppercase tracking-wider mb-1">Contact</h3>
                        <p class="text-sm">{{ contact.phone }}</p>
                        <p class="text-sm">{{ contact.email }}</p>
                        <p class="text-sm">{{ contact.address }}</p>
                    </div>
                    <div>
                        <h3 class="font-bold text-gray-900 text-sm uppercase tracking-wider mt-4 mb-1">Skills</h3>
                        {{--skill-loop-start--}}
                        <p class="text-sm">{{ skill.skill_name }}</p>
                        {{--skill-loop-end--}}
                    </div>
                </div>
            </div>
            <div class="col-span-8">
                <section class="mb-8">
                    <h2 class="text-2xl font-bold text-gray-900 pb-2 mb-4 border-b-2 border-red-500">Summary</h2>
                    <p class="text-sm leading-relaxed">{{ contact.summary }}</p>
                </section>
                <section class="mb-8">
                    <h2 class="text-2xl font-bold text-gray-900 pb-2 mb-4 border-b-2 border-red-500">Experience</h2>
                    {{--experience-loop-start--}}
                    <div class="mb-4">
                        <p class="text-sm font-semibold text-gray-600">{{ experience.start_date }} - {{ experience.end_date }}</p>
                        <h3 class="text-lg font-bold text-gray-800">{{ experience.job_title }}</h3>
                        <p class="text-md font-semibold text-gray-700">{{ experience.company_name }}</p>
                        <p class="text-sm mt-1">{{ experience.description }}</p>
                    </div>
                    {{--experience-loop-end--}}
                </section>
                <section>
                    <h2 class="text-2xl font-bold text-gray-900 pb-2 mb-4 border-b-2 border-red-500">Education</h2>
                    {{--education-loop-start--}}
                    <div class="mb-4">
                        <p class="text-sm font-semibold text-gray-600">{{ education.start_date }} - {{ education.end_date }}</p>
                        <h3 class="text-lg font-bold text-gray-800">{{ education.degree }}</h3>
                        <p class="text-md font-semibold text-gray-700">{{ education.school_name }}</p>
                    </div>
                    {{--education-loop-end--}}
                </section>
            </div>
        </div>
    </div>
</body>
</html>
HTML
        ]);

        // --- Template 3: Creative Column ---
        Template::create([
            'name' => 'Creative Column',
            'status' => true,
            'template_url' => '/images/templates/creative.png', // Example path
            'template_html' => <<<'HTML'
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <style> body { font-family: 'Montserrat', sans-serif; } </style>
</head>
<body class="bg-white">
    <div class="flex min-h-screen">
        <!-- Left Column -->
        <div class="w-1/3 bg-gray-800 text-white p-8">
            <div class="text-center">
                 <!-- User Photo Placeholder -->
                <div class="w-36 h-36 mx-auto rounded-full border-4 border-white bg-gray-700 mb-4 bg-cover bg-center" style="background-image: url({{ contact.photo_path }})"></div>
                <h1 class="text-3xl font-bold">{{ contact.full_name }}</h1>
                <p class="text-lg text-red-400 mt-1">{{ experience.job_title }}</p>
            </div>
            <div class="mt-10">
                <h3 class="text-lg font-semibold border-b-2 border-red-400 pb-1 mb-3">CONTACT</h3>
                <p class="text-sm mb-1">{{ contact.phone }}</p>
                <p class="text-sm mb-1">{{ contact.email }}</p>
                <p class="text-sm">{{ contact.address }}</p>
            </div>
            <div class="mt-8">
                <h3 class="text-lg font-semibold border-b-2 border-red-400 pb-1 mb-3">SKILLS</h3>
                {{--skill-loop-start--}}
                <p class="text-sm mb-1">{{ skill.skill_name }}</p>
                {{--skill-loop-end--}}
            </div>
        </div>
        <!-- Right Column -->
        <div class="w-2/3 p-10 text-gray-700">
            <section class="mb-8">
                <h2 class="text-3xl font-bold text-gray-800 mb-4">Summary</h2>
                <p class="leading-relaxed">{{ contact.summary }}</p>
            </section>
            <section class="mb-8">
                <h2 class="text-3xl font-bold text-gray-800 mb-4">Experience</h2>
                {{--experience-loop-start--}}
                <div class="mb-6">
                    <p class="text-sm font-medium text-gray-500">{{ experience.start_date }} to {{ experience.end_date }}</p>
                    <h3 class="text-xl font-semibold text-gray-900">{{ experience.job_title }}</h3>
                    <p class="italic text-gray-600">{{ experience.company_name }}</p>
                    <p class="mt-2 leading-relaxed">{{ experience.description }}</p>
                </div>
                {{--experience-loop-end--}}
            </section>
            <section>
                <h2 class="text-3xl font-bold text-gray-800 mb-4">Education</h2>
                {{--education-loop-start--}}
                <div class="mb-6">
                    <p class="text-sm font-medium text-gray-500">{{ education.start_date }} to {{ education.end_date }}</p>
                    <h3 class="text-xl font-semibold text-gray-900">{{ education.degree }} - {{ education.field }}</h3>
                    <p class="italic text-gray-600">{{ education.school_name }}</p>
                </div>
                {{--education-loop-end--}}
            </section>
        </div>
    </div>
</body>
</html>
HTML
        ]);
    }
}
