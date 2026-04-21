<x-app-layout>
    <style>
        /* Enhanced register form animations */
        .register-card {
            transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            transform: translateY(0) scale(1);
        }
        
        .register-card:hover {
            transform: translateY(-4px) scale(1.01);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15);
        }
        
        /* Enhanced button animations */
        .register-cta {
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }
        
        .register-cta::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.2), transparent);
            transition: left 0.5s;
        }
        
        .register-cta:hover::before {
            left: 100%;
        }
        
        /* Floating elements for depth */
        .floating-element {
            animation: float 6s ease-in-out infinite;
        }
        
        .floating-element:nth-child(2) {
            animation-delay: 2s;
        }
        
        .floating-element:nth-child(3) {
            animation-delay: 4s;
        }
        
        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-10px); }
        }
        
        /* Enhanced input animations */
        .register-input:focus {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(255, 193, 7, 0.2);
        }
        
        /* Logo animation */
        .logo-container {
            animation: logoFloat 4s ease-in-out infinite;
        }
        
        @keyframes logoFloat {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-5px); }
        }
    </style>

    <!-- Hero Section -->
    <section class="relative bg-gradient-to-br from-red-900 via-red-800 to-red-600 text-white min-h-[50vh] overflow-hidden">
        <!-- Animated background elements -->
        <div class="absolute inset-0 overflow-hidden">
            <div class="absolute top-0 left-0 w-64 h-64 bg-red-500 rounded-full mix-blend-multiply dark:opacity-20 dark:invert animate-blob"></div>
            <div class="absolute top-0 right-0 w-64 h-64 bg-yellow-300 rounded-full mix-blend-multiply dark:opacity-20 dark:invert animate-blob animation-delay-2000"></div>
            <div class="absolute bottom-0 left-1/3 w-64 h-64 bg-red-300 rounded-full mix-blend-multiply dark:opacity-20 dark:invert animate-blob animation-delay-4000"></div>
        </div>

        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12 md:py-16 flex flex-col md:flex-row items-center justify-between">
            <!-- Left side - Text content -->
            <div class="md:w-1/2 mb-8 md:mb-0 md:pr-8 z-10">
                <div class="mb-4">
                    <span class="inline-flex items-center px-3 py-1.5 rounded-full text-sm font-medium bg-white bg-opacity-20 text-white backdrop-blur-sm border border-white border-opacity-30">
                        <svg class="w-3 h-3 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16V6a1 1 0 00-1-1H4a1 1 0 00-1 1v10a1 1 0 001 1h1m8-1a1 1 0 01-1 1H9m4-1V8a1 1 0 011-1h2.586a1 1 0 01.707.293l3.414 3.414a1 1 0 01.293.707V16a1 1 0 01-1 1h-1m-6-1a1 1 0 001 1h1M5 17a2 2 0 104 0m-4 0a2 2 0 114 0m6 0a2 2 0 104 0m-4 0a2 2 0 114 0"/>
                        </svg>
                        Join Our Community
                    </span>
                </div>
                
                <h1 class="text-4xl md:text-5xl font-extrabold mb-4 leading-tight">
                    <span class="block">Create Your</span>
                    <span class="block text-yellow-300">Account</span>
                </h1>
                
                <p class="text-base md:text-lg text-red-100 mb-6 leading-relaxed max-w-md">
                    Join hundreds of satisfied customers who trust us with their vehicle's electrical needs. Get started with fast, reliable service today.
                </p>
                
                <div class="flex flex-col sm:flex-row gap-3">
                    <a href="/" class="inline-flex items-center px-6 py-3 bg-white text-red-900 rounded-full shadow-lg font-bold text-base hover:bg-gray-100 transform hover:scale-105 transition-all duration-300 hover:shadow-xl">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
                        </svg>
                        Back to Home
                    </a>
                    <a href="/login" class="inline-flex items-center px-6 py-3 border-2 border-white border-opacity-50 text-white rounded-full font-bold text-base hover:bg-white hover:text-red-900 transform hover:scale-105 transition-all duration-300 backdrop-blur-sm">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"/>
                        </svg>
                        Already Registered?
                    </a>
                </div>
            </div>
            
            <!-- Right side - Registration Form -->
            <div class="md:w-1/2 z-10 flex justify-center md:justify-end">
                <div class="register-card bg-gradient-to-br from-white to-gray-50 rounded-2xl shadow-lg p-8 w-full max-w-md border border-gray-100">
                    <div class="logo-container mb-6 text-center">
                        <a href="/" class="flex items-center justify-center gap-3">
                            <div class="w-12 h-12 bg-gradient-to-br from-red-600 to-yellow-500 rounded-full flex items-center justify-center shadow-lg">
                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                                </svg>
                            </div>
                            <span class="text-xl font-bold text-red-900">Padmasiri Auto Electricals</span>
                        </a>
                    </div>

                    <h2 class="text-2xl font-bold text-red-900 mb-6 text-center">Join Our Community</h2>

                    <x-validation-errors class="mb-4" />

                    <form method="POST" action="{{ route('register') }}" class="space-y-6">
                        @csrf

                        <div>
                            <label for="name" class="block text-sm font-semibold text-gray-800 mb-2">Full Name</label>
                            <input id="name" class="w-full px-4 py-3 bg-white border border-gray-200 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-red-500 transition-all duration-300 register-input" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" placeholder="Enter your full name" />
                        </div>

                        <div>
                            <label for="email" class="block text-sm font-semibold text-gray-800 mb-2">Email Address</label>
                            <input id="email" class="w-full px-4 py-3 bg-white border border-gray-200 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-red-500 transition-all duration-300 register-input" type="email" name="email" :value="old('email')" required autocomplete="username" placeholder="Enter your email address" />
                        </div>

                        <div>
                            <label for="password" class="block text-sm font-semibold text-gray-800 mb-2">Password</label>
                            <input id="password" class="w-full px-4 py-3 bg-white border border-gray-200 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-red-500 transition-all duration-300 register-input" type="password" name="password" required autocomplete="new-password" placeholder="Create a strong password" />
                        </div>

                        <div>
                            <label for="password_confirmation" class="block text-sm font-semibold text-gray-800 mb-2">Confirm Password</label>
                            <input id="password_confirmation" class="w-full px-4 py-3 bg-white border border-gray-200 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-red-500 transition-all duration-300 register-input" type="password" name="password_confirmation" required autocomplete="new-password" placeholder="Confirm your password" />
                        </div>

                        <div>
                            <label for="mobile_number" class="block text-sm font-semibold text-gray-800 mb-2">Mobile Number</label>
                            <input id="mobile_number" class="w-full px-4 py-3 bg-white border border-gray-200 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-red-500 transition-all duration-300 register-input" type="text" name="mobile_number" :value="old('mobile_number')" required autocomplete="tel" placeholder="+94 XX XXX XXXX" />
                        </div>

                        <div>
                            <label for="address" class="block text-sm font-semibold text-gray-800 mb-2">Address</label>
                            <input id="address" class="w-full px-4 py-3 bg-white border border-gray-200 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-red-500 transition-all duration-300 register-input" type="text" name="address" :value="old('address')" required autocomplete="address" placeholder="Enter your address" />
                        </div>

                        @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                            <div class="flex items-start space-x-3">
                                <input id="terms" type="checkbox" name="terms" required class="w-4 h-4 text-red-600 border-gray-300 rounded focus:ring-red-500 mt-1" />
                                <label for="terms" class="text-sm text-gray-700">
                                    {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                            'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="text-red-600 hover:text-red-700 font-medium underline">'.__('Terms of Service').'</a>',
                                            'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="text-red-600 hover:text-red-700 font-medium underline">'.__('Privacy Policy').'</a>',
                                    ]) !!}
                                </label>
                            </div>
                        @endif

                        <div class="flex gap-4">
                            <button type="submit" class="flex-1 register-cta bg-gradient-to-r from-red-600 to-yellow-500 text-white px-6 py-3 rounded-lg font-bold text-base hover:from-red-700 hover:to-yellow-600 transform hover:scale-105 transition-all duration-300 shadow-lg">
                                <svg class="w-4 h-4 mr-2 inline" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"/>
                                </svg>
                                Create Account
                            </button>
                        </div>
                    </form>

                    <!-- Benefits Section -->
                    <div class="mt-6 p-4 bg-gradient-to-r from-red-50 to-yellow-50 border border-red-200 rounded-lg">
                        <h4 class="text-sm font-semibold text-red-900 mb-2">Why Join Us?</h4>
                        <ul class="space-y-1 text-sm text-red-800">
                            <li class="flex items-center">
                                <svg class="w-3 h-3 text-red-600 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                </svg>
                                Book appointments online
                            </li>
                            <li class="flex items-center">
                                <svg class="w-3 h-3 text-red-600 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                </svg>
                                Track service history
                            </li>
                            <li class="flex items-center">
                                <svg class="w-3 h-3 text-red-600 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                </svg>
                                Receive exclusive offers
                            </li>
                            <li class="flex items-center">
                                <svg class="w-3 h-3 text-red-600 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                </svg>
                                Priority customer support
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Floating elements for depth -->
        <div class="absolute bottom-0 left-0 right-0 h-20 bg-gradient-to-t from-red-900 to-transparent"></div>
    </section>
</x-app-layout>
