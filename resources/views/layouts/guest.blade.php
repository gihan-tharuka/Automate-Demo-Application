<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Google Analytics -->
        @if(app()->environment('production'))
            <script async src="https://www.googletagmanager.com/gtag/js?id={{ config('services.google.analytics_id') }}"></script>
            <script>
                window.dataLayer = window.dataLayer || [];
                function gtag(){dataLayer.push(arguments);}
                gtag('js', new Date());
                gtag('config', '{{ config('services.google.analytics_id') }}');
            </script>
        @endif

        <!-- Favicon -->
        <link rel="icon" type="image/svg+xml" href="/favicon.svg">
        <link rel="icon" type="image/x-icon" href="/favicon.ico">

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <!-- Styles -->
        @livewireStyles
    </head>
    <body class="bg-gray-50 flex flex-col min-h-screen">
        <!-- Top Nav Bar -->
        <nav class="bg-white shadow sticky top-0 z-50" x-data="{ open: false }">
            <div class="max-w-7xl mx-auto px-4 py-4 flex justify-between items-center">
                <a href="/" class="flex items-center gap-2">
                    {{-- <svg class="w-8 h-8 text-blue-900" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M3 13l2-2m0 0l7-7 7 7M13 5v6h6m-6 0v6m0 0H7m6 0h6"/></svg> --}}
                    <span class="text-2xl font-bold tracking-wide text-blue-900">Padmasiri Auto Electricals</span>
                </a>
                <button class="md:hidden block text-blue-900 focus:outline-none" @click="open = !open">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" /></svg>
                </button>
                <ul class="hidden md:flex space-x-8 font-medium">
                    <li><a href="/" class="text-blue-900 hover:text-blue-600 transition">Home</a></li>
                    <li><a href="/services" class="text-blue-900 hover:text-blue-600 transition">Services</a></li>
                    <li><a href="/about" class="text-blue-900 hover:text-blue-600 transition">About</a></li>
                    <li><a href="/contact" class="text-blue-900 hover:text-blue-600 transition">Contact</a></li>
                </ul>
                <div class="hidden md:flex items-center space-x-4">
                    @auth
                        <a href="/dashboard" class="px-4 py-2 rounded-lg bg-blue-900 text-white font-semibold shadow hover:bg-blue-800 transition">Dashboard</a>
                        <form method="POST" action="{{ route('logout') }}" class="inline">
                            @csrf
                            <button type="submit" class="px-4 py-2 rounded-lg border border-blue-900 text-blue-900 font-semibold hover:bg-blue-900 hover:text-white transition">Log out</button>
                        </form>
                    @else
                        <a href="/login" class="px-4 py-2 rounded-lg border border-blue-900 text-blue-900 font-semibold hover:bg-blue-900 hover:text-white transition">Login</a>
                        <a href="/register" class="px-4 py-2 rounded-lg bg-blue-900 text-white font-semibold shadow hover:bg-blue-800 transition">Register</a>
                    @endauth

                </div>
            </div>
            <!-- Mobile Menu -->
            <div class="md:hidden" x-show="open" @click.away="open = false">
                <ul class="flex flex-col space-y-2 px-4 py-2 font-medium bg-white border-t">
                    <li><a href="/" class="text-blue-900 hover:text-blue-600 transition">Home</a></li>
                    <li><a href="/services" class="text-blue-900 hover:text-blue-600 transition">Services</a></li>
                    <li><a href="/about" class="text-blue-900 hover:text-blue-600 transition">About</a></li>
                    <li><a href="/contact" class="text-blue-900 hover:text-blue-600 transition">Contact</a></li>
                </ul>
                <div class="flex flex-col space-y-2 px-4 py-2 bg-white border-b">
                    @auth
                        <a href="/dashboard" class="px-4 py-2 rounded-lg bg-blue-900 text-white font-semibold shadow hover:bg-blue-800 transition">Dashboard</a>
                        <form method="POST" action="{{ route('logout') }}" class="inline">
                            @csrf
                            <button type="submit" class="px-4 py-2 rounded-lg border border-blue-900 text-blue-900 font-semibold hover:bg-blue-900 hover:text-white transition w-full text-left">Log out</button>
                        </form>
                    @else
                        <a href="/login" class="px-4 py-2 rounded-lg border border-blue-900 text-blue-900 font-semibold hover:bg-blue-900 hover:text-white transition">Login</a>
                        <a href="/register" class="px-4 py-2 rounded-lg bg-blue-900 text-white font-semibold shadow hover:bg-blue-800 transition">Register</a>
                    @endauth

                </div>
            </div>
        </nav>

        <div class="font-sans text-gray-900 antialiased flex-1">
            {{ $slot }}
        </div>

        <!-- Footer -->
        <footer class="bg-blue-900 text-white mt-auto">
            <div class="max-w-7xl mx-auto px-4 py-8 flex flex-col md:flex-row justify-between items-center">
                <div class="mb-4 md:mb-0 flex items-center gap-2">
                    {{-- <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M3 13l2-2m0 0l7-7 7 7M13 5v6h6m-6 0v6m0 0H7m6 0h6"/></svg> --}}
                    <span class="font-bold">Padmasiri Auto Electricals</span>
                </div>
                <div class="flex space-x-6">
                    <a href="#" class="hover:text-blue-300">Privacy Policy</a>
                    <a href="#" class="hover:text-blue-300">Terms of Service</a>
                </div>
                <div class="mt-4 md:mt-0 text-sm">&copy; 2025 Padmasiri Auto Electricals. All rights reserved.</div>
            </div>
        </footer>

        @livewireScripts
    </body>
</html>
