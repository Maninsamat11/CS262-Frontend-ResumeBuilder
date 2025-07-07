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


                        // --- Template 2: Sunny Gradient ---.
                        Template::create([
                            'name' => 'Sunny Gradient',
                            'status' => true,
                            'template_url' => '/images/template/Sunny-Gradient.png',
                            'template_html' => <<<'HTML'
                <!DOCTYPE html>
                <html>
                <head>
                    <meta charset="UTF-8">
                    <meta name="viewport" content="width=device-width, initial-scale=1.0">
                    <script src="https://cdn.tailwindcss.com"></script>
                    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;800&display=swap" rel="stylesheet">
                    <style>
                        body { font-family: 'Poppins', sans-serif; }
                    </style>
                </head>
                <body class="bg-gray-100">
                    <div class="max-w-4xl mx-auto my-8 shadow-2xl rounded-2xl overflow-hidden">
                        <!-- Header -->
                        <div class="bg-gradient-to-r from-yellow-400 via-orange-500 to-red-500 text-white p-10 text-center">
                            <!-- Photo Holder: Soft-edged square -->
                            <div class="w-32 h-32 rounded-2xl mx-auto mb-4 bg-cover bg-center ring-4 ring-white/50"
                                style="background-image: url('{{ contact.photo_path }}');">
                            </div>
                            <h1 class="text-5xl font-extrabold">{{ contact.full_name }}</h1>
                            <p class="text-lg mt-2 opacity-90">{{ contact.summary }}</p>
                        </div>
                        
                        <div class="p-10 bg-white grid grid-cols-12 gap-10">
                            <!-- Left Column -->
                            <div class="col-span-4 space-y-6">
                                <section>
                                    <h2 class="text-xl font-bold text-orange-600 border-b-2 border-yellow-400 pb-2 mb-3">Contact</h2>
                                    <p>{{ contact.phone }}</p>
                                    <p>{{ contact.address }}</p>
                                </section>
                                <section>
                                    <h2 class="text-xl font-bold text-orange-600 border-b-2 border-yellow-400 pb-2 mb-3">Skills</h2>
                                    <div class="space-y-2">
                                        {{--skill-loop-start--}}
                                        <div class="flex items-center">
                                        <span class="w-3 h-3 bg-red-500 rounded-full mr-3"></span>
                                        <span>{{ skill.skill_name }}</span>
                                        </div>
                                        {{--skill-loop-end--}}
                                    </div>
                                </section>
                            </div>
                            <!-- Right Column -->
                            <div class="col-span-8">
                                <section class="mb-8">
                                    <h2 class="text-3xl font-extrabold text-gray-800 mb-4">Experience</h2>
                                    {{--experience-loop-start--}}
                                    <div class="mb-6">
                                        <h3 class="text-xl font-bold">{{ experience.job_title }}</h3>
                                        <div class="flex justify-between text-sm text-gray-600 mb-1">
                                        <p class="font-semibold text-orange-600">{{ experience.company_name }}</p>
                                        <p>{{ experience.start_date }} to {{ experience.end_date }}</p>
                                        </div>
                                        <p class="text-gray-700">{{ experience.description }}</p>
                                    </div>
                                    {{--experience-loop-end--}}
                                </section>
                                <section>
                                    <h2 class="text-3xl font-extrabold text-gray-800 mb-4">Education</h2>
                                    {{--education-loop-start--}}
                                    <div class="mb-6">
                                        <h3 class="text-xl font-bold">{{ education.degree }}</h3>
                                        <p class="font-semibold text-orange-600">{{ education.school_name }}</p>
                                        <p class="text-sm text-gray-600">{{ education.start_date }} to {{ education.end_date }}</p>
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

                        // --- Template 3: Minty Fresh ---
                    
                        Template::create([
                            'name' => 'Minty Fresh',
                            'status' => true,
                            'template_url' => '/images/template/Minty-Fresh.png',
                            'template_html' => <<<'HTML'
                <!DOCTYPE html>
                <html>
                <head>
                    <meta charset="UTF-8">
                    <meta name="viewport" content="width=device-width, initial-scale=1.0">
                    <script src="https://cdn.tailwindcss.com"></script>
                    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;700&display=swap" rel="stylesheet">
                    <style> body { font-family: 'Roboto', sans-serif; } </style>
                </head>
                <body class="bg-white">
                    <div class="max-w-4xl mx-auto grid grid-cols-12">
                        <!-- Left Sidebar -->
                        <div class="col-span-4 bg-teal-500 text-white p-8">
                            <!-- Photo Holder: Centered with a solid background -->
                            <div class="w-32 h-32 rounded-full mx-auto bg-teal-700 bg-cover bg-center border-4 border-white"
                                style="background-image: url('{{ contact.photo_path }}');">
                            </div>
                            <div class="text-center mt-4">
                                <h1 class="text-3xl font-bold">{{ contact.full_name }}</h1>
                            </div>
                            <hr class="my-6 border-teal-300">
                            <section class="mb-6">
                                <h2 class="text-lg font-bold uppercase tracking-wider mb-3">About Me</h2>
                                <p class="text-sm opacity-90">{{ contact.summary }}</p>
                            </section>
                            <hr class="my-6 border-teal-300">
                            <section class="mb-6">
                                <h2 class="text-lg font-bold uppercase tracking-wider mb-3">Contact</h2>
                                <p class="text-sm">{{ contact.phone }}</p>
                                <p class="text-sm">{{ contact.address }}</p>
                            </section>
                        </div>

                        <!-- Main Content -->
                        <div class="col-span-8 p-8">
                            <section class="mb-8">
                                <h2 class="text-2xl font-bold text-teal-600 mb-4">Work Experience</h2>
                                {{--experience-loop-start--}}
                                <div class="mb-6">
                                    <h3 class="text-xl font-bold text-gray-800">{{ experience.job_title }}</h3>
                                    <div class="flex justify-between items-baseline mb-1">
                                        <p class="font-semibold text-purple-600">{{ experience.company_name }}</p>
                                        <p class="text-sm text-gray-500">{{ experience.start_date }} - {{ experience.end_date }}</p>
                                    </div>
                                    <div class="text-gray-700 text-sm leading-relaxed">{{ experience.description }}</div>
                                </div>
                                {{--experience-loop-end--}}
                            </section>
                            
                            <section class="mb-8">
                                <h2 class="text-2xl font-bold text-teal-600 mb-4">Skills</h2>
                                <div class="flex flex-wrap gap-2">
                                    {{--skill-loop-start--}}
                                    <span class="bg-purple-100 text-purple-700 font-semibold px-3 py-1 rounded-full text-sm">{{ skill.skill_name }}</span>
                                    {{--skill-loop-end--}}
                                </div>
                            </section>

                            <section>
                                <h2 class="text-2xl font-bold text-teal-600 mb-4">Education</h2>
                                {{--education-loop-start--}}
                                <div class="mb-4">
                                    <h3 class="text-lg font-bold">{{ education.degree }}</h3>
                                    <p class="font-semibold text-purple-600">{{ education.school_name }}</p>
                                    <p class="text-sm text-gray-500">{{ education.start_date }} - {{ education.end_date }}</p>
                                </div>
                                {{--education-loop-end--}}
                            </section>
                        </div>
                    </div>
                </body>
                </html>
                HTML
                        ]);

                        // --- Template 4: Comic Book Blast ---
                        // A high-energy, pop-art style template using bold colors and angled elements.
                        Template::create([
                            'name' => 'Comic Book Blast',
                            'status' => true,
                            'template_url' => '/images/template/Comic-Book-Blast.png',
                            'template_html' => <<<'HTML'
                <!DOCTYPE html>
                <html>
                <head>
                    <meta charset="UTF-8">
                    <meta name="viewport" content="width=device-width, initial-scale=1.0">
                    <script src="https://cdn.tailwindcss.com"></script>
                    <link href="https://fonts.googleapis.com/css2?family=Bangers&family=Lato:wght@400;700&display=swap" rel="stylesheet">
                    <style>
                        body { font-family: 'Lato', sans-serif; }
                        .comic-font { font-family: 'Bangers', cursive; letter-spacing: 2px; }
                    </style>
                </head>
                <body class="bg-yellow-300 p-4">
                    <div class="max-w-4xl mx-auto bg-white border-8 border-black p-6">
                        <!-- Header -->
                        <div class="flex items-center gap-6 mb-6">
                            <!-- Photo Holder: Angled box -->
                            <div class="w-40 h-40 bg-blue-500 p-2 transform -rotate-3">
                                <div class="w-full h-full bg-cover bg-center border-4 border-black" style="background-image: url('{{ contact.photo_path }}');"></div>
                            </div>
                            <div class="flex-1">
                                <div class="bg-red-600 text-white p-4 transform rotate-1">
                                    <h1 class="comic-font text-5xl">{{ contact.full_name }}</h1>
                                </div>
                                <p class="mt-4 font-bold text-lg">{{ contact.summary }}</p>
                            </div>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                            <div class="space-y-6">
                                <section>
                                    <h2 class="comic-font text-3xl text-blue-600">Contact!</h2>
                                    <div class="bg-gray-200 p-3 border-4 border-dashed border-black">
                                        <p class="font-bold">{{ contact.address }}</p>
                                        <p class="font-bold">{{ contact.phone }}</p>
                                    </div>
                                </section>
                                <section>
                                    <h2 class="comic-font text-3xl text-blue-600">Skills!</h2>
                                    <div class="flex flex-wrap gap-2">
                                        {{--skill-loop-start--}}
                                        <div class="bg-red-600 text-white font-bold px-4 py-1">{{ skill.skill_name }}</div>
                                        {{--skill-loop-end--}}
                                    </div>
                                </section>
                            </div>
                            <div class="md:col-span-2 space-y-6">
                                <section>
                                    <h2 class="comic-font text-3xl text-blue-600">Experience!</h2>
                                    {{--experience-loop-start--}}
                                    <div class="mb-4">
                                        <h3 class="font-bold text-xl">{{ experience.job_title }}</h3>
                                        <p class="font-semibold text-red-600">{{ experience.company_name }} ({{ experience.start_date }} - {{ experience.end_date }})</p>
                                        <p>{{ experience.description }}</p>
                                    </div>
                                    {{--experience-loop-end--}}
                                </section>
                                <section>
                                    <h2 class="comic-font text-3xl text-blue-600">Education!</h2>
                                    {{--education-loop-start--}}
                                    <div class="mb-4">
                                        <h3 class="font-bold text-xl">{{ education.degree }}</h3>
                                        <p class="font-semibold text-red-600">{{ education.school_name }} ({{ education.start_date }} - {{ education.end_date }})</p>
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

                        // --- Template 5: Midnight Bloom ---
                        // A sophisticated, dark-mode theme with floral accents and elegant typography.
                        Template::create([
                            'name' => 'Midnight Bloom',
                            'status' => true,
                            'template_url' => '/images/template/Midnight-Bloom.png',
                            'template_html' => <<<'HTML'
                <!DOCTYPE html>
                <html>
                <head>
                    <meta charset="UTF-8">
                    <meta name="viewport" content="width=device-width, initial-scale=1.0">
                    <script src="https://cdn.tailwindcss.com"></script>
                    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700&family=Raleway:wght@400;500&display=swap" rel="stylesheet">
                    <style>
                        body { font-family: 'Raleway', sans-serif; background-color: #1a202c; }
                        .title-font { font-family: 'Playfair Display', serif; }
                    </style>
                </head>
                <body class="text-gray-300">
                    <div class="max-w-4xl mx-auto my-8 p-10 bg-gray-800 shadow-xl relative">
                        <!-- Decorative corner element -->
                        <div class="absolute top-0 right-0 w-32 h-32 bg-contain bg-no-repeat" style="background-image: url('https://i.imgur.com/rO9yY4F.png');"></div>
                        
                        <!-- Header -->
                        <header class="text-center mb-10 border-b border-rose-500/30 pb-8">
                            <!-- Photo Holder: Hexagon shape (using clip-path) -->
                            <div class="w-36 h-40 mx-auto mb-4 bg-gray-700 bg-cover bg-center" 
                                style="background-image: url('{{ contact.photo_path }}'); clip-path: polygon(50% 0%, 100% 25%, 100% 75%, 50% 100%, 0% 75%, 0% 25%);">
                            </div>
                            <h1 class="title-font text-5xl text-white">{{ contact.full_name }}</h1>
                            <p class="text-lg text-rose-300 mt-2">{{ contact.adress }} | {{ contact.phone }}</p>
                        </header>

                        <main class="grid grid-cols-12 gap-12">
                            <!-- Left Column -->
                            <div class="col-span-4 space-y-8">
                                <section>
                                    <h2 class="title-font text-2xl text-white mb-3">Summary</h2>
                                    <p class="text-sm leading-relaxed">{{ contact.summary }}</p>
                                </section>
                                <section>
                                    <h2 class="title-font text-2xl text-white mb-3">Skills</h2>
                                    <div class="space-y-2">
                                        {{--skill-loop-start--}}
                                        <p class="text-rose-300">{{ skill.skill_name }}</p>
                                        {{--skill-loop-end--}}
                                    </div>
                                </section>
                            </div>
                            <!-- Right Column -->
                            <div class="col-span-8 space-y-8">
                                <section>
                                    <h2 class="title-font text-3xl text-white mb-4">Experience</h2>
                                    {{--experience-loop-start--}}
                                    <div class="mb-6">
                                        <div class="flex justify-between items-baseline">
                                            <h3 class="text-xl font-bold text-gray-100">{{ experience.job_title }}</h3>
                                            <p class="text-sm text-gray-400">{{ experience.start_date }} - {{ experience.end_date }}</p>
                                        </div>
                                        <p class="text-md font-semibold text-rose-300 mb-2">{{ experience.company_name }}</p>
                                        <p class="text-sm">{{ experience.description }}</p>
                                    </div>
                                    {{--experience-loop-end--}}
                                </section>
                                <section>
                                    <h2 class="title-font text-3xl text-white mb-4">Education</h2>
                                    {{--education-loop-start--}}
                                    <div class="mb-4">
                                        <h3 class="text-xl font-bold text-gray-100">{{ education.degree }}</h3>
                                        <p class="text-md font-semibold text-rose-300">{{ education.school_name }}</p>
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



                // --- Template 6: Emerald Executive ---

                Template::create([
                    'name' => 'Emerald Executive',
                    'status' => true,
                    'template_url' => '/images/template/Emerald-Executive.png',
                    'template_html' => <<<'HTML'
                <!DOCTYPE html>
                <html>
                <head>
                    <meta charset="UTF-8">
                    <meta name="viewport" content="width=device-width, initial-scale=1.0">
                    <script src="https://cdn.tailwindcss.com"></script>
                    <link href="https://fonts.googleapis.com/css2?family=Merriweather:wght@700&family=Lato:wght@400;700&display=swap" rel="stylesheet">
                    <style>
                        body { font-family: 'Lato', sans-serif; }
                        .serif-title { font-family: 'Merriweather', serif; }
                    </style>
                </head>
                <body class="bg-gray-100">
                    <div class="max-w-4xl mx-auto my-8 bg-white shadow-lg grid grid-cols-12">
                        <!-- Left Column (Sidebar) -->
                        <div class="col-span-4 bg-emerald-800 text-white p-8">
                            <!-- Photo Holder: Square with border -->
                            <div class="w-32 h-32 mx-auto mb-6 bg-cover bg-center border-4 border-emerald-400" 
                                style="background-image: url('{{ contact.photo_path }}');">
                            </div>
                            
                            <section class="mb-8">
                                <h2 class="text-lg font-bold uppercase text-emerald-200 tracking-widest mb-3">Contact</h2>
                                <div class="space-y-2 text-sm">
                                    <p>{{ contact.phone }}</p>
                                    <p>{{ contact.address }}</p>
                                </div>
                            </section>
                            
                            <section class="mb-8">
                                <h2 class="text-lg font-bold uppercase text-emerald-200 tracking-widest mb-3">Skills</h2>
                                <div class="space-y-2">
                                    {{--skill-loop-start--}}
                                    <p class="text-sm font-medium">{{ skill.skill_name }}</p>
                                    {{--skill-loop-end--}}
                                </div>
                            </section>
                            <section>
                                <h2 class="text-lg font-bold uppercase text-emerald-200 tracking-widest mb-3">Education</h2>
                                {{--education-loop-start--}}
                                <div class="text-sm mb-4">
                                    <h3 class="font-bold">{{ education.degree }}</h3>
                                    <p class="text-emerald-200">{{ education.school_name }}</p>
                                    <p class="text-xs opacity-75">{{ education.start_date }} - {{ education.end_date }}</p>
                                </div>
                                {{--education-loop-end--}}
                            </section>
                        </div>

                        <!-- Right Column (Main Content) -->
                        <div class="col-span-8 p-10">
                            <header class="mb-10">
                                <h1 class="serif-title text-5xl text-emerald-900 font-bold">{{ contact.full_name }}</h1>
                            </header>
                            
                            <section class="mb-10">
                                <h2 class="serif-title text-2xl text-emerald-800 border-b-2 border-emerald-200 pb-2 mb-4">Professional Summary</h2>
                                <p class="text-gray-700 leading-relaxed">{{ contact.summary }}</p>
                            </section>

                            <section>
                                <h2 class="serif-title text-2xl text-emerald-800 border-b-2 border-emerald-200 pb-2 mb-4">Work Experience</h2>
                                {{--experience-loop-start--}}
                                <div class="mb-6">
                                    <div class="flex justify-between items-baseline">
                                        <h3 class="text-xl font-bold text-gray-800">{{ experience.job_title }}</h3>
                                        <span class="text-sm font-medium text-gray-500">{{ experience.start_date }} - {{ experience.end_date }}</span>
                                    </div>
                                    <p class="text-md font-semibold text-emerald-700 mb-2">{{ experience.company_name }}</p>
                                    <div class="text-gray-600 text-sm list-disc pl-5">{{ experience.description }}</div>
                                </div>
                                {{--experience-loop-end--}}
                            </section>
                        </div>
                    </div>
                </body>
                </html>
                HTML
                ]);

                // --- Template 7: Indigo Infographic ---
                Template::create([
                    'name' => 'Indigo Infographic',
                    'status' => true,
                    'template_url' => '/images/template/Indigo-Infographic.png',
                    'template_html' => <<<'HTML'
                <!DOCTYPE html>
                <html>
                <head>
                    <meta charset="UTF-8">
                    <meta name="viewport" content="width=device-width, initial-scale=1.0">
                    <script src="https://cdn.tailwindcss.com"></script>
                    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;700;900&display=swap" rel="stylesheet">
                    <style> body { font-family: 'Inter', sans-serif; } </style>
                </head>
                <body class="bg-gray-200">
                    <div class="max-w-4xl mx-auto my-8 bg-white p-10 shadow-lg">
                        <!-- Header -->
                            <div class="flex items-center space-x-8 mb-10">
                                <!-- Photo Holder: Circular with gradient background -->
                                <div class="w-36 h-36 p-1 bg-gradient-to-tr from-cyan-400 to-indigo-600 rounded-full shrink-0">
                                    <div class="w-full h-full rounded-full bg-white p-1">
                                        <div class="w-full h-full rounded-full bg-cover bg-center" 
                                            style="background-image: url('{{ contact.photo_path }}');">
                                        </div>
                                    </div>
                                </div>
                                
                                <div>
                                    <h1 class="text-5xl font-black text-indigo-800">{{ contact.full_name }}</h1>
                                    <p class="text-xl text-gray-600 mt-1">{{ contact.summary }}</p>
                                </div>
                            </div>

                        <div class="grid grid-cols-12 gap-8">
                            <!-- Left Column -->
                            <div class="col-span-4 space-y-8">
                                <section>
                                    <h3 class="font-bold text-lg uppercase text-indigo-700 tracking-wider mb-2">Contact</h3>
                                    <p class="text-sm text-gray-700">{{ contact.phone }}</p>
                                    <p class="text-sm text-gray-700">{{ contact.address }}</p>
                                </section>
                                <section>
                                    <h3 class="font-bold text-lg uppercase text-indigo-700 tracking-wider mb-2">Skills</h3>
                                    <div class="space-y-2">
                                        {{--skill-loop-start--}}
                                        <div>
                                            <p class="text-sm font-semibold text-gray-800">{{ skill.skill_name }}</p>
                                            <div class="w-full bg-gray-200 rounded-full h-2 mt-1">
                                                <div class="bg-cyan-500 h-2 rounded-full" style="width: 85%"></div>
                                            </div>
                                        </div>
                                        {{--skill-loop-end--}}
                                    </div>
                                </section>
                            </div>
                            
                            <!-- Right Column -->
                            <div class="col-span-8">
                                <section class="mb-8">
                                    <h2 class="text-3xl font-black text-gray-800 mb-4">Experience</h2>
                                    {{--experience-loop-start--}}
                                    <div class="flex mb-6">
                                        <div class="w-1/4 text-sm text-gray-600 pt-1">
                                            <p>{{ experience.start_date }}</p>
                                            <p>-</p>
                                            <p>{{ experience.end_date }}</p>
                                        </div>
                                        <div class="w-3/4 pl-6 border-l-2 border-indigo-200">
                                            <h3 class="text-xl font-bold">{{ experience.job_title }}</h3>
                                            <p class="font-semibold text-indigo-600 mb-2">{{ experience.company_name }}</p>
                                            <p class="text-sm text-gray-700">{{ experience.description }}</p>
                                        </div>
                                    </div>
                                    {{--experience-loop-end--}}
                                </section>
                                <section>
                                    <h2 class="text-3xl font-black text-gray-800 mb-4">Education</h2>
                                    {{--education-loop-start--}}
                                    <div class="flex mb-6">
                                        <div class="w-1/4 text-sm text-gray-600 pt-1">
                                            <p>{{ education.start_date }}</p>
                                        </div>
                                        <div class="w-3/4 pl-6 border-l-2 border-indigo-200">
                                            <h3 class="text-xl font-bold">{{ education.degree }}</h3>
                                            <p class="font-semibold text-indigo-600">{{ education.school_name }}</p>
                                        </div>
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

                // --- Template 8: Crimson Creative ---
                Template::create([
                    'name' => 'Crimson Creative',
                    'status' => true,
                    'template_url' => '/images/template/Crimson-Creative.png',
                    'template_html' => <<<'HTML'
                <!DOCTYPE html>
                <html>
                <head>
                    <meta charset="UTF-8">
                    <meta name="viewport" content="width=device-width, initial-scale=1.0">
                    <script src="https://cdn.tailwindcss.com"></script>
                    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500;900&display=swap" rel="stylesheet">
                    <style> body { font-family: 'Montserrat', sans-serif; } </style>
                </head>
                <body class="bg-gray-800 text-gray-800">
                    <div class="max-w-4xl mx-auto my-8 bg-white p-0 flow-root">
                        <!-- Header -->
                        <div class="p-12 bg-red-700 text-white flex items-center justify-between">
                            <div>
                                <h1 class="text-6xl font-black uppercase">{{ contact.full_name }}</h1>
                            </div>
                            <!-- Photo Holder: Rotated Square with shadow -->
                            <div class="w-32 h-32 bg-white p-2 transform rotate-6 shadow-2xl">
                                <div class="w-full h-full bg-cover bg-center" style="background-image: url('{{ contact.photo_path }}');"></div>
                            </div>
                        </div>
                        
                        <div class="p-12">
                            <section class="mb-10 text-center">
                                <h2 class="text-2xl font-black text-red-700 tracking-widest uppercase mb-2">Profile</h2>
                                <p class="max-w-2xl mx-auto text-lg">{{ contact.summary }}</p>
                            </section>
                            
                            <div class="grid grid-cols-2 gap-12">
                                <div class="space-y-8">
                                    <section>
                                        <h2 class="text-2xl font-black text-red-700 tracking-widest uppercase mb-4">Experience</h2>
                                        {{--experience-loop-start--}}
                                        <div class="mb-6">
                                            <h3 class="text-xl font-black">{{ experience.job_title }}</h3>
                                            <p class="font-semibold">{{ experience.company_name }} | {{ experience.start_date }} - {{ experience.end_date }}</p>
                                            <p class="text-sm mt-1 text-gray-600">{{ experience.description }}</p>
                                        </div>
                                        {{--experience-loop-end--}}
                                    </section>
                                    <section>
                                        <h2 class="text-2xl font-black text-red-700 tracking-widest uppercase mb-4">Contact</h2>
                                        <p class="font-semibold">{{ contact.phone }}</p>
                                        <p class="font-semibold">{{ contact.address }}</p>
                                    </section>
                                </div>
                                <div class="space-y-8">
                                    <section>
                                        <h2 class="text-2xl font-black text-red-700 tracking-widest uppercase mb-4">Education</h2>
                                        {{--education-loop-start--}}
                                        <div class="mb-6">
                                            <h3 class="text-xl font-black">{{ education.degree }}</h3>
                                            <p class="font-semibold">{{ education.school_name }}</p>
                                        </div>
                                        {{--education-loop-end--}}
                                    </section>
                                    <section>
                                        <h2 class="text-2xl font-black text-red-700 tracking-widest uppercase mb-4">Skills</h2>
                                        <div class="flex flex-wrap gap-3">
                                            {{--skill-loop-start--}}
                                            <span class="bg-gray-800 text-white font-semibold px-4 py-2">{{ skill.skill_name }}</span>
                                            {{--skill-loop-end--}}
                                        </div>
                                    </section>
                                </div>
                            </div>
                        </div>
                    </div>
                </body>
                </html>
                HTML
                ]);

                // --- Template 9: Slate & Sky ---
                Template::create([
                    'name' => 'Slate & Sky',
                    'status' => true,
                    'template_url' => '/images/template/Slate-Sky.png',
                    'template_html' => <<<'HTML'
                <!DOCTYPE html>
                <html>
                <head>
                    <meta charset="UTF-8">
                    <meta name="viewport" content="width=device-width, initial-scale=1.0">
                    <script src="https://cdn.tailwindcss.com"></script>
                    <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:wght@400;600;700&display=swap" rel="stylesheet">
                    <style> body { font-family: 'Source Sans Pro', sans-serif; color: #2d3748; } </style>
                </head>
                <body class="bg-gray-200">
                    <div class="max-w-4xl mx-auto my-8 bg-white grid grid-cols-12 gap-0">
                        <!-- Main Content -->
                        <div class="col-span-8 p-10">
                            <header class="mb-8">
                                <h1 class="text-5xl font-bold text-slate-800">{{ contact.full_name }}</h1>
                            </header>
                            <section class="mb-8">
                                <h2 class="text-lg font-bold uppercase text-sky-600 tracking-widest mb-3">Summary</h2>
                                <p class="leading-relaxed">{{ contact.summary }}</p>
                            </section>
                            <section class="mb-8">
                                <h2 class="text-lg font-bold uppercase text-sky-600 tracking-widest mb-3">Experience</h2>
                                {{--experience-loop-start--}}
                                <div class="mb-6">
                                    <h3 class="text-xl font-semibold">{{ experience.job_title }}</h3>
                                    <div class="flex justify-between text-sm mb-1">
                                        <p class="font-bold text-slate-600">{{ experience.company_name }}</p>
                                        <p class="text-gray-500">{{ experience.start_date }} - {{ experience.end_date }}</p>
                                    </div>
                                    <p class="text-sm">{{ experience.description }}</p>
                                </div>
                                {{--experience-loop-end--}}
                            </section>
                        </div>
                        <!-- Sidebar -->
                        <div class="col-span-4 bg-slate-100 p-8 border-l border-gray-200">
                            <!-- Photo Holder: Simple Square -->
                            <div class="w-full h-48 bg-gray-300 bg-cover bg-center mb-8" 
                                style="background-image: url('{{ contact.photo_path }}');">
                            </div>
                            <section class="mb-6">
                                <h3 class="font-semibold text-slate-700 mb-2">Contact</h3>
                                <div class="text-sm space-y-1">
                                    <p>{{ contact.phone }}</p>
                                    <p>{{ contact.address }}</p>
                                </div>
                            </section>
                            <section class="mb-6">
                                <h3 class="font-semibold text-slate-700 mb-2">Education</h3>
                                {{--education-loop-start--}}
                                <div class="mb-3 text-sm">
                                    <p class="font-bold">{{ education.degree }}</p>
                                    <p>{{ education.school_name }}</p>
                                </div>
                                {{--education-loop-end--}}
                            </section>
                            <section>
                                <h3 class="font-semibold text-slate-700 mb-2">Skills</h3>
                                <div class="flex flex-wrap gap-2">
                                    {{--skill-loop-start--}}
                                    <span class="bg-sky-200 text-sky-800 text-xs font-bold px-2 py-1 rounded">{{ skill.skill_name }}</span>
                                    {{--skill-loop-end--}}
                                </div>
                            </section>
                        </div>
                    </div>
                </body>
                </html>
                HTML
                ]);

                // --- Template 10: Golden Touch ---
                Template::create([
                    'name' => 'Golden Touch',
                    'status' => true,
                    'template_url' => '/images/template/Golden-Touch.png',
                    'template_html' => <<<'HTML'
                <!DOCTYPE html>
                <html>
                <head>
                    <meta charset="UTF-8">
                    <meta name="viewport" content="width=device-width, initial-scale=1.0">
                    <script src="https://cdn.tailwindcss.com"></script>
                    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@600&family=Open+Sans:wght@400;600&display=swap" rel="stylesheet">
                    <style> 
                        body { font-family: 'Open Sans', sans-serif; background-color: #f7fafc; } 
                        .serif-display { font-family: 'Cormorant Garamond', serif; }
                    </style>
                </head>
                <body>
                    <div class="max-w-4xl mx-auto my-8 bg-gray-800 text-white shadow-xl">
                        <div class="p-12 text-center border-b-4 border-amber-400">
                            <!-- Photo Holder: Centered Circle -->
                            <div class="w-28 h-28 rounded-full bg-cover bg-center mx-auto mb-4 border-4 border-gray-600"
                                style="background-image: url('{{ contact.photo_path }}');">
                            </div>
                            <h1 class="serif-display text-5xl text-amber-300">{{ contact.full_name }}</h1>
                        </div>
                        <div class="p-12 grid grid-cols-12 gap-10">
                            <!-- Left Column -->
                            <div class="col-span-4 space-y-8">
                                <section>
                                    <h2 class="serif-display text-xl text-amber-300 mb-3">About Me</h2>
                                    <p class="text-sm text-gray-300 leading-relaxed">{{ contact.summary }}</p>
                                </section>
                                <section>
                                    <h2 class="serif-display text-xl text-amber-300 mb-3">Contact</h2>
                                    <div class="text-sm space-y-1">
                                        <p>{{ contact.phone }}</p>
                                        <p>{{ contact.address }}</p>
                                    </div>
                                </section>
                                <section>
                                    <h2 class="serif-display text-xl text-amber-300 mb-3">Skills</h2>
                                    <div class="space-y-1">
                                        {{--skill-loop-start--}}
                                        <p class="font-semibold">{{ skill.skill_name }}</p>
                                        {{--skill-loop-end--}}
                                    </div>
                                </section>
                            </div>
                            <!-- Right Column -->
                            <div class="col-span-8">
                                <section class="mb-10">
                                    <h2 class="serif-display text-3xl text-white mb-4">Experience</h2>
                                    {{--experience-loop-start--}}
                                    <div class="mb-6">
                                        <h3 class="text-xl font-semibold text-gray-100">{{ experience.job_title }}</h3>
                                        <div class="flex justify-between text-sm mb-1">
                                            <p class="font-bold text-amber-300">{{ experience.company_name }}</p>
                                            <p class="text-gray-400">{{ experience.start_date }} - {{ experience.end_date }}</p>
                                        </div>
                                        <p class="text-sm text-gray-300 mt-1">{{ experience.description }}</p>
                                    </div>
                                    {{--experience-loop-end--}}
                                </section>
                                <section>
                                    <h2 class="serif-display text-3xl text-white mb-4">Education</h2>
                                    {{--education-loop-start--}}
                                    <div class="mb-6">
                                        <h3 class="text-xl font-semibold text-gray-100">{{ education.degree }}</h3>
                                        <p class="font-bold text-amber-300">{{ education.school_name }}</p>
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
                    
                

                // --- Template 11: Executive Black ---
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

               

                // --- Template 12: Clean Orange ---
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
                    
                // --- Template 13: Tech Slate ---
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

                // --- Template 14: Elegant Ink ---
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

                // --- Template 15: Corporate Blue ---
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

                // --- Template 16: Creative Spotlight ---
                Template::create([
                    'name' => 'Creative Spotlight',
                    'status' => true,
                    'template_url' => '/images/template/creative-spotlight.png',
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
                            
                                    <div class="grid grid-cols-12 gap-x-8 mb-10">
                                        
                                        <!-- Row 1: Spacer to create space for the overlapping photo -->
                                        <div class="col-span-12 h-20"></div>

                                    
                                        <div class="col-span-4 row-span-2 self-start z-10">
                                            <div class="w-40 h-40 rounded-full bg-gray-200 shadow-2xl bg-cover bg-center border-4 border-white"
                                                style="background-image: url('{{ contact.photo_path }}');">
                                            </div>
                                        </div>
                                        
                                        <!-- Row 2: The Text Content -->
                                        <div class="col-span-8">
                                            <h1 class="text-5xl font-extrabold text-gray-900 tracking-tighter">{{ contact.full_name }}</h1>
                                            <div class="mt-4 space-x-6 text-sm text-gray-600">
                                                <span>{{ contact.address }}</span>
                                                <span>/</span>
                                                <span>{{ contact.phone }}</span>
                                            </div>
                                        </div>

                                    </div>

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

                // --- Template 17: Academic CV ---
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

                

                        // --- Template 18: Retro Pop ---
                        // A fun, 80s-inspired theme with neon colors and a circular photo.
                        Template::create([
                            'name' => 'Retro Pop',
                            'status' => true,
                            'template_url' =>'/images/template/Retro-Pop.png', 
                            'template_html' => <<<'HTML'
                <!DOCTYPE html>
                <html>
                <head>
                    <meta charset="UTF-8">
                    <meta name="viewport" content="width=device-width, initial-scale=1.0">
                    <script src="https://cdn.tailwindcss.com"></script>
                    <link href="https://fonts.googleapis.com/css2?family=Press+Start+2P&family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
                    <style>
                        body { font-family: 'Montserrat', sans-serif; }
                        .pixel-font { font-family: 'Press Start 2P', cursive; }
                        .text-shadow { text-shadow: 2px 2px #ec4899; }
                    </style>
                </head>
                <body class="bg-gray-900 text-white">
                    <div class="max-w-4xl mx-auto p-4">
                        <div class="border-4 border-cyan-400 p-6 bg-gray-800 relative">
                            <!-- Header with Photo -->
                            <div class="flex flex-col sm:flex-row items-center justify-between gap-6 mb-8">
                                <div class="text-center sm:text-left">
                                    <h1 class="pixel-font text-4xl text-yellow-300 text-shadow">{{ contact.full_name }}</h1>
                                    <p class="text-lg text-cyan-400 mt-2">{{ contact.address }} | {{ contact.phone }}</p>
                                </div>
                                <!-- Photo Holder: Circle with neon glow -->
                                <div class="w-32 h-32 rounded-full border-4 border-pink-500 bg-cover bg-center shadow-lg"
                                    style="background-image: url('{{ contact.photo_path }}'); box-shadow: 0 0 15px #ec4899;">
                                </div>
                            </div>

                            <!-- Main Content -->
                            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                                <!-- Left Column: Skills & Education -->
                                <div class="md:col-span-1 space-y-8">
                                    <section>
                                        <h2 class="pixel-font text-xl text-yellow-300 mb-4">Skills</h2>
                                        <div class="flex flex-wrap gap-2">
                                            {{--skill-loop-start--}}
                                            <span class="bg-cyan-400 text-gray-900 font-bold px-3 py-1 text-sm">{{ skill.skill_name }}</span>
                                            {{--skill-loop-end--}}
                                        </div>
                                    </section>
                                    <section>
                                        <h2 class="pixel-font text-xl text-yellow-300 mb-4">Education</h2>
                                        {{--education-loop-start--}}
                                        <div class="mb-4">
                                            <h3 class="font-bold text-lg">{{ education.degree }}</h3>
                                            <p class="text-cyan-400">{{ education.school_name }}</p>
                                            <p class="text-sm text-gray-400">{{ education.start_date }} - {{ education.end_date }}</p>
                                        </div>
                                        {{--education-loop-end--}}
                                    </section>
                                </div>
                                <!-- Right Column: Summary & Experience -->
                                <div class="md:col-span-2">
                                    <section class="mb-8">
                                        <h2 class="pixel-font text-xl text-yellow-300 mb-4">Summary</h2>
                                        <p class="text-gray-300 leading-relaxed">{{ contact.summary }}</p>
                                    </section>
                                    <section>
                                        <h2 class="pixel-font text-xl text-yellow-300 mb-4">Experience</h2>
                                        {{--experience-loop-start--}}
                                        <div class="mb-6 relative pl-6">
                                            <div class="absolute left-0 top-1 h-full border-l-2 border-pink-500 border-dashed"></div>
                                            <div class="absolute left-[-6px] top-1 w-4 h-4 bg-yellow-300 border-2 border-gray-900"></div>
                                            <h3 class="font-bold text-lg">{{ experience.job_title }} at {{ experience.company_name }}</h3>
                                            <p class="text-sm text-gray-400 mb-2">{{ experience.start_date }} - {{ experience.end_date }}</p>
                                            <p class="text-gray-300 leading-relaxed">{{ experience.description }}</p>
                                        </div>
                                        {{--experience-loop-end--}}
                                    </section>
                                </div>
                            </div>
                        </div>
                    </div>
                </body>
                </html>
                HTML
                        ]);

                // --- Template 19: Simple Sidebar ---
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

                // --- Template 20: Bold Headlines ---
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

                // --- Template 21: The Minimalist Grid ---
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

                // --- Template 22: The Timeline ---
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

                // --- Template 23: The Journalist ---
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

                // --- Template 24: Gradient Splash ---
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

                // --- Template 25: The Centered Classic ---
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

                // --- Template 26: Classic Professional ---
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

                        // --- Template 27: Modern Minimalist ---
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

                        // --- Template 28
                        // : Creative Column ---
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