
<x-app-layout>
    <style>
        /* Responsive hero image styles */
        #hero-image-container {
            width: 100%;
            max-width: 280px;
            overflow: hidden;
        }
        
        #heroImage {
            width: 100%;
            height: 200px;
            object-fit: contain;
            object-position: center;
        }
        
        /* Medium screens and up */
        @media (min-width: 768px) {
            #hero-image-container {
                max-width: 400px;
            }
            
            #heroImage {
                height: auto;
                height: 300px;
            }
        }
        
        /* Large screens */
        @media (min-width: 1024px) {
            #hero-image-container {
                max-width: 480px;
            }
            
            #heroImage {
                height: 320px;
            }
        }
    </style>

    <!-- Hero Section -->
    <section class="relative bg-gradient-to-br from-red-900 via-red-800 to-red-600 text-white min-h-[80vh] overflow-hidden">
        <!-- Animated background elements -->
        <div class="absolute inset-0 overflow-hidden">
            <div class="absolute top-0 left-0 w-96 h-96 bg-red-500 rounded-full mix-blend-multiply dark:opacity-20 dark:invert animate-blob"></div>
            <div class="absolute top-0 right-0 w-96 h-96 bg-yellow-300 rounded-full mix-blend-multiply dark:opacity-20 dark:invert animate-blob animation-delay-2000"></div>
            <div class="absolute bottom-0 left-1/3 w-96 h-96 bg-red-300 rounded-full mix-blend-multiply dark:opacity-20 dark:invert animate-blob animation-delay-4000"></div>
        </div>

        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16 md:py-24 flex flex-col md:flex-row items-center justify-between">
            <!-- Left side - Text content -->
            <div class="md:w-1/2 mb-12 md:mb-0 md:pr-12 z-10">
                <div class="mb-8">
                    <span class="inline-flex items-center px-4 py-2 rounded-full text-sm font-medium bg-white bg-opacity-20 text-white backdrop-blur-sm border border-white border-opacity-30">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                        </svg>
                        Premium Auto Electrical Service
                    </span>
                </div>
                
                <h1 class="text-5xl md:text-7xl font-extrabold mb-6 leading-tight">
                    <span class="block">Electrical</span>
                    <span class="block text-yellow-300">Excellence</span>
                    <span class="block">Redefined</span>
                </h1>
                
                <p class="text-lg md:text-xl text-red-100 mb-8 leading-relaxed max-w-lg">
                    Expert automotive electrical repair & diagnostics for every vehicle. 
                    Fast, reliable, and professional service for all car makes and models.
                </p>
                
                <div class="flex flex-col sm:flex-row gap-4">
                    <a href="/contact" class="inline-flex items-center px-8 py-4 bg-white text-red-900 rounded-full shadow-xl font-bold text-lg hover:bg-gray-100 transform hover:scale-105 transition-all duration-300 hover:shadow-2xl">
                        <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 7.89a2.032 2.032 0 002.83 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                        </svg>
                        Contact Us Now
                    </a>
                    <a href="/services" class="inline-flex items-center px-8 py-4 border-2 border-white border-opacity-50 text-white rounded-full font-bold text-lg hover:bg-white hover:text-red-900 transform hover:scale-105 transition-all duration-300 backdrop-blur-sm">
                        <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                        </svg>
                        Our Services
                    </a>
                </div>
                
                <!-- Trust indicators -->
                <div class="mt-8 flex items-center space-x-6 text-sm text-red-200">
                    <div class="flex items-center">
                        <svg class="w-5 h-5 mr-2 text-yellow-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                        Certified Technicians
                    </div>
                    <div class="flex items-center">
                        <svg class="w-5 h-5 mr-2 text-yellow-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                        Fast Service
                    </div>
                    <div class="flex items-center">
                        <svg class="w-5 h-5 mr-2 text-yellow-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/>
                        </svg>
                        Customer Satisfaction
                    </div>
                </div>
            </div>
            
            <!-- Right side - Enhanced image rotation with modern styling -->
            <div class="md:w-1/2 z-10 flex justify-center md:justify-end">
                <div class="relative group">
                    <!-- Floating effect container -->
                    <div class="relative bg-white bg-opacity-10 backdrop-blur-lg rounded-2xl p-4 shadow-2xl border border-white border-opacity-20 transform group-hover:scale-105 transition-transform duration-500 ease-out">
                        <!-- Image container with enhanced styling -->
                        <div id="hero-image-container" class="relative rounded-xl overflow-hidden shadow-2xl">
                            <img id="heroImage" src="{{ asset('images/hero/a1.png') }}" alt="Vehicle" class="w-full h-auto object-cover transition-all duration-500 ease-in-out" />
                            
                            <!-- Overlay gradient for better text readability -->
                            <div class="absolute inset-0 bg-gradient-to-t from-red-900 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                            
                            <!-- Floating action badge -->
                            <div class="absolute top-4 right-4 bg-yellow-400 text-red-900 px-3 py-1 rounded-full text-sm font-bold shadow-lg transform rotate-12 animate-pulse">
                                Expert Service
                            </div>
                        </div>
                        
                        <!-- Decorative corner elements -->
                        <div class="absolute -top-2 -right-2 w-8 h-8 border-t-2 border-r-2 border-yellow-300 opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
                        <div class="absolute -bottom-2 -left-2 w-8 h-8 border-b-2 border-l-2 border-yellow-300 opacity-0 group-hover:opacity-100 transition-opacity duration-500 delay-300"></div>
                    </div>
                    
                    <!-- Floating shadow effect -->
                    <div class="absolute -bottom-4 -right-4 w-full h-full bg-red-600 rounded-2xl blur-xl opacity-20 group-hover:opacity-40 transition-opacity duration-500"></div>
                </div>
            </div>
        </div>
        
        <!-- Floating elements for depth -->
        <div class="absolute bottom-0 left-0 right-0 h-32 bg-gradient-to-t from-red-900 to-transparent"></div>
    </section>
    
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Simple image rotation with consistent sizing using hero directory images
            const images = [
                '{{ asset('images/hero/a1.png') }}',
                '{{ asset('images/hero/a6.png') }}',
                '{{ asset('images/hero/q2.png') }}',
                '{{ asset('images/hero/q7.png') }}'
            ];
            
            const imageElement = document.getElementById('heroImage');
            let currentIndex = 0;
            
            // Function to change the image
            function changeImage() {
                // Preload next image
                const nextImg = new Image();
                currentIndex = (currentIndex + 1) % images.length;
                nextImg.src = images[currentIndex];
                
                nextImg.onload = function() {
                    // When the image is loaded, update the src
                    imageElement.style.opacity = '0';
                    
                    setTimeout(function() {
                        imageElement.src = nextImg.src;
                        imageElement.style.opacity = '1';
                    }, 500);
                };
            }
            
            // Set transition on all images - object-fit and other styles are in the CSS
            imageElement.style.transition = 'opacity 0.5s ease-in-out';
            
            // Change image every 5 seconds
            setInterval(changeImage, 5000);
        });
    </script>

    <!-- Services Section -->
    <section id="services" class="max-w-7xl mx-auto px-4 py-16">
        <!-- Section Header -->
        <div class="text-center mb-16">
            <div class="inline-flex items-center px-6 py-3 bg-red-100 text-red-900 rounded-full text-sm font-semibold mb-6">
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                </svg>
                Expert Services
            </div>
            <h2 class="text-4xl md:text-5xl font-extrabold text-red-900 mb-4">Our Premium Services</h2>
            <p class="text-xl text-gray-600 max-w-3xl mx-auto">Comprehensive automotive electrical solutions delivered with precision and care by our certified technicians</p>
        </div>

        <!-- Services Grid -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <!-- Service 1 -->
            <div class="group relative bg-gradient-to-br from-white to-gray-50 rounded-2xl shadow-lg overflow-hidden hover:shadow-2xl transition-all duration-500 transform hover:-translate-y-2 border border-gray-100">
                <!-- Service Icon Background -->
                <div class="absolute top-0 left-0 w-full h-2 bg-gradient-to-r from-red-500 to-yellow-400"></div>
                
                <!-- Content -->
                <div class="p-8 relative z-10">
                    <!-- Icon -->
                    <div class="w-16 h-16 bg-red-100 rounded-full flex items-center justify-center mb-6 group-hover:bg-red-500 transition-colors duration-300">
                        <svg class="w-8 h-8 text-red-600 group-hover:text-white transition-colors duration-300" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                        </svg>
                    </div>
                    
                    <!-- Title -->
                    <h3 class="text-2xl font-bold text-gray-900 mb-4 group-hover:text-red-600 transition-colors duration-300">Electrical Diagnostics</h3>
                    
                    <!-- Description -->
                    <p class="text-gray-600 leading-relaxed mb-6">Advanced electrical system diagnostics to identify and resolve complex electrical issues quickly and accurately using state-of-the-art equipment.</p>
                    
                    <!-- Features List -->
                    <ul class="space-y-2 mb-8">
                        <li class="flex items-center text-sm text-gray-700">
                            <svg class="w-4 h-4 text-red-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                            </svg>
                            Computerized diagnostic systems
                        </li>
                        <li class="flex items-center text-sm text-gray-700">
                            <svg class="w-4 h-4 text-red-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                            </svg>
                            Circuit analysis and testing
                        </li>
                        <li class="flex items-center text-sm text-gray-700">
                            <svg class="w-4 h-4 text-red-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                            </svg>
                            Component failure diagnosis
                        </li>
                    </ul>
                    
                    <!-- CTA Button -->
                    <a href="/services#diagnostics" class="inline-flex items-center px-6 py-3 bg-red-600 text-white rounded-full font-semibold hover:bg-red-700 transform hover:scale-105 transition-all duration-300 shadow-lg group-hover:bg-white group-hover:text-red-600">
                        Learn More
                        <svg class="w-4 h-4 ml-2 transform group-hover:translate-x-1 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                        </svg>
                    </a>
                </div>
                
                <!-- Hover Overlay -->
                <div class="absolute inset-0 bg-gradient-to-br from-red-500/10 to-yellow-400/10 opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
            </div>

            <!-- Service 2 -->
            <div class="group relative bg-gradient-to-br from-white to-gray-50 rounded-2xl shadow-lg overflow-hidden hover:shadow-2xl transition-all duration-500 transform hover:-translate-y-2 border border-gray-100">
                <!-- Service Icon Background -->
                <div class="absolute top-0 left-0 w-full h-2 bg-gradient-to-r from-yellow-400 to-red-500"></div>
                
                <!-- Content -->
                <div class="p-8 relative z-10">
                    <!-- Icon -->
                    <div class="w-16 h-16 bg-yellow-100 rounded-full flex items-center justify-center mb-6 group-hover:bg-yellow-500 transition-colors duration-300">
                        <svg class="w-8 h-8 text-yellow-600 group-hover:text-white transition-colors duration-300" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z"/>
                        </svg>
                    </div>
                    
                    <!-- Title -->
                    <h3 class="text-2xl font-bold text-gray-900 mb-4 group-hover:text-yellow-600 transition-colors duration-300">Battery & Charging</h3>
                    
                    <!-- Description -->
                    <p class="text-gray-600 leading-relaxed mb-6">Complete battery testing, replacement, and charging system diagnostics to keep your vehicle starting reliably in any condition.</p>
                    
                    <!-- Features List -->
                    <ul class="space-y-2 mb-8">
                        <li class="flex items-center text-sm text-gray-700">
                            <svg class="w-4 h-4 text-yellow-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                            </svg>
                            Battery health assessment
                        </li>
                        <li class="flex items-center text-sm text-gray-700">
                            <svg class="w-4 h-4 text-yellow-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                            </svg>
                            Alternator testing and repair
                        </li>
                        <li class="flex items-center text-sm text-gray-700">
                            <svg class="w-4 h-4 text-yellow-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                            </svg>
                            Starter motor diagnostics
                        </li>
                    </ul>
                    
                    <!-- CTA Button -->
                    <a href="/services#battery" class="inline-flex items-center px-6 py-3 bg-yellow-500 text-white rounded-full font-semibold hover:bg-yellow-600 transform hover:scale-105 transition-all duration-300 shadow-lg group-hover:bg-white group-hover:text-yellow-600">
                        Learn More
                        <svg class="w-4 h-4 ml-2 transform group-hover:translate-x-1 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                        </svg>
                    </a>
                </div>
                
                <!-- Hover Overlay -->
                <div class="absolute inset-0 bg-gradient-to-br from-yellow-500/10 to-red-500/10 opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
            </div>

            <!-- Service 3 -->
            <div class="group relative bg-gradient-to-br from-white to-gray-50 rounded-2xl shadow-lg overflow-hidden hover:shadow-2xl transition-all duration-500 transform hover:-translate-y-2 border border-gray-100">
                <!-- Service Icon Background -->
                <div class="absolute top-0 left-0 w-full h-2 bg-gradient-to-r from-red-500 to-yellow-400"></div>
                
                <!-- Content -->
                <div class="p-8 relative z-10">
                    <!-- Icon -->
                    <div class="w-16 h-16 bg-red-100 rounded-full flex items-center justify-center mb-6 group-hover:bg-red-500 transition-colors duration-300">
                        <svg class="w-8 h-8 text-red-600 group-hover:text-white transition-colors duration-300" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"/>
                        </svg>
                    </div>
                    
                    <!-- Title -->
                    <h3 class="text-2xl font-bold text-gray-900 mb-4 group-hover:text-red-600 transition-colors duration-300">Lighting & Wiring</h3>
                    
                    <!-- Description -->
                    <p class="text-gray-600 leading-relaxed mb-6">Professional lighting system repairs, wiring harness fixes, and complete electrical system upgrades for optimal performance.</p>
                    
                    <!-- Features List -->
                    <ul class="space-y-2 mb-8">
                        <li class="flex items-center text-sm text-gray-700">
                            <svg class="w-4 h-4 text-red-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                            </svg>
                            Headlight and taillight repair
                        </li>
                        <li class="flex items-center text-sm text-gray-700">
                            <svg class="w-4 h-4 text-red-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                            </svg>
                            Wiring harness inspection and repair
                        </li>
                        <li class="flex items-center text-sm text-gray-700">
                            <svg class="w-4 h-4 text-red-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                            </svg>
                            Electrical system upgrades
                        </li>
                    </ul>
                    
                    <!-- CTA Button -->
                    <a href="/services#lighting" class="inline-flex items-center px-6 py-3 bg-red-600 text-white rounded-full font-semibold hover:bg-red-700 transform hover:scale-105 transition-all duration-300 shadow-lg group-hover:bg-white group-hover:text-red-600">
                        Learn More
                        <svg class="w-4 h-4 ml-2 transform group-hover:translate-x-1 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                        </svg>
                    </a>
                </div>
                
                <!-- Hover Overlay -->
                <div class="absolute inset-0 bg-gradient-to-br from-red-500/10 to-yellow-400/10 opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
            </div>
        </div>

        <!-- Additional Services Call-to-Action -->
        <div class="text-center mt-16">
            <div class="bg-gradient-to-r from-red-900 to-red-700 rounded-2xl shadow-xl p-8 md:p-12">
                <h3 class="text-3xl md:text-4xl font-bold text-white mb-4">Need Something Else?</h3>
                <p class="text-red-100 text-lg mb-8 max-w-2xl mx-auto">We offer comprehensive electrical services for all vehicle makes and models. Contact us for specialized solutions tailored to your needs.</p>
                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    <a href="/contact" class="inline-flex items-center px-8 py-4 bg-white text-red-900 rounded-full font-bold text-lg hover:bg-gray-100 transform hover:scale-105 transition-all duration-300 shadow-lg">
                        <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 7.89a2.032 2.032 0 002.83 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                        </svg>
                        Contact Our Team
                    </a>
                    <a href="/services" class="inline-flex items-center px-8 py-4 border-2 border-white border-opacity-50 text-white rounded-full font-bold text-lg hover:bg-white hover:text-red-900 transform hover:scale-105 transition-all duration-300 backdrop-blur-sm">
                        <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                        </svg>
                        View All Services
                    </a>
                </div>
            </div>
        </div>
    </section>


    <!-- About Section -->
    <section id="about" class="max-w-7xl mx-auto px-4 py-16">
        <!-- Section Header -->
        <div class="text-center mb-16">
            <div class="inline-flex items-center px-6 py-3 bg-gradient-to-r from-red-100 to-yellow-100 text-red-900 rounded-full text-sm font-semibold mb-6">
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
                Trusted Since 2010
            </div>
            <h2 class="text-4xl md:text-5xl font-extrabold text-red-900 mb-4">About Padmasiri Auto Electricals</h2>
            <p class="text-xl text-gray-600 max-w-3xl mx-auto">Your trusted partner for premium automotive electrical services with over a decade of excellence and customer satisfaction</p>
        </div>

        <!-- Main Content -->
        <div class="bg-gradient-to-br from-white via-red-50 to-yellow-50 rounded-3xl shadow-2xl overflow-hidden">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-0">
                <!-- Left Side - Content -->
                <div class="p-8 md:p-12 lg:p-16">
                    <div class="space-y-8">
                        <!-- Mission Statement -->
                        <div class="relative">
                            <div class="absolute -left-4 top-0 w-2 h-16 bg-gradient-to-b from-red-500 to-yellow-400 rounded-full"></div>
                            <h3 class="text-2xl font-bold text-gray-900 mb-4 pl-6">Our Mission</h3>
                            <p class="text-gray-700 leading-relaxed pl-6">Padmasiri Auto Electricals is dedicated to providing top-quality vehicle repair and maintenance services. With years of experience and a team of certified professionals, we ensure your car is safe, reliable, and ready for the road.</p>
                        </div>

                        <!-- Core Values -->
                        <div>
                            <h3 class="text-2xl font-bold text-gray-900 mb-6">Our Core Values</h3>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <!-- Value 1 -->
                                <div class="bg-white rounded-xl p-6 shadow-lg hover:shadow-xl transition-shadow duration-300 border border-gray-100">
                                    <div class="flex items-start space-x-4">
                                        <div class="w-12 h-12 bg-red-100 rounded-full flex items-center justify-center flex-shrink-0">
                                            <svg class="w-6 h-6 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z"/>
                                            </svg>
                                        </div>
                                        <div>
                                            <h4 class="font-semibold text-gray-900 mb-2">Expertise</h4>
                                            <p class="text-sm text-gray-600">Certified and experienced technicians with cutting-edge knowledge</p>
                                        </div>
                                    </div>
                                </div>

                                <!-- Value 2 -->
                                <div class="bg-white rounded-xl p-6 shadow-lg hover:shadow-xl transition-shadow duration-300 border border-gray-100">
                                    <div class="flex items-start space-x-4">
                                        <div class="w-12 h-12 bg-yellow-100 rounded-full flex items-center justify-center flex-shrink-0">
                                            <svg class="w-6 h-6 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                                            </svg>
                                        </div>
                                        <div>
                                            <h4 class="font-semibold text-gray-900 mb-2">Reliability</h4>
                                            <p class="text-sm text-gray-600">State-of-the-art diagnostic equipment and proven methods</p>
                                        </div>
                                    </div>
                                </div>

                                <!-- Value 3 -->
                                <div class="bg-white rounded-xl p-6 shadow-lg hover:shadow-xl transition-shadow duration-300 border border-gray-100">
                                    <div class="flex items-start space-x-4">
                                        <div class="w-12 h-12 bg-red-100 rounded-full flex items-center justify-center flex-shrink-0">
                                            <svg class="w-6 h-6 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                                            </svg>
                                        </div>
                                        <div>
                                            <h4 class="font-semibold text-gray-900 mb-2">Customer Care</h4>
                                            <p class="text-sm text-gray-600">Customer-first approach with personalized attention</p>
                                        </div>
                                    </div>
                                </div>

                                <!-- Value 4 -->
                                <div class="bg-white rounded-xl p-6 shadow-lg hover:shadow-xl transition-shadow duration-300 border border-gray-100">
                                    <div class="flex items-start space-x-4">
                                        <div class="w-12 h-12 bg-yellow-100 rounded-full flex items-center justify-center flex-shrink-0">
                                            <svg class="w-6 h-6 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                                            </svg>
                                        </div>
                                        <div>
                                            <h4 class="font-semibold text-gray-900 mb-2">Transparency</h4>
                                            <p class="text-sm text-gray-600">Honest advice and transparent pricing always</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Statistics -->
                        <div class="grid grid-cols-2 md:grid-cols-4 gap-6 pt-6">
                            <div class="text-center">
                                <div class="text-3xl font-bold text-red-600">10+</div>
                                <div class="text-sm text-gray-600">Years Experience</div>
                            </div>
                            <div class="text-center">
                                <div class="text-3xl font-bold text-yellow-600">500+</div>
                                <div class="text-sm text-gray-600">Happy Customers</div>
                            </div>
                            <div class="text-center">
                                <div class="text-3xl font-bold text-red-600">98%</div>
                                <div class="text-sm text-gray-600">Success Rate</div>
                            </div>
                            <div class="text-center">
                                <div class="text-3xl font-bold text-yellow-600">24/7</div>
                                <div class="text-sm text-gray-600">Support</div>
                            </div>
                        </div>

                        <!-- CTA Section -->
                        <div class="bg-white rounded-2xl p-8 shadow-lg border border-gray-100">
                            <div class="flex flex-col md:flex-row items-center justify-between space-y-4 md:space-y-0">
                                <div>
                                    <h3 class="text-xl font-bold text-gray-900 mb-2">Ready to Experience Excellence?</h3>
                                    <p class="text-gray-600">Join hundreds of satisfied customers who trust us with their vehicles</p>
                                </div>
                                <div class="flex flex-col sm:flex-row gap-4">
                                    <a href="/contact" class="inline-flex items-center px-6 py-3 bg-red-600 text-white rounded-full font-semibold hover:bg-red-700 transform hover:scale-105 transition-all duration-300 shadow-lg">
                                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 7.89a2.032 2.032 0 002.83 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                                        </svg>
                                        Get Started
                                    </a>
                                    <a href="/about" class="inline-flex items-center px-6 py-3 border-2 border-red-600 text-red-600 rounded-full font-semibold hover:bg-red-600 hover:text-white transform hover:scale-105 transition-all duration-300">
                                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                        </svg>
                                        Learn More
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Right Side - Image -->
                <div class="relative bg-gradient-to-br from-red-600 to-yellow-400 p-1 rounded-3xl">
                    <div class="bg-white rounded-2xl overflow-hidden h-full flex items-center justify-center">
                        <div class="relative w-full h-full">
                            <img src="{{ asset('images/audi.jpg') }}" alt="About Padmasiri Auto Electricals" class="w-full h-full object-cover" />
                            
                            <!-- Overlay gradient -->
                            <div class="absolute inset-0 bg-gradient-to-t from-red-900/20 via-transparent to-yellow-400/20"></div>
                            
                            <!-- Floating elements -->
                            <div class="absolute top-4 left-4 bg-white bg-opacity-90 rounded-lg p-3 shadow-lg">
                                <div class="text-red-600 font-bold text-lg">Expert Team</div>
                                <div class="text-sm text-gray-600">Certified Professionals</div>
                            </div>
                            
                            <div class="absolute bottom-4 right-4 bg-yellow-400 text-red-900 rounded-lg p-3 shadow-lg">
                                <div class="font-bold text-lg">Quality Guaranteed</div>
                                <div class="text-sm">100% Satisfaction</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Testimonials Section -->
    <section id="testimonials" class="relative py-20 overflow-hidden">
        <!-- Background Pattern -->
        <div class="absolute inset-0 bg-gradient-to-br from-red-50 via-yellow-50 to-red-50 opacity-50"></div>
        <div class="absolute top-0 left-1/4 w-96 h-96 bg-red-200 rounded-full mix-blend-multiply dark:opacity-20 dark:invert animate-blob"></div>
        <div class="absolute bottom-0 right-1/4 w-96 h-96 bg-yellow-200 rounded-full mix-blend-multiply dark:opacity-20 dark:invert animate-blob animation-delay-2000"></div>

        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Section Header -->
            <div class="text-center mb-16">
                <div class="inline-flex items-center px-6 py-3 bg-gradient-to-r from-red-100 to-yellow-100 text-red-900 rounded-full text-sm font-semibold mb-6">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/>
                    </svg>
                    Customer Testimonials
                </div>
                <h2 class="text-4xl md:text-5xl font-extrabold text-red-900 mb-4">What Our Customers Say</h2>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">Real feedback from our valued customers who trust us with their vehicles</p>
            </div>

            @php
                $featuredReviews = \App\Models\Review::featured()->take(6)->get();
            @endphp

            @if($featuredReviews->isEmpty())
                <div class="text-center py-16 bg-white rounded-3xl shadow-2xl max-w-2xl mx-auto border border-gray-100">
                    <div class="relative w-24 h-24 mx-auto mb-6">
                        <div class="absolute inset-0 bg-red-100 rounded-full animate-ping opacity-75"></div>
                        <div class="absolute inset-2 bg-yellow-100 rounded-full"></div>
                        <svg class="w-12 h-12 mx-auto text-red-600 relative z-10 mt-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/>
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-900 mb-2">Building Our Reputation</h3>
                    <p class="text-gray-600 mb-8">Check back soon to see what our customers are saying!</p>
                    <div class="flex flex-col sm:flex-row gap-4 justify-center">
                        <a href="/register" class="inline-flex items-center px-6 py-3 bg-red-600 text-white rounded-full font-semibold hover:bg-red-700 transform hover:scale-105 transition-all duration-300 shadow-lg">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 18a6 6 0 00-6 6h12a6 6 0 00-6-6z"/>
                            </svg>
                            Be Our First Reviewer
                        </a>
                        <a href="/contact" class="inline-flex items-center px-6 py-3 border-2 border-red-600 text-red-600 rounded-full font-semibold hover:bg-red-600 hover:text-white transform hover:scale-105 transition-all duration-300">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 7.89a2.032 2.032 0 002.83 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                            </svg>
                            Contact Us
                        </a>
                    </div>
                </div>
            @else
                <!-- Testimonials Grid -->
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    @foreach($featuredReviews as $review)
                        <div class="group bg-white rounded-2xl shadow-lg p-8 hover:shadow-2xl transition-all duration-500 transform hover:-translate-y-2 border border-gray-100 relative overflow-hidden">
                            <!-- Decorative Corner Elements -->
                            <div class="absolute top-0 left-0 w-20 h-20 bg-gradient-to-br from-red-500 to-yellow-400 opacity-10 rounded-br-2xl"></div>
                            <div class="absolute bottom-0 right-0 w-20 h-20 bg-gradient-to-tl from-red-500 to-yellow-400 opacity-10 rounded-tl-2xl"></div>
                            
                            <!-- Quote Icon -->
                            <div class="flex justify-center mb-6">
                                <div class="w-16 h-16 bg-gradient-to-br from-red-100 to-yellow-100 rounded-full flex items-center justify-center group-hover:bg-gradient-to-br group-hover:from-red-500 group-hover:to-yellow-400 transition-colors duration-300">
                                    <svg class="w-8 h-8 text-red-600 group-hover:text-white transition-colors duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/>
                                    </svg>
                                </div>
                            </div>

                            <!-- Star Rating -->
                            <div class="flex justify-center items-center mb-6">
                                @for($i = 0; $i < $review->rating; $i++)
                                    <svg class="w-6 h-6 text-yellow-500 mx-1 animate-pulse" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                    </svg>
                                @endfor
                                @for($i = $review->rating; $i < 5; $i++)
                                    <svg class="w-6 h-6 text-gray-300 mx-1" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                    </svg>
                                @endfor
                            </div>

                            <!-- Review Comment -->
                            <blockquote class="text-gray-700 text-lg leading-relaxed mb-8 text-center italic font-medium relative z-10">
                                "{{ $review->comment }}"
                            </blockquote>

                            <!-- Customer Info -->
                            <div class="border-t border-gray-200 pt-6 flex items-center justify-between">
                                <div class="flex items-center">
                                    <div class="w-12 h-12 bg-gradient-to-br from-red-500 to-yellow-400 rounded-full flex items-center justify-center text-white font-bold text-lg mr-4 shadow-lg">
                                        {{ strtoupper(substr($review->customer_name, 0, 1)) }}
                                    </div>
                                    <div>
                                        <p class="font-semibold text-gray-900 text-lg">{{ $review->customer_name }}</p>
                                        @if($review->service_used)
                                            <p class="text-sm text-red-600 font-medium">{{ $review->service_used }}</p>
                                        @endif
                                    </div>
                                </div>
                                <span class="inline-flex items-center px-3 py-1 bg-gradient-to-r from-red-100 to-yellow-100 text-red-900 rounded-full text-xs font-medium">
                                    <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M6.267 3.455a3.066 3.066 0 001.745-.723 3.066 3.066 0 013.976 0 3.066 3.066 0 001.745.723 3.066 3.066 0 012.812 2.812c.051.643.304 1.254.723 1.745a3.066 3.066 0 010 3.976 3.066 3.066 0 00-.723 1.745 3.066 3.066 0 01-2.812 2.812 3.066 3.066 0 00-1.745.723 3.066 3.066 0 01-3.976 0 3.066 3.066 0 00-1.745-.723 3.066 3.066 0 01-2.812-2.812 3.066 3.066 0 00-.723-1.745 3.066 3.066 0 010-3.976 3.066 3.066 0 00.723-1.745 3.066 3.066 0 012.812-2.812zm7.44 5.252a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                    </svg>
                                    Verified Customer
                                </span>
                            </div>
                        </div>
                    @endforeach
                </div>

                <!-- Statistics Section -->
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mt-16">
                    <div class="bg-white rounded-2xl p-8 shadow-lg text-center group hover:shadow-2xl transition-all duration-300 border border-gray-100">
                        <div class="text-4xl font-bold text-red-600 mb-2 group-hover:text-yellow-600 transition-colors duration-300">4.8/5</div>
                        <div class="text-gray-600 font-medium">Average Rating</div>
                        <div class="text-sm text-gray-500 mt-1">Based on customer reviews</div>
                    </div>
                    <div class="bg-white rounded-2xl p-8 shadow-lg text-center group hover:shadow-2xl transition-all duration-300 border border-gray-100">
                        <div class="text-4xl font-bold text-yellow-600 mb-2 group-hover:text-red-600 transition-colors duration-300">500+</div>
                        <div class="text-gray-600 font-medium">Happy Customers</div>
                        <div class="text-sm text-gray-500 mt-1">Serving since 2010</div>
                    </div>
                    <div class="bg-white rounded-2xl p-8 shadow-lg text-center group hover:shadow-2xl transition-all duration-300 border border-gray-100">
                        <div class="text-4xl font-bold text-red-600 mb-2 group-hover:text-yellow-600 transition-colors duration-300">98%</div>
                        <div class="text-gray-600 font-medium">Recommendation Rate</div>
                        <div class="text-sm text-gray-500 mt-1">Would recommend to others</div>
                    </div>
                </div>
            @endif

            <!-- Call to Action - Leave a Review -->
            <div class="text-center mt-16">
                <div class="bg-gradient-to-br from-red-900 to-yellow-600 rounded-3xl shadow-2xl p-8 md:p-12 relative overflow-hidden">
                    <!-- Floating elements -->
                    <div class="absolute top-0 left-1/4 w-32 h-32 bg-white bg-opacity-10 rounded-full animate-bounce"></div>
                    <div class="absolute bottom-0 right-1/4 w-24 h-24 bg-white bg-opacity-10 rounded-full animate-bounce animation-delay-1000"></div>
                    
                    <div class="relative z-10">
                        <h3 class="text-3xl md:text-4xl font-bold text-white mb-4">Had a Great Experience?</h3>
                        <p class="text-red-100 text-lg mb-8 max-w-2xl mx-auto">Share your experience and help others discover our quality service!</p>
                        <div class="flex flex-col sm:flex-row gap-4 justify-center">
                            @auth
                                <a href="{{ route('reviews.general.create') }}" class="inline-flex items-center px-8 py-4 bg-white text-red-900 rounded-full font-bold text-lg hover:bg-gray-100 transform hover:scale-105 transition-all duration-300 shadow-lg group">
                                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"/>
                                    </svg>
                                    ⭐ Leave a Review Now
                                </a>
                            @else
                                <a href="/register" class="inline-flex items-center px-8 py-4 bg-white text-red-900 rounded-full font-bold text-lg hover:bg-gray-100 transform hover:scale-105 transition-all duration-300 shadow-lg group">
                                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"/>
                                    </svg>
                                    ⭐ Sign Up to Leave a Review
                                </a>
                                <p class="text-white text-sm mt-3">Already have an account? <a href="/login" class="underline font-semibold hover:text-yellow-200 transition-colors duration-300">Log in here</a></p>
                            @endauth
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section id="contact" class="relative py-20 overflow-hidden">
        <!-- Background Pattern -->
        <div class="absolute inset-0 bg-gradient-to-br from-red-50 via-yellow-50 to-red-50 opacity-50"></div>
        <div class="absolute top-0 left-1/3 w-96 h-96 bg-red-200 rounded-full mix-blend-multiply dark:opacity-20 dark:invert animate-blob"></div>
        <div class="absolute bottom-0 right-1/3 w-96 h-96 bg-yellow-200 rounded-full mix-blend-multiply dark:opacity-20 dark:invert animate-blob animation-delay-2000"></div>

        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Section Header -->
            <div class="text-center mb-16">
                <div class="inline-flex items-center px-6 py-3 bg-gradient-to-r from-red-100 to-yellow-100 text-red-900 rounded-full text-sm font-semibold mb-6">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 7.89a2.032 2.032 0 002.83 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                    </svg>
                    Get in Touch
                </div>
                <h2 class="text-4xl md:text-5xl font-extrabold text-red-900 mb-4">Contact Us</h2>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">Have questions or need to book a service? Reach out to our friendly team!</p>
            </div>

            <!-- Contact Content -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                <!-- Contact Information -->
                <div class="space-y-8">
                    <!-- Contact Card -->
                    <div class="bg-white rounded-3xl shadow-2xl p-8 border border-gray-100 relative overflow-hidden group">
                        <!-- Decorative Elements -->
                        <div class="absolute top-0 left-0 w-24 h-24 bg-gradient-to-br from-red-500 to-yellow-400 opacity-10 rounded-br-3xl"></div>
                        <div class="absolute bottom-0 right-0 w-24 h-24 bg-gradient-to-tl from-red-500 to-yellow-400 opacity-10 rounded-tl-3xl"></div>
                        
                        <!-- Contact Info Grid -->
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <!-- Phone -->
                            <div class="bg-gradient-to-br from-red-50 to-yellow-50 rounded-2xl p-6 hover:shadow-lg transition-all duration-300 border border-gray-100 group-hover:scale-105 group-hover:shadow-xl">
                                <div class="flex items-center mb-4">
                                    <div class="w-12 h-12 bg-gradient-to-br from-red-500 to-yellow-400 rounded-full flex items-center justify-center text-white mr-4 shadow-lg">
                                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                                        </svg>
                                    </div>
                                    <div>
                                        <h3 class="font-semibold text-gray-900">Phone</h3>
                                        <p class="text-sm text-gray-600">Call us directly</p>
                                    </div>
                                </div>
                                <a href="tel:0777851734" class="text-2xl font-bold text-red-600 hover:text-yellow-600 transition-colors duration-300 block">077 785 1734</a>
                            </div>

                            <!-- Email -->
                            <div class="bg-gradient-to-br from-yellow-50 to-red-50 rounded-2xl p-6 hover:shadow-lg transition-all duration-300 border border-gray-100 group-hover:scale-105 group-hover:shadow-xl">
                                <div class="flex items-center mb-4">
                                    <div class="w-12 h-12 bg-gradient-to-br from-yellow-500 to-red-500 rounded-full flex items-center justify-center text-white mr-4 shadow-lg">
                                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 7.89a2.032 2.032 0 002.83 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                                        </svg>
                                    </div>
                                    <div>
                                        <h3 class="font-semibold text-gray-900">Email</h3>
                                        <p class="text-sm text-gray-600">Send us a message</p>
                                    </div>
                                </div>
                                <a href="mailto:nihalpathmasiri564@gmail.com" class="text-lg font-semibold text-yellow-600 hover:text-red-600 transition-colors duration-300 block truncate">nihalpathmasiri564@gmail.com</a>
                            </div>

                            <!-- Facebook -->
                            <div class="bg-gradient-to-br from-red-50 to-yellow-50 rounded-2xl p-6 hover:shadow-lg transition-all duration-300 border border-gray-100 group-hover:scale-105 group-hover:shadow-xl">
                                <div class="flex items-center mb-4">
                                    <div class="w-12 h-12 bg-gradient-to-br from-red-600 to-yellow-500 rounded-full flex items-center justify-center text-white mr-4 shadow-lg">
                                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                                            <path d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z"/>
                                        </svg>
                                    </div>
                                    <div>
                                        <h3 class="font-semibold text-gray-900">Facebook</h3>
                                        <p class="text-sm text-gray-600">Follow us</p>
                                    </div>
                                </div>
                                <a href="https://www.facebook.com/p/Pathmasiri-Auto-Electricals-100070348595411/" target="_blank" class="text-lg font-semibold text-red-600 hover:text-yellow-600 transition-colors duration-300 block">Pathmasiri Auto Electricals</a>
                            </div>

                            <!-- Address -->
                            <div class="bg-gradient-to-br from-yellow-50 to-red-50 rounded-2xl p-6 hover:shadow-lg transition-all duration-300 border border-gray-100 group-hover:scale-105 group-hover:shadow-xl">
                                <div class="flex items-center mb-4">
                                    <div class="w-12 h-12 bg-gradient-to-br from-yellow-600 to-red-600 rounded-full flex items-center justify-center text-white mr-4 shadow-lg">
                                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                                        </svg>
                                    </div>
                                    <div>
                                        <h3 class="font-semibold text-gray-900">Address</h3>
                                        <p class="text-sm text-gray-600">Visit our workshop</p>
                                    </div>
                                </div>
                                <a href="https://maps.app.goo.gl/RFnBeCawLD5GuWyG8" target="_blank" class="text-sm text-yellow-600 hover:text-red-600 transition-colors duration-300 block leading-relaxed">441/11/B, High Level Road, Gangodawila, Nugegoda, Sri Lanka</a>
                            </div>
                        </div>
                    </div>

                    <!-- Business Hours -->
                    <div class="bg-white rounded-2xl shadow-lg p-6 border border-gray-100">
                        <h3 class="text-lg font-semibold text-gray-900 mb-4 flex items-center">
                            <svg class="w-5 h-5 mr-2 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                            Business Hours
                        </h3>
                        <div class="grid grid-cols-2 gap-2 text-sm text-gray-600">
                            <span>Monday - Friday</span>
                            <span class="text-right">8:00 AM - 6:00 PM</span>
                            <span>Saturday</span>
                            <span class="text-right">8:00 AM - 2:00 PM</span>
                            <span>Sunday</span>
                            <span class="text-right text-red-600 font-medium">Closed</span>
                        </div>
                    </div>

                    <!-- Quick Actions -->
                    <div class="flex flex-col sm:flex-row gap-4">
                        <a href="/contact" class="flex-1 bg-gradient-to-r from-red-600 to-yellow-500 text-white py-4 px-6 rounded-full font-semibold text-center hover:from-red-700 hover:to-yellow-600 transform hover:scale-105 transition-all duration-300 shadow-lg group">
                            <svg class="w-5 h-5 inline-block mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 18a6 6 0 00-6 6h12a6 6 0 00-6-6z"/>
                            </svg>
                            Book an Appointment
                        </a>
                        <a href="/services" class="flex-1 bg-white text-red-900 py-4 px-6 rounded-full font-semibold text-center border-2 border-red-600 hover:bg-red-600 hover:text-white transform hover:scale-105 transition-all duration-300 shadow-lg">
                            View Our Services
                        </a>
                    </div>
                </div>

                <!-- Map Section -->
                <div class="relative group">
                    <div class="bg-white rounded-3xl shadow-2xl overflow-hidden border border-gray-100 relative z-10 group-hover:shadow-3xl transition-shadow duration-500">
                        <!-- Map Container -->
                        <div class="aspect-w-16 aspect-h-9 bg-gray-200">
                            <iframe 
                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3961.2212992109066!2d79.9002!3d6.8640621999999984!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3ae25be1158756fb%3A0x2a015124bbddc453!2sPathmasiri%20Auto%20Electrical!5e0!3m2!1sen!2slk!4v1770186752610!5m2!1sen!2slk" 
                                width="100%" 
                                height="450" 
                                style="border:0;" 
                                allowfullscreen="" 
                                loading="lazy" 
                                referrerpolicy="no-referrer-when-downgrade"
                                class="w-full h-full">
                            </iframe>
                        </div>
                        
                        <!-- Overlay Information -->
                        <div class="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-black/80 to-transparent p-6">
                            <h3 class="text-white text-xl font-bold mb-2">Find Us Easily</h3>
                            <p class="text-gray-200 text-sm">Conveniently located on High Level Road, Gangodawila</p>
                            <div class="mt-4 flex gap-4">
                                <a href="https://maps.app.goo.gl/RFnBeCawLD5GuWyG8" target="_blank" class="inline-flex items-center px-4 py-2 bg-red-600 text-white rounded-full text-sm font-semibold hover:bg-red-700 transition-colors duration-300">
                                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                                    </svg>
                                    Get Directions
                                </a>
                                <a href="tel:0777851734" class="inline-flex items-center px-4 py-2 bg-yellow-500 text-white rounded-full text-sm font-semibold hover:bg-yellow-600 transition-colors duration-300">
                                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                                    </svg>
                                    Call Now
                                </a>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Floating Elements -->
                    <div class="absolute -top-4 -right-4 w-24 h-24 bg-red-200 rounded-full opacity-50 animate-pulse"></div>
                    <div class="absolute -bottom-4 -left-4 w-20 h-20 bg-yellow-200 rounded-full opacity-50 animate-pulse animation-delay-1000"></div>
                </div>
            </div>

            <!-- Contact CTA -->
            <div class="text-center mt-16">
                <div class="bg-gradient-to-br from-red-900 to-yellow-600 rounded-3xl shadow-2xl p-8 md:p-12 relative overflow-hidden">
                    <!-- Floating elements -->
                    <div class="absolute top-0 left-1/4 w-32 h-32 bg-white bg-opacity-10 rounded-full animate-bounce"></div>
                    <div class="absolute bottom-0 right-1/4 w-24 h-24 bg-white bg-opacity-10 rounded-full animate-bounce animation-delay-1000"></div>
                    
                    <div class="relative z-10">
                        <h3 class="text-3xl md:text-4xl font-bold text-white mb-4">Ready to Get Started?</h3>
                        <p class="text-red-100 text-lg mb-8 max-w-2xl mx-auto">Contact us today for expert automotive electrical services. We're here to help with all your vehicle's electrical needs!</p>
                        <div class="flex flex-col sm:flex-row gap-4 justify-center">
                            <a href="/contact" class="inline-flex items-center px-8 py-4 bg-white text-red-900 rounded-full font-bold text-lg hover:bg-gray-100 transform hover:scale-105 transition-all duration-300 shadow-lg group">
                                <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 7.89a2.032 2.032 0 002.83 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                                </svg>
                                Send Us a Message
                            </a>
                            <a href="tel:0777851734" class="inline-flex items-center px-8 py-4 border-2 border-white border-opacity-50 text-white rounded-full font-bold text-lg hover:bg-white hover:text-red-900 transform hover:scale-105 transition-all duration-300 backdrop-blur-sm group">
                                <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                                </svg>
                                Call Us Now
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    


</x-app-layout>
