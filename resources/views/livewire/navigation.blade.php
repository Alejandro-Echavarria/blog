@php
    $decorador = '<div class="absolute w-6 m-auto inset-x-0 bottom-0 top-7"><div class="border-b-4 border-color-secundario rounded-md"></div></div>';
    $decoradorVertical = '<div class="absolute inset-y-0 top-3"><div class="h-6 border-l-4 border-color-secundario rounded-md"></div></div>';
@endphp

<nav
    x-data="{ open: false, show: localStorage.dark == 1 ? true: false, toggle() { this.show = !this.show } }"
    class="backdrop-blur-md bg-white/80 dark:bg-[#333333]/80 navSticky z-50 sticky top-0" x-data="{ open: false }">
    <div class="max-w-full mx-auto px-6 sm:px-6 lg:px-6 xl:px-8 2xl:px-16">
        <div class="flex items-center h-16">
            {{-- logotipo --}}
            <a href="/" class="flex-shrink-0">
                <div class="flex items-center">
                    <div class="items-center">
                        <p class="font-extrabold text-gray-700 dark:text-gray-200"><span class="h-12 w-12">MAET</span> - Blog</p>
                    </div>
                </div>
            </a>
            <div class="flex justify-end w-full">
                <div class="flex items-center">
                    {{-- Menu lg --}}
                    <div class="hidden md:block relative ml-10 ">
                        <div class="items-baseline">
                            <a 
                                href="{{ route('posts.index') }}" 
                                class="
                                    text-gray-700 
                                    dark:text-gray-200 
                                    hover:text-gray-900 
                                    dark:hover:text-white 
                                    font-semibold 
                                    mx-3 
                                    py-2 
                                    rounded-2xl 
                                    text-sm 
                                    transition 
                                    ease-in-out">Inicio</a>
                            {!!request()->routeIs('posts.index') ? $decorador : ""!!}
                        </div>
                    </div>
                </div>
                <!-- Selector de tema oscuro -->
                <div class="flex items-center">
                    <div class="mr-2 h-4 w-4 ">
                        <span class="h-4 w-4"></span>
                        <svg id="moon"
                            class="setMode hidden transition h-4 w-4 text-gray-700 hover:text-gray-500 cursor-pointer" fill="none" @click="toggle" :class="{'block': !show, 'hidden': show}" x-cloak xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z" />
                        </svg>
                        <svg id="sun" 
                            class="setMode hidden transition h-5 w-5 text-gray-200 hover:text-gray-500 cursor-pointer" fill="none" @click="toggle" :class="{'hidden': !show, 'block': show}" x-cloak xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z" />
                        </svg>
                    </div>
                </div>
                <div class="hidden md:block">
                    <div class="ml-4 flex items-center md:ml-6">
                        <!-- Profile dropdown -->
                        @auth
                            <div class="ml-3 relative" x-data="{ open: false }">
                                <div>
                                    <button x-on:click="open = ! open" type="button"
                                        class="max-w-xs rounded-full flex items-center text-sm focus:outline-none"
                                        id="user-menu-button" aria-expanded="false" aria-haspopup="true">
                                        <span class="sr-only">Open user menu</span>
                                        <img class="h-8 w-8 rounded-full"
                                            src="{{ auth()->user()->profile_photo_url }}"
                                            alt="">
                                    </button>
                                </div>
                                <div x-show="open" x-on:click.away="open = false" x-transition:enter.duration.200ms x-transition:leave.duration.200ms style="display: none;" class="origin-top-right absolute right-0 mt-2 w-48 rounded-2xl shadow-sm bg-white ring-1 ring-black ring-opacity-5 focus:outline-none"
                                    role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button"
                                    tabindex="-1">
                                    <a href="{{ route('admin.home') }}" class="block px-4 m-2 py-2 text-sm font-semibold text-gray-700 hover:bg-gray-100 {!! request()->routeIs('profile.show') ? "bg-gray-100" : "" !!} rounded-lg" role="menuitem" tabindex="-1"
                                        id="user-menu-item-0">Admin
                                    </a>
                                    <a href="{{ route('profile.show') }}" class="block px-4 m-2 py-2 text-sm font-semibold text-gray-700 hover:bg-gray-100 {!! request()->routeIs('profile.show') ? "bg-gray-100" : "" !!} rounded-lg" role="menuitem" tabindex="-1"
                                        id="user-menu-item-0">Perfil
                                    </a>
                                    <form method="POST" action="{{ route('logout') }}" x-data>
                                        @csrf    
                                        <a href="{{ route('logout') }}" class="block px-4 m-2 py-2 text-sm text-gray-700 font-semibold hover:bg-gray-100 hover:rounded-lg" role="menuitem" tabindex="-1" id="user-menu-item-2" @click.prevent="$root.submit();">
                                            Cerrar sesión
                                        </a>
                                    </form>
                                </div>
                            </div>
                        @endauth
                    </div>
                </div>
            </div>
            
            <!-- Mobile menu button -->
            <div class="-mr-2 flex md:hidden">
                <button x-on:click="open = true" type="button"
                    class="inline-flex items-center justify-center p-2 rounded-md text-gray-700 hover:bg-gray-200 dark:text-gray-200 dark:hover:text-white dark:hover:bg-gray-900 transition"
                    aria-controls="mobile-menu" aria-expanded="false">
                    <span class="sr-only">Open main menu</span>
                    <svg class="block h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                        stroke-width="2" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                    <svg class="hidden h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                        stroke-width="2" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>
    
    <!-- Mobile menu, show/hide based on menu state. -->
    <div class="md:hidden" id="mobile-menu" x-show="open" x-on:click.away="open = false" style="display: none;" x-transition:enter.duration.400ms x-transition:leave.duration.200ms>
        @auth
            <div class="pt-4 pb-3 border-t border-gray-200 dark:border-gray-700">
                <div class="flex items-center px-4">
                    <div class="flex-shrink-0">
                        <img class="h-10 w-10 rounded-full"
                            src="{{ auth()->user()->profile_photo_url }}"
                            alt="">
                    </div>
                    <div class="ml-3">
                        <div class="text-base font-bold leading-none text-gray-700 dark:text-white">{{ auth()->user()->name }}</div>
                        <div class="text-sm font-bold leading-none text-gray-400">{{ auth()->user()->email }}</div>
                    </div>
                </div>
                <div class="mt-3">
                    <div class="px-4 pt-2 space-y-1 relative">
                        <a 
                            href="{{ route('posts.index') }}" 
                            class="
                                text-gray-700 
                                hover:bg-gray-200 
                                hover:text-gray-900 
                                dark:text-gray-200 
                                dark:hover:text-white 
                                dark:hover:bg-gray-700 
                                block 
                                px-3 
                                py-2 
                                rounded-md 
                                text-sm
                                font-bold
                                transition 
                                ease-in-out">Inicio</a>
                        {!!request()->routeIs('posts.index') ? $decoradorVertical : ""!!}
                    </div>
                    <div class="px-4 pt-2 space-y-1 relative">
                        <a 
                            href="{{ route('admin.home') }}" 
                            class="
                                text-gray-700 
                                hover:bg-gray-200 
                                hover:text-gray-900 
                                dark:text-gray-200 
                                dark:hover:text-white 
                                dark:hover:bg-gray-700 
                                block 
                                px-3 
                                py-2 
                                rounded-md 
                                text-sm
                                font-bold
                                transition 
                                ease-in-out">Admin</a>
                        {!!request()->routeIs('admin.home') ? $decoradorVertical : ""!!}
                        <a 
                            href="{{ route('profile.show') }}" 
                            class="
                                text-gray-700 
                                hover:bg-gray-200 
                                hover:text-gray-900 
                                dark:text-gray-200 
                                dark:hover:text-white 
                                dark:hover:bg-gray-700 
                                block 
                                px-3 
                                py-2 
                                rounded-md 
                                text-sm
                                font-bold
                                transition 
                                ease-in-out">Perfil</a>
                        {!!request()->routeIs('profile.show') ? $decoradorVertical : ""!!}
                    </div>
                    <div class="px-4 pt-2 space-y-1 relative">
                        <form method="POST" action="{{ route('logout') }}" x-data>
                            @csrf   
                            <a 
                                href="{{ route('logout') }}" 
                                class="
                                    text-gray-700 
                                    hover:bg-gray-200 
                                    hover:text-gray-900 
                                    dark:text-gray-200 
                                    dark:hover:text-white 
                                    dark:hover:bg-gray-700 
                                    block 
                                    px-3 
                                    py-2 
                                    rounded-md 
                                    text-sm
                                    font-bold
                                    transition 
                                    ease-in-out" @click.prevent="$root.submit();">
                                Cerrar sesión
                            </a>
                        </form>
                    </div>
                </div>
            </div>
        @else
            <div class="px-4 pt-2 pb-3 space-y-1 sm:px-3 border-t border-gray-200 dark:border-gray-700">
                <a 
                    href="{{ route('posts.index') }}" 
                    class="
                        text-gray-700 
                        hover:bg-gray-200 
                        hover:text-gray-900 
                        dark:text-gray-200 
                        dark:hover:text-white 
                        dark:hover:bg-gray-700 
                        block 
                        px-3 
                        py-2 
                        rounded-md 
                        text-sm
                        font-bold
                        transition 
                        ease-in-out">Inicio
                </a>
            </div>
        @endauth
    </div>
</nav>