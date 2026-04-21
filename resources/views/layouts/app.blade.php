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
        <nav class="bg-gradient-to-r from-red-900 via-red-800 to-red-900 shadow-lg sticky top-0 z-50" x-data="{ open: false }">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between items-center h-16">
                    <!-- Logo Section -->
                    <div class="flex items-center gap-4">
                        <a href="/" class="flex items-center gap-3 group">
                            <div class="w-10 h-10 bg-white rounded-full flex items-center justify-center shadow-lg group-hover:scale-110 transition-transform duration-300">
                                <svg class="w-6 h-6 text-blue-900" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z"/>
                                </svg>
                            </div>
                            <div>
                                <span class="text-xl font-bold tracking-tight text-white">Padmasiri Auto</span>
                                <div class="text-xs text-red-200 font-medium">Electricals & Services</div>
                            </div>
                        </a>
                    </div>

                    <!-- Desktop Navigation -->
                    <div class="hidden md:flex items-center space-x-1">
                        @foreach([
                            '/' => ['Home', 'M3 12h18'],
                            '/services' => ['Services', 'M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z'],
                            '/products' => ['Products', 'M20 12H4'],
                            '/about' => ['About', 'M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 18a6 6 0 00-6 6h12a6 6 0 00-6-6z'],
                            '/contact' => ['Contact', 'M3 8l7.89 7.89a2.032 2.032 0 002.83 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z'],
                            route('appointments.book') => ['Book Appointment', 'M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z']
                        ] as $route => $item)
                            <a href="{{ $route }}" class="px-4 py-2 rounded-lg text-sm font-medium text-red-100 hover:text-white hover:bg-red-700 hover:bg-opacity-50 transition-all duration-300 transform hover:scale-105 border border-transparent hover:border-red-400 hover:border-opacity-50">
                                <div class="flex items-center gap-2">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $item[1] }}"/>
                                    </svg>
                                    {{ $item[0] }}
                                </div>
                            </a>
                        @endforeach
                    </div>

                    <!-- Auth Actions -->
                    <div class="hidden md:flex items-center space-x-3">
                        @auth
                            <a href="{{ route('dashboard') }}" class="px-4 py-2 bg-white text-red-900 rounded-lg font-semibold shadow-lg hover:shadow-xl transform hover:scale-105 transition-all duration-300 border-2 border-transparent hover:border-red-300">
                                <div class="flex items-center gap-2">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 18a6 6 0 00-6 6h12a6 6 0 00-6-6z"/>
                                    </svg>
                                    Dashboard
                                </div>
                            </a>
                            <a href="{{ route('profile.show') }}" class="px-4 py-2 bg-red-700 text-white rounded-lg font-semibold shadow-lg hover:shadow-xl transform hover:scale-105 transition-all duration-300 border-2 border-transparent hover:border-red-300">
                                <div class="flex items-center gap-2">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.636 18.364a9 9 0 010-12.728m12.728 0a9 9 0 010 12.728m-9.9-2.829a5 5 0 010-7.07m7.072 0a5 5 0 010 7.07M13 12a1 1 0 11-2 0 1 1 0 012 0z"/>
                                    </svg>
                                    Profile
                                </div>
                            </a>
                            <form method="POST" action="{{ route('logout') }}" class="inline">
                                @csrf
                                <button type="submit" class="px-4 py-2 bg-transparent text-red-100 rounded-lg font-semibold hover:text-white hover:bg-red-700 hover:bg-opacity-50 transition-all duration-300 border-2 border-red-300 border-opacity-50 hover:border-opacity-100 transform hover:scale-105">
                                    <div class="flex items-center gap-2">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/>
                                        </svg>
                                        Log out
                                    </div>
                                </button>
                            </form>
                        @else
                            <a href="/login" class="px-4 py-2 bg-transparent text-red-100 rounded-lg font-semibold hover:text-white hover:bg-red-700 hover:bg-opacity-50 transition-all duration-300 border-2 border-red-300 border-opacity-50 hover:border-opacity-100 transform hover:scale-105">
                                <div class="flex items-center gap-2">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"/>
                                    </svg>
                                    Login
                                </div>
                            </a>
                            <a href="/register" class="px-4 py-2 bg-white text-red-900 rounded-lg font-semibold shadow-lg hover:shadow-xl transform hover:scale-105 transition-all duration-300 border-2 border-transparent hover:border-red-300">
                                <div class="flex items-center gap-2">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"/>
                                    </svg>
                                    Register
                                </div>
                            </a>
                        @endauth
                    </div>

                    <!-- Mobile menu button -->
                    <div class="md:hidden flex items-center">
                        <button @click="open = !open" class="text-blue-100 hover:text-white focus:outline-none focus:text-white transition-colors duration-200" aria-label="Main menu" aria-expanded="false">
                            <svg x-show="!open" class="h-8 w-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                            </svg>
                            <svg x-show="open" class="h-8 w-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                            </svg>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Mobile Navigation -->
            <div x-show="open" x-transition:enter="transition ease-out duration-300 transform" x-transition:enter-start="opacity-0 translate-y-1" x-transition:enter-end="opacity-100 translate-y-0" x-transition:leave="transition ease-in duration-300 transform" x-transition:leave-start="opacity-100 translate-y-0" x-transition:leave-end="opacity-0 translate-y-1" class="md:hidden bg-gradient-to-b from-red-800 to-red-900 border-t border-red-700 shadow-xl">
                <div class="px-2 pt-2 pb-3 space-y-1 sm:px-3">
                    @foreach([
                        '/' => ['Home', 'M3 12h18'],
                        '/services' => ['Services', 'M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z'],
                        '/products' => ['Products', 'M20 12H4'],
                        '/about' => ['About', 'M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 18a6 6 0 00-6 6h12a6 6 0 00-6-6z'],
                        '/contact' => ['Contact', 'M3 8l7.89 7.89a2.032 2.032 0 002.83 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z'],
                        route('appointments.book') => ['Book Appointment', 'M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z']
                    ] as $route => $item)
                        <a href="{{ $route }}" class="flex items-center gap-3 px-3 py-3 rounded-lg text-base font-medium text-red-100 hover:text-white hover:bg-red-700 hover:bg-opacity-50 transition-all duration-300 transform hover:scale-105 border-l-4 border-transparent hover:border-red-400">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $item[1] }}"/>
                            </svg>
                            {{ $item[0] }}
                        </a>
                    @endforeach
                </div>
                <div class="pt-4 pb-3 border-t border-red-700">
                    <div class="px-2 space-y-1">
                        @auth
                            <a href="{{ route('dashboard') }}" class="flex items-center gap-3 px-3 py-3 rounded-lg text-base font-medium text-red-100 hover:text-white hover:bg-red-700 hover:bg-opacity-50 transition-all duration-300 transform hover:scale-105 border-l-4 border-transparent hover:border-red-400">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 18a6 6 0 00-6 6h12a6 6 0 00-6-6z"/>
                                </svg>
                                Dashboard
                            </a>
                            <a href="{{ route('profile.show') }}" class="flex items-center gap-3 px-3 py-3 rounded-lg text-base font-medium text-red-100 hover:text-white hover:bg-red-700 hover:bg-opacity-50 transition-all duration-300 transform hover:scale-105 border-l-4 border-transparent hover:border-red-400">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.636 18.364a9 9 0 010-12.728m12.728 0a9 9 0 010 12.728m-9.9-2.829a5 5 0 010-7.07m7.072 0a5 5 0 010 7.07M13 12a1 1 0 11-2 0 1 1 0 012 0z"/>
                                </svg>
                                Profile
                            </a>
                            <form method="POST" action="{{ route('logout') }}" class="inline w-full">
                                @csrf
                                <button type="submit" class="w-full flex items-center gap-3 px-3 py-3 rounded-lg text-base font-medium text-red-100 hover:text-white hover:bg-red-700 hover:bg-opacity-50 transition-all duration-300 transform hover:scale-105 border-l-4 border-transparent hover:border-red-400">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/>
                                    </svg>
                                    Log out
                                </button>
                            </form>
                        @else
                            <a href="/login" class="flex items-center gap-3 px-3 py-3 rounded-lg text-base font-medium text-red-100 hover:text-white hover:bg-red-700 hover:bg-opacity-50 transition-all duration-300 transform hover:scale-105 border-l-4 border-transparent hover:border-red-400">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"/>
                                </svg>
                                Login
                            </a>
                            <a href="/register" class="flex items-center gap-3 px-3 py-3 rounded-lg text-base font-medium text-red-100 hover:text-white hover:bg-red-700 hover:bg-opacity-50 transition-all duration-300 transform hover:scale-105 border-l-4 border-transparent hover:border-red-400">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"/>
                                </svg>
                                Register
                            </a>
                        @endauth
                    </div>
                </div>
            </div>
        </nav>

        <div class="font-sans text-gray-900 antialiased flex-1">
            {{ $slot }}
        </div>

        <!-- Footer -->
        <footer class="relative bg-gradient-to-br from-red-900 via-red-800 to-yellow-600 text-white mt-auto overflow-hidden">
            <!-- Background Pattern -->
            <div class="absolute inset-0 bg-gradient-to-br from-red-500/10 to-yellow-400/10"></div>
            <div class="absolute top-0 left-1/4 w-96 h-96 bg-red-200 rounded-full mix-blend-multiply dark:opacity-20 dark:invert animate-blob"></div>
            <div class="absolute bottom-0 right-1/4 w-96 h-96 bg-yellow-200 rounded-full mix-blend-multiply dark:opacity-20 dark:invert animate-blob animation-delay-2000"></div>

            <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
                <!-- Footer Grid Layout -->
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                    
                    <!-- Company Info -->
                    <div class="lg:col-span-1">
                        <div class="flex items-center gap-4 mb-6">
                            <div class="w-12 h-12 bg-white bg-opacity-20 rounded-full flex items-center justify-center backdrop-blur-sm">
                                <svg class="w-6 h-6 text-yellow-300" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z"/>
                                </svg>
                            </div>
                            <div>
                                <h3 class="text-xl font-bold text-white">Padmasiri Auto</h3>
                                <p class="text-red-200 text-sm">Electricals & Services</p>
                            </div>
                        </div>
                        <p class="text-red-100 mb-6 leading-relaxed">Your trusted partner for premium automotive electrical services with over a decade of excellence and customer satisfaction.</p>
                        
                        <!-- Contact Info -->
                        <div class="space-y-3">
                            <div class="flex items-center text-red-100">
                                <svg class="w-4 h-4 mr-3 text-yellow-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                                </svg>
                                <span class="text-sm">077 785 1734</span>
                            </div>
                            <div class="flex items-center text-red-100">
                                <svg class="w-4 h-4 mr-3 text-yellow-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 7.89a2.032 2.032 0 002.83 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                                </svg>
                                <span class="text-sm">nihalpathmasiri564@gmail.com</span>
                            </div>
                            <div class="flex items-start text-red-100">
                                <svg class="w-4 h-4 mr-3 mt-1 text-yellow-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                                </svg>
                                <span class="text-sm">441/11/B, High Level Road, Gangodawila, Nugegoda, Sri Lanka</span>
                            </div>
                        </div>
                    </div>

                    <!-- Quick Links -->
                    <div class="lg:col-span-1">
                        <h4 class="text-lg font-semibold mb-6 text-white">Quick Links</h4>
                        <div class="space-y-4">
                            @foreach([
                                '/' => ['Home', 'M3 12h18'],
                                '/services' => ['Services', 'M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z'],
                                '/products' => ['Products', 'M20 12H4'],
                                '/about' => ['About Us', 'M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 18a6 6 0 00-6 6h12a6 6 0 00-6-6z'],
                                '/contact' => ['Contact', 'M3 8l7.89 7.89a2.032 2.032 0 002.83 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z']
                            ] as $route => $item)
                                <a href="{{ $route }}" class="flex items-center gap-3 text-red-100 hover:text-white hover:bg-white hover:bg-opacity-10 px-3 py-2 rounded-lg transition-all duration-300 transform hover:translate-x-2">
                                    <svg class="w-4 h-4 text-yellow-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $item[1] }}"/>
                                    </svg>
                                    {{ $item[0] }}
                                </a>
                            @endforeach
                        </div>
                    </div>

                    <!-- Services -->
                    <div class="lg:col-span-1">
                        <h4 class="text-lg font-semibold mb-6 text-white">Our Services</h4>
                        <div class="space-y-3">
                            <div class="text-red-100 hover:text-white transition-colors duration-300 cursor-pointer group">
                                <div class="flex items-center gap-3">
                                    <div class="w-2 h-2 bg-yellow-400 rounded-full group-hover:bg-white transition-colors duration-300"></div>
                                    <span class="text-sm">Electrical Diagnostics</span>
                                </div>
                            </div>
                            <div class="text-red-100 hover:text-white transition-colors duration-300 cursor-pointer group">
                                <div class="flex items-center gap-3">
                                    <div class="w-2 h-2 bg-yellow-400 rounded-full group-hover:bg-white transition-colors duration-300"></div>
                                    <span class="text-sm">Battery & Charging</span>
                                </div>
                            </div>
                            <div class="text-red-100 hover:text-white transition-colors duration-300 cursor-pointer group">
                                <div class="flex items-center gap-3">
                                    <div class="w-2 h-2 bg-yellow-400 rounded-full group-hover:bg-white transition-colors duration-300"></div>
                                    <span class="text-sm">Lighting & Wiring</span>
                                </div>
                            </div>
                            <div class="text-red-100 hover:text-white transition-colors duration-300 cursor-pointer group">
                                <div class="flex items-center gap-3">
                                    <div class="w-2 h-2 bg-yellow-400 rounded-full group-hover:bg-white transition-colors duration-300"></div>
                                    <span class="text-sm">Auto Electrical Repairs</span>
                                </div>
                            </div>
                            <div class="text-red-100 hover:text-white transition-colors duration-300 cursor-pointer group">
                                <div class="flex items-center gap-3">
                                    <div class="w-2 h-2 bg-yellow-400 rounded-full group-hover:bg-white transition-colors duration-300"></div>
                                    <span class="text-sm">Vehicle Maintenance</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Newsletter & Social -->
                    <div class="lg:col-span-1">
                        <h4 class="text-lg font-semibold mb-6 text-white">Stay Connected</h4>
                        
                        <!-- Newsletter -->
                        <div class="mb-6">
                            <p class="text-red-100 text-sm mb-4">Subscribe to our newsletter for updates and special offers.</p>
                            <form class="space-y-3">
                                <div class="flex gap-2">
                                    <input type="email" placeholder="Your email address" class="flex-1 px-4 py-2 bg-white bg-opacity-20 border border-white border-opacity-30 rounded-lg text-white placeholder-red-200 focus:outline-none focus:ring-2 focus:ring-yellow-400 focus:border-transparent transition-all duration-300" />
                                    <button type="submit" class="px-4 py-2 bg-yellow-500 text-red-900 rounded-lg font-semibold hover:bg-yellow-400 transform hover:scale-105 transition-all duration-300 shadow-lg">
                                        <svg class="w-4 h-4 inline-block mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"/>
                                        </svg>
                                        Subscribe
                                    </button>
                                </div>
                                <p class="text-xs text-red-200">We respect your privacy. Unsubscribe at any time.</p>
                            </form>
                        </div>

                        <!-- Social Media -->
                        <div class="space-y-4">
                            <p class="text-red-100 text-sm mb-3">Follow us on social media</p>
                            <div class="flex space-x-4">
                                <a href="https://www.facebook.com/p/Pathmasiri-Auto-Electricals-100070348595411/" target="_blank" class="w-10 h-10 bg-white bg-opacity-20 rounded-full flex items-center justify-center hover:bg-opacity-30 transform hover:scale-110 transition-all duration-300 group">
                                    <svg class="w-5 h-5 text-white group-hover:text-yellow-300 transition-colors duration-300" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z"/>
                                    </svg>
                                </a>
                                <a href="#" class="w-10 h-10 bg-white bg-opacity-20 rounded-full flex items-center justify-center hover:bg-opacity-30 transform hover:scale-110 transition-all duration-300 group">
                                    <svg class="w-5 h-5 text-white group-hover:text-yellow-300 transition-colors duration-300" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M8.29 20.251c7.547 0 11.675-6.253 11.675-11.675 0-.178 0-.355-.012-.53A8.348 8.348 0 0022 5.92a8.19 8.19 0 01-2.357.646 4.118 4.118 0 001.804-2.27 8.224 8.224 0 01-2.605.996 4.107 4.107 0 00-6.993 3.743 11.65 11.65 0 01-8.457-4.287 4.106 4.106 0 001.274 5.477A4.072 4.072 0 012.8 9.713v.052a4.105 4.105 0 003.292 4.022 4.095 4.095 0 01-1.853.07 4.108 4.108 0 003.834 2.85A8.233 8.233 0 012 18.407a11.616 11.616 0 006.29 1.84"/>
                                    </svg>
                                </a>
                                <a href="#" class="w-10 h-10 bg-white bg-opacity-20 rounded-full flex items-center justify-center hover:bg-opacity-30 transform hover:scale-110 transition-all duration-300 group">
                                    <svg class="w-5 h-5 text-white group-hover:text-yellow-300 transition-colors duration-300" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.24-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/>
                                    </svg>
                                </a>
                                <a href="#" class="w-10 h-10 bg-white bg-opacity-20 rounded-full flex items-center justify-center hover:bg-opacity-30 transform hover:scale-110 transition-all duration-300 group">
                                    <svg class="w-5 h-5 text-white group-hover:text-yellow-300 transition-colors duration-300" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z"/>
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Footer Bottom -->
                <div class="border-t border-red-400 border-opacity-30 mt-8 pt-8">
                    <div class="flex flex-col md:flex-row justify-between items-center space-y-4 md:space-y-0">
                        <div class="text-red-200 text-sm">
                            &copy; {{ date('Y') }} Padmasiri Auto Electricals. All rights reserved.
                        </div>
                        
                        <div class="flex flex-col sm:flex-row gap-4 text-sm">
                            <a href="#" class="text-red-200 hover:text-white transition-colors duration-300">Privacy Policy</a>
                            <a href="#" class="text-red-200 hover:text-white transition-colors duration-300">Terms of Service</a>
                            <a href="#" class="text-red-200 hover:text-white transition-colors duration-300">Cookie Policy</a>
                            <a href="#" class="text-red-200 hover:text-white transition-colors duration-300">Sitemap</a>
                        </div>

                        <div class="flex items-center space-x-4 text-xs text-red-300">
                            <span>Trusted by 500+ customers</span>
                            <div class="flex space-x-1">
                                @for($i = 0; $i < 5; $i++)
                                    <svg class="w-3 h-3 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118l-2.8-2.034c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                    </svg>
                                @endfor
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>

        @livewireScripts
    </body>
</html>
