<x-app-layout>
    <!-- Hero Section -->
    <section class="bg-gradient-to-r from-blue-600 to-blue-800 text-white py-20">
        <div class="container mx-auto px-4 text-center">
            <h1 class="text-4xl md:text-5xl font-bold mb-4">What Our Customers Say</h1>
            <p class="text-xl text-blue-100">Real feedback from our valued customers</p>
        </div>
    </section>

    <!-- Statistics Section -->
    <section class="py-12 bg-white">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 text-center">
                <div>
                    <div class="text-4xl font-bold text-blue-600 mb-2">{{ $stats['total_reviews'] }}</div>
                    <div class="text-gray-600">Total Reviews</div>
                </div>
                <div>
                    <div class="text-4xl font-bold text-yellow-500 mb-2">{{ number_format($stats['average_rating'], 1) }}</div>
                    <div class="text-gray-600">Average Rating</div>
                </div>
                <div>
                    <div class="text-4xl font-bold text-green-600 mb-2">{{ $stats['five_star_percentage'] }}%</div>
                    <div class="text-gray-600">5-Star Reviews</div>
                </div>
            </div>
        </div>
    </section>

    <!-- Testimonials Grid -->
    <section class="py-16">
        <div class="container mx-auto px-4">
            @if($testimonials->isEmpty())
                <div class="text-center py-12">
                    <svg class="mx-auto h-24 w-24 text-gray-400 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"/>
                    </svg>
                    <h3 class="text-2xl font-bold text-gray-700 mb-4">No Testimonials Yet</h3>
                    <p class="text-gray-600 text-lg mb-6">Be the first to share your experience with us!</p>
                    <a href="{{ route('appointments.book') }}" class="inline-block bg-blue-600 text-white font-semibold px-8 py-3 rounded-lg hover:bg-blue-700 transition">
                        Book an Appointment
                    </a>
                </div>
            @else
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    @foreach($testimonials as $review)
                        <div class="bg-white rounded-lg shadow-lg p-6 hover:shadow-xl transition">
                            <!-- Rating Stars -->
                            <div class="flex items-center mb-4">
                                @for($i = 0; $i < $review->rating; $i++)
                                    <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                    </svg>
                                @endfor
                                @for($i = $review->rating; $i < 5; $i++)
                                    <svg class="w-5 h-5 text-gray-300" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                    </svg>
                                @endfor
                            </div>

                            <!-- Review Text -->
                            <p class="text-gray-700 mb-4 leading-relaxed">"{{ $review->comment }}"</p>

                            <!-- Customer Info -->
                            <div class="border-t pt-4">
                                <p class="font-semibold text-gray-900">{{ $review->customer_name }}</p>
                                @if($review->service_used)
                                    <p class="text-sm text-gray-600">{{ $review->service_used }}</p>
                                @endif
                                <p class="text-xs text-gray-500 mt-1">{{ $review->created_at->format('M d, Y') }}</p>
                            </div>

                            <!-- Verified Badge -->
                            <div class="mt-3">
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                    <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M6.267 3.455a3.066 3.066 0 001.745-.723 3.066 3.066 0 013.976 0 3.066 3.066 0 001.745.723 3.066 3.066 0 012.812 2.812c.051.643.304 1.254.723 1.745a3.066 3.066 0 010 3.976 3.066 3.066 0 00-.723 1.745 3.066 3.066 0 01-2.812 2.812 3.066 3.066 0 00-1.745.723 3.066 3.066 0 01-3.976 0 3.066 3.066 0 00-1.745-.723 3.066 3.066 0 01-2.812-2.812 3.066 3.066 0 00-.723-1.745 3.066 3.066 0 010-3.976 3.066 3.066 0 00.723-1.745 3.066 3.066 0 012.812-2.812zm7.44 5.252a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                    </svg>
                                    Verified Customer
                                </span>
                            </div>
                        </div>
                    @endforeach
                </div>

                <!-- Pagination -->
                <div class="mt-12">
                    {{ $testimonials->links() }}
                </div>
            @endif
        </div>
    </section>

    <!-- CTA Section -->
    <section class="bg-blue-600 text-white py-16">
        <div class="container mx-auto px-4 text-center">
            <h2 class="text-3xl font-bold mb-4">Experience Our Service Yourself</h2>
            <p class="text-xl text-blue-100 mb-8">Join hundreds of satisfied customers</p>
            <a href="{{ route('appointments.book') }}" class="inline-block bg-white text-blue-600 font-semibold px-8 py-3 rounded-lg hover:bg-blue-50 transition">
                Book an Appointment
            </a>
        </div>
    </section>
</x-app-layout>
