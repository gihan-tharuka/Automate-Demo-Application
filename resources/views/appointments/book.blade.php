<x-app-layout>
    <style>
        /* Enhanced appointment form animations */
        .form-card {
            transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            transform: translateY(0) scale(1);
        }
        
        .form-card:hover {
            transform: translateY(-4px) scale(1.01);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15);
        }
        
        /* Enhanced button animations */
        .form-cta {
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }
        
        .form-cta::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.2), transparent);
            transition: left 0.5s;
        }
        
        .form-cta:hover::before {
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
        .form-input:focus {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(255, 193, 7, 0.2);
        }
        
        /* Checkbox animations */
        .service-checkbox:checked + span {
            transform: scale(1.05);
            color: #d35400;
            font-weight: bold;
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
                        Expert Auto Electrical Service
                    </span>
                </div>
                
                <h1 class="text-4xl md:text-5xl font-extrabold mb-4 leading-tight">
                    <span class="block">Book an</span>
                    <span class="block text-yellow-300">Appointment</span>
                </h1>
                
                <p class="text-base md:text-lg text-red-100 mb-6 leading-relaxed max-w-md">
                    Schedule your vehicle's electrical service with our expert technicians. 
                    Fast, reliable service for all your automotive electrical needs in Sri Lanka.
                </p>
            </div>
            
            <!-- Right side - Buttons -->
            <div class="md:w-1/2 z-10 flex justify-center md:justify-end">
                <div class="flex flex-col sm:flex-row gap-3">
                    <a href="/contact" class="inline-flex items-center px-6 py-3 bg-white text-red-900 rounded-full shadow-lg font-bold text-base hover:bg-gray-100 transform hover:scale-105 transition-all duration-300 hover:shadow-xl">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 7.89a2.032 2.032 0 002.83 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                        </svg>
                        Contact Us
                    </a>
                    <a href="/services" class="inline-flex items-center px-6 py-3 border-2 border-white border-opacity-50 text-white rounded-full font-bold text-base hover:bg-white hover:text-red-900 transform hover:scale-105 transition-all duration-300 backdrop-blur-sm">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                        </svg>
                        Our Services
                    </a>
                </div>
            </div>
        </div>
        
        <!-- Floating elements for depth -->
        <div class="absolute bottom-0 left-0 right-0 h-20 bg-gradient-to-t from-red-900 to-transparent"></div>
    </section>

    <!-- Booking Form Section -->
    <section class="max-w-4xl mx-auto px-4 py-16">
        <div class="form-card bg-gradient-to-br from-white to-gray-50 rounded-2xl shadow-lg p-8 border border-gray-100">
            <h2 class="text-2xl font-bold text-red-900 mb-6 flex items-center">
                <svg class="w-5 h-5 mr-3 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                </svg>
                Appointment Details
            </h2>

            @guest
                <div class="mb-6 p-4 bg-gradient-to-r from-red-50 to-yellow-50 border border-red-200 rounded-lg">
                    <p class="text-red-900 font-medium mb-2">Please log in to book an appointment</p>
                    <p class="text-red-800 text-sm mb-3">You need to be logged in to submit an appointment request.</p>
                    <div class="flex flex-col sm:flex-row gap-3">
                        <a href="/login" class="inline-flex items-center justify-center px-6 py-3 bg-red-600 text-white rounded-full font-bold hover:bg-red-700 transform hover:scale-105 transition-all duration-300 shadow-lg">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"/>
                            </svg>
                            Log In
                        </a>
                        <a href="/register" class="inline-flex items-center justify-center px-6 py-3 border-2 border-red-600 text-red-600 rounded-full font-bold hover:bg-red-600 hover:text-white transform hover:scale-105 transition-all duration-300">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"/>
                            </svg>
                            Register
                        </a>
                    </div>
                </div>
            @endguest

            @if(session('success'))
                <div class="mb-4 p-4 bg-gradient-to-r from-green-50 to-emerald-50 border border-green-200 rounded-lg">
                    <div class="flex items-center">
                        <svg class="w-5 h-5 text-green-600 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                        </svg>
                        <span class="text-green-800 font-medium">{{ session('success') }}</span>
                    </div>
                </div>
            @endif

            @if ($errors->any())
                <div class="mb-4 p-4 bg-gradient-to-r from-red-50 to-pink-50 border border-red-200 rounded-lg">
                    <div class="flex items-start">
                        <svg class="w-5 h-5 text-red-600 mr-3 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                        <div>
                            <p class="text-red-800 font-medium mb-2">Please check the following errors:</p>
                            <ul class="list-disc list-inside text-red-700 space-y-1">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            @endif

            <form action="{{ route('appointments.store') }}" method="POST" class="space-y-6">
                @csrf

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="customer_name" class="block text-sm font-semibold text-gray-800 mb-2">Full Name *</label>
                        <input
                            type="text"
                            name="customer_name"
                            id="customer_name"
                            value="{{ old('customer_name', auth()->check() ? auth()->user()->name : '') }}"
                            class="w-full px-4 py-3 bg-white border border-gray-200 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-red-500 transition-all duration-300 form-input"
                            placeholder="Enter your full name"
                            required
                            @guest disabled @endguest
                        >
                    </div>

                    <div>
                        <label for="customer_email" class="block text-sm font-semibold text-gray-800 mb-2">Email Address *</label>
                        <input
                            type="email"
                            name="customer_email"
                            id="customer_email"
                            value="{{ old('customer_email', auth()->check() ? auth()->user()->email : '') }}"
                            class="w-full px-4 py-3 bg-white border border-gray-200 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-red-500 transition-all duration-300 form-input"
                            placeholder="Enter your email address"
                            required
                            @guest disabled @endguest
                        >
                    </div>

                    <div>
                        <label for="customer_phone" class="block text-sm font-semibold text-gray-800 mb-2">Phone Number *</label>
                        <input
                            type="tel"
                            name="customer_phone"
                            id="customer_phone"
                            value="{{ old('customer_phone') }}"
                            class="w-full px-4 py-3 bg-white border border-gray-200 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-red-500 transition-all duration-300 form-input"
                            placeholder="+94 XX XXX XXXX"
                            required
                            @guest disabled @endguest
                        >
                    </div>

                    <div class="md:col-span-2">
                        <label class="block text-sm font-semibold text-gray-800 mb-3">Service Types Needed *</label>
                        <div class="grid grid-cols-2 md:grid-cols-3 gap-3">
                            @php
                                $services = [
                                    'Battery Service',
                                    'Alternator Service',
                                    'Starter Motor Service',
                                    'Wiring & Harness',
                                    'Lighting System',
                                    'Ignition System',
                                    'ECU Diagnostics',
                                    'AC Electrical',
                                    'Audio System',
                                    'General Inspection'
                                ];
                                $oldServices = old('service_type', []);
                            @endphp
                            @foreach($services as $service)
                                <label class="flex items-center space-x-3 p-3 bg-white border border-gray-200 rounded-lg cursor-pointer hover:border-red-300 transition-all duration-300 group">
                                    <input
                                        type="checkbox"
                                        name="service_type[]"
                                        value="{{ $service }}"
                                        {{ in_array($service, $oldServices) ? 'checked' : '' }}
                                        class="w-4 h-4 text-red-600 border-gray-300 rounded service-checkbox focus:ring-red-500"
                                        @guest disabled @endguest
                                    >
                                    <span class="text-sm font-medium text-gray-700 group-hover:text-red-600 transition-colors duration-300">{{ $service }}</span>
                                </label>
                            @endforeach
                        </div>
                        @error('service_type')
                            <p class="mt-2 text-sm text-red-600 flex items-center">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    <div>
                        <label for="appointment_date" class="block text-sm font-semibold text-gray-800 mb-2">Preferred Date *</label>
                        <input
                            type="date"
                            name="appointment_date"
                            id="appointment_date"
                            value="{{ old('appointment_date') }}"
                            min="{{ date('Y-m-d') }}"
                            class="w-full px-4 py-3 bg-white border border-gray-200 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-red-500 transition-all duration-300 form-input"
                            required
                            @guest disabled @endguest
                        >
                    </div>

                    <div>
                        <label for="appointment_time" class="block text-sm font-semibold text-gray-800 mb-2">Preferred Time *</label>
                        <input
                            type="time"
                            name="appointment_time"
                            id="appointment_time"
                            value="{{ old('appointment_time') }}"
                            class="w-full px-4 py-3 bg-white border border-gray-200 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-red-500 transition-all duration-300 form-input"
                            required
                            @guest disabled @endguest
                        >
                    </div>
                </div>

                <div>
                    <label for="notes" class="block text-sm font-semibold text-gray-800 mb-2">Additional Notes</label>
                    <textarea
                        name="notes"
                        id="notes"
                        rows="4"
                        class="w-full px-4 py-3 bg-white border border-gray-200 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-red-500 transition-all duration-300 form-input"
                        placeholder="Please provide details about your vehicle (make, model, year), specific electrical issues, or any other information that would help us serve you better..."
                        @guest disabled @endguest
                    >{{ old('notes') }}</textarea>
                </div>

                <div class="flex gap-4">
                    @auth
                        <button
                            type="submit"
                            class="flex-1 form-cta bg-gradient-to-r from-red-600 to-yellow-500 text-white px-8 py-4 rounded-lg font-bold text-base hover:from-red-700 hover:to-yellow-600 transform hover:scale-105 transition-all duration-300 shadow-lg"
                        >
                            <svg class="w-5 h-5 mr-2 inline" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-3m-1 4l-3 3m0 0l-3-3m3 3V4"/>
                            </svg>
                            Book Appointment
                        </button>
                        <a
                            href="/dashboard"
                            class="flex-1 form-cta bg-white text-red-900 border-2 border-red-900 px-8 py-4 rounded-lg font-bold text-base hover:bg-red-900 hover:text-white transform hover:scale-105 transition-all duration-300 text-center"
                        >
                            <svg class="w-5 h-5 mr-2 inline" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 8v8m-4-5v5m-4-2v2m-2 4h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                            </svg>
                            View My Appointments
                        </a>
                    @endauth
                </div>
            </form>
        </div>

        <!-- Enhanced Info Box -->
        <div class="mt-8 bg-gradient-to-r from-red-50 to-yellow-50 border border-red-200 rounded-2xl p-8">
            <div class="flex items-start space-x-4">
                <div class="flex-shrink-0">
                    <div class="w-12 h-12 bg-red-100 rounded-full flex items-center justify-center">
                        <svg class="w-6 h-6 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                    </div>
                </div>
                <div class="flex-1">
                    <h3 class="text-lg font-bold text-red-900 mb-3">Important Information:</h3>
                    <ul class="space-y-2 text-red-800">
                        <li class="flex items-start">
                            <span class="w-2 h-2 bg-red-600 rounded-full mt-2 mr-3 flex-shrink-0"></span>
                            <span>Your appointment request will be reviewed and confirmed by our expert technicians</span>
                        </li>
                        <li class="flex items-start">
                            <span class="w-2 h-2 bg-red-600 rounded-full mt-2 mr-3 flex-shrink-0"></span>
                            <span>You will receive a confirmation email within 24 hours</span>
                        </li>
                        <li class="flex items-start">
                            <span class="w-2 h-2 bg-red-600 rounded-full mt-2 mr-3 flex-shrink-0"></span>
                            <span>Please arrive 10 minutes before your scheduled time for efficient service</span>
                        </li>
                        <li class="flex items-start">
                            <span class="w-2 h-2 bg-red-600 rounded-full mt-2 mr-3 flex-shrink-0"></span>
                            <span>For urgent electrical issues, please call us directly for immediate assistance</span>
                        </li>
                        <li class="flex items-start">
                            <span class="w-2 h-2 bg-red-600 rounded-full mt-2 mr-3 flex-shrink-0"></span>
                            <span>We serve all vehicle makes and models with specialized electrical expertise</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

</x-app-layout>
