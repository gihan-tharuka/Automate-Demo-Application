<x-app-layout>
    <style>
        /* Enhanced animations for contact page */
        .contact-card {
            transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            transform: translateY(0) scale(1);
        }
        
        .contact-card:hover {
            transform: translateY(-8px) scale(1.02);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15);
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
        
        /* Enhanced form animations */
        .contact-input {
            transition: all 0.3s ease;
            position: relative;
        }
        
        .contact-input:focus-within {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(255, 0, 0, 0.15);
        }
        
        .contact-input input,
        .contact-input select,
        .contact-input textarea {
            transition: all 0.3s ease;
        }
        
        .contact-input input:focus,
        .contact-input select:focus,
        .contact-input textarea:focus {
            border-color: #ef4444;
            box-shadow: 0 0 0 3px rgba(239, 68, 68, 0.1);
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
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 7.89a2.032 2.032 0 002.83 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                        </svg>
                        Get in Touch
                    </span>
                </div>
                
                <h1 class="text-4xl md:text-5xl font-extrabold mb-4 leading-tight">
                    <span class="block">Contact</span>
                    <span class="block text-yellow-300">Padmasiri Auto Electricals</span>
                </h1>
                
                <p class="text-base md:text-lg text-red-100 mb-6 leading-relaxed max-w-md">
                    We're here to help with all your automotive needs. Reach out to us for expert electrical repairs and exceptional service.
                </p>
            </div>
            
            <!-- Right side - Contact Icon -->
            <div class="md:w-1/2 z-10 flex justify-center md:justify-end">
                <div class="relative floating-element">
                    <div class="absolute -inset-1 bg-gradient-to-r from-red-600 to-yellow-500 rounded-2xl blur opacity-75"></div>
                    <div class="relative bg-white bg-opacity-10 backdrop-blur-lg rounded-2xl p-8 shadow-2xl">
                        <svg class="w-24 h-24 mx-auto text-yellow-300" fill="none" stroke="currentColor" stroke-width="1" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3 8l7.89 7.89a2.032 2.032 0 002.83 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                        </svg>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Floating elements for depth -->
        <div class="absolute bottom-0 left-0 right-0 h-20 bg-gradient-to-t from-red-900 to-transparent"></div>
    </section>

    <!-- Contact Information Section -->
    <section class="max-w-7xl mx-auto px-4 py-20">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
            <!-- Contact Form -->
            <div class="contact-card group bg-white rounded-2xl shadow-lg p-8 hover:shadow-2xl border border-red-100">
                <div class="relative overflow-hidden mb-6">
                    <div class="absolute inset-0 bg-gradient-to-br from-red-100 to-yellow-100 rounded-lg opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                    <h2 class="relative text-2xl font-bold text-red-900 mb-2 flex items-center">
                        <svg class="w-6 h-6 mr-3 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 7.89a2.032 2.032 0 002.83 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                        </svg>
                        Send Us a Message
                    </h2>
                    <p class="text-gray-600">We'll get back to you within 24 hours</p>
                </div>
                
                @if(session('success'))
                    <div class="mb-6 p-4 bg-green-100 text-green-800 rounded-lg border border-green-200">
                        <div class="flex items-center">
                            <svg class="w-5 h-5 mr-2 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                            </svg>
                            {{ session('success') }}
                        </div>
                    </div>
                @endif
                
                <form action="{{ route('contact.store') }}" method="POST" class="space-y-6">
                    @csrf
                    <div class="contact-input">
                        <label for="name" class="block text-sm font-medium text-gray-700 mb-2">Your Name</label>
                        <input type="text" name="name" id="name" class="w-full px-4 py-3 border border-gray-200 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-red-500 transition-all duration-300 hover:border-red-300">
                    </div>
                    
                    <div class="contact-input">
                        <label for="email" class="block text-sm font-medium text-gray-700 mb-2">Email Address</label>
                        <input type="email" name="email" id="email" class="w-full px-4 py-3 border border-gray-200 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-red-500 transition-all duration-300 hover:border-red-300">
                    </div>
                    
                    <div class="contact-input">
                        <label for="phone" class="block text-sm font-medium text-gray-700 mb-2">Phone Number</label>
                        <input type="tel" name="phone" id="phone" class="w-full px-4 py-3 border border-gray-200 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-red-500 transition-all duration-300 hover:border-red-300">
                    </div>
                    
                    <div class="contact-input">
                        <label for="service" class="block text-sm font-medium text-gray-700 mb-2">Service Needed</label>
                        <select name="service" id="service" class="w-full px-4 py-3 border border-gray-200 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-red-500 transition-all duration-300 hover:border-red-300">
                            <option value="" selected disabled>Select a service</option>
                            <option value="engine">Engine Repair</option>
                            <option value="brake">Brake Service</option>
                            <option value="maintenance">Regular Maintenance</option>
                            <option value="electrical">Electrical Diagnosis</option>
                            <option value="other">Other (please specify)</option>
                        </select>
                    </div>
                    
                    <div class="contact-input">
                        <label for="message" class="block text-sm font-medium text-gray-700 mb-2">Your Message</label>
                        <textarea name="message" id="message" rows="5" class="w-full px-4 py-3 border border-gray-200 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-red-500 transition-all duration-300 hover:border-red-300 resize-none"></textarea>
                    </div>
                    
                    <div>
                        @auth
                            <button type="submit" class="w-full inline-flex items-center justify-center px-6 py-4 bg-gradient-to-r from-red-600 to-yellow-500 text-white rounded-lg font-bold text-base hover:from-red-700 hover:to-yellow-600 transform hover:scale-105 transition-all duration-300 shadow-lg group-hover:shadow-xl">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"/>
                                </svg>
                                Send Message
                            </button>
                        @else
                            <button type="button" class="w-full inline-flex items-center justify-center px-6 py-4 bg-gray-300 text-gray-500 rounded-lg font-bold text-base cursor-not-allowed opacity-60">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                                </svg>
                                Login Required
                            </button>
                            <div class="mt-4 text-center">
                                <span class="text-sm text-gray-600">Please</span>
                                <a href="{{ route('login') }}" class="ml-2 text-red-600 font-semibold hover:text-red-700 transition-colors duration-300">log in</a>
                                <span class="text-sm text-gray-600">to send us a message.</span>
                            </div>
                        @endauth
                    </div>
                </form>
            </div>
            
            <!-- Contact Information -->
            <div class="flex flex-col justify-between">
                <!-- Info Cards -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mb-8">
                    <!-- Location -->
                    <div class="contact-card group bg-white rounded-2xl shadow-lg p-6 hover:shadow-2xl border border-red-100">
                        <div class="relative overflow-hidden mb-4">
                            <div class="absolute inset-0 bg-gradient-to-br from-red-100 to-yellow-100 rounded-full opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                            <div class="relative flex items-center">
                                <div class="bg-red-100 w-12 h-12 rounded-full flex items-center justify-center mr-4 transform group-hover:scale-110 transition-transform duration-300">
                                    <svg class="w-6 h-6 text-red-700" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                                    </svg>
                                </div>
                                <div>
                                    <h3 class="text-lg font-bold text-red-900">Our Location</h3>
                                    <p class="text-sm text-gray-600">Visit us today</p>
                                </div>
                            </div>
                        </div>
                        <div class="space-y-2">
                            <p class="text-gray-700">441/11/B, High Level Road,</p>
                            <p class="text-gray-700">Gangodawila, Nugegoda,</p>
                            <p class="text-gray-700">Sri Lanka</p>
                        </div>
                    </div>
                    
                    <!-- Hours -->
                    <div class="contact-card group bg-white rounded-2xl shadow-lg p-6 hover:shadow-2xl border border-red-100">
                        <div class="relative overflow-hidden mb-4">
                            <div class="absolute inset-0 bg-gradient-to-br from-red-100 to-yellow-100 rounded-full opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                            <div class="relative flex items-center">
                                <div class="bg-red-100 w-12 h-12 rounded-full flex items-center justify-center mr-4 transform group-hover:scale-110 transition-transform duration-300">
                                    <svg class="w-6 h-6 text-red-700" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                    </svg>
                                </div>
                                <div>
                                    <h3 class="text-lg font-bold text-red-900">Business Hours</h3>
                                    <p class="text-sm text-gray-600">We're here when you need us</p>
                                </div>
                            </div>
                        </div>
                        <div class="space-y-2">
                            <div class="flex justify-between">
                                <span class="text-gray-700">Monday - Friday:</span>
                                <span class="font-semibold text-red-900">8:00 AM - 5:00 PM</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-gray-700">Saturday:</span>
                                <span class="font-semibold text-red-900">9:00 AM - 5:00 PM</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-gray-700">Sunday:</span>
                                <span class="font-semibold text-red-900">Closed</span>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Phone -->
                    <div class="contact-card group bg-white rounded-2xl shadow-lg p-6 hover:shadow-2xl border border-red-100">
                        <div class="relative overflow-hidden mb-4">
                            <div class="absolute inset-0 bg-gradient-to-br from-red-100 to-yellow-100 rounded-full opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                            <div class="relative flex items-center">
                                <div class="bg-red-100 w-12 h-12 rounded-full flex items-center justify-center mr-4 transform group-hover:scale-110 transition-transform duration-300">
                                    <svg class="w-6 h-6 text-red-700" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                                    </svg>
                                </div>
                                <div>
                                    <h3 class="text-lg font-bold text-red-900">Phone</h3>
                                    <p class="text-sm text-gray-600">Call us directly</p>
                                </div>
                            </div>
                        </div>
                        <div class="text-center">
                            <a href="tel:+94777851734" class="text-2xl font-bold text-red-900 hover:text-red-600 transition-colors duration-300">077 785 1734</a>
                        </div>
                    </div>
                    
                    <!-- Email -->
                    <div class="contact-card group bg-white rounded-2xl shadow-lg p-6 hover:shadow-2xl border border-red-100">
                        <div class="relative overflow-hidden mb-4">
                            <div class="absolute inset-0 bg-gradient-to-br from-red-100 to-yellow-100 rounded-full opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                            <div class="relative flex items-center">
                                <div class="bg-red-100 w-12 h-12 rounded-full flex items-center justify-center mr-4 transform group-hover:scale-110 transition-transform duration-300">
                                    <svg class="w-6 h-6 text-red-700" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                                    </svg>
                                </div>
                                <div>
                                    <h3 class="text-lg font-bold text-red-900">Email</h3>
                                    <p class="text-sm text-gray-600">Drop us a line</p>
                                </div>
                            </div>
                        </div>
                        <div class="text-center">
                            <a href="mailto:nihalpathmasiri564@gmail.com" class="text-lg font-semibold text-red-900 hover:text-red-600 transition-colors duration-300">nihalpathmasiri564@gmail.com</a>
                        </div>
                    </div>
                </div>
                
                <!-- Map -->
                <div class="contact-card group bg-white rounded-2xl shadow-lg p-4 h-80 flex items-center justify-center hover:shadow-2xl border border-red-100">
                    <div class="relative w-full h-full rounded-lg overflow-hidden">
                        <iframe 
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3961.2212992109066!2d79.9002!3d6.8640621999999984!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3ae25be1158756fb%3A0x2a015124bbddc453!2sPathmasiri%20Auto%20Electrical!5e0!3m2!1sen!2slk!4v1770186752610!5m2!1sen!2slk" 
                            width="100%" 
                            height="100%" 
                            style="border:0; border-radius: 0.5rem;" 
                            allowfullscreen="" 
                            loading="lazy" 
                            referrerpolicy="no-referrer-when-downgrade">
                        </iframe>
                        <div class="absolute inset-0 bg-gradient-to-t from-red-900/20 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- FAQ Section -->
    <section class="bg-gradient-to-br from-red-50 via-yellow-50 to-red-50 py-20">
        <div class="max-w-7xl mx-auto px-4">
            <h2 class="text-3xl font-bold text-red-900 text-center mb-16 flex items-center justify-center">
                <svg class="w-8 h-8 mr-4 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 3.214-.583.225-.974.787-.974 1.425 0 .638.391 1.201.974 1.425 1.728.639 3.006 1.814 3.006 3.214 0 1.657-1.79 3-4 3s-4-1.343-4-3c0-.638.391-1.201.974-1.425 1.728-.639 3.006-1.814 3.006-3.214 0-.638-.391-1.201-.974-1.425-1.742-.639-3.223-1.474-3.772-2.639z"/>
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15l9-9 3 3-9 9-3-3z"/>
                </svg>
                Frequently Asked Questions
            </h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <div class="contact-card group bg-white rounded-2xl shadow-lg p-8 hover:shadow-2xl border border-red-100">
                    <div class="flex items-start mb-4">
                        <div class="bg-red-100 w-12 h-12 rounded-full flex items-center justify-center mr-4 flex-shrink-0 transform group-hover:scale-110 transition-transform duration-300">
                            <svg class="w-6 h-6 text-red-700" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0h2a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm12-3a3 3 0 11-6 0 3 3 0 016 0z"/>
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-xl font-bold text-red-900 mb-2">Do you offer free electrical diagnostics?</h3>
                            <p class="text-gray-700 leading-relaxed">Yes, we provide free electrical system diagnostics for most issues. Our technicians use advanced diagnostic equipment to identify electrical problems accurately and provide detailed estimates for repairs.</p>
                        </div>
                    </div>
                </div>
                
                <div class="contact-card group bg-white rounded-2xl shadow-lg p-8 hover:shadow-2xl border border-red-100">
                    <div class="flex items-start mb-4">
                        <div class="bg-red-100 w-12 h-12 rounded-full flex items-center justify-center mr-4 flex-shrink-0 transform group-hover:scale-110 transition-transform duration-300">
                            <svg class="w-6 h-6 text-red-700" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-xl font-bold text-red-900 mb-2">How long does electrical repair typically take?</h3>
                            <p class="text-gray-700 leading-relaxed">Electrical repair times vary depending on the complexity of the issue. Simple repairs like bulb replacements or fuse changes can be completed in 30 minutes to 1 hour, while complex wiring issues or ECU problems may take 2-4 hours. We'll provide you with an accurate timeframe after our initial diagnosis.</p>
                        </div>
                    </div>
                </div>
                
                <div class="contact-card group bg-white rounded-2xl shadow-lg p-8 hover:shadow-2xl border border-red-100">
                    <div class="flex items-start mb-4">
                        <div class="bg-red-100 w-12 h-12 rounded-full flex items-center justify-center mr-4 flex-shrink-0 transform group-hover:scale-110 transition-transform duration-300">
                            <svg class="w-6 h-6 text-red-700" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-xl font-bold text-red-900 mb-2">Do you offer a warranty on electrical repairs?</h3>
                            <p class="text-gray-700 leading-relaxed">Yes! We provide a 12-month/12,000-mile warranty on all electrical repairs and components. This includes wiring repairs, sensor replacements, alternator and starter repairs, and all electrical system diagnostics and fixes.</p>
                        </div>
                    </div>
                </div>
                
                <div class="contact-card group bg-white rounded-2xl shadow-lg p-8 hover:shadow-2xl border border-red-100">
                    <div class="flex items-start mb-4">
                        <div class="bg-red-100 w-12 h-12 rounded-full flex items-center justify-center mr-4 flex-shrink-0 transform group-hover:scale-110 transition-transform duration-300">
                            <svg class="w-6 h-6 text-red-700" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-xl font-bold text-red-900 mb-2">Can you repair modern vehicle computer systems?</h3>
                            <p class="text-gray-700 leading-relaxed">Absolutely! We specialize in modern vehicle electrical systems including ECU/ECM repairs, CAN bus diagnostics, sensor replacements, and computer system troubleshooting. Our technicians are trained on the latest diagnostic equipment for all makes and models.</p>
                        </div>
                    </div>
                </div>
                
                <div class="contact-card group bg-white rounded-2xl shadow-lg p-8 hover:shadow-2xl border border-red-100">
                    <div class="flex items-start mb-4">
                        <div class="bg-red-100 w-12 h-12 rounded-full flex items-center justify-center mr-4 flex-shrink-0 transform group-hover:scale-110 transition-transform duration-300">
                            <svg class="w-6 h-6 text-red-700" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-xl font-bold text-red-900 mb-2">Do you offer mobile electrical repair services?</h3>
                            <p class="text-gray-700 leading-relaxed">Yes, we provide mobile electrical repair services for many common issues including battery problems, starter motor issues, and basic electrical diagnostics. For complex repairs, we recommend bringing your vehicle to our workshop for complete service.</p>
                        </div>
                    </div>
                </div>
                
                <div class="contact-card group bg-white rounded-2xl shadow-lg p-8 hover:shadow-2xl border border-red-100">
                    <div class="flex items-start mb-4">
                        <div class="bg-red-100 w-12 h-12 rounded-full flex items-center justify-center mr-4 flex-shrink-0 transform group-hover:scale-110 transition-transform duration-300">
                            <svg class="w-6 h-6 text-red-700" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-xl font-bold text-red-900 mb-2">What types of vehicles do you service?</h3>
                            <p class="text-gray-700 leading-relaxed">We service all makes and models including Toyota, Honda, Nissan, Suzuki, Mitsubishi, and European vehicles. Our electrical expertise covers everything from basic wiring repairs to advanced computer system diagnostics for modern vehicles.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Enhanced CTA Section -->
    <section class="max-w-7xl mx-auto px-4 py-20">
        <div class="bg-gradient-to-br from-red-900 to-yellow-600 rounded-3xl shadow-2xl p-12 relative overflow-hidden">
            <!-- Floating elements -->
            <div class="absolute top-0 left-1/4 w-32 h-32 bg-white bg-opacity-10 rounded-full animate-bounce"></div>
            <div class="absolute bottom-0 right-1/4 w-24 h-24 bg-white bg-opacity-10 rounded-full animate-bounce animation-delay-1000"></div>
            
            <div class="relative z-10 text-center">
                <h3 class="text-3xl md:text-4xl font-bold text-white mb-4">Ready to Get Your Vehicle Fixed?</h3>
                <p class="text-red-100 text-lg mb-8 max-w-2xl mx-auto">Contact us today for expert electrical repairs and exceptional service. We're here to get you back on the road safely and efficiently.</p>
                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    <a href="/about" class="inline-flex items-center px-8 py-4 bg-white text-red-900 rounded-full font-bold text-lg hover:bg-gray-100 transform hover:scale-105 transition-all duration-300 shadow-lg group">
                        <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-9a2.5 2.5 0 11-5 0 2.5 2.5 0 015 0z"/>
                        </svg>
                        Meet Our Team
                    </a>
                    <a href="/products" class="inline-flex items-center px-8 py-4 border-2 border-white border-opacity-50 text-white rounded-full font-bold text-lg hover:bg-white hover:text-red-900 transform hover:scale-105 transition-all duration-300 backdrop-blur-sm group">
                        <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                        </svg>
                        View Our Products
                    </a>
                </div>
            </div>
        </div>
    </section>

</x-app-layout>
