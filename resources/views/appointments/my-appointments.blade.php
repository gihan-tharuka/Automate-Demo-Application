<x-app-layout>

    <!-- Hero Section -->
    <section class="relative bg-gradient-to-br from-blue-900 via-blue-700 to-blue-400 text-white flex items-center justify-center min-h-[40vh]">
        <div class="relative z-10 text-center max-w-2xl mx-auto py-20">
            <h1 class="text-5xl md:text-6xl font-extrabold mb-6 drop-shadow-lg">My Appointments</h1>
            <p class="text-xl md:text-2xl mb-8 font-medium">View and manage your scheduled appointments</p>
        </div>
    </section>

    <!-- Appointments List Section -->
    <section class="max-w-7xl mx-auto px-4 py-16">
        @if(session('success'))
            <div class="mb-6 p-4 bg-green-100 text-green-800 rounded">
                {{ session('success') }}
            </div>
        @endif

        @if(session('error'))
            <div class="mb-6 p-4 bg-red-100 text-red-800 rounded">
                {{ session('error') }}
            </div>
        @endif

        <div class="flex justify-between items-center mb-6">
            <h2 class="text-2xl font-bold text-blue-900">Your Appointments</h2>
            <a
                href="{{ route('appointments.book') }}"
                class="bg-blue-600 text-white px-6 py-2 rounded-lg hover:bg-blue-700 transition font-medium"
            >
                Book New Appointment
            </a>
        </div>

        @if($appointments->isEmpty())
            <div class="bg-white rounded-xl shadow-lg p-12 text-center">
                <svg class="mx-auto h-24 w-24 text-gray-400 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                </svg>
                <h3 class="text-xl font-semibold text-gray-700 mb-2">No Appointments Found</h3>
                <p class="text-gray-500 mb-6">You haven't booked any appointments yet.</p>
                <a
                    href="{{ route('appointments.book') }}"
                    class="inline-block bg-blue-600 text-white px-6 py-3 rounded-lg hover:bg-blue-700 transition font-medium"
                >
                    Book Your First Appointment
                </a>
            </div>
        @else
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($appointments as $appointment)
                    <div class="bg-white rounded-xl shadow-lg overflow-hidden">
                        <!-- Status Banner -->
                        <div class="px-6 py-3
                            @if($appointment->status === 'pending') bg-yellow-500
                            @elseif($appointment->status === 'confirmed') bg-blue-500
                            @elseif($appointment->status === 'completed') bg-green-500
                            @elseif($appointment->status === 'cancelled') bg-red-500
                            @endif
                            text-white font-semibold text-center uppercase text-sm">
                            {{ $appointment->status }}
                        </div>

                        <!-- Appointment Details -->
                        <div class="p-6">
                            <div class="mb-4">
                                <h4 class="text-sm font-medium text-gray-500 mb-2">Services Requested</h4>
                                <div class="flex flex-wrap gap-2">
                                    @foreach($appointment->service_type as $service)
                                        <span class="inline-block bg-blue-100 text-blue-800 text-xs font-semibold px-3 py-1 rounded-full">
                                            {{ $service }}
                                        </span>
                                    @endforeach
                                </div>
                            </div>

                            <div class="space-y-3">
                                <div class="flex items-start">
                                    <svg class="w-5 h-5 text-blue-600 mr-3 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                    </svg>
                                    <div>
                                        <p class="text-sm text-gray-500">Date & Time</p>
                                        <p class="font-semibold text-gray-900">
                                            {{ $appointment->appointment_date->format('M d, Y') }}
                                            at {{ $appointment->appointment_time instanceof \Carbon\Carbon ? $appointment->appointment_time->format('g:i A') : date('g:i A', strtotime($appointment->appointment_time)) }}
                                        </p>
                                    </div>
                                </div>

                                <div class="flex items-start">
                                    <svg class="w-5 h-5 text-blue-600 mr-3 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                    </svg>
                                    <div>
                                        <p class="text-sm text-gray-500">Contact</p>
                                        <p class="font-medium text-gray-900">{{ $appointment->customer_phone }}</p>
                                    </div>
                                </div>

                                @if($appointment->notes)
                                    <div class="flex items-start">
                                        <svg class="w-5 h-5 text-blue-600 mr-3 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                        </svg>
                                        <div>
                                            <p class="text-sm text-gray-500">Notes</p>
                                            <p class="text-sm text-gray-700">{{ Str::limit($appointment->notes, 100) }}</p>
                                        </div>
                                    </div>
                                @endif

                                @if($appointment->admin_notes)
                                    <div class="flex items-start bg-blue-50 p-3 rounded">
                                        <svg class="w-5 h-5 text-blue-600 mr-3 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                        </svg>
                                        <div>
                                            <p class="text-sm font-semibold text-blue-900">Admin Note</p>
                                            <p class="text-sm text-blue-800">{{ $appointment->admin_notes }}</p>
                                        </div>
                                    </div>
                                @endif
                            </div>

                            <!-- Action Button -->
                            @if(in_array($appointment->status, ['pending', 'confirmed']))
                                <form action="{{ route('appointments.cancel', $appointment) }}" method="POST" class="mt-4">
                                    @csrf
                                    <button
                                        type="submit"
                                        onclick="return confirm('Are you sure you want to cancel this appointment?')"
                                        class="w-full bg-red-100 text-red-700 px-4 py-2 rounded-lg hover:bg-red-200 transition font-medium"
                                    >
                                        Cancel Appointment
                                    </button>
                                </form>
                            @endif
                        </div>

                        <!-- Footer -->
                        <div class="px-6 py-3 bg-gray-50 text-xs text-gray-500">
                            Booked on {{ $appointment->created_at->format('M d, Y') }}
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </section>

</x-app-layout>
