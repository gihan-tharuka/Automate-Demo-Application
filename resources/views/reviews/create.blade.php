<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Leave a Review
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    const starLabels = document.querySelectorAll('.star-label');
                    const starInputs = document.querySelectorAll('.star-input');
                    const starSvgs = document.querySelectorAll('.star-svg');
                    let currentRating = 0;

                    // Preserve old rating value if validation failed
                    @if(old('rating'))
                        currentRating = {{ old('rating') }};
                        updateStars(currentRating);
                    @endif

                    starLabels.forEach((label, index) => {
                        // Hover effect
                        label.addEventListener('mouseenter', function() {
                            const rating = parseInt(this.dataset.rating);
                            highlightStars(rating);
                        });

                        // Mouse leave effect
                        label.addEventListener('mouseleave', function() {
                            updateStars(currentRating);
                        });

                        // Click effect
                        label.addEventListener('click', function() {
                            currentRating = parseInt(this.dataset.rating);
                            starInputs[index].checked = true;
                            updateStars(currentRating);
                        });
                    });

                    function highlightStars(rating) {
                        starSvgs.forEach((svg, index) => {
                            if (index < rating) {
                                svg.classList.remove('text-gray-300');
                                svg.classList.add('text-yellow-400');
                            } else {
                                svg.classList.remove('text-yellow-400');
                                svg.classList.add('text-gray-300');
                            }
                        });
                    }

                    function updateStars(rating) {
                        highlightStars(rating);
                    }
                });
            </script>
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                <div class="mb-6">
                    <h3 class="text-lg font-medium text-gray-900 mb-2">How was your experience?</h3>
                    @if($appointment)
                        <p class="text-sm text-gray-600">
                            Appointment: <span class="font-semibold">{{ $appointment->customer_name }}</span> on
                            <span class="font-semibold">{{ $appointment->appointment_date->format('M d, Y') }}</span>
                        </p>
                        <p class="text-sm text-gray-600">
                            Service: <span class="font-semibold">{{ is_array($appointment->service_type) ? implode(', ', $appointment->service_type) : $appointment->service_type }}</span>
                        </p>
                    @else
                        <p class="text-sm text-gray-600">
                            Share your experience with our services
                        </p>
                    @endif
                </div>

                <form action="{{ $appointment ? route('reviews.store', $appointment) : route('reviews.general.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    @if(!$appointment)
                        <!-- Customer Name -->
                        <div class="mb-6">
                            <label for="customer_name" class="block text-sm font-medium text-gray-700 mb-2">
                                Your Name <span class="text-red-500">*</span>
                            </label>
                            <input
                                type="text"
                                id="customer_name"
                                name="customer_name"
                                value="{{ old('customer_name', auth()->user()->name) }}"
                                class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500"
                                required
                            >
                            @error('customer_name')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Service Used -->
                        <div class="mb-6">
                            <label for="service_used" class="block text-sm font-medium text-gray-700 mb-2">
                                Service Used (Optional)
                            </label>
                            <input
                                type="text"
                                id="service_used"
                                name="service_used"
                                value="{{ old('service_used') }}"
                                class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500"
                                placeholder="e.g., Oil Change, Brake Service, etc."
                            >
                            @error('service_used')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    @endif

                    <!-- Rating -->
                    <div class="mb-6">
                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            Rating <span class="text-red-500">*</span>
                        </label>
                        <div class="flex items-center space-x-2 star-rating">
                            @for ($i = 1; $i <= 5; $i++)
                                <label class="cursor-pointer star-label" data-rating="{{ $i }}">
                                    <input type="radio" name="rating" value="{{ $i }}" class="hidden star-input" required>
                                    <svg class="w-10 h-10 text-gray-300 star-svg transition-colors duration-200"
                                         fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                    </svg>
                                </label>
                            @endfor
                        </div>
                        <p class="text-xs text-gray-500 mt-1">Click on a star to rate your experience</p>
                        @error('rating')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Comment -->
                    <div class="mb-6">
                        <label for="comment" class="block text-sm font-medium text-gray-700 mb-2">
                            Your Review <span class="text-red-500">*</span>
                        </label>
                        <textarea
                            id="comment"
                            name="comment"
                            rows="5"
                            class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500"
                            placeholder="Tell us about your experience..."
                            required
                        >{{ old('comment') }}</textarea>
                        <p class="text-xs text-gray-500 mt-1">Minimum 10 characters</p>
                        @error('comment')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Optional Photo -->
                    <div class="mb-6">
                        <label for="customer_photo" class="block text-sm font-medium text-gray-700 mb-2">
                            Add a Photo (Optional)
                        </label>
                        <input
                            type="file"
                            id="customer_photo"
                            name="customer_photo"
                            accept="image/*"
                            class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500"
                        >
                        <p class="text-xs text-gray-500 mt-1">Max file size: 2MB</p>
                        @error('customer_photo')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Submit Button -->
                    <div class="flex items-center justify-between">
                        <a href="{{ route('dashboard') }}" class="text-gray-600 hover:text-gray-900">
                            Cancel
                        </a>
                        <button
                            type="submit"
                            class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-6 rounded-lg transition"
                        >
                            Submit Review
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
