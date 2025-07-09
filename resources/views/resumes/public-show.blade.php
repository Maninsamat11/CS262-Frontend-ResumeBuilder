<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Resume: {{ $resume->name }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">

    <div class="container mx-auto p-4 sm:p-8">
        
        <div class="max-w-4xl mx-auto bg-white p-4 rounded-lg shadow-md mb-6 flex justify-between items-center">
            <h1 class="text-xl sm:text-2xl font-bold text-gray-800">Viewing Resume: <span class="text-red-800">{{ $resume->name }}</span></h1>
            
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

        <div class="max-w-4xl mx-auto bg-white rounded-lg shadow-lg">
            {!! $previewHtml !!}
        </div>
        
    </div>

</body>
</html>