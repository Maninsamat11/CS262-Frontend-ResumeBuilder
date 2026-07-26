<nav x-data="{ open: false }" class="bg-white shadow-sm border-b border-slate-200">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex items-center gap-6">
                <a href="{{ route('home') }}" class="flex items-center gap-3">
                    <div class="inline-flex h-10 w-10 items-center justify-center rounded-2xl bg-sky-500 text-white shadow-sm overflow-hidden">
                        <!-- Insert your logo here -->
                        <img src="{{ asset('images/logo.png') }}" alt="ResuLink logo" class="h-full w-full object-cover" onerror="this.style.display='none'; this.parentElement.innerHTML='<svg class=\'h-5 w-5\' fill=\'none\' stroke=\'currentColor\' viewBox=\'0 0 24 24\'><path stroke-linecap=\'round\' stroke-linejoin=\'round\' stroke-width=\'2\' d=\'M12 4v16m8-8H4\' /></svg>';">
                    </div>
                    <span class="font-semibold text-slate-900">{{ config('app.name', 'ResuLink') }}</span>
                </a>

                <div class="hidden sm:flex sm:items-center sm:space-x-4">
                    <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                        {{ __('Dashboard') }}
                    </x-nav-link>
                    <x-nav-link :href="route('templates.index')" :active="request()->routeIs('templates.index')">
                        {{ __('Templates') }}
                    </x-nav-link>
                    <x-nav-link :href="route('tutorial')" :active="request()->routeIs('tutorial')">
                        {{ __('Tutorial') }}
                    </x-nav-link>
                </div>
            </div>

            <div class="hidden sm:flex sm:items-center sm:space-x-4">
                @auth
                    <x-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            <button class="inline-flex items-center gap-2 rounded-full border border-slate-200 bg-white px-4 py-2 text-sm font-medium text-slate-700 shadow-sm hover:border-slate-300 hover:text-slate-900 focus:outline-none focus:ring-2 focus:ring-sky-500 transition">
                                <span>{{ Auth::user()->name }}</span>
                                <svg class="h-4 w-4 text-slate-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M5.23 7.21a.75.75 0 011.06.02L10 10.94l3.71-3.71a.75.75 0 111.06 1.06l-4.24 4.24a.75.75 0 01-1.06 0L5.21 8.27a.75.75 0 01.02-1.06z" clip-rule="evenodd" />
                                </svg>
                            </button>
                        </x-slot>

                        <x-slot name="content">
                            <x-dropdown-link :href="route('profile.edit')">
                                {{ __('Profile') }}
                            </x-dropdown-link>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <x-dropdown-link :href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();">
                                    {{ __('Log Out') }}
                                </x-dropdown-link>
                            </form>
                        </x-slot>
                    </x-dropdown>
                @else
                    <a href="{{ route('login') }}" class="text-sm font-medium text-slate-600 hover:text-slate-900">Log in</a>
                    <a href="{{ route('register') }}" class="rounded-full border border-slate-200 bg-slate-100 px-4 py-2 text-sm font-medium text-slate-900 hover:bg-slate-200">Register</a>
                @endauth
            </div>

            <div class="-mr-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex h-10 w-10 items-center justify-center rounded-xl border border-slate-200 bg-white text-slate-500 shadow-sm hover:text-slate-900 hover:border-slate-300 focus:outline-none focus:ring-2 focus:ring-sky-500 transition">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        <div class="space-y-1 px-2 pt-2 pb-3">
            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                {{ __('Dashboard') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('templates.index')" :active="request()->routeIs('templates.index')">
                {{ __('Templates') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('tutorial')" :active="request()->routeIs('tutorial')">
                {{ __('Tutorial') }}
            </x-responsive-nav-link>
        </div>

        @auth
            <div class="border-t border-slate-200 pt-4 pb-1 px-4">
                <div class="font-medium text-slate-900">{{ Auth::user()->name }}</div>
                <div class="text-sm text-slate-500">{{ Auth::user()->email }}</div>
            </div>
            <div class="mt-3 space-y-1 px-2 pb-3">
                <x-responsive-nav-link :href="route('profile.edit')">
                    {{ __('Profile') }}
                </x-responsive-nav-link>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <x-responsive-nav-link :href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        @else
            <div class="border-t border-slate-200 pt-4 pb-3 px-2">
                <x-responsive-nav-link :href="route('login')">
                    {{ __('Log in') }}
                </x-responsive-nav-link>
                <x-responsive-nav-link :href="route('register')">
                    {{ __('Register') }}
                </x-responsive-nav-link>
            </div>
        @endauth
    </div>
</nav>
