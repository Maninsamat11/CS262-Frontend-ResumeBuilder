
<x-app-layout>
    <div class="min-h-screen bg-gray-100 flex items-center justify-center p-4">
        <div class="w-full max-w-4xl bg-white shadow-lg rounded-xl">

            {{-- 
                FIX 1: Corrected the Alpine.js data object.
                - The `copyToClipboard` function was misplaced and is now a proper method.
                - It now correctly reads from the `$resume->share_url` field.
            --}}
            <div x-data="{
                    shareUrl: '{{ $resume->share_url }}',
                    copyText: 'Copy',
                    copyToClipboard() {
                        if (!this.shareUrl) {
                            alert('Please generate a share link first by saving the settings.');
                            return;
                        }
                        navigator.clipboard.writeText(this.shareUrl).then(() => {
                            this.copyText = 'Copied!';
                            setTimeout(() => { this.copyText = 'Copy' }, 2000);
                        });
                    }
                }"
                class="p-8 sm:p-12 text-gray-800">

                <!-- Header -->
                <div class="border-b-2 border-gray-400 pb-2 mb-8">
                    <h1 class="text-3xl font-bold">[SHARE]</h1>
                    <p class="mt-1 text-gray-600">Resume: {{ $resume->name }}</p>
                </div>

                <!-- Main Content -->
                <h2 class="text-2xl font-bold mb-2">Share Your Resume</h2>
                
                {{-- 
                    FIX 2: This form now submits to a route that will generate/clear the share_url.
                    The unnecessary privacy/expiration settings are removed.
                --}}
                <form action="{{ route('resumes.share.update', $resume) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <!-- Shareable Link -->
                    <div class="mb-8">
                        <label class="block text-lg font-semibold text-gray-700 mb-2">Your Shareable Link</label>
                        @if($resume->share_url)
                            <div class="flex items-center space-x-2">
                                <input type="text" :value="shareUrl" readonly class="w-full bg-gray-100 p-3 border border-gray-300 rounded-lg focus:outline-none">
                                <button type="button" @click="copyToClipboard()" x-text="copyText" class="bg-red-800 text-white font-bold py-3 px-6 rounded-lg hover:bg-red-900 w-32"></button>
                            </div>
                            <p class="text-sm text-gray-500 mt-2">Anyone with this link can view a public version of your resume.</p>
                        @else
                             <div class="bg-yellow-100 border-l-4 border-yellow-500 text-yellow-700 p-4 rounded-lg">
                                <p>This resume is not currently shared. Click "Generate Link" to create a public URL.</p>
                            </div>
                        @endif
                    </div>
                    
                    <!-- Action Buttons for Sharing -->
                    <div class="flex justify-end items-center space-x-4 mt-8 pt-6 border-t border-gray-200">
                         <a href="{{ route('dashboard') }}" class="bg-gray-200 text-gray-800 font-bold py-3 px-8 rounded-lg hover:bg-gray-300">Close</a>
                        @if($resume->share_url)
                            {{-- This button will now be responsible for DELETING the link --}}
                            <button type="submit" name="action" value="disable" class="bg-gray-600 text-white font-bold py-3 px-8 rounded-lg hover:bg-gray-700">Disable Link</button>
                        @else
                            {{-- This button will be responsible for CREATING the link --}}
                            <button type="submit" name="action" value="enable" class="bg-red-800 text-white font-bold py-3 px-8 rounded-lg hover:bg-red-900">Generate Link</button>
                        @endif
                    </div>
                </form>

                <!-- Download Section (This section was already correct) -->
                <div class="border-t-2 border-gray-200 mt-8 pt-6">
                    <h3 class="text-lg font-semibold text-gray-800 mb-2">Download Your Resume</h3>
                    <p class="text-gray-600 mb-4">Get a copy of your resume in various formats.</p>
                    <form action="{{ route('resumes.processDownload', $resume) }}" method="POST" class="flex items-center space-x-2">
                        @csrf
                        <select name="format" class="p-2 border border-gray-300 rounded-md">
                            <option value="pdf">PDF</option>
                            <option value="png">PNG Image</option>
                        </select>
                        <button type="submit" class="bg-gray-800 text-white font-semibold px-6 py-2 rounded-md hover:bg-gray-900">Download</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>