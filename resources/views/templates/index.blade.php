<x-app-layout>
    <x-slot name="header">
        <div class="bg-gradient-to-r from-red-600 to-red-800 -mx-6 -mt-6 px-6 pt-6 pb-8">
            <h2 class="font-bold text-2xl text-white leading-tight flex items-center">
                <svg class="w-8 h-8 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path>
                </svg>
                {{ __('Choose a Template') }}
            </h2>
            <p class="text-red-100 mt-2 text-lg">Select a professional template to create your standout resume</p>
        </div>
    </x-slot>

    <div class="py-12 bg-gray-50 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Page Title Section -->
            <div class="text-center mb-12">
                <h1 class="text-4xl font-bold text-gray-900 mb-4">Choose Your Perfect Template</h1>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                    Select from our collection of professionally designed, ATS-friendly resume templates. 
                    Each template is crafted to help you stand out to employers and land your dream job.
                </p>
            </div>

            @if($templates->isNotEmpty())
                <!-- Filter/Sort Section (Optional Enhancement) -->
                <!-- <div class="mb-8 flex justify-center">
                    <div class="bg-white rounded-full px-6 py-3 shadow-md border border-gray-200">
                        <span class="text-gray-600 font-medium">{{ $templates->count() }} Professional Templates Available</span>
                    </div>
                </div> -->

                <!-- Templates Grid -->
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-8">
                    @foreach($templates as $template)
                        <div class="bg-white rounded-2xl shadow-lg overflow-hidden group hover:shadow-2xl transition-all duration-500 transform hover:scale-105 border border-gray-100">
                            
                            <!-- Template Preview Container -->
                            <div class="relative overflow-hidden">
                                <!-- Template Preview Image -->
                                <div class="aspect-[3/4] bg-gray-100 relative overflow-hidden">
                                    <img src="{{ $template->template_url }}" 
                                         alt="{{ $template->name }}" 
                                         class="w-full h-full object-cover object-top transition-transform duration-500 group-hover:scale-110"
                                         loading="lazy">
                                    
                                </div>
                                
                                <!-- Hover Overlay with Actions -->
                                <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/20 to-transparent opacity-0 group-hover:opacity-100 transition-all duration-300 flex items-end justify-center pb-6">
                                    
                                    <!-- Action Buttons -->
                                    <div class="flex space-x-3 transform translate-y-4 group-hover:translate-y-0 transition-transform duration-300">
                                        <!-- Preview Button -->
                                        <button type="button" 
                                                class="bg-white/20 backdrop-blur-sm text-white border border-white/30 font-semibold py-2 px-4 rounded-lg hover:bg-white/30 transition-all duration-300 flex items-center space-x-2"
                                                onclick="previewTemplate('{{ $template->template_url }}', '{{ $template->name }}')">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                            </svg>
                                            <span>Preview</span>
                                        </button>
                                        
                                        <!-- Use Template Button -->
                                        <form method="POST" action="{{ route('resumes.store') }}" class="inline">
                                            @csrf
                                            <input type="hidden" name="template_id" value="{{ $template->template_id }}">
                                            <button type="submit" 
                                                    class="bg-gradient-to-r from-red-600 to-red-700 hover:from-red-700 hover:to-red-800 text-white font-bold py-2 px-4 rounded-lg shadow-lg transition-all duration-300 flex items-center space-x-2 transform hover:scale-105">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                                                </svg>
                                                <span>Use Template</span>
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>

                            <!-- Template Info -->
                            <div class="p-6">
                                <h3 class="text-lg font-bold text-gray-900 mb-2 group-hover:text-red-600 transition-colors duration-300">
                                    {{ $template->name }}
                                </h3>
                                <!-- <div class="flex items-center justify-between">
                                    <span class="text-sm text-gray-500 bg-gray-100 px-3 py-1 rounded-full">
                                        Professional
                                    </span>
                                    <div class="flex items-center text-yellow-400">
                                        <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20">
                                            <path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/>
                                        </svg>
                                       
                                    </div>
                                </div> -->
                            </div>
                        </div>
                    @endforeach
                </div>

                <!-- Additional Info Section -->
                <div class="mt-16 bg-white rounded-2xl shadow-lg border border-gray-100 overflow-hidden">
                    <div class="bg-gradient-to-r from-red-600 to-red-800 px-8 py-6">
                        <h3 class="text-2xl font-bold text-white mb-2">Why Our Templates Work</h3>
                        <p class="text-red-100">Professional designs that get you noticed by employers and ATS systems</p>
                    </div>
                    <div class="p-8">
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                            <div class="text-center">
                                <div class="w-16 h-16 bg-red-100 rounded-full flex items-center justify-center mx-auto mb-4">
                                    <svg class="w-8 h-8 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                </div>
                                <h4 class="text-lg font-semibold text-gray-900 mb-2">ATS-Friendly</h4>
                                <p class="text-gray-600">All templates are optimized to pass through Applicant Tracking Systems</p>
                            </div>
                            <div class="text-center">
                                <div class="w-16 h-16 bg-red-100 rounded-full flex items-center justify-center mx-auto mb-4">
                                    <svg class="w-8 h-8 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                                    </svg>
                                </div>
                                <h4 class="text-lg font-semibold text-gray-900 mb-2">Quick Setup</h4>
                                <p class="text-gray-600">Get your resume ready in minutes with our easy-to-use editor</p>
                            </div>
                            <div class="text-center">
                                <div class="w-16 h-16 bg-red-100 rounded-full flex items-center justify-center mx-auto mb-4">
                                    <svg class="w-8 h-8 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21a4 4 0 01-4-4V5a2 2 0 012-2h4a2 2 0 012 2v12a4 4 0 01-4 4zm0 0h12a2 2 0 002-2v-4a2 2 0 00-2-2h-2.343M11 7.343l1.657-1.657a2 2 0 012.828 0l2.829 2.829a2 2 0 010 2.828l-8.486 8.485M7 17h4"></path>
                                    </svg>
                                </div>
                                <h4 class="text-lg font-semibold text-gray-900 mb-2">Professional Design</h4>
                                <p class="text-gray-600">Created by professional designers to make the best first impression</p>
                            </div>
                        </div>
                    </div>
                </div>

            @else
                <!-- Empty State -->
                <div class="text-center bg-white p-16 rounded-2xl shadow-lg border border-gray-100">
                    <div class="w-24 h-24 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-6">
                        <svg class="w-12 h-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path>
                        </svg>
                    </div>
                    <h2 class="text-3xl font-bold text-gray-900 mb-4">No Templates Available</h2>
                    <p class="text-xl text-gray-600 mb-8 max-w-md mx-auto">
                        We're working hard to bring you amazing resume templates. Please check back soon!
                    </p>
                    <button class="bg-gradient-to-r from-red-600 to-red-800 text-white font-semibold py-3 px-6 rounded-lg hover:shadow-lg transition-all duration-300">
                        Contact Support
                    </button>
                </div>
            @endif
        </div>
    </div>

    <!-- Preview Modal (Optional Enhancement) -->
    <div id="previewModal" class="fixed inset-0 bg-black/80 hidden z-50 p-0 sm:p-4">
        <div class="bg-white w-full h-full sm:w-[95vw] sm:h-[95vh] sm:mx-auto sm:rounded-2xl flex flex-col overflow-hidden">
            <div class="flex items-center justify-between p-4 sm:p-6 border-b border-gray-200">
                <h3 id="previewTitle" class="text-xl font-bold text-gray-900">Template Preview</h3>
                <button onclick="closePreview()" class="text-gray-400 hover:text-gray-600 transition-colors">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>
            <div class="flex-1 flex items-center justify-center bg-gray-50 p-2 sm:p-6 overflow-hidden">
                <img id="previewImage" src="" alt="" class="max-w-full max-h-full object-contain rounded-lg shadow-lg">
            </div>
        </div>
    </div>

    <script>
        function previewTemplate(imageUrl, templateName) {
            document.getElementById('previewImage').src = imageUrl;
            document.getElementById('previewTitle').textContent = templateName + ' - Preview';
            document.getElementById('previewModal').classList.remove('hidden');
        }

        function closePreview() {
            document.getElementById('previewModal').classList.add('hidden');
        }

        // Close modal when clicking outside
        document.getElementById('previewModal').addEventListener('click', function(e) {
            if (e.target === this) {
                closePreview();
            }
        });

        // Close modal with Escape key
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') {
                closePreview();
            }
        });
    </script>
</x-app-layout>