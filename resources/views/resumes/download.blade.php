<x-app-layout>
    <div class="min-h-screen bg-gray-100 flex items-center justify-center p-4">
        <div class="w-full max-w-4xl bg-red-800 rounded-xl shadow-lg p-2">
            <div class="bg-white p-8 sm:p-12 rounded-lg text-gray-800">
                
                <!-- Header -->
                <div class="border-b-2 border-gray-400 pb-2 mb-8">
                    <h1 class="text-2xl font-bold">[DOWNLOAD]</h1>
                </div>

                <!-- Main Content -->
                <h2 class="text-2xl font-bold mb-2">Download Your Resume</h2>
                <p class="mb-6 text-gray-600">Resume: {{ $resume->name }}</p>

                <div class="flex flex-col md:flex-row gap-8">
                    <!-- Left Side: Format Selection -->
                    <div class="flex-grow">
                        <form action="{{ route('resumes.download.process', $resume) }}" method="POST" id="downloadForm">
                            @csrf
                            <label class="block text-lg font-semibold text-gray-800 mb-2">Choose download format:</label>
                            <div class="space-y-4" x-data="{ format: 'pdf' }">
                                <!-- PDF Option -->
                                <div @click="format = 'pdf'" class="p-4 border rounded-lg cursor-pointer flex items-center" :class="format === 'pdf' ? 'border-indigo-500 border-2 bg-indigo-50' : 'border-gray-300'">
                                    <input type="radio" name="format" value="pdf" class="hidden" x-model="format">
                                    <div class="w-12 h-12 bg-red-600 text-white flex items-center justify-center rounded-lg font-bold text-sm mr-4">PDF</div>
                                    <div>
                                        <h3 class="font-bold">PDF Format</h3>
                                        <p class="text-sm text-gray-500">Best for sharing and printing</p>
                                    </div>
                                </div>
                                <!-- Word Option -->
                                <div @click="format = 'doc'" class="p-4 border rounded-lg cursor-pointer flex items-center" :class="format === 'doc' ? 'border-indigo-500 border-2 bg-indigo-50' : 'border-gray-300'">
                                    <input type="radio" name="format" value="doc" class="hidden" x-model="format">
                                    <div class="w-12 h-12 bg-blue-600 text-white flex items-center justify-center rounded-lg font-bold text-sm mr-4">DOC</div>
                                    <div>
                                        <h3 class="font-bold">Word Format</h3>
                                        <p class="text-sm text-gray-500">Editable in Microsoft Word</p>
                                    </div>
                                </div>
                                <!-- PNG Option -->
                                <div @click="format = 'png'" class="p-4 border rounded-lg cursor-pointer flex items-center" :class="format === 'png' ? 'border-indigo-500 border-2 bg-indigo-50' : 'border-gray-300'">
                                    <input type="radio" name="format" value="png" class="hidden" x-model="format">
                                    <div class="w-12 h-12 bg-gray-600 text-white flex items-center justify-center rounded-lg font-bold text-sm mr-4">PNG</div>
                                    <div>
                                        <h3 class="font-bold">Image Format</h3>
                                        <p class="text-sm text-gray-500">For social media or websites</p>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>

                    <!-- Right Side: Action Buttons -->
                    <div class="flex-shrink-0 md:pl-8 md:border-l">
                        <div class="flex md:flex-col space-x-4 md:space-x-0 md:space-y-4">
                            <button onclick="document.getElementById('downloadForm').submit();" class="w-full bg-red-800 text-white font-bold py-3 px-8 rounded-lg hover:bg-red-900">Download</button>
                            <a href="{{ url()->previous() }}" class="w-full text-center bg-gray-200 text-gray-800 font-bold py-3 px-8 rounded-lg hover:bg-gray-300">Close</a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>