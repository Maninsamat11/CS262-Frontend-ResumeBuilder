<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Resume Builder') }}</title>
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:300,400,500,600,700&display=swap" rel="stylesheet" />

    <!-- Vite CSS -->
    @vite('resources/css/app.css')
    
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
        
        .gradient-bg {
            background: linear-gradient(135deg, #dc2626 0%, #991b1b 100%);
        }
        
        .glass-effect {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }
        
        .feature-card {
            transition: all 0.3s ease;
        }
        
        .feature-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
        }
        
        .hero-animation {
            animation: float 6s ease-in-out infinite;
        }
        
        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-20px); }
        }
        
        .text-gradient {
            background: linear-gradient(135deg, #dc2626 0%, #991b1b 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }
    </style>
</head>
<body class="antialiased bg-gray-50">
    <!-- Navigation -->
    @include('layouts.navigation')

    <!-- Hero Section -->
    <section class="pt-20 lg:pt-32 pb-20 relative overflow-hidden">
        <!-- Background Pattern -->
        <div class="absolute inset-0 opacity-5">
            <div class="absolute inset-0" style="background-image: radial-gradient(circle at 2px 2px, #6366f1 1px, transparent 0); background-size: 40px 40px;"></div>
        </div>
        
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="lg:grid lg:grid-cols-12 lg:gap-8 items-center">
                <div class="sm:text-center md:max-w-2xl md:mx-auto lg:col-span-6 lg:text-left">
                    <h1 class="text-4xl font-bold text-gray-900 sm:text-5xl lg:text-6xl">
                        Build Your 
                        <span class="text-gradient">Professional Resume</span> 
                        in Minutes
                    </h1>
                    <p class="mt-6 text-xl text-gray-600 leading-relaxed">
                        Create a standout resume with our easy-to-use editor and professional templates. Land your dream job faster with our AI-powered suggestions.
                    </p>
                    <div class="mt-10 flex flex-col sm:flex-row gap-4 sm:justify-center lg:justify-start">
                        @auth
                            <a href="{{ route('templates.index') }}" class="bg-gradient-to-r from-red-600 to-red-800 text-white px-8 py-4 rounded-full font-semibold text-lg hover:shadow-xl transition-all duration-300 transform hover:scale-105 text-center">
                                Create Resume Now
                            </a>
                        @else
                            <a href="{{ route('register') }}" class="bg-gradient-to-r from-red-600 to-red-800 text-white px-8 py-4 rounded-full font-semibold text-lg hover:shadow-xl transition-all duration-300 transform hover:scale-105 text-center">
                                Start Building Free
                            </a>
                        @endauth
                        <a href="#features" class="border-2 border-gray-300 text-gray-700 px-8 py-4 rounded-full font-semibold text-lg hover:border-red-500 hover:text-red-600 transition-all duration-300 text-center">
                            Learn More
                        </a>
                    </div>
                </div>
                <div class="mt-12 relative sm:max-w-lg sm:mx-auto lg:mt-0 lg:max-w-none lg:mx-0 lg:col-span-6 lg:flex lg:items-center">
                    <div class="hero-animation relative mx-auto w-full rounded-lg lg:max-w-md">
                        <!-- Resume Preview Mockup -->
                        <div class="bg-white shadow-2xl rounded-lg p-8 border border-gray-200">
                            <div class="flex items-center space-x-4 mb-6">
                                <div class="w-16 h-16 bg-gradient-to-r from-red-500 to-red-700 rounded-full"></div>
                                <div>
                                    <div class="h-4 bg-gray-300 rounded w-32 mb-2"></div>
                                    <div class="h-3 bg-gray-200 rounded w-24"></div>
                                </div>
                            </div>
                            <div class="space-y-4">
                                <div class="h-3 bg-gray-300 rounded w-full"></div>
                                <div class="h-3 bg-gray-300 rounded w-5/6"></div>
                                <div class="h-3 bg-gray-200 rounded w-4/6"></div>
                                <div class="mt-6">
                                    <div class="h-4 bg-red-200 rounded w-24 mb-3"></div>
                                    <div class="h-3 bg-gray-200 rounded w-full mb-2"></div>
                                    <div class="h-3 bg-gray-200 rounded w-4/5"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- View Shared Resume Section -->
<section class="py-16 bg-gray-100 border-t border-b border-gray-200">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="max-w-2xl mx-auto text-center">
            <h2 class="text-3xl font-bold text-gray-900 mb-4">
                Have a Resume Link?
            </h2>
            <p class="text-lg text-gray-600 mb-8">
                If you've been sent a shareable link, paste it here to view the resume instantly.
            </p>

            <!-- The Form to handle the redirection -->
           <!-- The Form to handle the redirection -->
                <form action="{{ route('resumes.viewFromLink') }}" method="POST" class="flex flex-col sm:flex-row items-stretch justify-center max-w-xl mx-auto">
                    @csrf {{-- All POST forms need a CSRF token for security --}}

                    <input type="url" 
                        name="share_link" 
                        placeholder="Paste the full shareable link here..."
                        class="flex-grow p-4 border border-gray-300 rounded-lg sm:rounded-none sm:rounded-l-lg focus:ring-2 focus:ring-red-500 focus:outline-none"
                        required>

                    <button type="submit"
                            class="bg-red-800 text-white font-semibold px-8 py-4 rounded-lg sm:rounded-none sm:rounded-r-lg hover:bg-red-900 mt-2 sm:mt-0">
                        View Resume
                    </button>
                </form>
        </div>
    </div>
</section>
    

    <!-- Features Section -->
    <section id="features" class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-3xl font-bold text-gray-900 sm:text-4xl">
                    Why Choose Our Resume Builder?
                </h2>
                <p class="mt-4 text-xl text-gray-600">
                    Everything you need to create a professional resume that gets noticed
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="feature-card bg-white p-8 rounded-xl shadow-lg border border-gray-100">
                    <div class="w-12 h-12 bg-red-100 rounded-lg flex items-center justify-center mb-6">
                        <svg class="w-6 h-6 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-900 mb-4">Lightning Fast</h3>
                    <p class="text-gray-600">Create your professional resume in just minutes with our intuitive drag-and-drop editor.</p>
                </div>

                <div class="feature-card bg-white p-8 rounded-xl shadow-lg border border-gray-100">
                    <div class="w-12 h-12 bg-red-100 rounded-lg flex items-center justify-center mb-6">
                        <svg class="w-6 h-6 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21a4 4 0 01-4-4V5a2 2 0 012-2h4a2 2 0 012 2v12a4 4 0 01-4 4zm0 0h12a2 2 0 002-2v-4a2 2 0 00-2-2h-2.343M11 7.343l1.657-1.657a2 2 0 012.828 0l2.829 2.829a2 2 0 010 2.828l-8.486 8.485M7 17h4"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-900 mb-4">Professional Templates</h3>
                    <p class="text-gray-600">Choose from dozens of professionally designed templates that are ATS-friendly and recruiter-approved.</p>
                </div>

                <div class="feature-card bg-white p-8 rounded-xl shadow-lg border border-gray-100">
                    <div class="w-12 h-12 bg-green-100 rounded-lg flex items-center justify-center mb-6">
                        <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-900 mb-4">ATS Optimized</h3>
                    <p class="text-gray-600">Our resumes are optimized to pass through Applicant Tracking Systems and reach human recruiters.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Stats Section -->
    <section class="py-20 gradient-bg">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center text-white">
                <h2 class="text-3xl font-bold mb-4">Trusted by Professionals Worldwide</h2>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mt-12">
                    <div>
                        <div class="text-4xl font-bold mb-2">500K+</div>
                        <div class="text-xl opacity-90">Resumes Created</div>
                    </div>
                    <div>
                        <div class="text-4xl font-bold mb-2">95%</div>
                        <div class="text-xl opacity-90">Success Rate</div>
                    </div>
                    <div>
                        <div class="text-4xl font-bold mb-2">50+</div>
                        <div class="text-xl opacity-90">Professional Templates</div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="py-20 bg-gray-50">
        <div class="max-w-4xl mx-auto text-center px-4 sm:px-6 lg:px-8">
            <h2 class="text-3xl font-bold text-gray-900 sm:text-4xl mb-6">
                Ready to Land Your Dream Job?
            </h2>
            <p class="text-xl text-gray-600 mb-8">
                Join thousands of professionals who have successfully landed their dream jobs with our resume builder.
            </p>
            @auth
                <a href="{{ route('templates.index') }}" class="bg-gradient-to-r from-red-600 to-red-800 text-white px-10 py-4 rounded-full font-semibold text-lg hover:shadow-xl transition-all duration-300 transform hover:scale-105 inline-block">
                    Create Your Resume Now
                </a>
            @else
                <a href="{{ route('register') }}" class="bg-gradient-to-r from-red-600 to-red-800 text-white px-10 py-4 rounded-full font-semibold text-lg hover:shadow-xl transition-all duration-300 transform hover:scale-105 inline-block">
                    Get Started for Free
                </a>
            @endauth
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-gray-900 text-white py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col md:flex-row justify-between items-center">
                <div class="flex items-center space-x-3 mb-4 md:mb-0">
                    <div class="bg-gradient-to-r from-red-600 to-red-800 p-2 rounded-lg">
                        <svg class="h-6 w-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z" />
                        </svg>
                    </div>
                    <span class="text-xl font-bold">{{ config('app.name', 'Resume Builder') }}</span>
                </div>
                <div class="text-gray-400">
                    © 2024 Resume Builder. All rights reserved.
                </div>
            </div>
        </div>
    </footer>
</body>
</html>