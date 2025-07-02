<x-guest-layout>
     <h2 class="text-2xl font-bold text-center text-gray-800 mb-8">Create Your Account</h2>

    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" class="font-semibold" />
            <x-text-input id="name" class="block mt-1 w-full p-3 border-gray-300 focus:border-red-500 focus:ring-red-500 rounded-lg" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-6">
            <x-input-label for="email" :value="__('Email')" class="font-semibold" />
            <x-text-input id="email" class="block mt-1 w-full p-3 border-gray-300 focus:border-red-500 focus:ring-red-500 rounded-lg" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-6">
            <x-input-label for="password" :value="__('Password')" class="font-semibold" />
            <x-text-input id="password" class="block mt-1 w-full p-3 border-gray-300 focus:border-red-500 focus:ring-red-500 rounded-lg" type="password" name="password" required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-6">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" class="font-semibold" />
            <x-text-input id="password_confirmation" class="block mt-1 w-full p-3 border-gray-300 focus:border-red-500 focus:ring-red-500 rounded-lg" type="password" name="password_confirmation" required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <!-- Register Button -->
        <div class="mt-8">
             <x-primary-button class="w-full flex justify-center py-3 bg-red-600 hover:bg-red-700 focus:bg-red-700 active:bg-red-800 focus:ring-red-500">
                {{ __('Register') }}
            </x-primary-button>
        </div>

        <!-- Link to Login -->
        <div class="text-center mt-6">
            <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>
        </div>
    </form>
</x-guest-layout>