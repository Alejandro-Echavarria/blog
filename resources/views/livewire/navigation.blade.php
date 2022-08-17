<nav class="bg-gray-800" x-data="{ open: false }">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between h-16">
            <div class="flex items-center">
                {{-- logotipo --}}
                <a href="/" class="flex-shrink-0">
                    <img class="h-12 w-12" src="{{asset('img/logo-final.svg')}}" alt="Logo representativo">
                </a>
                {{-- Menu lg --}}
                {{-- <div class="hidden md:block">
                    <div class="ml-10 flex items-baseline space-x-4">
                        @foreach ($categories as $category)

                            <a href="{{route('posts.category', $category)}}" class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">{{$category->name}}</a>
                        @endforeach
                    </div>
                </div> --}}
            </div>
            <div class="hidden md:block">
                <div class="ml-4 flex items-center md:ml-6">
                    <!-- Profile dropdown -->
                    @auth
                        <div class="ml-3 relative" x-data="{ open: false }">
                            <div>
                                <button x-on:click="open = true" type="button"
                                    class="max-w-xs bg-gray-800 rounded-full flex items-center text-sm focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-800 focus:ring-white"
                                    id="user-menu-button" aria-expanded="false" aria-haspopup="true">
                                    <span class="sr-only">Open user menu</span>
                                    <img class="h-8 w-8 rounded-full"
                                        src="{{ auth()->user()->profile_photo_url }}"
                                        alt="">
                                </button>
                            </div>
                            <!--
                                Dropdown menu, show/hide based on menu state.
                
                                Entering: "transition ease-out duration-100"
                                    From: "transform opacity-0 scale-95"
                                    To: "transform opacity-100 scale-100"
                                Leaving: "transition ease-in duration-75"
                                    From: "transform opacity-100 scale-100"
                                    To: "transform opacity-0 scale-95"
                            -->
                            <div x-show="open" x-on:click.away="open = false" class="origin-top-right absolute right-0 mt-2 w-48 rounded-md shadow-lg py-1 bg-white ring-1 ring-black ring-opacity-5 focus:outline-none"
                                role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button"
                                tabindex="-1">
                                
                                <a href="{{ route('profile.show') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem" tabindex="-1"
                                    id="user-menu-item-0">Perfil
                                </a>
                                
                                @can('admin.home')
                                    <a href="{{ route('admin.home') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem" tabindex="-1"
                                        id="user-menu-item-0">Dashboard
                                    </a>
                                @endcan

                                <form method="POST" action="{{ route('logout') }}" x-data>
                                    @csrf    
                                    <a href="{{ route('logout') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem" tabindex="-1" id="user-menu-item-2" @click.prevent="$root.submit();">
                                        Cerrar sesión
                                    </a>
                                </form>
                            </div>
                        </div>
                    @else
                        <a href="{{ route('login') }}" class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">
                            Login
                        </a>
                        <a href="{{ route('register') }}" class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">
                            Register
                        </a>
                    @endauth
                </div>
            </div>
            
            <!-- Mobile menu button -->
            <div class="-mr-2 flex md:hidden">
                <button x-on:click="open = true" type="button"
                    class="bg-gray-800 inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-white hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-800 focus:ring-white"
                    aria-controls="mobile-menu" aria-expanded="false">
                    <span class="sr-only">Open main menu</span>
                    <!--
                        Heroicon name: outline/menu
        
                        Menu open: "hidden", Menu closed: "block"
                    -->
                    <svg class="block h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                        stroke-width="2" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                    <!--
                        Heroicon name: outline/x
        
                        Menu open: "block", Menu closed: "hidden"
                    -->
                    <svg class="hidden h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                        stroke-width="2" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>
    
    <!-- Mobile menu, show/hide based on menu state. -->
    <div class="md:hidden" id="mobile-menu" x-show="open" x-on:click.away="open = false">
        <div class="px-2 pt-2 pb-3 space-y-1 sm:px-3">
            <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
            {{-- <a href="#" class="bg-gray-900 text-white block px-3 py-2 rounded-md text-base font-medium" aria-current="page">Dashboard</a> --}}
            @foreach ($categories as $category)
                
                <a href="{{route('posts.category', $category)}}" class="text-gray-300 hover:bg-gray-700 hover:text-white block px-3 py-2 rounded-md text-base font-medium">{{$category->name}}</a>
            @endforeach
        </div>
        @auth
            <div class="pt-4 pb-3 border-t border-gray-700">
                <div class="flex items-center px-5">
                    <div class="flex-shrink-0">
                        <img class="h-10 w-10 rounded-full"
                            src="{{ auth()->user()->profile_photo_url }}"
                            alt="">
                    </div>
                    <div class="ml-3">
                        <div class="text-base font-medium leading-none text-white">{{ auth()->user()->name }}</div>
                        <div class="text-sm font-medium leading-none text-gray-400">{{ auth()->user()->email }}</div>
                    </div>
                </div>
                <div class="mt-3 px-2 space-y-1">
                    <a href="{{ route('profile.show') }}" class="text-gray-300 hover:bg-gray-700 hover:text-white block px-3 py-2 rounded-md text-base font-medium">Perfil</a>
                    <a href="{{ route('admin.home') }}" class="text-gray-300 hover:bg-gray-700 hover:text-white block px-3 py-2 rounded-md text-base font-medium">Dashboard</a>
                    <form method="POST" action="{{ route('logout') }}" x-data>
                        @csrf   
                        <a href="{{ route('logout') }}" class="text-gray-300 hover:bg-gray-700 hover:text-white block px-3 py-2 rounded-md text-base font-medium" @click.prevent="$root.submit();">
                            Cerrar sesión
                        </a>
                    </form>
                </div>
            </div>
        @else
        <div class="px-2 pt-2 pb-3 space-y-1 sm:px-3 border-t border-gray-700">
            <a href="{{ route('login') }}" class="text-gray-300 hover:bg-gray-700 hover:text-white block px-3 py-2 rounded-md text-base font-medium">Login</a>
            <a href="{{ route('register') }}" class="text-gray-300 hover:bg-gray-700 hover:text-white block px-3 py-2 rounded-md text-base font-medium">Register</a>
        </div>

        @endauth
    </div>
</nav>