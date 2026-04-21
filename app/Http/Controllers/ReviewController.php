<?php

namespace App\Http\Controllers;

use App\Models\Review;
use App\Models\Appointment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    public function create(Appointment $appointment)
    {
        // Check if user owns this appointment
        if ($appointment->user_id !== Auth::id()) {
            abort(403, 'Unauthorized access to this appointment.');
        }

        // Check if appointment is completed
        if ($appointment->status !== 'completed') {
            return redirect()->route('dashboard')
                ->with('error', 'You can only review completed appointments.');
        }

        // Check if review already exists
        if ($appointment->hasReview()) {
            return redirect()->route('dashboard')
                ->with('info', 'You have already submitted a review for this appointment.');
        }

        return view('reviews.create', compact('appointment'));
    }

    public function store(Request $request, Appointment $appointment)
    {
        // Check if user owns this appointment
        if ($appointment->user_id !== Auth::id()) {
            abort(403, 'Unauthorized access to this appointment.');
        }

        // Check if appointment is completed
        if ($appointment->status !== 'completed') {
            return redirect()->route('dashboard')
                ->with('error', 'You can only review completed appointments.');
        }

        // Check if review already exists
        if ($appointment->hasReview()) {
            return redirect()->route('dashboard')
                ->with('info', 'You have already submitted a review for this appointment.');
        }

        $validated = $request->validate([
            'rating' => 'required|integer|min:1|max:5',
            'comment' => 'required|string|min:10|max:1000',
            'customer_photo' => 'nullable|image|max:2048',
        ]);

        $photoPath = null;
        if ($request->hasFile('customer_photo')) {
            $photoPath = $request->file('customer_photo')->store('reviews', 'public');
        }

        Review::create([
            'appointment_id' => $appointment->id,
            'user_id' => Auth::id(),
            'rating' => $validated['rating'],
            'comment' => $validated['comment'],
            'customer_name' => $appointment->customer_name,
            'service_used' => is_array($appointment->service_type)
                ? implode(', ', $appointment->service_type)
                : $appointment->service_type,
            'customer_photo' => $photoPath,
            'status' => 'pending',
        ]);

        return redirect()->route('dashboard')
            ->with('success', 'Thank you for your review! It has been submitted for approval and will appear on our website once approved.');
    }

    public function createGeneral()
    {
        return view('reviews.create', ['appointment' => null]);
    }

    public function storeGeneral(Request $request)
    {
        $validated = $request->validate([
            'rating' => 'required|integer|min:1|max:5',
            'comment' => 'required|string|min:10|max:1000',
            'customer_name' => 'required|string|max:255',
            'service_used' => 'nullable|string|max:255',
            'customer_photo' => 'nullable|image|max:2048',
        ]);

        $photoPath = null;
        if ($request->hasFile('customer_photo')) {
            $photoPath = $request->file('customer_photo')->store('reviews', 'public');
        }

        Review::create([
            'appointment_id' => null,
            'user_id' => Auth::id(),
            'rating' => $validated['rating'],
            'comment' => $validated['comment'],
            'customer_name' => $validated['customer_name'],
            'service_used' => $validated['service_used'],
            'customer_photo' => $photoPath,
            'status' => 'pending',
        ]);

        return redirect()->route('dashboard')
            ->with('success', 'Thank you for your review! It will be reviewed by our team.');
    }
}
