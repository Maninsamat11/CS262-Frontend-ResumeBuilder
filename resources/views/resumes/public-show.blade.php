<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Resume: {{ $resume->name }}</title>
    {{-- Using Tailwind CDN is perfect for this public page --}}
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">

    <!-- ============================================= -->
    <!-- SECTION 1: HEADER (Inside a container)      -->
    <!-- ============================================= -->
    <div class="container mx-auto p-4 sm:p-8">
        <div class="max-w-4xl mx-auto bg-white p-4 rounded-lg shadow-md mb-6 flex justify-between items-center">
            
            <!-- Left Side: Title and View Count -->
            <div>
                <h1 class="text-xl sm:text-2xl font-bold text-gray-800">Viewing Resume: <span class="text-red-800">{{ $resume->name }}</span></h1>
                
                @if(isset($viewCount))
                <div class="mt-1 flex items-center text-sm text-gray-500">
                    <svg class="w-4 h-4 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0zM2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path></svg>
                    <span>Viewed {{ $viewCount }} {{ Str::plural('time', $viewCount) }}.</span>
                </div>
                @endif
            </div>
            
            <!-- Right Side: Download Form -->
            {{-- This download form won't have the live payload, it downloads the saved version --}}
            <form action="{{ route('resumes.processDownload', $resume) }}" method="POST" target="_blank" class="flex items-center space-x-2">
                @csrf
                <select name="format" class="p-2 border border-gray-300 rounded-md text-sm">
                    <option value="pdf">Download as PDF</option>
                    <option value="png">Download as PNG</option> 
                </select>
                <button type="submit" class="bg-red-800 text-white font-semibold px-4 py-2 rounded-md hover:bg-red-900 transition-colors">
                    Download
                </button>
            </form>
        </div>
    </div>

    <!-- ============================================= -->
    <!-- SECTION 2: RESUME CONTENT (Full Width)      -->
    <!-- ============================================= -->
    {{-- This div has no container, allowing the template's own design to control the width.
         The 'mx-auto' on some templates will center them if they aren't full-width by design. --}}
    <div class="bg-white shadow-lg max-w-4xl mx-auto">
        {!! $previewHtml !!}
    </div>

    <!-- ============================================= -->
    <!-- SECTION 3: FOOTER (Inside a container)        -->
    <!-- ============================================= -->
    <div class="text-center py-8">
        <a href="{{ route('home') }}" 
           class="inline-flex items-center bg-gray-800 hover:bg-gray-900 text-white font-bold py-3 px-6 rounded-lg transition-all duration-200 shadow-lg">
            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path></svg>
            <span>Return to Homepage</span>
        </a>
    </div>

</body>
</html>