<x-app-layout>
    <div class="min-h-screen bg-gray-100 flex items-center justify-center p-4">
        <div class="w-full max-w-4xl bg-white shadow-lg rounded-xl">

            {{-- Alpine.js component to manage the page's state and actions --}}
            <div x-data="{
                    shareUrl: '{{ $resume->share_url ? route('resumes.public.show', ['shareUrl' => $resume->share_url]) : '' }}',
                    copyText: 'Copy',
                    downloadMessage: '',
                    copyToClipboard() {
                        navigator.clipboard.writeText(this.shareUrl).then(() => {
                            this.copyText = 'Copied!';
                            setTimeout(() => this.copyText = 'Copy', 2000);
                        });
                    }
                }"
                class="p-8 sm:p-12 text-gray-800">

                <!-- Header -->
                <div class="border-b-2 border-gray-200 pb-4 mb-8">
                    <h1 class="text-3xl font-bold text-gray-800">Share & Download</h1>
                    <p class="mt-1 text-gray-600">Manage public access and download your resume: <span class="font-semibold">{{ $resume->name }}</span></p>
                </div>

                <!-- Success Message (e.g., "Link enabled successfully!") -->
                @if (session('status'))
                    <div class="mb-6 p-4 bg-green-100 text-green-800 border-l-4 border-green-500 rounded-lg">
                        {{ session('status') }}
                    </div>
                @endif
                
                <!-- Form to Enable/Disable Sharing -->
                <form action="{{ route('resumes.share.update', $resume) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <!-- Shareable Link Section -->
                    <div class="mb-8">
                        <label for="share-link" class="block text-lg font-semibold text-gray-700 mb-2">Your Shareable Link</label>
                        
                        @if($resume->share_url)
                            <!-- STATE 1: Link is ACTIVE -->
                            <div class="flex items-center space-x-2">
                                <input id="share-link" type="text" :value="shareUrl" readonly class="w-full bg-gray-100 p-3 border border-gray-300 rounded-lg focus:outline-none text-gray-700">
                                
                                {{-- Copy Button --}}
                                <button type="button" @click="copyToClipboard()" x-text="copyText" class="bg-red-800 text-white font-bold py-3 px-6 rounded-lg hover:bg-red-900 w-32 shrink-0"></button>
                                
                                {{-- "View" Button - Opens the public link in a new tab for easy testing --}}
                                <a :href="shareUrl" 
                                   target="_blank"
                                   class="bg-gray-600 text-white font-bold py-3 px-6 rounded-lg hover:bg-gray-700 shrink-0 text-center">
                                    View
                                </a>
                            </div>
                            <p class="text-sm text-gray-500 mt-2">Anyone with this link can view a public version of your resume.</p>
                        @else
                            <!-- STATE 2: Link is NOT active -->
                            <div class="flex items-center space-x-2">
                                <input id="share-link" type="text" 
                                       value="Link will be generated here..." 
                                       readonly 
                                       class="w-full bg-gray-50 p-3 border border-gray-200 rounded-lg focus:outline-none text-gray-400 italic">
                                <button type="button" disabled class="bg-gray-300 text-gray-500 font-bold py-3 px-6 rounded-lg w-32 shrink-0 cursor-not-allowed">Copy</button>
                            </div>
                             <div class="bg-yellow-100 border-l-4 border-yellow-500 text-yellow-700 p-4 rounded-lg mt-4">
                                <p>This resume is not currently shared. Click "Generate Link" to activate its public URL.</p>
                            </div>
                        @endif
                    </div>
                    
                    <!-- Action Buttons for Sharing Form -->
                    <div class="flex justify-end items-center space-x-4 mt-8 pt-6 border-t border-gray-200">
                        <a href="{{ route('dashboard') }}" class="bg-gray-200 text-gray-800 font-bold py-3 px-8 rounded-lg hover:bg-gray-300">Close</a>
                        @if($resume->share_url)
                            <button type="submit" name="action" value="disable" class="bg-gray-600 text-white font-bold py-3 px-8 rounded-lg hover:bg-gray-700">Disable Link</button>
                        @else
                            <button type="submit" name="action" value="enable" class="bg-red-800 text-white font-bold py-3 px-8 rounded-lg hover:bg-red-900">Generate Link</button>
                        @endif
                    </div>
                </form>

                <!-- Download Section -->
                <div class="border-t-2 border-gray-200 mt-8 pt-6">
                    <h3 class="text-lg font-semibold text-gray-800 mb-2">Download Your Resume</h3>
                    <p class="text-gray-600 mb-4">Get a copy of your resume in various formats.</p>

                    <form action="{{ route('resumes.processDownload', $resume) }}" method="POST"
                        target="_blank" {{-- Opens download in a new window/tab, preventing page navigation --}}
                        @submit="downloadMessage = 'Your download has started! Please check your browser downloads.' "
                        class="flex items-center space-x-2">
                        @csrf
                        <select name="format" class="p-2 border border-gray-300 rounded-md focus:ring-red-500 focus:border-red-500">
                            <option value="pdf">PDF</option>
                            <option value="png">PNG Image</option>
                        </select>
                        <button type="submit" class="bg-gray-800 text-white font-semibold px-6 py-2 rounded-md hover:bg-gray-900">Download</button>
                    </form>
                    
                    <!-- Download success message display -->
                    <div x-show="downloadMessage" x-text="downloadMessage" class="mt-4 p-4 bg-green-100 text-green-800 border-l-4 border-green-500 rounded-lg transition-all duration-300" style="display: none;">
                    </div>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>