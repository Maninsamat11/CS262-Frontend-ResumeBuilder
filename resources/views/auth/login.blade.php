<x-guest-layout>
    <h2 class="text-2xl font-bold text-center text-gray-800 mb-8">Welcome Back!</h2>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" class="font-semibold" />
            <x-text-input id="email" class="block mt-1 w-full p-3 border-gray-300 focus:border-red-500 focus:ring-red-500 rounded-lg" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-6">
            <x-input-label for="password" :value="__('Password')" class="font-semibold"/>
            <x-text-input id="password" class="block mt-1 w-full p-3 border-gray-300 focus:border-red-500 focus:ring-red-500 rounded-lg" type="password" name="password" required autocomplete="current-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me & Forgot Password -->
        <div class="flex items-center justify-between mt-6">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-red-600 shadow-sm focus:ring-red-500" name="remember">
                <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
            </label>

            @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500" href="{{ route('password.request') }}">
                    {{ __('Forgot password?') }}
                </a>
            @endif
        </div>

        <!-- Login Button -->
        <div class="mt-8">
            <x-primary-button class="w-full flex justify-center py-3 bg-red-600 hover:bg-red-700 focus:bg-red-700 active:bg-red-800 focus:ring-red-500">
                {{ __('Log In') }}
            </x-primary-button>
        </div>
        
        <!-- Link to Register -->
         <div class="text-center mt-6">
            <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('register') }}">
                Don't have an account? Register
            </a>
        </div>
    </form>
</x-guest-layout>