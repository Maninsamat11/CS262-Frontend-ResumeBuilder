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
  

        // --- Template 1: Professional Blue ---
Template::create([
    'name' => 'Professional Blue',
    'status' => true,
    'template_url' => '/images/template/professional-blue.png',
    'template_html' => <<<'HTML'
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body { font-family: 'Georgia', 'Times New Roman', serif; }
    </style>
</head>
<body class="bg-white text-gray-800">
    <div class="max-w-4xl mx-auto">
        <!-- Header -->
        <div class="bg-blue-900 text-white p-8">
            <div class="flex items-center space-x-6">
                <div class="w-24 h-24 rounded-full bg-white bg-cover bg-center border-4 border-blue-300" 
                     style="background-image: url('{{ contact.photo_path }}')">
                </div>
                <div>
                    <h1 class="text-4xl font-bold">{{ contact.full_name }}</h1>
                    <div class="mt-2 space-y-1">
                        <p class="text-blue-200">{{ contact.phone }}</p>
                        <p class="text-blue-200">{{ contact.address }}</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="p-8 grid grid-cols-12 gap-8">
            <!-- Left Column -->
            <div class="col-span-4">
                <!-- Skills Section -->
                <div class="mb-8">
                    <h3 class="text-xl font-bold text-blue-900 mb-4 pb-2 border-b border-blue-200">Skills</h3>
                    <div class="space-y-2">
                        {{--skill-loop-start--}}
                        <div class="bg-blue-50 px-3 py-2 rounded">
                            <p class="text-sm font-medium text-blue-800">{{ skill.skill_name }}</p>
                        </div>
                        {{--skill-loop-end--}}
                    </div>
                </div>
            </div>

            <!-- Right Column -->
            <div class="col-span-8">
                <!-- Summary Section -->
                <section class="mb-8">
                    <h2 class="text-2xl font-bold text-blue-900 mb-4">Summary</h2>
                    <p class="text-sm leading-relaxed text-gray-700">{{ contact.summary }}</p>
                </section>

                <!-- Experience Section -->
                <section class="mb-8">
                    <h2 class="text-2xl font-bold text-blue-900 mb-4">Experience</h2>
                    {{--experience-loop-start--}}
                    <div class="mb-6 pl-4 border-l-4 border-blue-200">
                        <div class="flex justify-between items-start mb-1">
                            <h3 class="text-lg font-bold text-gray-800">{{ experience.job_title }}</h3>
                            <span class="text-sm text-gray-600">{{ experience.start_date }} - {{ experience.end_date }}</span>
                        </div>
                        <p class="text-md font-semibold text-blue-700 mb-2">{{ experience.company_name }}</p>
                        <p class="text-sm text-gray-700">{{ experience.description }}</p>
                    </div>
                    {{--experience-loop-end--}}
                </section>

                <!-- Education Section -->
                <section>
                    <h2 class="text-2xl font-bold text-blue-900 mb-4">Education</h2>
                    {{--education-loop-start--}}
                    <div class="mb-6 pl-4 border-l-4 border-blue-200">
                        <div class="flex justify-between items-start mb-1">
                            <h3 class="text-lg font-bold text-gray-800">{{ education.degree }}</h3>
                            <span class="text-sm text-gray-600">{{ education.start_date }} - {{ education.end_date }}</span>
                        </div>
                        <p class="text-md font-semibold text-blue-700 mb-2">{{ education.school_name }} - {{ education.field }}</p>
                        <p class="text-sm text-gray-700">{{ education.description }}</p>
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

// --- Template 2: Creative Green ---
Template::create([
    'name' => 'Creative Green',
    'status' => true,
    'template_url' => '/images/template/creative-green.png',
    'template_html' => <<<'HTML'
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body { font-family: 'Trebuchet MS', 'Arial', sans-serif; }
    </style>
</head>
<body class="bg-gradient-to-br from-green-50 to-emerald-100 text-gray-800">
    <div class="max-w-4xl mx-auto p-6">
        <div class="bg-white rounded-2xl shadow-2xl overflow-hidden">
            <!-- Header -->
            <div class="bg-gradient-to-r from-green-600 to-emerald-600 p-8 text-white">
                <div class="text-center">
                    <div class="w-32 h-32 mx-auto rounded-full bg-white bg-cover bg-center border-4 border-green-200 shadow-lg" 
                         style="background-image: url('{{ contact.photo_path }}')">
                    </div>
                    <h1 class="text-4xl font-bold mt-4">{{ contact.full_name }}</h1>
                    <div class="mt-4 flex justify-center space-x-6">
                        <p class="bg-green-700 px-4 py-2 rounded-full text-sm">{{ contact.phone }}</p>
                        <p class="bg-green-700 px-4 py-2 rounded-full text-sm">{{ contact.address }}</p>
                    </div>
                </div>
            </div>

            <div class="p-8">
                <!-- Summary Section -->
                <section class="mb-8 text-center">
                    <h2 class="text-3xl font-bold text-green-700 mb-4">About Me</h2>
                    <div class="bg-green-50 p-6 rounded-xl">
                        <p class="text-sm leading-relaxed text-gray-700">{{ contact.summary }}</p>
                    </div>
                </section>

                <div class="grid grid-cols-12 gap-8">
                    <!-- Left Column -->
                    <div class="col-span-4">
                        <!-- Skills Section -->
                        <div class="bg-gradient-to-b from-green-100 to-emerald-100 p-6 rounded-xl">
                            <h3 class="text-xl font-bold text-green-800 mb-4 text-center">Skills</h3>
                            <div class="space-y-3">
                                {{--skill-loop-start--}}
                                <div class="bg-white px-4 py-3 rounded-lg shadow-sm border-l-4 border-green-500">
                                    <p class="text-sm font-medium text-gray-800">{{ skill.skill_name }}</p>
                                </div>
                                {{--skill-loop-end--}}
                            </div>
                        </div>
                    </div>

                    <!-- Right Column -->
                    <div class="col-span-8">
                        <!-- Experience Section -->
                        <section class="mb-8">
                            <h2 class="text-2xl font-bold text-green-700 mb-6 text-center">Experience</h2>
                            {{--experience-loop-start--}}
                            <div class="mb-6 bg-gray-50 p-6 rounded-xl border-l-4 border-green-500">
                                <div class="flex justify-between items-start mb-2">
                                    <h3 class="text-lg font-bold text-gray-800">{{ experience.job_title }}</h3>
                                    <span class="bg-green-200 text-green-800 px-3 py-1 rounded-full text-xs font-semibold">{{ experience.start_date }} - {{ experience.end_date }}</span>
                                </div>
                                <p class="text-md font-semibold text-green-600 mb-3">{{ experience.company_name }}</p>
                                <p class="text-sm text-gray-700">{{ experience.description }}</p>
                            </div>
                            {{--experience-loop-end--}}
                        </section>

                        <!-- Education Section -->
                        <section>
                            <h2 class="text-2xl font-bold text-green-700 mb-6 text-center">Education</h2>
                            {{--education-loop-start--}}
                            <div class="mb-6 bg-gray-50 p-6 rounded-xl border-l-4 border-emerald-500">
                                <div class="flex justify-between items-start mb-2">
                                    <h3 class="text-lg font-bold text-gray-800">{{ education.degree }}</h3>
                                    <span class="bg-emerald-200 text-emerald-800 px-3 py-1 rounded-full text-xs font-semibold">{{ education.start_date }} - {{ education.end_date }}</span>
                                </div>
                                <p class="text-md font-semibold text-emerald-600 mb-3">{{ education.school_name }} - {{ education.field }}</p>
                                <p class="text-sm text-gray-700">{{ education.description }}</p>
                            </div>
                            {{--education-loop-end--}}
                        </section>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
HTML
]);

// --- Template 3: Executive Black ---
Template::create([
    'name' => 'Executive Black',
    'status' => true,
    'template_url' => '/images/template/executive-black.png',
    'template_html' => <<<'HTML'
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body { font-family: 'Arial', 'Helvetica', sans-serif; }
    </style>
</head>
<body class="bg-black text-white">
    <div class="max-w-4xl mx-auto">
        <div class="grid grid-cols-12">
            <!-- Left Sidebar -->
            <div class="col-span-4 bg-gray-900 min-h-screen p-8">
                <!-- Profile Photo -->
                <div class="text-center mb-8">
                    <div class="w-40 h-40 mx-auto rounded-full bg-gray-700 bg-cover bg-center border-4 border-gray-600" 
                         style="background-image: url('{{ contact.photo_path }}')">
                    </div>
                </div>

                <!-- Contact Info -->
                <div class="mb-8">
                    <h3 class="text-lg font-bold text-gray-300 mb-4 pb-2 border-b border-gray-600">Contact</h3>
                    <div class="space-y-3">
                        <p class="text-sm text-gray-400">{{ contact.phone }}</p>
                        <p class="text-sm text-gray-400">{{ contact.address }}</p>
                    </div>
                </div>

                <!-- Skills Section -->
                <div>
                    <h3 class="text-lg font-bold text-gray-300 mb-4 pb-2 border-b border-gray-600">Skills</h3>
                    <div class="space-y-2">
                        {{--skill-loop-start--}}
                        <div class="bg-gray-800 px-3 py-2 rounded border-l-2 border-white">
                            <p class="text-sm font-medium">{{ skill.skill_name }}</p>
                        </div>
                        {{--skill-loop-end--}}
                    </div>
                </div>
            </div>

            <!-- Main Content -->
            <div class="col-span-8 bg-white text-gray-800 p-8">
                <!-- Name Header -->
                <div class="mb-8">
                    <h1 class="text-5xl font-bold text-black mb-2">{{ contact.full_name }}</h1>
                    <div class="w-24 h-1 bg-black"></div>
                </div>

                <!-- Summary Section -->
                <section class="mb-8">
                    <h2 class="text-2xl font-bold text-black mb-4">Professional Summary</h2>
                    <p class="text-sm leading-relaxed text-gray-700 bg-gray-50 p-4 border-l-4 border-black">{{ contact.summary }}</p>
                </section>

                <!-- Experience Section -->
                <section class="mb-8">
                    <h2 class="text-2xl font-bold text-black mb-4">Professional Experience</h2>
                    {{--experience-loop-start--}}
                    <div class="mb-6 pb-6 border-b border-gray-200">
                        <div class="flex justify-between items-start mb-2">
                            <div>
                                <h3 class="text-xl font-bold text-black">{{ experience.job_title }}</h3>
                                <p class="text-lg font-semibold text-gray-600">{{ experience.company_name }}</p>
                            </div>
                            <div class="text-right">
                                <span class="bg-black text-white px-3 py-1 text-xs font-bold uppercase tracking-wider">{{ experience.start_date }} - {{ experience.end_date }}</span>
                            </div>
                        </div>
                        <p class="text-sm text-gray-700 mt-3">{{ experience.description }}</p>
                    </div>
                    {{--experience-loop-end--}}
                </section>

                <!-- Education Section -->
                <section>
                    <h2 class="text-2xl font-bold text-black mb-4">Education</h2>
                    {{--education-loop-start--}}
                    <div class="mb-6 pb-6 border-b border-gray-200">
                        <div class="flex justify-between items-start mb-2">
                            <div>
                                <h3 class="text-xl font-bold text-black">{{ education.degree }}</h3>
                                <p class="text-lg font-semibold text-gray-600">{{ education.school_name }} - {{ education.field }}</p>
                            </div>
                            <div class="text-right">
                                <span class="bg-black text-white px-3 py-1 text-xs font-bold uppercase tracking-wider">{{ education.start_date }} - {{ education.end_date }}</span>
                            </div>
                        </div>
                        <p class="text-sm text-gray-700 mt-3">{{ education.description }}</p>
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

// --- Template 4: Modern Purple ---
Template::create([
    'name' => 'Modern Purple',
    'status' => true,
    'template_url' => '/images/template/modern-purple.png',
    'template_html' => <<<'HTML'
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body { font-family: 'Segoe UI', 'Tahoma', sans-serif; }
    </style>
</head>
<body class="bg-gray-100 text-gray-800">
    <div class="max-w-4xl mx-auto p-6">
        <div class="bg-white rounded-3xl shadow-xl overflow-hidden">
            <!-- Header with diagonal design -->
            <div class="relative bg-gradient-to-r from-purple-600 via-purple-700 to-indigo-700 p-10 text-white">
                <div class="absolute top-0 left-0 w-full h-full bg-black opacity-10"></div>
                <div class="relative z-10 flex items-center justify-between">
                    <div>
                        <h1 class="text-4xl font-bold mb-2">{{ contact.full_name }}</h1>
                        <div class="space-y-1">
                            <p class="text-purple-200">{{ contact.phone }}</p>
                            <p class="text-purple-200">{{ contact.address }}</p>
                        </div>
                    </div>
                    <div class="w-32 h-32 rounded-2xl bg-white bg-cover bg-center border-4 border-purple-300 shadow-lg" 
                         style="background-image: url('{{ contact.photo_path }}')">
                    </div>
                </div>
            </div>

            <div class="p-8">
                <!-- Summary with modern card design -->
                <section class="mb-10">
                    <div class="bg-gradient-to-r from-purple-50 to-indigo-50 p-6 rounded-2xl border border-purple-100">
                        <h2 class="text-2xl font-bold text-purple-800 mb-4 flex items-center">
                            <span class="w-2 h-8 bg-purple-600 rounded-full mr-3"></span>
                            Summary
                        </h2>
                        <p class="text-sm leading-relaxed text-gray-700">{{ contact.summary }}</p>
                    </div>
                </section>

                <div class="grid grid-cols-12 gap-8">
                    <!-- Skills Column -->
                    <div class="col-span-4">
                        <div class="bg-gray-50 p-6 rounded-2xl">
                            <h3 class="text-xl font-bold text-purple-800 mb-4 flex items-center">
                                <span class="w-2 h-6 bg-purple-600 rounded-full mr-3"></span>
                                Skills
                            </h3>
                            <div class="space-y-3">
                                {{--skill-loop-start--}}
                                <div class="bg-white px-4 py-3 rounded-xl shadow-sm border-l-4 border-purple-400 hover:shadow-md transition-shadow">
                                    <p class="text-sm font-medium text-gray-800">{{ skill.skill_name }}</p>
                                </div>
                                {{--skill-loop-end--}}
                            </div>
                        </div>
                    </div>

                    <!-- Experience & Education Column -->
                    <div class="col-span-8">
                        <!-- Experience Section -->
                        <section class="mb-10">
                            <h2 class="text-2xl font-bold text-purple-800 mb-6 flex items-center">
                                <span class="w-2 h-8 bg-purple-600 rounded-full mr-3"></span>
                                Experience
                            </h2>
                            {{--experience-loop-start--}}
                            <div class="mb-6 bg-white p-6 rounded-2xl shadow-sm border border-gray-100 hover:shadow-md transition-shadow">
                                <div class="flex justify-between items-start mb-3">
                                    <div>
                                        <h3 class="text-lg font-bold text-gray-800">{{ experience.job_title }}</h3>
                                        <p class="text-md font-semibold text-purple-600">{{ experience.company_name }}</p>
                                    </div>
                                    <span class="bg-gradient-to-r from-purple-500 to-indigo-500 text-white px-4 py-2 rounded-xl text-xs font-semibold">{{ experience.start_date }} - {{ experience.end_date }}</span>
                                </div>
                                <p class="text-sm text-gray-700">{{ experience.description }}</p>
                            </div>
                            {{--experience-loop-end--}}
                        </section>

                        <!-- Education Section -->
                        <section>
                            <h2 class="text-2xl font-bold text-purple-800 mb-6 flex items-center">
                                <span class="w-2 h-8 bg-purple-600 rounded-full mr-3"></span>
                                Education
                            </h2>
                            {{--education-loop-start--}}
                            <div class="mb-6 bg-white p-6 rounded-2xl shadow-sm border border-gray-100 hover:shadow-md transition-shadow">
                                <div class="flex justify-between items-start mb-3">
                                    <div>
                                        <h3 class="text-lg font-bold text-gray-800">{{ education.degree }}</h3>
                                        <p class="text-md font-semibold text-purple-600">{{ education.school_name }} - {{ education.field }}</p>
                                    </div>
                                    <span class="bg-gradient-to-r from-purple-500 to-indigo-500 text-white px-4 py-2 rounded-xl text-xs font-semibold">{{ education.start_date }} - {{ education.end_date }}</span>
                                </div>
                                <p class="text-sm text-gray-700">{{ education.description }}</p>
                            </div>
                            {{--education-loop-end--}}
                        </section>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
HTML
]);

// --- Template 5: Clean Orange ---
Template::create([
    'name' => 'Clean Orange',
    'status' => true,
    'template_url' => '/images/template/clean-orange.png',
    'template_html' => <<<'HTML'
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body { font-family: 'Open Sans', 'Arial', sans-serif; }
    </style>
</head>
<body class="bg-orange-50 text-gray-800">
    <div class="max-w-4xl mx-auto p-8">
        <div class="bg-white shadow-lg">
            <!-- Top Header Bar -->
            <div class="bg-gradient-to-r from-orange-500 to-red-500 h-4"></div>
            
            <!-- Main Header -->
            <div class="p-8 bg-white">
                <div class="flex items-center justify-between mb-6">
                    <div>
                        <h1 class="text-4xl font-bold text-gray-900">{{ contact.full_name }}</h1>
                        <div class="mt-2 flex space-x-6 text-gray-600">
                            <span class="flex items-center">
                                <span class="w-2 h-2 bg-orange-500 rounded-full mr-2"></span>
                                {{ contact.phone }}
                            </span>
                            <span class="flex items-center">
                                <span class="w-2 h-2 bg-orange-500 rounded-full mr-2"></span>
                                {{ contact.address }}
                            </span>
                        </div>
                    </div>
                    <div class="w-28 h-28 rounded-lg bg-gray-200 bg-cover bg-center border-2 border-orange-300" 
                         style="background-image: url('{{ contact.photo_path }}')">
                    </div>
                </div>

                <!-- Summary Section -->
                <section class="mb-8">
                    <div class="flex items-center mb-4">
                        <div class="w-8 h-8 bg-orange-500 rounded-full flex items-center justify-center mr-3">
                            <span class="text-white font-bold text-sm">S</span>
                        </div>
                        <h2 class="text-2xl font-bold text-gray-900">Summary</h2>
                    </div>
                    <div class="pl-11">
                        <p class="text-sm leading-relaxed text-gray-700 bg-orange-50 p-4 rounded-lg border-l-4 border-orange-400">{{ contact.summary }}</p>
                    </div>
                </section>

                <div class="grid grid-cols-12 gap-8">
                    <!-- Left Column - Skills -->
                    <div class="col-span-4">
                        <div class="flex items-center mb-4">
                            <div class="w-8 h-8 bg-orange-500 rounded-full flex items-center justify-center mr-3">
                                <span class="text-white font-bold text-sm">K</span>
                            </div>
                            <h3 class="text-xl font-bold text-gray-900">Skills</h3>
                        </div>
                        <div class="pl-11 space-y-2">
                            {{--skill-loop-start--}}
                            <div class="flex items-center py-2">
                                <span class="w-2 h-2 bg-orange-400 rounded-full mr-3"></span>
                                <p class="text-sm font-medium text-gray-800">{{ skill.skill_name }}</p>
                            </div>
                            {{--skill-loop-end--}}
                        </div>
                    </div>

                    <!-- Right Column -->
                    <div class="col-span-8">
                        <!-- Experience Section -->
                        <section class="mb-8">
                            <div class="flex items-center mb-4">
                                <div class="w-8 h-8 bg-orange-500 rounded-full flex items-center justify-center mr-3">
                                    <span class="text-white font-bold text-sm">E</span>
                                </div>
                                <h2 class="text-2xl font-bold text-gray-900">Experience</h2>
                            </div>
                            <div class="pl-11">
                                {{--experience-loop-start--}}
                                <div class="mb-6 pb-6 border-b border-gray-200 last:border-b-0">
                                    <div class="flex justify-between items-start mb-2">
                                        <div>
                                            <h3 class="text-lg font-bold text-gray-800">{{ experience.job_title }}</h3>
                                            <p class="text-md font-semibold text-orange-600">{{ experience.company_name }}</p>
                                        </div>
                                        <span class="bg-orange-100 text-orange-800 px-3 py-1 rounded-full text-xs font-semibold whitespace-nowrap">{{ experience.start_date }} - {{ experience.end_date }}</span>
                                    </div>
                                    <p class="text-sm text-gray-700 mt-2">{{ experience.description }}</p>
                                </div>
                                {{--experience-loop-end--}}
                            </div>
                        </section>

                        <!-- Education Section -->
                        <section>
                            <div class="flex items-center mb-4">
                                <div class="w-8 h-8 bg-orange-500 rounded-full flex items-center justify-center mr-3">
                                    <span class="text-white font-bold text-sm">A</span>
                                </div>
                                <h2 class="text-2xl font-bold text-gray-900">Education</h2>
                            </div>
                            <div class="pl-11">
                                {{--education-loop-start--}}
                                <div class="mb-6 pb-6 border-b border-gray-200 last:border-b-0">
                                    <div class="flex justify-between items-start mb-2">
                                        <div>
                                            <h3 class="text-lg font-bold text-gray-800">{{ education.degree }}</h3>
                                            <p class="text-md font-semibold text-orange-600">{{ education.school_name }} - {{ education.field }}</p>
                                        </div>
                                        <span class="bg-orange-100 text-orange-800 px-3 py-1 rounded-full text-xs font-semibold whitespace-nowrap">{{ education.start_date }} - {{ education.end_date }}</span>
                                    </div>
                                    <p class="text-sm text-gray-700 mt-2">{{ education.description }}</p>
                                </div>
                                {{--education-loop-end--}}
                            </div>
                        </section>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
HTML
]);
    
// --- Template 6: Tech Slate ---
Template::create([
    'name' => 'Tech Slate',
    'status' => true,
    'template_url' => '/images/template/tech-slate.png',
    'template_html' => <<<'HTML'
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <style> body { font-family: 'Fira Code', 'Courier New', monospace; } </style>
</head>
<body class="bg-gray-900 text-gray-300">
    <div class="max-w-4xl mx-auto my-10 p-10 bg-gray-800 border border-teal-500 shadow-lg rounded-lg">
        <header class="flex items-center space-x-8 mb-8">
            <div class="w-28 h-28 rounded-full bg-gray-700 bg-cover bg-center border-2 border-teal-400" 
                 style="background-image: url('{{ contact.photo_path }}')">
            </div>
            <div>
                <h1 class="text-4xl font-bold text-white">{{ contact.full_name }}</h1>
                <p class="text-lg text-teal-400 mt-1">// Full Stack Developer</p>
            </div>
        </header>

        <div class="grid grid-cols-3 gap-10">
            <div class="col-span-1">
                <section>
                    <h2 class="text-xl font-bold text-teal-400 mb-3">> Contact_Info</h2>
                    <div class="text-sm space-y-1">
                        <p><span class="text-gray-500">phone:</span> "{{ contact.phone }}"</p>
                        <p><span class="text-gray-500">email:</span> "{{ contact.address }}"</p>
                    </div>
                </section>
                <section class="mt-8">
                    <h2 class="text-xl font-bold text-teal-400 mb-3">> Skills_Array</h2>
                    <ul class="list-disc list-inside text-sm space-y-1">
                    {{--skill-loop-start--}}
                        <li>{{ skill.skill_name }}</li>
                    {{--skill-loop-end--}}
                    </ul>
                </section>
            </div>
            <div class="col-span-2">
                <section class="mb-8">
                    <h2 class="text-xl font-bold text-teal-400 mb-3">> Profile_Summary</h2>
                    <p class="text-sm leading-relaxed border-l-2 border-gray-700 pl-4">{{ contact.summary }}</p>
                </section>
                <section class="mb-8">
                    <h2 class="text-xl font-bold text-teal-400 mb-3">> Work_Experience</h2>
                    {{--experience-loop-start--}}
                    <div class="mb-6">
                        <h3 class="text-lg font-semibold text-white">{{ experience.job_title }}</h3>
                        <p class="text-sm text-teal-400">{{ experience.company_name }} | {{ experience.start_date }} - {{ experience.end_date }}</p>
                        <p class="text-sm mt-2 text-gray-400">{{ experience.description }}</p>
                    </div>
                    {{--experience-loop-end--}}
                </section>
                <section>
                    <h2 class="text-xl font-bold text-teal-400 mb-3">> Education</h2>
                    {{--education-loop-start--}}
                    <div class="mb-4">
                         <h3 class="text-lg font-semibold text-white">{{ education.degree }}</h3>
                         <p class="text-sm text-teal-400">{{ education.school_name }} | {{ education.start_date }} - {{ education.end_date }}</p>
                         <p class="italic text-sm text-gray-500 mt-1">{{ education.field }}</p>
                         <p class="text-sm mt-2 text-gray-400">{{ education.description }}</p>
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

// --- Template 7: Elegant Ink ---
Template::create([
    'name' => 'Elegant Ink',
    'status' => true,
    'template_url' => '/images/template/elegant-ink.png',
    'template_html' => <<<'HTML'
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <style> 
        body { font-family: 'Garamond', 'Georgia', serif; } 
        @media print { body { -webkit-print-color-adjust: exact; } }
    </style>
</head>
<body class="bg-white text-black">
    <div class="max-w-4xl mx-auto p-12">
        <div class="text-center mb-10">
            <h1 class="text-5xl font-bold tracking-wider uppercase">{{ contact.full_name }}</h1>
            <div class="border-t border-b border-black mt-4 py-2 text-xs tracking-widest">
                {{ contact.phone }}   |   {{ contact.address }}
            </div>
        </div>

        <section class="mb-8">
            <h2 class="text-lg font-bold tracking-widest border-b-2 border-black pb-2 mb-4">SUMMARY</h2>
            <p class="text-sm leading-6">{{ contact.summary }}</p>
        </section>

        <section class="mb-8">
            <h2 class="text-lg font-bold tracking-widest border-b-2 border-black pb-2 mb-4">EXPERIENCE</h2>
            {{--experience-loop-start--}}
            <div class="mb-6">
                <div class="flex justify-between">
                    <h3 class="text-base font-bold">{{ experience.job_title }}</h3>
                    <p class="text-sm">{{ experience.start_date }} — {{ experience.end_date }}</p>
                </div>
                <p class="text-sm italic font-semibold">{{ experience.company_name }}</p>
                <p class="text-sm mt-2 leading-6">{{ experience.description }}</p>
            </div>
            {{--experience-loop-end--}}
        </section>

        <section class="mb-8">
            <h2 class="text-lg font-bold tracking-widest border-b-2 border-black pb-2 mb-4">EDUCATION</h2>
            {{--education-loop-start--}}
            <div class="mb-4">
                <div class="flex justify-between">
                    <h3 class="text-base font-bold">{{ education.degree }}</h3>
                     <p class="text-sm">{{ education.start_date }} — {{ education.end_date }}</p>
                </div>
                <p class="text-sm italic font-semibold">{{ education.school_name }} - {{ education.field }}</p>
                <p class="text-sm mt-2 leading-6">{{ education.description }}</p>
            </div>
            {{--education-loop-end--}}
        </section>

        <section>
            <h2 class="text-lg font-bold tracking-widest border-b-2 border-black pb-2 mb-4">SKILLS</h2>
            <p class="text-sm leading-6">
                {{--skill-loop-start--}}
                <span>{{ skill.skill_name }}</span><span class="mx-2">•</span>
                {{--skill-loop-end--}}
            </p>
        </section>
    </div>
</body>
</html>
HTML
]);

// --- Template 8: Corporate Blue ---
Template::create([
    'name' => 'Corporate Blue',
    'status' => true,
    'template_url' => '/images/template/corporate-blue.png',
    'template_html' => <<<'HTML'
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <style> body { font-family: 'Calibri', 'Segoe UI', sans-serif; } </style>
</head>
<body class="bg-gray-200">
    <div class="max-w-4xl mx-auto my-10 bg-white shadow-lg">
        <header class="bg-blue-800 text-white p-8 flex items-center justify-between">
            <div>
                <h1 class="text-4xl font-bold">{{ contact.full_name }}</h1>
            </div>
            <div class="text-right text-sm">
                <p>{{ contact.phone }}</p>
                <p>{{ contact.address }}</p>
            </div>
        </header>

        <main class="p-8">
            <section class="mb-6">
                <h2 class="text-2xl font-bold text-blue-800 border-b-2 border-blue-200 pb-2 mb-3">Summary</h2>
                <p class="text-sm text-gray-700 leading-relaxed">{{ contact.summary }}</p>
            </section>
        
            <div class="grid grid-cols-3 gap-8">
                <div class="col-span-2">
                    <section class="mb-6">
                        <h2 class="text-2xl font-bold text-blue-800 border-b-2 border-blue-200 pb-2 mb-3">Experience</h2>
                        {{--experience-loop-start--}}
                        <div class="mb-5">
                            <h3 class="text-lg font-semibold">{{ experience.job_title }} | <span class="text-md font-medium text-gray-600">{{ experience.company_name }}</span></h3>
                            <p class="text-xs text-gray-500">{{ experience.start_date }} to {{ experience.end_date }}</p>
                            <p class="text-sm text-gray-700 mt-2">{{ experience.description }}</p>
                        </div>
                        {{--experience-loop-end--}}
                    </section>
                     <section>
                        <h2 class="text-2xl font-bold text-blue-800 border-b-2 border-blue-200 pb-2 mb-3">Education</h2>
                        {{--education-loop-start--}}
                        <div class="mb-4">
                            <h3 class="text-lg font-semibold">{{ education.school_name }}</h3>
                            <p class="text-xs text-gray-500">{{ education.start_date }} to {{ education.end_date }}</p>
                            <p class="text-md font-medium text-gray-600">{{ education.degree }} - {{ education.field }}</p>
                            <p class="text-sm text-gray-700 mt-1">{{ education.description }}</p>
                        </div>
                        {{--education-loop-end--}}
                    </section>
                </div>
                <div class="col-span-1">
                    <section>
                        <h2 class="text-2xl font-bold text-blue-800 border-b-2 border-blue-200 pb-2 mb-3">Skills</h2>
                        <ul class="list-disc list-inside text-sm text-gray-700 space-y-1">
                        {{--skill-loop-start--}}
                            <li>{{ skill.skill_name }}</li>
                        {{--skill-loop-end--}}
                        </ul>
                    </section>
                </div>
            </div>
        </main>
    </div>
</body>
</html>
HTML
]);

// --- Template 9: Creative Spotlight ---
Template::create([
    'name' => 'Creative Spotlight',
    'status' => true,
    'template_url' => '/images/templates/creative-spotlight.png',
    'template_html' => <<<'HTML'
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <style> body { font-family: 'Poppins', 'Helvetica', sans-serif; } </style>
</head>
<body class="bg-white">
    <div class="max-w-4xl mx-auto my-10 p-5 relative">
        <!-- Background decorative elements -->
        <div class="absolute top-0 right-0 -mt-10 -mr-10 w-32 h-32 bg-yellow-300 rounded-full opacity-50"></div>
        <div class="absolute bottom-0 left-0 -mb-10 -ml-10 w-48 h-48 bg-teal-300 rounded-lg opacity-50 transform -rotate-12"></div>

        <div class="relative bg-white border-2 border-gray-900 p-10">
            <header class="grid grid-cols-12 gap-8 items-center mb-10">
                <div class="col-span-4">
                    <div class="w-40 h-40 rounded-full bg-gray-200 shadow-2xl bg-cover bg-center -mt-20 ml-5 border-4 border-white"
                         style="background-image: url('{{ contact.photo_path }}')">
                    </div>
                </div>
                <div class="col-span-8">
                    <h1 class="text-5xl font-extrabold text-gray-900 tracking-tighter">{{ contact.full_name }}</h1>
                    <div class="mt-4 space-x-6 text-sm text-gray-600">
                        <span>{{ contact.address }}</span>
                        <span>/</span>
                        <span>{{ contact.phone }}</span>
                    </div>
                </div>
            </header>

            <main class="grid grid-cols-12 gap-10">
                <div class="col-span-4">
                    <section class="mb-8">
                        <h2 class="font-bold text-sm uppercase tracking-widest text-gray-500 mb-4">About Me</h2>
                        <p class="text-sm text-gray-700 leading-relaxed">{{ contact.summary }}</p>
                    </section>
                    <section>
                        <h2 class="font-bold text-sm uppercase tracking-widest text-gray-500 mb-4">Skills</h2>
                        <div class="flex flex-wrap gap-2">
                        {{--skill-loop-start--}}
                            <span class="bg-gray-900 text-white text-xs font-bold px-3 py-1.5 rounded">{{ skill.skill_name }}</span>
                        {{--skill-loop-end--}}
                        </div>
                    </section>
                </div>
                <div class="col-span-8">
                    <section class="mb-8">
                        <h2 class="font-bold text-sm uppercase tracking-widest text-gray-500 mb-4">Experience</h2>
                        {{--experience-loop-start--}}
                        <div class="mb-6 relative pl-6">
                            <div class="absolute left-0 top-1 w-3 h-3 bg-yellow-400 rounded-full"></div>
                            <p class="text-xs font-bold text-gray-500">{{ experience.start_date }} - {{ experience.end_date }}</p>
                            <h3 class="font-bold text-lg text-gray-900">{{ experience.job_title }}</h3>
                            <p class="font-semibold text-gray-700">{{ experience.company_name }}</p>
                            <p class="text-sm mt-2 text-gray-600">{{ experience.description }}</p>
                        </div>
                        {{--experience-loop-end--}}
                    </section>
                    <section>
                        <h2 class="font-bold text-sm uppercase tracking-widest text-gray-500 mb-4">Education</h2>
                        {{--education-loop-start--}}
                         <div class="mb-6 relative pl-6">
                            <div class="absolute left-0 top-1 w-3 h-3 bg-yellow-400 rounded-full"></div>
                            <p class="text-xs font-bold text-gray-500">{{ education.start_date }} - {{ education.end_date }}</p>
                            <h3 class="font-bold text-lg text-gray-900">{{ education.degree }}</h3>
                            <p class="font-semibold text-gray-700">{{ education.school_name }} - {{ education.field }}</p>
                            <p class="text-sm mt-2 text-gray-600">{{ education.description }}</p>
                        </div>
                        {{--education-loop-end--}}
                    </section>
                </div>
            </main>
        </div>
    </div>
</body>
</html>
HTML
]);

// --- Template 10: Academic CV ---
Template::create([
    'name' => 'Academic CV',
    'status' => true,
    'template_url' => '/images/template/academic-cv.png',
    'template_html' => <<<'HTML'
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <style> body { font-family: 'Cambria', 'Georgia', serif; } </style>
</head>
<body class="bg-white text-gray-900">
    <div class="max-w-4xl mx-auto p-10">
        <header class="text-center mb-8">
            <h1 class="text-3xl font-semibold">{{ contact.full_name }}</h1>
            <p class="text-sm mt-2">{{ contact.address }} | {{ contact.phone }}</p>
        </header>

        <section class="mb-6">
            <h2 class="text-base font-bold uppercase tracking-widest border-b border-gray-300 pb-1 mb-3">Professional Profile</h2>
            <p class="text-sm leading-normal">{{ contact.summary }}</p>
        </section>

        <section class="mb-6">
            <h2 class="text-base font-bold uppercase tracking-widest border-b border-gray-300 pb-1 mb-3">Education</h2>
            {{--education-loop-start--}}
            <div class="mb-4">
                <p class="font-bold">{{ education.degree }}, <span class="font-normal">{{ education.field }}</span></p>
                <p class="italic text-sm">{{ education.school_name }}</p>
                <p class="text-xs text-gray-600">{{ education.start_date }} - {{ education.end_date }}</p>
                <p class="text-sm mt-1">{{ education.description }}</p>
            </div>
            {{--education-loop-end--}}
        </section>

        <section class="mb-6">
            <h2 class="text-base font-bold uppercase tracking-widest border-b border-gray-300 pb-1 mb-3">Professional Appointments</h2>
            {{--experience-loop-start--}}
            <div class="mb-4">
                <p class="font-bold">{{ experience.job_title }}</p>
                <p class="italic text-sm">{{ experience.company_name }}</p>
                <p class="text-xs text-gray-600">{{ experience.start_date }} - {{ experience.end_date }}</p>
                <p class="text-sm mt-1 leading-normal">{{ experience.description }}</p>
            </div>
            {{--experience-loop-end--}}
        </section>

        <section>
            <h2 class="text-base font-bold uppercase tracking-widest border-b border-gray-300 pb-1 mb-3">Technical Skills</h2>
            <p class="text-sm leading-normal">
                {{--skill-loop-start--}}
                <span class="font-semibold">{{ skill.skill_name }}; </span>
                {{--skill-loop-end--}}
            </p>
        </section>
    </div>
</body>
</html>
HTML
]);

// --- Template 11: Infographic Style ---
Template::create([
    'name' => 'Infographic Style',
    'status' => true,
    'template_url' => '/images/template/infographic-style.png',
    'template_html' => <<<'HTML'
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <style> body { font-family: 'Inter', 'system-ui', sans-serif; } </style>
</head>
<body class="bg-gray-100">
    <div class="max-w-4xl mx-auto my-10 bg-white p-8 rounded-2xl shadow-2xl">
        <header class="flex items-center space-x-6 pb-6 border-b-2 border-gray-100">
            <div class="w-24 h-24 rounded-full bg-blue-100 bg-cover bg-center" style="background-image: url('{{ contact.photo_path }}')"></div>
            <div>
                <h1 class="text-3xl font-extrabold text-gray-800">{{ contact.full_name }}</h1>
                <p class="text-base text-blue-600 font-medium">{{ contact.summary }}</p>
            </div>
        </header>

        <main class="grid grid-cols-12 gap-8 mt-6">
            <div class="col-span-4">
                <div class="space-y-6">
                    <div>
                        <h3 class="font-bold text-gray-500 text-sm uppercase mb-3">Contact</h3>
                        <div class="space-y-2 text-sm">
                            <p class="flex items-center"><svg class="w-4 h-4 mr-2 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path></svg> {{ contact.phone }}</p>
                            <p class="flex items-center"><svg class="w-4 h-4 mr-2 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg> {{ contact.address }}</p>
                        </div>
                    </div>
                    <div>
                        <h3 class="font-bold text-gray-500 text-sm uppercase mb-3">Skills</h3>
                        <div class="flex flex-wrap gap-2">
                        {{--skill-loop-start--}}
                            <span class="bg-blue-100 text-blue-800 text-xs font-semibold px-2.5 py-1 rounded-full">{{ skill.skill_name }}</span>
                        {{--skill-loop-end--}}
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-span-8">
                <section class="mb-8">
                    <h2 class="text-xl font-bold text-gray-800 mb-4">Experience</h2>
                    <div class="space-y-6 border-l-2 border-blue-200 pl-6">
                    {{--experience-loop-start--}}
                        <div>
                            <p class="text-xs font-semibold text-gray-500">{{ experience.start_date }} / {{ experience.end_date }}</p>
                            <h3 class="font-bold text-base">{{ experience.job_title }} at {{ experience.company_name }}</h3>
                            <p class="text-sm text-gray-600 mt-1">{{ experience.description }}</p>
                        </div>
                    {{--experience-loop-end--}}
                    </div>
                </section>
                 <section>
                    <h2 class="text-xl font-bold text-gray-800 mb-4">Education</h2>
                    <div class="space-y-6 border-l-2 border-blue-200 pl-6">
                    {{--education-loop-start--}}
                        <div>
                            <p class="text-xs font-semibold text-gray-500">{{ education.start_date }} / {{ education.end_date }}</p>
                            <h3 class="font-bold text-base">{{ education.degree }}</h3>
                            <p class="text-sm font-medium text-gray-700">{{ education.school_name }} - {{ education.field }}</p>
                            <p class="text-sm text-gray-600 mt-1">{{ education.description }}</p>
                        </div>
                    {{--education-loop-end--}}
                    </div>
                </section>
            </div>
        </main>
    </div>
</body>
</html>
HTML
]);

// --- Template 12: Simple Sidebar ---
Template::create([
    'name' => 'Simple Sidebar',
    'status' => true,
    'template_url' => '/images/template/simple-sidebar.png',
    'template_html' => <<<'HTML'
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <style> body { font-family: 'Lato', 'Arial', sans-serif; } </style>
</head>
<body class="bg-gray-100">
    <div class="max-w-4xl mx-auto my-10 grid grid-cols-12 bg-white shadow-lg">
        <!-- Left Sidebar -->
        <div class="col-span-4 bg-gray-50 p-8">
            <div class="flex flex-col items-center">
                <div class="w-32 h-32 rounded-full bg-gray-300 mb-4 bg-cover bg-center" style="background-image: url('{{ contact.photo_path }}')"></div>
                <h1 class="text-2xl font-bold text-gray-800 text-center">{{ contact.full_name }}</h1>
            </div>
            <div class="mt-8">
                <h3 class="text-sm font-bold uppercase tracking-wider text-gray-500 border-b pb-2">Contact</h3>
                <div class="mt-3 text-sm space-y-2 text-gray-700">
                    <p>{{ contact.phone }}</p>
                    <p>{{ contact.address }}</p>
                </div>
            </div>
             <div class="mt-8">
                <h3 class="text-sm font-bold uppercase tracking-wider text-gray-500 border-b pb-2">Skills</h3>
                <div class="mt-3 text-sm space-y-2 text-gray-700">
                {{--skill-loop-start--}}
                    <p>{{ skill.skill_name }}</p>
                {{--skill-loop-end--}}
                </div>
            </div>
        </div>

        <!-- Main Content -->
        <div class="col-span-8 p-10">
            <section class="mb-8">
                <h2 class="text-2xl font-bold text-gray-800 border-b-2 border-gray-200 pb-2 mb-4">Summary</h2>
                <p class="text-sm leading-relaxed text-gray-600">{{ contact.summary }}</p>
            </section>
            <section class="mb-8">
                <h2 class="text-2xl font-bold text-gray-800 border-b-2 border-gray-200 pb-2 mb-4">Experience</h2>
                {{--experience-loop-start--}}
                <div class="mb-6">
                    <h3 class="text-lg font-semibold">{{ experience.job_title }}</h3>
                    <div class="flex justify-between text-sm text-gray-500">
                        <p class="font-medium">{{ experience.company_name }}</p>
                        <p>{{ experience.start_date }} - {{ experience.end_date }}</p>
                    </div>
                    <p class="text-sm leading-relaxed text-gray-600 mt-2">{{ experience.description }}</p>
                </div>
                {{--experience-loop-end--}}
            </section>
            <section>
                <h2 class="text-2xl font-bold text-gray-800 border-b-2 border-gray-200 pb-2 mb-4">Education</h2>
                {{--education-loop-start--}}
                <div class="mb-6">
                    <h3 class="text-lg font-semibold">{{ education.degree }}</h3>
                     <div class="flex justify-between text-sm text-gray-500">
                        <p class="font-medium">{{ education.school_name }} - {{ education.field }}</p>
                        <p>{{ education.start_date }} - {{ education.end_date }}</p>
                    </div>
                    <p class="text-sm leading-relaxed text-gray-600 mt-2">{{ education.description }}</p>
                </div>
                {{--education-loop-end--}}
            </section>
        </div>
    </div>
</body>
</html>
HTML
]);

// --- Template 13: Bold Headlines ---
Template::create([
    'name' => 'Bold Headlines',
    'status' => true,
    'template_url' => '/images/template/bold-headlines.png',
    'template_html' => <<<'HTML'
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <style> body { font-family: 'Helvetica Neue', 'Arial', sans-serif; } </style>
</head>
<body class="bg-white text-gray-800">
    <div class="max-w-4xl mx-auto p-10">
        <header class="mb-12">
            <h1 class="text-6xl font-extrabold tracking-tighter">{{ contact.full_name }}</h1>
            <div class="mt-3 text-sm text-gray-500 flex space-x-5">
                <span>{{ contact.phone }}</span>
                <span>{{ contact.address }}</span>
            </div>
            <p class="text-lg text-gray-700 mt-6 max-w-2xl">{{ contact.summary }}</p>
        </header>

        <div class="space-y-12">
            <section>
                <h2 class="text-4xl font-bold tracking-tight border-b-4 border-gray-800 pb-2 mb-6">Experience</h2>
                {{--experience-loop-start--}}
                <div class="mb-6">
                    <p class="text-xs font-bold uppercase tracking-wider text-gray-500">{{ experience.start_date }} to {{ experience.end_date }}</p>
                    <h3 class="text-2xl font-bold">{{ experience.job_title }}</h3>
                    <p class="text-lg font-medium text-gray-600">{{ experience.company_name }}</p>
                    <p class="mt-2 text-sm leading-relaxed">{{ experience.description }}</p>
                </div>
                {{--experience-loop-end--}}
            </section>
            <section>
                <h2 class="text-4xl font-bold tracking-tight border-b-4 border-gray-800 pb-2 mb-6">Education</h2>
                {{--education-loop-start--}}
                <div class="mb-6">
                    <p class="text-xs font-bold uppercase tracking-wider text-gray-500">{{ education.start_date }} to {{ education.end_date }}</p>
                    <h3 class="text-2xl font-bold">{{ education.degree }}</h3>
                    <p class="text-lg font-medium text-gray-600">{{ education.school_name }} - {{ education.field }}</p>
                    <p class="mt-2 text-sm leading-relaxed">{{ education.description }}</p>
                </div>
                {{--education-loop-end--}}
            </section>
            <section>
                <h2 class="text-4xl font-bold tracking-tight border-b-4 border-gray-800 pb-2 mb-6">Skills</h2>
                <div class="flex flex-wrap gap-3">
                    {{--skill-loop-start--}}
                    <span class="bg-gray-200 text-gray-800 font-medium text-sm px-4 py-2 rounded-md">{{ skill.skill_name }}</span>
                    {{--skill-loop-end--}}
                </div>
            </section>
        </div>
    </div>
</body>
</html>
HTML
]);

// --- Template 14: The Minimalist Grid ---
Template::create([
    'name' => 'The Minimalist Grid',
    'status' => true,
    'template_url' => '/images/template/minimalist-grid.png',
    'template_html' => <<<'HTML'
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <style> body { font-family: 'Inter', 'system-ui', sans-serif; } </style>
</head>
<body class="bg-white text-gray-800">
    <div class="max-w-4xl mx-auto p-12">
        <header class="grid grid-cols-12 gap-8 mb-12">
            <div class="col-span-8">
                <h1 class="text-5xl font-extrabold text-blue-600">{{ contact.full_name }}</h1>
                <p class="mt-4 text-lg text-gray-600 leading-relaxed">{{ contact.summary }}</p>
            </div>
            <div class="col-span-4 text-right">
                <div class="w-24 h-24 rounded-full bg-gray-200 ml-auto mb-4 bg-cover bg-center" 
                     style="background-image: url('{{ contact.photo_path }}')">
                </div>
                <p class="text-sm font-semibold">{{ contact.phone }}</p>
                <p class="text-sm font-semibold">{{ contact.address }}</p>
            </div>
        </header>

        <main class="grid grid-cols-12 gap-12">
            <div class="col-span-4">
                <h2 class="text-xs font-bold uppercase tracking-widest text-gray-400 mb-4">Skills</h2>
                <div class="space-y-2">
                    {{--skill-loop-start--}}
                    <p class="text-sm text-gray-700">{{ skill.skill_name }}</p>
                    {{--skill-loop-end--}}
                </div>
            </div>
            <div class="col-span-8">
                <section class="mb-10">
                    <h2 class="text-xs font-bold uppercase tracking-widest text-gray-400 mb-4">Experience</h2>
                    <div class="space-y-6">
                        {{--experience-loop-start--}}
                        <div>
                            <div class="flex justify-between items-baseline">
                                <h3 class="font-bold text-lg">{{ experience.job_title }}</h3>
                                <p class="text-xs text-gray-500">{{ experience.start_date }} - {{ experience.end_date }}</p>
                            </div>
                            <p class="font-semibold text-blue-600">{{ experience.company_name }}</p>
                            <p class="text-sm text-gray-600 mt-1">{{ experience.description }}</p>
                        </div>
                        {{--experience-loop-end--}}
                    </div>
                </section>
                <section>
                    <h2 class="text-xs font-bold uppercase tracking-widest text-gray-400 mb-4">Education</h2>
                    <div class="space-y-6">
                         {{--education-loop-start--}}
                        <div>
                            <div class="flex justify-between items-baseline">
                                <h3 class="font-bold text-lg">{{ education.degree }}</h3>
                                <p class="text-xs text-gray-500">{{ education.start_date }} - {{ education.end_date }}</p>
                            </div>
                            <p class="font-semibold text-blue-600">{{ education.school_name }}</p>
                            <p class="italic text-sm text-gray-600">{{ education.field }}</p>
                            <p class="text-sm text-gray-600 mt-1">{{ education.description }}</p>
                        </div>
                        {{--education-loop-end--}}
                    </div>
                </section>
            </div>
        </main>
    </div>
</body>
</html>
HTML
]);

// --- Template 15: The Timeline ---
Template::create([
    'name' => 'The Timeline',
    'status' => true,
    'template_url' => '/images/template/the-timeline.png',
    'template_html' => <<<'HTML'
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <style> body { font-family: 'Lato', 'Arial', sans-serif; } </style>
</head>
<body class="bg-gray-50">
    <div class="max-w-4xl mx-auto p-10 bg-white my-10 shadow-xl">
        <header class="text-center mb-10">
            <div class="w-24 h-24 rounded-full bg-gray-300 mx-auto mb-4 bg-cover bg-center" style="background-image: url('{{ contact.photo_path }}')"></div>
            <h1 class="text-4xl font-bold text-gray-800">{{ contact.full_name }}</h1>
            <p class="text-sm text-gray-500 mt-2">{{ contact.phone }} • {{ contact.address }}</p>
            <p class="text-base text-gray-700 mt-4 max-w-2xl mx-auto">{{ contact.summary }}</p>
        </header>

        <main>
            <!-- Timeline for Experience -->
            <section class="mb-10">
                <h2 class="text-2xl font-semibold text-center text-gray-700 mb-6">Career Journey</h2>
                <div class="relative border-l-2 border-green-500 ml-4 pl-8 py-4">
                    {{--experience-loop-start--}}
                    <div class="mb-8 relative">
                        <div class="absolute -left-10 w-4 h-4 bg-green-500 rounded-full border-2 border-white"></div>
                        <p class="text-xs font-bold text-gray-500">{{ experience.start_date }} to {{ experience.end_date }}</p>
                        <h3 class="text-lg font-bold">{{ experience.job_title }}</h3>
                        <p class="font-semibold text-green-600">{{ experience.company_name }}</p>
                        <p class="text-sm mt-1">{{ experience.description }}</p>
                    </div>
                    {{--experience-loop-end--}}
                </div>
            </section>

            <div class="grid grid-cols-2 gap-10">
                <section>
                    <h2 class="text-xl font-semibold text-gray-700 mb-4">Education</h2>
                    {{--education-loop-start--}}
                    <div class="mb-4">
                        <h3 class="font-bold">{{ education.degree }}</h3>
                        <p class="text-sm font-medium text-gray-600">{{ education.school_name }}</p>
                        <p class="text-xs text-gray-500">{{ education.start_date }} - {{ education.end_date }}</p>
                    </div>
                    {{--education-loop-end--}}
                </section>
                <section>
                    <h2 class="text-xl font-semibold text-gray-700 mb-4">Skills</h2>
                    <div class="flex flex-wrap gap-2">
                        {{--skill-loop-start--}}
                        <span class="bg-gray-200 text-gray-700 text-sm px-3 py-1 rounded">{{ skill.skill_name }}</span>
                        {{--skill-loop-end--}}
                    </div>
                </section>
            </div>
        </main>
    </div>
</body>
</html>
HTML
]);

// --- Template 16: The Journalist ---
Template::create([
    'name' => 'The Journalist',
    'status' => true,
    'template_url' => '/images/template/the-journalist.png',
    'template_html' => <<<'HTML'
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <style> body { font-family: 'Merriweather', 'Georgia', serif; } </style>
</head>
<body class="bg-white text-gray-800">
    <div class="max-w-4xl mx-auto p-10">
        <header class="text-center pb-6 border-b-4 border-double border-gray-800 mb-8">
            <h1 class="text-4xl font-extrabold">{{ contact.full_name }}</h1>
        </header>

        <main class="grid grid-cols-12 gap-x-10">
            <div class="col-span-4">
                <section>
                    <h3 class="font-bold text-sm uppercase tracking-widest mb-3">Contact</h3>
                    <div class="text-sm space-y-1">
                        <p>{{ contact.phone }}</p>
                        <p>{{ contact.address }}</p>
                    </div>
                </section>
                <section class="mt-8">
                    <h3 class="font-bold text-sm uppercase tracking-widest mb-3">Skills</h3>
                    <div class="text-sm space-y-1">
                    {{--skill-loop-start--}}
                        <p>{{ skill.skill_name }}</p>
                    {{--skill-loop-end--}}
                    </div>
                </section>
            </div>
            <div class="col-span-8 border-l border-gray-200 pl-10">
                <section class="mb-8">
                    <h2 class="text-2xl font-bold mb-3">Profile</h2>
                    <p class="text-sm leading-relaxed text-justify">{{ contact.summary }}</p>
                </section>
                <section class="mb-8">
                    <h2 class="text-2xl font-bold mb-3">Experience</h2>
                    {{--experience-loop-start--}}
                    <div class="mb-5">
                        <h3 class="text-lg font-bold">{{ experience.job_title }}</h3>
                        <div class="flex justify-between text-sm text-gray-600">
                            <p class="font-semibold italic">{{ experience.company_name }}</p>
                            <p>{{ experience.start_date }} – {{ experience.end_date }}</p>
                        </div>
                        <p class="text-sm leading-relaxed mt-1">{{ experience.description }}</p>
                    </div>
                    {{--experience-loop-end--}}
                </section>
                <section>
                    <h2 class="text-2xl font-bold mb-3">Education</h2>
                    {{--education-loop-start--}}
                    <div class="mb-5">
                        <h3 class="text-lg font-bold">{{ education.school_name }}</h3>
                        <p class="font-semibold italic text-sm text-gray-600">{{ education.degree }} in {{ education.field }}</p>
                        <p class="text-sm mt-1 leading-relaxed">{{ education.description }}</p>
                    </div>
                    {{--education-loop-end--}}
                </section>
            </div>
        </main>
    </div>
</body>
</html>
HTML
]);

// --- Template 17: Gradient Splash ---
Template::create([
    'name' => 'Gradient Splash',
    'status' => true,
    'template_url' => '/images/template/gradient-splash.png',
    'template_html' => <<<'HTML'
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <style> body { font-family: 'Poppins', 'system-ui', sans-serif; } </style>
</head>
<body class="bg-gray-100">
    <div class="max-w-4xl mx-auto my-10 bg-white rounded-lg shadow-xl overflow-hidden">
        <header class="bg-gradient-to-br from-cyan-500 to-blue-600 p-10 relative text-white">
            <div class="relative z-10">
                <h1 class="text-5xl font-bold">{{ contact.full_name }}</h1>
                <div class="mt-4 text-sm space-y-1 text-blue-100">
                    <p>{{ contact.phone }}</p>
                    <p>{{ contact.address }}</p>
                </div>
            </div>
            <div class="absolute -bottom-12 right-10 w-32 h-32 rounded-full bg-white bg-cover bg-center border-4 border-white shadow-lg" 
                 style="background-image: url('{{ contact.photo_path }}')">
            </div>
        </header>

        <main class="p-10 pt-16">
            <section class="mb-8">
                <h2 class="text-xl font-bold text-gray-700 mb-3">About</h2>
                <p class="text-sm text-gray-600">{{ contact.summary }}</p>
            </section>

            <div class="grid grid-cols-12 gap-8">
                <div class="col-span-8">
                    <section class="mb-8">
                        <h2 class="text-xl font-bold text-gray-700 mb-4">Work Experience</h2>
                        {{--experience-loop-start--}}
                        <div class="mb-6 border-l-4 border-blue-500 pl-4">
                            <p class="text-xs font-semibold text-gray-500">{{ experience.start_date }} to {{ experience.end_date }}</p>
                            <h3 class="text-lg font-semibold">{{ experience.job_title }}</h3>
                            <p class="text-sm text-blue-600">{{ experience.company_name }}</p>
                            <p class="text-sm text-gray-600 mt-1">{{ experience.description }}</p>
                        </div>
                        {{--experience-loop-end--}}
                    </section>
                    <section>
                        <h2 class="text-xl font-bold text-gray-700 mb-4">Education</h2>
                        {{--education-loop-start--}}
                        <div class="mb-6 border-l-4 border-blue-500 pl-4">
                             <p class="text-xs font-semibold text-gray-500">{{ education.start_date }} to {{ education.end_date }}</p>
                            <h3 class="text-lg font-semibold">{{ education.degree }}</h3>
                            <p class="text-sm text-blue-600">{{ education.school_name }}</p>
                        </div>
                        {{--education-loop-end--}}
                    </section>
                </div>
                <div class="col-span-4">
                     <section>
                        <h2 class="text-xl font-bold text-gray-700 mb-4">Skills</h2>
                        <div class="space-y-3">
                            {{--skill-loop-start--}}
                            <div class="bg-gray-100 p-3 rounded-lg">
                                <p class="font-medium text-sm text-gray-800">{{ skill.skill_name }}</p>
                            </div>
                            {{--skill-loop-end--}}
                        </div>
                    </section>
                </div>
            </div>
        </main>
    </div>
</body>
</html>
HTML
]);

// --- Template 18: The Centered Classic ---
Template::create([
    'name' => 'The Centered Classic',
    'status' => true,
    'template_url' => '/images/template/centered-classic.png',
    'template_html' => <<<'HTML'
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <style> body { font-family: 'Cormorant Garamond', 'Times New Roman', serif; } </style>
</head>
<body class="bg-white text-gray-800">
    <div class="max-w-4xl mx-auto p-16">
        <header class="text-center mb-10">
            <h1 class="text-5xl font-bold tracking-wider">{{ contact.full_name }}</h1>
            <hr class="my-4 border-gray-300 w-1/4 mx-auto">
            <p class="text-sm tracking-widest">{{ contact.phone }} | {{ contact.address }}</p>
        </header>

        <section class="mb-8">
            <p class="text-center italic text-lg leading-relaxed max-w-3xl mx-auto">{{ contact.summary }}</p>
        </section>

        <hr class="my-8 border-gray-200">

        <section class="mb-8">
            <h2 class="text-center text-2xl font-bold tracking-widest mb-6">Experience</h2>
            {{--experience-loop-start--}}
            <div class="text-center mb-6">
                <h3 class="text-xl font-semibold">{{ experience.job_title }}</h3>
                <p class="text-md italic">{{ experience.company_name }} | {{ experience.start_date }} - {{ experience.end_date }}</p>
                <p class="text-sm text-gray-600 mt-2 max-w-xl mx-auto">{{ experience.description }}</p>
            </div>
            {{--experience-loop-end--}}
        </section>

        <hr class="my-8 border-gray-200">

        <section class="mb-8">
            <h2 class="text-center text-2xl font-bold tracking-widest mb-6">Education</h2>
             {{--education-loop-start--}}
            <div class="text-center mb-6">
                <h3 class="text-xl font-semibold">{{ education.degree }} in {{ education.field }}</h3>
                <p class="text-md italic">{{ education.school_name }} | {{ education.start_date }} - {{ education.end_date }}</p>
            </div>
            {{--education-loop-end--}}
        </section>

        <hr class="my-8 border-gray-200">

        <section>
             <h2 class="text-center text-2xl font-bold tracking-widest mb-6">Core Competencies</h2>
             <p class="text-center text-sm text-gray-600 max-w-3xl mx-auto">
                {{--skill-loop-start--}}
                <span>{{ skill.skill_name }} / </span>
                {{--skill-loop-end--}}
            </p>
        </section>
    </div>
</body>
</html>
HTML
]);

// --- Template 19: Classic Professional ---
        Template::create([
            'name' => 'Classic Professional',
            'status' => true,
            'template_url' => '/images/template/classic.png',
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
                <!-- FIXED: Using 'address' field for the email -->
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

        // --- Template 20: Modern Minimalist ---
       Template::create([
            'name' => 'Modern Minimalist',
            'status' => true,
            'template_url' => '/images/template/modern.png',
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
                <div class="w-32 h-32 mx-auto rounded-full bg-gray-300 mb-4 bg-cover bg-center" style="background-image: url('{{ contact.photo_path }}')"></div>
                <h1 class="text-3xl font-bold text-gray-900">{{ contact.full_name }}</h1>
                <div class="mt-6 text-left space-y-6">
                    <div>
                        <h3 class="font-bold text-gray-900 text-sm uppercase tracking-wider mb-2">Contact</h3>
                        <p class="text-sm">{{ contact.phone }}</p>
                        <p class="text-sm">{{ contact.address }}</p>
                    </div>
                    <div>
                        <h3 class="font-bold text-gray-900 text-sm uppercase tracking-wider mb-2">Skills</h3>
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
                    <div class="mb-6">
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
                    <div class="mb-6">
                        <p class="text-sm font-semibold text-gray-600">{{ education.start_date }} - {{ education.end_date }}</p>
                        <h3 class="text-lg font-bold text-gray-800">{{ education.degree }}</h3>
                        <p class="text-md font-semibold text-gray-700">{{ education.school_name }} - {{ education.field }}</p>
                        <p class="text-sm mt-1">{{ education.description }}</p>
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

        // --- Template 21: Creative Column ---
        Template::create([
            'name' => 'Creative Column',
            'status' => true,
            'template_url' => '/images/template/creative.png',
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
        <div class="w-1/3 bg-gray-800 text-white p-8">
            <div class="text-center">
                <div class="w-36 h-36 mx-auto rounded-full border-4 border-white bg-gray-700 mb-4 bg-cover bg-center" style="background-image: url('{{ contact.photo_path }}')"></div>
                <h1 class="text-3xl font-bold">{{ contact.full_name }}</h1>
            </div>
            <div class="mt-10">
                <h3 class="text-lg font-semibold border-b-2 border-red-400 pb-1 mb-3">CONTACT</h3>
                <p class="text-sm mb-1">{{ contact.phone }}</p>
                <p class="text-sm mb-1">{{ contact.address }}</p>
            </div>
            <div class="mt-8">
                <h3 class="text-lg font-semibold border-b-2 border-red-400 pb-1 mb-3">SKILLS</h3>
                {{--skill-loop-start--}}
                <p class="text-sm mb-1">{{ skill.skill_name }}</p>
                {{--skill-loop-end--}}
            </div>
        </div>
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
                    <p class="mt-2 leading-relaxed">{{ education.description }}</p>
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