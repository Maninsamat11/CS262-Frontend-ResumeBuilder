<x-app-layout>
    <div class="min-h-screen bg-gray-100 flex items-center justify-center p-4">
        <div class="w-full max-w-4xl bg-white shadow-lg rounded-xl">

            {{-- Alpine.js component for handling the "Copy" button state --}}
            <div x-data="{
                    shareUrl: '{{ $resume->share_url }}',
                    copyText: 'Copy',
                    downloadMessage: '', // <-- ADD THIS NEW VARIABLE
                    copyToClipboard() {
                        // ... (this function is already correct)
                    }
                }"
                class="p-8 sm:p-12 text-gray-800">

                <!-- Header -->
                <div class="border-b-2 border-gray-200 pb-4 mb-8">
                    <h1 class="text-3xl font-bold text-gray-800">Share Resume</h1>
                    <p class="mt-1 text-gray-600">Share or download a public version of: <span class="font-semibold">{{ $resume->name }}</span></p>
                </div>

                
                <form action="{{ route('resumes.share.update', $resume) }}" method="POST">
                    @csrf

                    <!-- Shareable Link Section -->
                    <div class="mb-8">
                        <label for="share-link" class="block text-lg font-semibold text-gray-700 mb-2">Your Shareable Link</label>
                        
                        @if($resume->share_url)
                            <!-- STATE 1: Link is ACTIVE -->
                            <div class="flex items-center space-x-2">
                                <input id="share-link" type="text" :value="shareUrl" readonly class="w-full bg-gray-100 p-3 border border-gray-300 rounded-lg focus:outline-none text-gray-700">
                                <button type="button" @click="copyToClipboard()" x-text="copyText" class="bg-red-800 text-white font-bold py-3 px-6 rounded-lg hover:bg-red-900 w-32 shrink-0"></button>
                            </div>
                            <p class="text-sm text-gray-500 mt-2">Anyone with this link can view a public version of your resume.</p>
                        @else
                            <!-- STATE 2: Link is NOT active -->
                            <div class="flex items-center space-x-2">
                               
                                <input id="share-link" type="text" 
                                       value="{{ route('resumes.public.show', ['share_uuid' => 'xxxxxxxx-xxxx-xxxx-xxxx-xxxxxxxxxxxx']) }}" 
                                       readonly 
                                       class="w-full bg-gray-50 p-3 border border-gray-200 rounded-lg focus:outline-none text-gray-400 italic">
                                <button type="button" disabled class="bg-gray-300 text-gray-500 font-bold py-3 px-6 rounded-lg w-32 shrink-0 cursor-not-allowed">Copy</button>
                            </div>
                             <div class="bg-yellow-100 border-l-4 border-yellow-500 text-yellow-700 p-4 rounded-lg mt-4">
                                <p>This resume is not currently shared. Click "Generate Link" to activate this public URL.</p>
                            </div>
                        @endif
                    </div>
                    
                    <!-- Action Buttons for Sharing -->
                    <div class="flex justify-end items-center space-x-4 mt-8 pt-6 border-t border-gray-200">
                         <a href="{{ route('dashboard') }}" class="bg-gray-200 text-gray-800 font-bold py-3 px-8 rounded-lg hover:bg-gray-300">Close</a>
                        @if($resume->share_url)
                            {{-- This button will POST with action=disable --}}
                            <button type="submit" name="action" value="disable" class="bg-gray-600 text-white font-bold py-3 px-8 rounded-lg hover:bg-gray-700">Disable Link</button>
                        @else
                            {{-- This button will POST with action=enable --}}
                            <button type="submit" name="action" value="enable" class="bg-red-800 text-white font-bold py-3 px-8 rounded-lg hover:bg-red-900">Generate Link</button>
                        @endif
                    </div>
                </form>

                        <!-- Download Section -->
                                  
                    <div class="border-t-2 border-gray-200 mt-8 pt-6">
                        <h3 class="text-lg font-semibold text-gray-800 mb-2">Download Your Resume</h3>
                        <p class="text-gray-600 mb-4">Get a copy of your resume in various formats.</p>

                        <!-- UPDATE THE FORM TAG HERE -->
                        <form action="{{ route('resumes.processDownload', $resume) }}" method="POST"
                            target="_blank" 
                            @submit="downloadMessage = 'Your download has started! Please check your browser downloads.' "
                            class="flex items-center space-x-2">
                            @csrf
                            <select name="format" class="p-2 border border-gray-300 rounded-md">
                                <option value="pdf">PDF</option>
                                <option value="png">PNG Image</option>
                            </select>
                            <button type="submit" class="bg-gray-800 text-white font-semibold px-6 py-2 rounded-md hover:bg-gray-900">Download</button>
                        </form>
                        
                        <!-- ADD THE SUCCESS MESSAGE DISPLAY DIV HERE -->
                        <div x-show="downloadMessage" x-text="downloadMessage" class="mt-4 p-4 bg-green-100 text-green-800 border-l-4 border-green-500 rounded-lg">
                        </div>
                        
                        <!-- Optional: Add a "Back to Dashboard" button -->
                        <div x-show="downloadMessage" class="mt-4">
                            <a href="{{ route('dashboard') }}" class="text-red-800 hover:underline font-semibold">← Back to Dashboard</a>
                        </div>
                    </div>
            </div>
        </div>
    </div>
</x-app-layout>