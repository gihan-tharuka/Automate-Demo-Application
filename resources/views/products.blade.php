<x-app-layout>
    <style>
        /* Enhanced product card animations */
        .product-card {
            transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            transform: translateY(0) scale(1);
        }
        
        .product-card:hover {
            transform: translateY(-8px) scale(1.02);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15);
        }
        
        /* Enhanced button animations */
        .product-cta {
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }
        
        .product-cta::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.2), transparent);
            transition: left 0.5s;
        }
        
        .product-cta:hover::before {
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
                        Premium Auto Parts
                    </span>
                </div>
                
                <h1 class="text-4xl md:text-5xl font-extrabold mb-4 leading-tight">
                    <span class="block">Our</span>
                    <span class="block text-yellow-300">Products</span>
                </h1>
                
                <p class="text-base md:text-lg text-red-100 mb-6 leading-relaxed max-w-md">
                    Quality automotive parts and accessories for your vehicle. 
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
                    <a href="/products" class="inline-flex items-center px-6 py-3 border-2 border-white border-opacity-50 text-white rounded-full font-bold text-base hover:bg-white hover:text-red-900 transform hover:scale-105 transition-all duration-300 backdrop-blur-sm">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                        </svg>
                        View Products
                    </a>
                </div>
            </div>
        </div>
        
        <!-- Floating elements for depth -->
        <div class="absolute bottom-0 left-0 right-0 h-20 bg-gradient-to-t from-red-900 to-transparent"></div>
    </section>

    <!-- Products Section -->
    <section class="max-w-7xl mx-auto px-4 py-20">

        <!-- Enhanced Search & Filter Section -->
        <div class="mb-8">
            <div class="bg-gradient-to-br from-white to-gray-50 rounded-2xl shadow-lg p-8 border border-gray-100">
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                    <!-- Search Bar -->
                    <div>
                        <label for="searchInput" class="block text-sm font-medium text-gray-700 mb-2">Search Products</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                                </svg>
                            </div>
                            <input type="text" id="searchInput" placeholder="Search by product name, part number, or description..." class="w-full pl-10 pr-4 py-3 bg-white border border-gray-200 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-red-500 transition-all duration-200 hover:border-red-300">
                        </div>
                    </div>

                    <!-- Quick Filters -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Quick Filters</label>
                        <div class="flex flex-wrap gap-2">
                            <button onclick="setQuickFilter('all')" class="quick-filter-btn active px-4 py-2 bg-gradient-to-r from-red-600 to-yellow-500 text-white rounded-full font-semibold text-sm hover:from-red-700 hover:to-yellow-600 transform hover:scale-105 transition-all duration-200">
                                All Products
                            </button>
                            <button onclick="setQuickFilter('electrical')" class="quick-filter-btn px-4 py-2 bg-white text-red-900 border-2 border-red-900 rounded-full font-semibold text-sm hover:bg-red-900 hover:text-white transform hover:scale-105 transition-all duration-200">
                                Electrical Parts
                            </button>
                            <button onclick="setQuickFilter('mechanical')" class="quick-filter-btn px-4 py-2 bg-white text-red-900 border-2 border-red-900 rounded-full font-semibold text-sm hover:bg-red-900 hover:text-white transform hover:scale-105 transition-all duration-200">
                                Mechanical Parts
                            </button>
                            <button onclick="setQuickFilter('in-stock')" class="quick-filter-btn px-4 py-2 bg-white text-red-900 border-2 border-red-900 rounded-full font-semibold text-sm hover:bg-red-900 hover:text-white transform hover:scale-105 transition-all duration-200">
                                In Stock
                            </button>
                        </div>
                    </div>
                </div>
                
                <!-- Advanced Filters Toggle -->
                <div class="mt-6 flex justify-between items-center">
                    <button onclick="toggleAdvancedFilters()" class="flex items-center text-red-600 font-semibold hover:text-red-700 transition-colors duration-200">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 100 4m-6 8a2 2 0 104 0m2-4a2 2 0 11-4 0m6 8a2 2 0 104 0m2-4a2 2 0 11-4 0m-6 8v2m0-2H6m12 0h2m-2 0v-2m0 2h2"/>
                        </svg>
                        Advanced Filters
                    </button>
                    <span id="filterCount" class="text-sm text-gray-600 bg-white rounded-lg border border-gray-200 px-4 py-2"></span>
                </div>
            </div>
        </div>

        <!-- Advanced Vehicle Filters (Hidden by Default) -->
        <div id="advancedFilters" class="mb-8 hidden">
            <div class="bg-gradient-to-br from-white to-gray-50 rounded-2xl shadow-lg p-6 border border-gray-100">
                <h3 class="text-lg font-bold text-gray-900 mb-4 flex items-center">
                    <svg class="w-5 h-5 mr-2 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16V6a1 1 0 00-1-1H4a1 1 0 00-1 1v10a1 1 0 001 1h1m8-1a1 1 0 01-1 1H9m4-1V8a1 1 0 011-1h2.586a1 1 0 01.707.293l3.414 3.414a1 1 0 01.293.707V16a1 1 0 01-1 1h-1m-6-1a1 1 0 001 1h1M5 17a2 2 0 104 0m-4 0a2 2 0 114 0m6 0a2 2 0 104 0m-4 0a2 2 0 114 0"/>
                    </svg>
                    Filter by Vehicle
                </h3>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    <!-- Make Filter -->
                    @if($makes->count() > 0)
                    <div>
                        <label for="makeFilter" class="block text-sm font-medium text-gray-700 mb-2">Make</label>
                        <select id="makeFilter" onchange="applyAllFilters()" class="w-full px-4 py-2.5 bg-white border border-gray-200 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-red-500 transition-all duration-200 hover:border-red-300">
                            <option value="">All Makes</option>
                            @foreach($makes as $make)
                            <option value="{{ $make }}">{{ $make }}</option>
                            @endforeach
                        </select>
                    </div>
                    @endif

                    <!-- Model Filter -->
                    @if($models->count() > 0)
                    <div>
                        <label for="modelFilter" class="block text-sm font-medium text-gray-700 mb-2">Model</label>
                        <select id="modelFilter" onchange="applyAllFilters()" class="w-full px-4 py-2.5 bg-white border border-gray-200 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-red-500 transition-all duration-200 hover:border-red-300">
                            <option value="">All Models</option>
                            @foreach($models as $model)
                            <option value="{{ $model }}">{{ $model }}</option>
                            @endforeach
                        </select>
                    </div>
                    @endif

                    <!-- Year Filter -->
                    @if($years->count() > 0)
                    <div>
                        <label for="yearFilter" class="block text-sm font-medium text-gray-700 mb-2">Year</label>
                        <select id="yearFilter" onchange="applyAllFilters()" class="w-full px-4 py-2.5 bg-white border border-gray-200 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-red-500 transition-all duration-200 hover:border-red-300">
                            <option value="">All Years</option>
                            @foreach($years as $year)
                            <option value="{{ $year }}">{{ $year }}</option>
                            @endforeach
                        </select>
                    </div>
                    @endif
                </div>
                <div class="mt-4 flex gap-2">
                    <button onclick="clearAllFilters()" class="px-6 py-2.5 bg-gradient-to-r from-red-600 to-yellow-500 text-white rounded-lg font-semibold hover:from-red-700 hover:to-yellow-600 transform hover:scale-105 transition-all duration-200 shadow-lg">
                        Clear All Filters
                    </button>
                    <button onclick="toggleAdvancedFilters()" class="px-6 py-2.5 bg-gray-200 text-gray-700 rounded-lg font-semibold hover:bg-gray-300 transition-colors duration-200">
                        Hide Filters
                    </button>
                </div>
            </div>
        </div>

        <!-- Products Grid -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-8">

            @forelse($products as $product)
            <!-- Product Card: {{ $product->name }} -->
            <div class="product-card group bg-white rounded-2xl shadow-lg overflow-hidden hover:shadow-2xl transition-all duration-300 border border-gray-100 hover:border-red-200"
                data-category="{{ $product->category_id }}"
                data-make="{{ $product->vehicle_make ?? '' }}"
                data-model="{{ $product->vehicle_model ?? '' }}"
                data-year="{{ $product->vehicle_year ?? '' }}">

                <!-- Product Image Section -->
                <div class="relative overflow-hidden bg-gradient-to-br from-red-50 to-yellow-50">
                    @if($product->image)
                        <img src="{{ Storage::url($product->image) }}" alt="{{ $product->name }}" class="w-full h-56 object-cover transition-transform duration-500 group-hover:scale-110">
                    @else
                        <img src="{{ asset('images/electricparts.jpg') }}" alt="{{ $product->name }}" class="w-full h-56 object-cover transition-transform duration-500 group-hover:scale-110">
                    @endif
                    
                    <!-- Hover Overlay -->
                    <div class="absolute inset-0 bg-gradient-to-t from-red-900/20 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                    
                    <!-- Category Badge -->
                    <div class="absolute top-3 left-3 bg-white bg-opacity-95 backdrop-blur-sm rounded-full px-3 py-1 text-sm font-semibold text-red-900 shadow-lg border border-red-200">
                        {{ $product->category->name }}
                    </div>

                    <!-- Stock Status Badge -->
                    @if($product->isLowStock())
                    <div class="absolute top-3 right-3 bg-orange-500 text-white px-2 py-1 rounded-full text-xs font-semibold shadow-lg">
                        Low Stock
                    </div>
                    @endif
                </div>

                <!-- Product Details Section -->
                <div class="p-6">
                    <!-- Product Name -->
                    <h3 class="text-xl font-bold text-gray-900 mb-2 line-clamp-2 group-hover:text-red-600 transition-colors duration-300">{{ $product->name }}</h3>

                    <!-- Part Number -->
                    <p class="text-sm text-gray-600 mb-3">
                        <span class="font-semibold text-gray-700">Part #:</span> {{ $product->part_number }}
                    </p>

                    <!-- Vehicle Information -->
                    @if($product->vehicle_make || $product->vehicle_model || $product->vehicle_year)
                    <div class="flex items-center gap-2 mb-3 p-2 bg-gray-50 rounded-lg">
                        <svg class="w-4 h-4 text-red-600 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16V6a1 1 0 00-1-1H4a1 1 0 00-1 1v10a1 1 0 001 1h1m8-1a1 1 0 01-1 1H9m4-1V8a1 1 0 011-1h2.586a1 1 0 01.707.293l3.414 3.414a1 1 0 01.293.707V16a1 1 0 01-1 1h-1m-6-1a1 1 0 001 1h1M5 17a2 2 0 104 0m-4 0a2 2 0 114 0m6 0a2 2 0 104 0m-4 0a2 2 0 114 0"/>
                        </svg>
                        <span class="text-sm text-gray-700">
                            @if($product->vehicle_make){{ $product->vehicle_make }}@endif
                            @if($product->vehicle_model) {{ $product->vehicle_model }}@endif
                            @if($product->vehicle_year) ({{ $product->vehicle_year }})@endif
                        </span>
                    </div>
                    @endif

                    <!-- Description -->
                    @if($product->description)
                    <p class="text-sm text-gray-600 mb-4 line-clamp-3">{{ $product->description }}</p>
                    @endif

                    <!-- Price and Availability -->
                    <div class="flex items-center justify-between mb-4 pt-3 border-t border-gray-100">
                        <div>
                            <p class="text-xs font-semibold text-red-600 mb-1 uppercase tracking-wide">Price</p>
                            <p class="text-lg font-bold text-gray-900">
                                LKR {{ number_format($product->selling_price, 2) }}
                            </p>
                        </div>
                        <div class="text-right">
                            <p class="text-xs font-semibold text-red-600 mb-1 uppercase tracking-wide">Available</p>
                            <p class="text-base font-semibold {{ $product->isLowStock() ? 'text-orange-500' : 'text-green-600' }}">
                                {{ $product->quantity }} units
                            </p>
                        </div>
                    </div>

                    <!-- CTA Button -->
                    <a href="/contact" class="w-full inline-flex items-center justify-center px-6 py-3 bg-gradient-to-r from-red-600 to-yellow-500 text-white rounded-lg font-semibold text-base hover:from-red-700 hover:to-yellow-600 transform hover:scale-105 transition-all duration-300 shadow-lg group-hover:shadow-xl">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                        </svg>
                        Inquire Now
                    </a>
                </div>
            </div>
            @empty
            <div class="col-span-full text-center py-16 bg-gradient-to-br from-red-50 to-yellow-50 rounded-3xl">
                <div class="relative w-24 h-24 mx-auto mb-6">
                    <div class="absolute inset-0 bg-red-100 rounded-full animate-ping opacity-75"></div>
                    <div class="absolute inset-2 bg-yellow-100 rounded-full"></div>
                    <svg class="w-12 h-12 mx-auto text-red-600 relative z-10 mt-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/>
                    </svg>
                </div>
                <h3 class="text-2xl font-bold text-gray-900 mb-2">No Products Available</h3>
                <p class="text-gray-600 mb-8">Please check back later for new arrivals.</p>
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
                <h3 class="text-3xl md:text-4xl font-bold text-white mb-4">Can't Find What You're Looking For?</h3>
                <p class="text-red-100 text-lg mb-8 max-w-2xl mx-auto">We have access to a wide range of automotive parts beyond what's listed here. Contact us with your specific requirements and we'll help you find the right parts for your vehicle.</p>
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

    <!-- Enhanced Filter Script -->
    <script>
        let currentCategoryFilter = 'all';
        let currentMakeFilter = '';
        let currentModelFilter = '';
        let currentYearFilter = '';
        let currentSearchTerm = '';
        let currentQuickFilter = 'all';

        // Quick filter mappings
        const quickFilterMappings = {
            'electrical': ['electrical', 'wiring', 'battery', 'alternator', 'starter', 'fuse', 'relay', 'switch', 'sensor'],
            'mechanical': ['mechanical', 'engine', 'transmission', 'brake', 'suspension', 'steering', 'exhaust', 'cooling'],
            'in-stock': 'in-stock'
        };

        function setQuickFilter(filterType) {
            currentQuickFilter = filterType;

            // Update active button
            const buttons = document.querySelectorAll('.quick-filter-btn');
            buttons.forEach(btn => {
                btn.classList.remove('active', 'bg-gradient-to-r', 'from-red-600', 'to-yellow-500', 'text-white');
                btn.classList.add('bg-white', 'text-red-900', 'border-2', 'border-red-900');
            });
            event.target.classList.add('active', 'bg-gradient-to-r', 'from-red-600', 'to-yellow-500', 'text-white');
            event.target.classList.remove('bg-white', 'text-red-900', 'border-2', 'border-red-900');

            applyAllFilters();
        }

        function toggleAdvancedFilters() {
            const advancedFilters = document.getElementById('advancedFilters');
            const toggleBtn = event.target.closest('button');
            
            if (advancedFilters.classList.contains('hidden')) {
                advancedFilters.classList.remove('hidden');
                advancedFilters.classList.add('block');
                toggleBtn.innerHTML = `
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 100 4m-6 8a2 2 0 104 0m2-4a2 2 0 11-4 0m6 8a2 2 0 104 0m2-4a2 2 0 11-4 0m-6 8v2m0-2H6m12 0h2m-2 0v-2m0 2h2"/>
                    </svg>
                    Hide Filters
                `;
            } else {
                advancedFilters.classList.add('hidden');
                advancedFilters.classList.remove('block');
                toggleBtn.innerHTML = `
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 100 4m-6 8a2 2 0 104 0m2-4a2 2 0 11-4 0m6 8a2 2 0 104 0m2-4a2 2 0 11-4 0m-6 8v2m0-2H6m12 0h2m-2 0v-2m0 2h2"/>
                    </svg>
                    Advanced Filters
                `;
            }
        }

        function applyVehicleFilters() {
            currentMakeFilter = document.getElementById('makeFilter')?.value || '';
            currentModelFilter = document.getElementById('modelFilter')?.value || '';
            currentYearFilter = document.getElementById('yearFilter')?.value || '';
            applyAllFilters();
        }

        function applySearchFilter() {
            currentSearchTerm = document.getElementById('searchInput')?.value.toLowerCase() || '';
            applyAllFilters();
        }

        function applyAllFilters() {
            const products = document.querySelectorAll('.product-card');
            let visibleCount = 0;

            products.forEach(product => {
                const productCategory = product.dataset.category;
                const productMake = product.dataset.make;
                const productModel = product.dataset.model;
                const productYear = product.dataset.year;
                const productName = product.querySelector('h3')?.textContent.toLowerCase() || '';
                const productPartNumber = product.querySelector('p.text-sm.text-gray-500')?.textContent.toLowerCase() || '';
                const productDescription = product.querySelector('p.text-sm.text-gray-600')?.textContent.toLowerCase() || '';
                const productCategoryName = product.querySelector('.bg-white.bg-opacity-90')?.textContent.toLowerCase() || '';

                // Check category filter
                const categoryMatch = currentCategoryFilter === 'all' || productCategory === currentCategoryFilter;

                // Check vehicle filters
                const makeMatch = !currentMakeFilter || productMake === currentMakeFilter;
                const modelMatch = !currentModelFilter || productModel === currentModelFilter;
                const yearMatch = !currentYearFilter || productYear === currentYearFilter;

                // Check search filter
                const searchMatch = !currentSearchTerm || 
                    productName.includes(currentSearchTerm) || 
                    productPartNumber.includes(currentSearchTerm) ||
                    productDescription.includes(currentSearchTerm) ||
                    productCategoryName.includes(currentSearchTerm);

                // Check quick filter
                let quickFilterMatch = true;
                if (currentQuickFilter !== 'all') {
                    if (currentQuickFilter === 'in-stock') {
                        const stockElement = product.querySelector('.text-green-600, .text-orange-500');
                        quickFilterMatch = stockElement !== null;
                    } else {
                        const keywords = quickFilterMappings[currentQuickFilter];
                        quickFilterMatch = keywords.some(keyword => 
                            productName.includes(keyword) || 
                            productDescription.includes(keyword) ||
                            productCategoryName.includes(keyword)
                        );
                    }
                }

                // Show product only if ALL filters match
                if (categoryMatch && makeMatch && modelMatch && yearMatch && searchMatch && quickFilterMatch) {
                    product.style.display = 'flex';
                    setTimeout(() => {
                        product.style.opacity = '1';
                        product.style.transform = 'scale(1)';
                    }, 10);
                    visibleCount++;
                } else {
                    product.style.opacity = '0';
                    product.style.transform = 'scale(0.9)';
                    setTimeout(() => {
                        product.style.display = 'none';
                    }, 300);
                }
            });

            updateFilterCount(visibleCount);
        }

        function updateFilterCount(count) {
            const filterCountEl = document.getElementById('filterCount');
            if (filterCountEl) {
                filterCountEl.textContent = `Showing ${count} ${count === 1 ? 'product' : 'products'}`;
            }
        }

        function clearAllFilters() {
            // Reset all filters
            currentCategoryFilter = 'all';
            currentMakeFilter = '';
            currentModelFilter = '';
            currentYearFilter = '';
            currentSearchTerm = '';
            currentQuickFilter = 'all';

            // Reset quick filter buttons
            const quickButtons = document.querySelectorAll('.quick-filter-btn');
            quickButtons.forEach((btn, index) => {
                if (index === 0) { // First button is "All Products"
                    btn.classList.add('active', 'bg-gradient-to-r', 'from-red-600', 'to-yellow-500', 'text-white');
                    btn.classList.remove('bg-white', 'text-red-900', 'border-2', 'border-red-900');
                } else {
                    btn.classList.remove('active', 'bg-gradient-to-r', 'from-red-600', 'to-yellow-500', 'text-white');
                    btn.classList.add('bg-white', 'text-red-900', 'border-2', 'border-red-900');
                }
            });

            // Reset vehicle filters
            const makeFilter = document.getElementById('makeFilter');
            const modelFilter = document.getElementById('modelFilter');
            const yearFilter = document.getElementById('yearFilter');
            const searchInput = document.getElementById('searchInput');

            if (makeFilter) makeFilter.value = '';
            if (modelFilter) modelFilter.value = '';
            if (yearFilter) yearFilter.value = '';
            if (searchInput) searchInput.value = '';

            applyAllFilters();
        }

        // Add transition styles and initialize
        document.addEventListener('DOMContentLoaded', function() {
            document.querySelectorAll('.product-card').forEach(product => {
                product.style.transition = 'opacity 0.3s ease, transform 0.3s ease';
            });

            // Add search input event listener
            const searchInput = document.getElementById('searchInput');
            if (searchInput) {
                searchInput.addEventListener('input', applySearchFilter);
            }

            // Initialize filter count
            const totalProducts = document.querySelectorAll('.product-card').length;
            updateFilterCount(totalProducts);
        });
    </script>

</x-app-layout>
