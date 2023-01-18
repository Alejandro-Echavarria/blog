<!DOCTYPE html>
<html class="dark" lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <script>
            try {
                if (localStorage.dark == 1 || (!('dark' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
                    document.documentElement.classList.add('dark')
                    document.querySelector('meta[name="theme-color"]').setAttribute('content', '#000000')
                } else {
                    document.documentElement.classList.remove('dark')
                }
            } catch (_) {}
        </script>
        <meta name="author" content="Manuel Echavarria">
        <title>
            @yield('title', 'MAET')
            -
            {{ config('app.name', 'Blog') }}
        </title>
        <meta name="description" content="@yield('meta-description', 'MAET - Blog personal. Este es un espacio donde comparto mis conocimientos y experiencias en el campo del desarrollo web.')"/>

        <link rel="shortcut icon" href="{{ asset('img/11.ico') }}">
        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
        <!-- Styles -->
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">
        <!-- My Styles -->
        <link rel="stylesheet" href="{{ asset('css/my-style.css') }}">
        {{-- Font awesome --}}
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet" />
        @yield('css')
        @livewireStyles
        <!-- Scripts -->
        <script src="{{ mix('js/app.js') }}" defer></script>
        <script src="{{ asset('js/post.js') }}" defer></script>
    </head>
    <body class="font-sans antialiased dark:bg-[#333333]">
        <x-jet-banner />
        <div>
            @livewire('navigation')
            <!-- Page Content -->
            <main class="min-h-screen">
                {{ $slot }}
            </main>
            <x-footers.footer />
        </div>
        @stack('modals')
        @livewireScripts
        <script src="{{ asset('js/generals_functions.js') }}"></script>
        @yield('js')
    </body>
</html>
