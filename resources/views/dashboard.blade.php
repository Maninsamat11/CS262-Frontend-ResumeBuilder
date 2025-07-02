<x-app-layout>
    {{-- This dashboard has a custom design, so we don't use the default header slot --}}

    <div class="bg-red-800 min-h-screen text-white relative overflow-hidden">
        <!-- Background Pattern -->
        <div class="absolute inset-0 opacity-10">
            <div class="absolute inset-0" style="background-image: radial-gradient(circle at 25px 25px, rgba(255,255,255,0.2) 2px, transparent 0), radial-gradient(circle at 75px 75px, rgba(255,255,255,0.1) 2px, transparent 0); background-size: 100px 100px;"></div>
        </div>
        
        <div class="max-w-4xl mx-auto p-4 sm:p-8 relative z-10">

            <!-- USER PROFILE HEADER -->
            <div class="mb-8">
                <h1 class="text-2xl font-bold mb-4 flex items-center">
                    <div class="w-8 h-8 bg-red-600 rounded-lg mr-3 flex items-center justify-center">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"></path>
                        </svg>
                    </div>
                    [USER PROFILE]
                </h1>
                <div class="bg-white text-gray-800 p-4 rounded-lg flex justify-between items-center mb-6 shadow-lg border-l-4 border-red-600">
                    <div>
                        <p class="text-lg mb-1"><span class="font-bold">Name:</span> {{ Auth::user()->name }}</p>
                        <p class="text-lg"><span class="font-bold">Email:</span> {{ Auth::user()->email }}</p>
                    </div>
                    <a href="{{ route('profile.edit') }}" class="bg-gray-200 hover:bg-gray-300 text-gray-800 font-bold py-2 px-6 rounded-lg transform hover:scale-105 transition-all duration-200">Edit</a>
                </div>
            </div>

            <!-- MY RESUME SECTION -->
            <div class="flex justify-between items-center mb-4">
                <h2 class="text-xl font-bold flex items-center">
                    <div class="w-8 h-8 bg-red-600 rounded-lg mr-3 flex items-center justify-center">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M4 4a2 2 0 012-2h4.586A2 2 0 0112 2.586L15.414 6A2 2 0 0116 7.414V16a2 2 0 01-2 2H6a2 2 0 01-2-2V4zm2 6a1 1 0 011-1h6a1 1 0 110 2H7a1 1 0 01-1-1zm1 3a1 1 0 100 2h6a1 1 0 100-2H7z" clip-rule="evenodd"></path>
                        </svg>
                    </div>
                    MY RESUME
                </h2>
                <a href="{{ route('templates.index') }}" class="bg-black text-white font-bold py-2 px-4 rounded-lg hover:bg-gray-900 transform hover:scale-105 transition-all duration-200 shadow-lg">+ CREATE NEW RESUME</a>
            </div>

            <!-- RESUME LIST -->
            <div class="space-y-6">
                @forelse($resumes as $resume)
                    <div class="bg-white text-gray-800 p-6 rounded-lg shadow-lg border-l-4 border-red-600 hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1">
                        <!-- Top part: Info and Action Buttons -->
                        <div class="flex flex-col sm:flex-row justify-between">
                            <div class="flex items-start mb-4 sm:mb-0">
                                <div class="w-12 h-12 bg-red-100 rounded-full flex items-center justify-center mr-4 flex-shrink-0">
                                    <svg class="w-6 h-6 text-red-600" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M4 4a2 2 0 012-2h4.586A2 2 0 0112 2.586L15.414 6A2 2 0 0116 7.414V16a2 2 0 01-2 2H6a2 2 0 01-2-2V4z" clip-rule="evenodd"></path>
                                    </svg>
                                </div>
                                <div>
                                    <h3 class="text-xl font-bold uppercase mb-2">{{ $resume->name }}</h3>
                                    <div class="space-y-1">
                                        <p class="text-sm text-gray-500 flex items-center">
                                            <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.414-1.414L11 9.586V6z" clip-rule="evenodd"></path>
                                            </svg>
                                            last updated : {{ $resume->updated_at->format('Y-m-d') }}
                                        </p>
                                        <p class="text-sm text-gray-500 flex items-center">
                                            <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                                <path d="M10 12a2 2 0 100-4 2 2 0 000 4z"></path>
                                                <path fill-rule="evenodd" d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z" clip-rule="evenodd"></path>
                                            </svg>
                                            views : {{ $resume->views ?? 0 }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="flex items-center space-x-2 mt-4 sm:mt-0 flex-wrap gap-2">
                                <a href="{{ route('resumes.preview', $resume) }}" target="_blank" class="bg-gray-200 hover:bg-gray-300 text-gray-800 font-bold py-2 px-4 rounded-lg text-sm transform hover:scale-105 transition-all duration-200">VIEW</a>
                                <a href="{{ route('resumes.edit', $resume) }}" class="bg-gray-200 hover:bg-gray-300 text-gray-800 font-bold py-2 px-4 rounded-lg text-sm transform hover:scale-105 transition-all duration-200">EDIT</a>
                                <a href="{{ route('resumes.share', $resume) }}" class="bg-red-800 hover:bg-red-900 text-white font-bold py-2 px-4 rounded-lg text-sm transform hover:scale-105 transition-all duration-200">SHARE</a>
                                <form action="{{ route('resumes.destroy', $resume) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="bg-pink-500 hover:bg-pink-600 text-white font-bold py-2 px-4 rounded-lg text-sm transform hover:scale-105 transition-all duration-200">DELETE</button>
                                </form>
                            </div>
                        </div>

                        <div class="border-t my-4 border-gray-200"></div>

                        <!-- Bottom part: Functional Visibility Toggle -->
                        <div class="flex items-center bg-gray-50 p-3 rounded-lg">
                            <span class="mr-3 font-bold flex items-center">
                                <svg class="w-5 h-5 mr-2 text-gray-600" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M10 12a2 2 0 100-4 2 2 0 000 4z"></path>
                                    <path fill-rule="evenodd" d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z" clip-rule="evenodd"></path>
                                </svg>
                                VISIBILITY :
                            </span>
                            
                            <!-- This form makes the toggle work -->
                            <form action="{{ route('resumes.toggleStatus', $resume) }}" method="POST">
                                @csrf
                                @method('PATCH')
                                <button type="submit" 
                                        aria-label="Toggle Visibility"
                                        class="relative inline-flex items-center h-6 rounded-full w-11 transition-colors cursor-pointer focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 {{ $resume->status === 'public' ? 'bg-green-500' : 'bg-gray-300' }}">
                                    <span class="inline-block w-4 h-4 transform bg-white rounded-full transition-transform {{ $resume->status === 'public' ? 'translate-x-6' : 'translate-x-1' }}"></span>
                                </button>
                            </form>
                            
                            <span class="ml-3 font-semibold uppercase flex items-center {{ $resume->status === 'public' ? 'text-green-700' : 'text-gray-500' }}">
                                @if($resume->status === 'public')
                                    <div class="w-2 h-2 bg-green-500 rounded-full mr-2 animate-pulse"></div>
                                @else
                                    <div class="w-2 h-2 bg-gray-400 rounded-full mr-2"></div>
                                @endif
                                {{ $resume->status }}
                            </span>
                        </div>
                    </div>
                @empty
                    <div class="bg-white text-gray-800 p-12 text-center rounded-lg shadow-lg border-l-4 border-red-600">
                        <div class="w-16 h-16 bg-red-100 rounded-full flex items-center justify-center mx-auto mb-4">
                            <svg class="w-8 h-8 text-red-600" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M4 4a2 2 0 012-2h4.586A2 2 0 0112 2.586L15.414 6A2 2 0 0116 7.414V16a2 2 0 01-2 2H6a2 2 0 01-2-2V4z" clip-rule="evenodd"></path>
                            </svg>
                        </div>
                        <p class="text-xl">You haven't created any resumes yet.</p>
                        <a href="{{ route('templates.index') }}" class="inline-block mt-4 bg-red-600 hover:bg-red-700 text-white font-bold py-2 px-6 rounded-lg transform hover:scale-105 transition-all duration-200">
                            Create Your First Resume
                        </a>
                    </div>
                @endforelse
            </div>

            <!-- BOTTOM STATISTICS & ACTIONS SECTION -->
            <div class="bg-red-900 p-8 rounded-lg mt-12 grid grid-cols-1 md:grid-cols-2 gap-8 shadow-2xl border border-red-700">
                <div>
                    <h3 class="font-bold mb-4 flex items-center text-lg">
                        <div class="w-6 h-6 bg-red-700 rounded mr-3 flex items-center justify-center">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M2 10a8 8 0 018-8v8h8a8 8 0 11-16 0z"></path>
                                <path d="M12 2.252A8.014 8.014 0 0117.748 8H12V2.252z"></path>
                            </svg>
                        </div>
                        ACCOUNT STATISTICS
                    </h3>
                    <div class="space-y-3 text-sm">
                        <div class="flex items-center bg-red-800 p-3 rounded-lg border border-red-700">
                            <span class="inline-block w-8 h-8 bg-gray-200 text-black flex items-center justify-center rounded mr-3">📄</span>
                            <div>
                                <div class="font-semibold">Total Resumes</div>
                                <div class="text-red-200">{{ $resumes->count() }}</div>
                            </div>
                        </div>
                        <div class="flex items-center bg-red-800 p-3 rounded-lg border border-red-700">
                            <span class="inline-block w-8 h-8 bg-gray-200 text-black flex items-center justify-center rounded mr-3">⚪</span>
                            <div>
                                <div class="font-semibold">Total Views</div>
                                <div class="text-red-200">{{ $resumes->sum('views') }}</div>
                            </div>
                        </div>
                        <div class="flex items-center bg-red-800 p-3 rounded-lg border border-red-700">
                            <span class="inline-block w-8 h-8 bg-gray-200 text-black flex items-center justify-center rounded mr-3">📅</span>
                            <div>
                                <div class="font-semibold">Member Since</div>
                                <div class="text-red-200">{{ Auth::user()->created_at->format('M Y') }}</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div>
                    <h3 class="font-bold mb-4 flex items-center text-lg">
                        <div class="w-6 h-6 bg-red-700 rounded mr-3 flex items-center justify-center">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M11.3 1.046A1 1 0 0112 2v5h4a1 1 0 01.82 1.573l-7 10A1 1 0 018 18v-5H4a1 1 0 01-.82-1.573l7-10a1 1 0 011.12-.38z" clip-rule="evenodd"></path>
                            </svg>
                        </div>
                        QUICK ACTIONS
                    </h3>
                    <div class="space-y-3">
                        <a href="{{ route('templates.index') }}" class="block text-center bg-gray-200 text-black font-semibold py-3 rounded-full hover:bg-gray-300 transform hover:scale-105 transition-all duration-200 shadow-lg">Create a New Resume</a>
                        <a href="{{ route('profile.edit') }}" class="block text-center bg-gray-200 text-black font-semibold py-3 rounded-full hover:bg-gray-300 transform hover:scale-105 transition-all duration-200 shadow-lg">Update Profile & Password</a>
                    </div>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>