<x-app-layout>
    <style>
        /* Enhanced animations for about page */
        .about-card {
            transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            transform: translateY(0) scale(1);
        }
        
        .about-card:hover {
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
        
        /* Enhanced team member animations */
        .team-member {
            transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        }
        
        .team-member:hover {
            transform: translateY(-12px) scale(1.03);
            box-shadow: 0 25px 50px rgba(0, 0, 0, 0.2);
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
                        Our Story
                    </span>
                </div>
                
                <h1 class="text-4xl md:text-5xl font-extrabold mb-4 leading-tight">
                    <span class="block">About</span>
                    <span class="block text-yellow-300">Padmasiri Auto Electricals</span>
                </h1>
                
                <p class="text-base md:text-lg text-red-100 mb-6 leading-relaxed max-w-md">
                    Meet our team and discover our journey of providing honest, transparent automotive repair services that put customers first.
                </p>
            </div>
            
            <!-- Right side - Image -->
            <div class="md:w-1/2 z-10 flex justify-center md:justify-end">
                <div class="relative floating-element">
                    <div class="absolute -inset-1 bg-gradient-to-r from-red-600 to-yellow-500 rounded-2xl blur opacity-75"></div>
                    <img src="{{ asset('images/garage2.png') }}" alt="Padmasiri Auto Electricals Team" class="relative w-full max-w-md rounded-2xl shadow-2xl transform hover:scale-105 transition-transform duration-500">
                </div>
            </div>
        </div>
        
        <!-- Floating elements for depth -->
        <div class="absolute bottom-0 left-0 right-0 h-20 bg-gradient-to-t from-red-900 to-transparent"></div>
    </section>

    <!-- Our Story Section -->
    <section class="max-w-7xl mx-auto px-4 py-20">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-12 items-center">
            <div class="about-card group">
                <div class="relative overflow-hidden bg-gradient-to-br from-red-50 to-yellow-50 rounded-2xl p-8">
                    <div class="absolute inset-0 bg-gradient-to-t from-red-900/20 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                    
                    <div class="relative z-10">
                        <h2 class="text-3xl font-bold text-red-900 mb-6 flex items-center">
                            <svg class="w-8 h-8 mr-4 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                            Our Story
                        </h2>
                        <p class="text-gray-700 mb-4 leading-relaxed">Founded in 2024, Padmasiri Auto Electricals began with a simple mission: to provide honest, transparent automotive repair services that put customers first. Our founder, Tharusha Dayananda, had spent over 6 years working in auto repair shops where he witnessed firsthand how customers were often overcharged or received unnecessary services.</p>
                        <p class="text-gray-700 mb-4 leading-relaxed">Determined to create a different kind of auto repair experience, Tharusha established Padmasiri Auto Electricals with a commitment to integrity, quality workmanship, and clear communication. What started as a small two-bay garage has grown into a full-service automotive center, but our founding principles remain unchanged.</p>
                        <p class="text-gray-700 leading-relaxed">Today, Padmasiri Auto Electricals serves hundreds of customers across the country, maintaining a perfect 5-star rating and building lasting relationships with drivers who appreciate our honest approach to vehicle maintenance and repair.</p>
                    </div>
                </div>
            </div>
            
            <div class="about-card group">
                <div class="relative rounded-2xl overflow-hidden shadow-xl">
                    <img src="{{ asset('images/garage2.png') }}" alt="Padmasiri Auto Electricals Garage" class="w-full h-80 md:h-[28rem] object-cover transition-transform duration-500 group-hover:scale-110">
                    <div class="absolute inset-0 bg-gradient-to-t from-red-900/30 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                    <div class="absolute bottom-6 left-6 bg-white bg-opacity-95 backdrop-blur-sm rounded-lg p-4 shadow-lg border border-red-200">
                        <h3 class="font-bold text-red-900">Our Facility</h3>
                        <p class="text-sm text-gray-600">State-of-the-art equipment and dedicated team</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Our Values Section -->
    <section class="bg-gradient-to-br from-red-50 via-yellow-50 to-red-50 py-20">
        <div class="max-w-7xl mx-auto px-4">
            <h2 class="text-3xl font-bold text-red-900 text-center mb-16 flex items-center justify-center">
                <svg class="w-8 h-8 mr-4 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                </svg>
                Our Core Values
            </h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="about-card group bg-white rounded-2xl p-8 shadow-lg hover:shadow-2xl border border-red-100">
                    <div class="relative overflow-hidden mb-6">
                        <div class="absolute inset-0 bg-gradient-to-br from-red-100 to-yellow-100 rounded-full opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                        <div class="relative bg-red-100 w-16 h-16 rounded-full flex items-center justify-center mx-auto transform group-hover:scale-110 transition-transform duration-300">
                            <svg class="w-8 h-8 text-red-700" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"/>
                            </svg>
                        </div>
                    </div>
                    <h3 class="text-xl font-bold text-red-900 mb-4 text-center">Integrity</h3>
                    <p class="text-gray-700 text-center leading-relaxed">We believe in complete transparency with our customers. We'll never recommend unnecessary services or parts and will always explain our recommendations in clear terms.</p>
                </div>
                
                <div class="about-card group bg-white rounded-2xl p-8 shadow-lg hover:shadow-2xl border border-red-100">
                    <div class="relative overflow-hidden mb-6">
                        <div class="absolute inset-0 bg-gradient-to-br from-red-100 to-yellow-100 rounded-full opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                        <div class="relative bg-red-100 w-16 h-16 rounded-full flex items-center justify-center mx-auto transform group-hover:scale-110 transition-transform duration-300">
                            <svg class="w-8 h-8 text-red-700" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M17 8h2a2 2 0 012 2v6a2 2 0 01-2 2h-2v4l-4-4H9a1.994 1.994 0 01-1.414-.586m0 0L11 14h4a2 2 0 002-2V6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2v4l.586-.586z"/>
                            </svg>
                        </div>
                    </div>
                    <h3 class="text-xl font-bold text-red-900 mb-4 text-center">Communication</h3>
                    <p class="text-gray-700 text-center leading-relaxed">We prioritize clear communication at every step of the repair process. You'll know what we're doing, why we're doing it, and exactly what it will cost.</p>
                </div>
                
                <div class="about-card group bg-white rounded-2xl p-8 shadow-lg hover:shadow-2xl border border-red-100">
                    <div class="relative overflow-hidden mb-6">
                        <div class="absolute inset-0 bg-gradient-to-br from-red-100 to-yellow-100 rounded-full opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                        <div class="relative bg-red-100 w-16 h-16 rounded-full flex items-center justify-center mx-auto transform group-hover:scale-110 transition-transform duration-300">
                            <svg class="w-8 h-8 text-red-700" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                            </svg>
                        </div>
                    </div>
                    <h3 class="text-xl font-bold text-red-900 mb-4 text-center">Quality</h3>
                    <p class="text-gray-700 text-center leading-relaxed">We never compromise on quality. From the parts we use to the technicians we hire, everything at Padmasiri Auto Electricals is selected to ensure your vehicle gets the best care possible.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Meet the Team Section -->
    <section class="max-w-7xl mx-auto px-4 py-20">
        <h2 class="text-3xl font-bold text-red-900 text-center mb-16 flex items-center justify-center">
            <svg class="w-8 h-8 mr-4 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-9a2.5 2.5 0 11-5 0 2.5 2.5 0 015 0z"/>
            </svg>
            Meet Our Team
        </h2>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @forelse($teamMembers as $member)
            <!-- Team Member: {{ $member->name }} -->
            <div class="team-member group bg-white rounded-2xl shadow-lg overflow-hidden hover:shadow-2xl border border-red-100">
                <div class="relative overflow-hidden">
                    @if($member->image)
                        <img src="{{ Storage::url($member->image) }}" alt="{{ $member->name }}" class="w-full h-64 object-cover transition-transform duration-500 group-hover:scale-110">
                    @else
                        <img src="{{ asset('images/team/placeholder.jpg') }}" alt="{{ $member->name }}" class="w-full h-64 object-cover transition-transform duration-500 group-hover:scale-110">
                    @endif
                    
                    <!-- Hover overlay -->
                    <div class="absolute inset-0 bg-gradient-to-t from-red-900/40 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                    
                    <!-- Position badge -->
                    <div class="absolute top-3 left-3 bg-white bg-opacity-95 backdrop-blur-sm rounded-full px-3 py-1 text-sm font-semibold text-red-900 shadow-lg border border-red-200">
                        {{ $member->position }}
                    </div>
                </div>
                
                <div class="p-6">
                    <h3 class="text-xl font-bold text-gray-900 mb-2 group-hover:text-red-600 transition-colors duration-300">{{ $member->name }}</h3>
                    <p class="text-gray-600 mb-4 leading-relaxed">{{ $member->description }}</p>
                    
                    <!-- Expertise indicators -->
                    <div class="flex flex-wrap gap-2">
                        <span class="inline-flex items-center px-3 py-1 bg-red-100 text-red-800 text-sm font-medium rounded-full">
                            <svg class="w-3 h-3 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                            </svg>
                            Expert
                        </span>
                        <span class="inline-flex items-center px-3 py-1 bg-yellow-100 text-yellow-800 text-sm font-medium rounded-full">
                            <svg class="w-3 h-3 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                            Certified
                        </span>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-span-full text-center py-16 bg-gradient-to-br from-red-50 to-yellow-50 rounded-3xl">
                <div class="relative w-24 h-24 mx-auto mb-6">
                    <div class="absolute inset-0 bg-red-100 rounded-full animate-ping opacity-75"></div>
                    <div class="absolute inset-2 bg-yellow-100 rounded-full"></div>
                    <svg class="w-12 h-12 mx-auto text-red-600 relative z-10 mt-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-9a2.5 2.5 0 11-5 0 2.5 2.5 0 015 0z"/>
                    </svg>
                </div>
                <h3 class="text-2xl font-bold text-gray-900 mb-2">Team Coming Soon</h3>
                <p class="text-gray-600 mb-8">We're building our amazing team. Stay tuned for introductions!</p>
                <a href="/contact" class="inline-flex items-center px-6 py-3 bg-red-600 text-white rounded-full font-semibold hover:bg-red-700 transform hover:scale-105 transition-all duration-300 shadow-lg">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 7.89a2.032 2.032 0 002.83 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                    </svg>
                    Join Our Team
                </a>
            </div>
            @endforelse
        </div>
    </section>

    <!-- Enhanced CTA Section -->
    <section class="max-w-7xl mx-auto px-4 py-20">
        <div class="bg-gradient-to-br from-red-900 to-yellow-600 rounded-3xl shadow-2xl p-12 relative overflow-hidden">
            <!-- Floating elements -->
            <div class="absolute top-0 left-1/4 w-32 h-32 bg-white bg-opacity-10 rounded-full animate-bounce"></div>
            <div class="absolute bottom-0 right-1/4 w-24 h-24 bg-white bg-opacity-10 rounded-full animate-bounce animation-delay-1000"></div>
            
            <div class="relative z-10 text-center">
                <h3 class="text-3xl md:text-4xl font-bold text-white mb-4">Ready to Experience Our Service?</h3>
                <p class="text-red-100 text-lg mb-8 max-w-2xl mx-auto">With our commitment to integrity, clear communication, and quality workmanship, we're ready to take care of your vehicle's needs.</p>
                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    <a href="/contact" class="inline-flex items-center px-8 py-4 bg-white text-red-900 rounded-full font-bold text-lg hover:bg-gray-100 transform hover:scale-105 transition-all duration-300 shadow-lg group">
                        <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 7.89a2.032 2.032 0 002.83 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                        </svg>
                        Contact Our Team
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
