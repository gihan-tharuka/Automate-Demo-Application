<x-app-layout>
    <style>
        /* Enhanced service card animations */
        .service-card {
            transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            transform: translateY(0) scale(1);
        }
        
        .service-card:hover {
            transform: translateY(-8px) scale(1.02);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15);
        }
        
        .service-card .service-overlay {
            opacity: 0;
            transform: translateY(10px);
            transition: all 0.3s ease;
        }
        
        .service-card:hover .service-overlay {
            opacity: 1;
            transform: translateY(0);
        }
        
        /* Enhanced button animations */
        .service-cta {
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }
        
        .service-cta::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.2), transparent);
            transition: left 0.5s;
        }
        
        .service-cta:hover::before {
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
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                        </svg>
                        Premium Auto Electrical Service
                    </span>
                </div>
                
                <h1 class="text-4xl md:text-5xl font-extrabold mb-4 leading-tight">
                    <span class="block">Our</span>
                    <span class="block text-yellow-300">Services</span>
                </h1>
                
                <p class="text-base md:text-lg text-red-100 mb-6 leading-relaxed max-w-md">
                    Professional automotive services tailored to your vehicle's needs. 
                    Expert solutions for every electrical challenge your car might face.
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
                        View Services
                    </a>
                </div>
            </div>
        </div>
        
        <!-- Floating elements for depth -->
        <div class="absolute bottom-0 left-0 right-0 h-20 bg-gradient-to-t from-red-900 to-transparent"></div>
    </section>

    <!-- Services Packages Section -->
    <section class="max-w-7xl mx-auto px-4 py-20">
        <!-- Section Header -->
        <div class="text-center mb-16">
            <div class="inline-flex items-center px-6 py-3 bg-gradient-to-r from-red-100 to-yellow-100 text-red-900 rounded-full text-sm font-semibold mb-6">
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                </svg>
                Premium Service Packages
            </div>
            <h2 class="text-4xl font-extrabold text-red-900 mb-4">Our Service Packages</h2>
            <p class="text-xl text-gray-600 max-w-3xl mx-auto">Choose the perfect package for your vehicle's needs. Each package includes comprehensive diagnostics and expert service from our certified technicians.</p>
        </div>

        <!-- Package Cards Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">

            @forelse($services as $service)
            <!-- Service Package: {{ $service->title }} -->
            <div class="service-card group bg-gradient-to-br from-white to-gray-50 rounded-2xl shadow-lg overflow-hidden hover:shadow-2xl transition-all duration-500 transform hover:-translate-y-2 border border-gray-100">
                <!-- Package Image with Enhanced Styling -->
                <div class="relative h-56 overflow-hidden bg-gradient-to-br from-red-50 to-yellow-50">
                    @if($service->image)
                        <img src="{{ Storage::url($service->image) }}" alt="{{ $service->title }}" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110">
                    @else
                        <img src="{{ asset('images/electricservice.jpg') }}" alt="{{ $service->title }}" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110">
                    @endif
                    
                    <!-- Floating overlay effect -->
                    <div class="absolute inset-0 bg-gradient-to-t from-red-900/20 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                    
                    <!-- Service Category Badge -->
                    <div class="absolute top-4 left-4 bg-white bg-opacity-90 backdrop-blur-sm rounded-full px-3 py-1 text-sm font-semibold text-red-900 shadow-lg">
                        {{ $service->title }}
                    </div>
                </div>

                <!-- Package Content -->
                <div class="p-8 flex-grow flex flex-col">
                    <!-- Service Title -->
                    <h3 class="text-2xl font-bold text-gray-900 mb-3 group-hover:text-red-600 transition-colors duration-300">{{ $service->title }}</h3>
                    
                    <!-- Service Description -->
                    <p class="text-gray-600 mb-6 leading-relaxed">{{ $service->description }}</p>

                    <!-- Services List with Enhanced Icons -->
                    <div class="mb-8 flex-grow border-t border-gray-200 pt-6">
                        <h4 class="text-sm font-semibold text-gray-900 mb-4 uppercase tracking-wide text-red-600">Included Services</h4>
                        <ul class="space-y-3">
                            @foreach($service->included_services as $includedService)
                            <li class="flex items-start group/service">
                                <div class="flex-shrink-0 w-6 h-6 bg-gradient-to-br from-red-500 to-yellow-400 rounded-full flex items-center justify-center mr-3 group-hover/service:scale-110 transition-transform duration-300">
                                    <svg class="w-3 h-3 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                    </svg>
                                </div>
                                <span class="text-sm text-gray-700 group-hover/service:text-gray-900 transition-colors duration-300">{{ $includedService['name'] }}</span>
                            </li>
                            @endforeach
                        </ul>
                    </div>

                    <!-- Enhanced CTA Button -->
                    <a href="/contact" class="service-cta inline-flex items-center justify-center px-8 py-4 bg-gradient-to-r from-red-600 to-yellow-500 text-white rounded-full font-bold text-lg hover:from-red-700 hover:to-yellow-600 transform hover:scale-105 transition-all duration-300 shadow-lg group-hover:bg-white group-hover:text-red-600 group-hover:border-2 group-hover:border-red-600">
                        <svg class="w-5 h-5 mr-3 transform group-hover:translate-x-1 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                        </svg>
                        Book Service Now
                    </a>
                </div>
                
                <!-- Decorative corner elements -->
                <div class="absolute top-0 left-0 w-20 h-20 bg-gradient-to-br from-red-500 to-yellow-400 opacity-5 rounded-br-2xl"></div>
                <div class="absolute bottom-0 right-0 w-20 h-20 bg-gradient-to-tl from-red-500 to-yellow-400 opacity-5 rounded-tl-2xl"></div>
            </div>
            @empty
            <div class="col-span-full text-center py-16 bg-gradient-to-br from-red-50 to-yellow-50 rounded-3xl">
                <div class="relative w-24 h-24 mx-auto mb-6">
                    <div class="absolute inset-0 bg-red-100 rounded-full animate-ping opacity-75"></div>
                    <div class="absolute inset-2 bg-yellow-100 rounded-full"></div>
                    <svg class="w-12 h-12 mx-auto text-red-600 relative z-10 mt-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                    </svg>
                </div>
                <h3 class="text-2xl font-bold text-gray-900 mb-2">Services Coming Soon</h3>
                <p class="text-gray-600 mb-8">We're working on our service packages. Check back soon!</p>
                <a href="/contact" class="inline-flex items-center px-6 py-3 bg-red-600 text-white rounded-full font-semibold hover:bg-red-700 transform hover:scale-105 transition-all duration-300 shadow-lg">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 7.89a2.032 2.032 0 002.83 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                    </svg>
                    Contact Us
                </a>
            </div>
            @endforelse

        </div>

        <!-- Enhanced CTA Section -->
        <div class="mt-20 bg-gradient-to-br from-red-900 to-yellow-600 rounded-3xl shadow-2xl p-12 relative overflow-hidden">
            <!-- Floating elements -->
            <div class="absolute top-0 left-1/4 w-32 h-32 bg-white bg-opacity-10 rounded-full animate-bounce"></div>
            <div class="absolute bottom-0 right-1/4 w-24 h-24 bg-white bg-opacity-10 rounded-full animate-bounce animation-delay-1000"></div>
            
            <div class="relative z-10 text-center">
                <h3 class="text-3xl md:text-4xl font-bold text-white mb-4">Need a Custom Service Package?</h3>
                <p class="text-red-100 text-lg mb-8 max-w-2xl mx-auto">We offer comprehensive electrical services beyond what's listed here. Contact us today to discuss your specific automotive needs and get a personalized solution.</p>
                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    <a href="/contact" class="inline-flex items-center px-8 py-4 bg-white text-red-900 rounded-full font-bold text-lg hover:bg-gray-100 transform hover:scale-105 transition-all duration-300 shadow-lg group">
                        <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 7.89a2.032 2.032 0 002.83 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                        </svg>
                        Contact Our Team
                    </a>
                    <a href="/about" class="inline-flex items-center px-8 py-4 border-2 border-white border-opacity-50 text-white rounded-full font-bold text-lg hover:bg-white hover:text-red-900 transform hover:scale-105 transition-all duration-300 backdrop-blur-sm group">
                        <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                        Learn About Us
                    </a>
                </div>
            </div>
        </div>
    </section>

</x-app-layout>
