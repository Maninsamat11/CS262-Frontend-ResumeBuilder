{{-- resources/views/resumes/share.blade.php --}}

<x-app-layout>
    <div class="min-h-screen bg-gray-100 flex items-center justify-center p-4">
        <div class="w-full max-w-4xl bg-red-800 rounded-xl shadow-lg p-2">
            
            {{-- CORRECTED Alpine.js shareUrl to use the new route --}}
            <div x-data="{
                shareUrl: '{{ $resume->share_url ? route('resumes.public.show', $resume) : '' }}',
                copyToClipboard() {
                    // ... (your copyToClipboard function is fine)
                }
            }" class="bg-white p-8 sm:p-12 rounded-lg text-gray-800">
                
                <!-- Header -->
                <div class="border-b-2 border-gray-400 pb-2 mb-8">
                    <h1 class="text-2xl font-bold">[SHARE]</h1>
                </div>

                <!-- Main Content -->
                <h2 class="text-2xl font-bold mb-2">Share Your Resume</h2>
                <p class="mb-6 text-gray-600">Resume: {{ $resume->name }}</p>

                {{-- This form is ONLY for updating settings --}}
                <form action="{{ route('resumes.share.update', $resume) }}" method="POST">
                    @csrf
                    
                    <!-- Shareable Link -->
                    {{-- ... (your shareable link input is fine) ... --}}
                    
                    <!-- Privacy Settings -->
                    {{-- ... (your privacy settings are fine) ... --}}

                    <!-- Link Expiration -->
                    {{-- ... (your expiration dropdown is fine) ... --}}

                    <!-- Action Buttons for Settings -->
                    <div class="flex justify-end items-center space-x-4 mt-8">
                        <button type="submit" class="bg-red-800 text-white font-bold py-3 px-8 rounded-lg hover:bg-red-900">Save Settings</button>
                        <a href="{{ route('dashboard') }}" class="bg-gray-200 text-gray-800 font-bold py-3 px-8 rounded-lg hover:bg-gray-300">Close</a>
                    </div>
                </form>

                {{-- ============================================= --}}
                {{-- NEW DOWNLOAD SECTION - SEPARATE FROM THE FORM --}}
                {{-- ============================================= --}}
                {{-- In resources/views/resumes/share.blade.php --}}

{{-- Find this download form section at the bottom --}}
                    <div class="border-t-2 border-gray-200 mt-8 pt-6">
                        <h3 class="text-lg font-semibold text-gray-800 mb-2">Download Your Resume</h3>
                        <p class="text-gray-600 mb-4">Get a copy of your resume in various formats.</p>
                        <form action="{{ route('resumes.processDownload', $resume) }}" method="POST" class="flex items-center space-x-2">
                            @csrf
                            <select name="format" class="p-2 border border-gray-300 rounded-md">
                                <option value="pdf">PDF</option>
                                <option value="png">PNG Image</option> {{-- <-- ADD THIS OPTION --}}
                            </select>
                            <button type="submit" class="bg-gray-800 text-white font-semibold px-6 py-2 rounded-md hover:bg-gray-900">Download</button>
                        </form>
                    </div>

            </div>
        </div>
    </div>
</x-app-layout>