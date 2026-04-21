<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    public function index()
    {
        return view('appointments.book');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'customer_name' => 'required|string|max:255',
            'customer_email' => 'required|email|max:255',
            'customer_phone' => 'required|string|max:255',
            'service_type' => 'required|array|min:1',
            'service_type.*' => 'required|string',
            'appointment_date' => 'required|date|after_or_equal:today',
            'appointment_time' => 'required',
            'notes' => 'nullable|string|max:500',
        ]);

        $validated['user_id'] = auth()->id();
        $validated['status'] = 'pending';

        Appointment::create($validated);

        return redirect()->route('appointments.book')
            ->with('success', 'Your appointment has been booked successfully! We will contact you soon to confirm.');
    }


    public function cancel(Appointment $appointment)
    {
        // Ensure the user can only cancel their own appointments
        if ($appointment->user_id !== auth()->id()) {
            abort(403, 'Unauthorized action.');
        }

        // Only allow cancellation of pending or confirmed appointments
        if (!in_array($appointment->status, ['pending', 'confirmed'])) {
            return back()->with('error', 'This appointment cannot be cancelled.');
        }

        $appointment->update(['status' => 'cancelled']);

        return back()->with('success', 'Appointment cancelled successfully.');
    }
}
