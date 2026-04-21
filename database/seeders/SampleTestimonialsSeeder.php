<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Appointment;
use App\Models\Review;
use Illuminate\Support\Facades\Hash;

class SampleTestimonialsSeeder extends Seeder
{
    public function run(): void
    {
        // Create a sample user if none exists
        $user = User::firstOrCreate(
            ['email' => 'sample.customer@example.com'],
            [
                'name' => 'Sample Customer',
                'password' => Hash::make('password123'),
            ]
        );

        // Create sample appointments
        $appointment1 = Appointment::create([
            'user_id' => $user->id,
            'customer_name' => 'Sarah Johnson',
            'customer_email' => 'sarah.johnson@example.com',
            'customer_phone' => '0771234567',
            'service_type' => ['Oil Change', 'Brake Service'],
            'appointment_date' => now()->subDays(15),
            'appointment_time' => '10:00',
            'status' => 'completed',
            'notes' => 'Regular maintenance',
        ]);

        $appointment2 = Appointment::create([
            'user_id' => $user->id,
            'customer_name' => 'Michael Chen',
            'customer_email' => 'michael.chen@example.com',
            'customer_phone' => '0772345678',
            'service_type' => ['Engine Diagnostics', 'AC Service'],
            'appointment_date' => now()->subDays(20),
            'appointment_time' => '14:00',
            'status' => 'completed',
            'notes' => 'AC not cooling properly',
        ]);

        // Create sample reviews (approved and featured)
        Review::create([
            'appointment_id' => $appointment1->id,
            'user_id' => $user->id,
            'rating' => 5,
            'comment' => 'Padmasiri Auto Electrical saved my livelihood! My Toyota Prius hybrid battery was completely dead and they diagnosed the issue within minutes. They repaired it at a fraction of the replacement cost. Now my car runs like new again.',
            'customer_name' => 'Chaminda Perera',
            'service_used' => 'Hybrid Battery Repair',
            'status' => 'approved',
            'is_featured' => true,
        ]);

        Review::create([
            'appointment_id' => $appointment2->id,
            'user_id' => $user->id,
            'rating' => 5,
            'comment' => 'Professional and reliable service. My van\'s alternator failed on a busy day and they had it replaced and tested within 2 hours. The team is very knowledgeable about both local and imported vehicles.',
            'customer_name' => 'Nimal Silva',
            'service_used' => 'Alternator Replacement',
            'status' => 'approved',
            'is_featured' => true,
        ]);

        // Additional Sri Lankan customer testimonials
        Review::create([
            'appointment_id' => $appointment1->id,
            'user_id' => $user->id,
            'rating' => 4,
            'comment' => 'Excellent work on my son\'s car starter motor. They explained the problem clearly and provided honest advice. The pricing was very reasonable compared to other workshops in the area.',
            'customer_name' => 'Sunil Fernando',
            'service_used' => 'Starter Motor Repair',
            'status' => 'approved',
            'is_featured' => true,
        ]);

        Review::create([
            'appointment_id' => $appointment2->id,
            'user_id' => $user->id,
            'rating' => 5,
            'comment' => 'I\'ve been bringing my old Toyota Corolla here for years. They know exactly how to handle Sri Lankan road conditions and keep my car running smoothly. Trustworthy and affordable service.',
            'customer_name' => 'Anura Rathnayake',
            'service_used' => 'General Electrical Service',
            'status' => 'approved',
            'is_featured' => true,
        ]);

        Review::create([
            'appointment_id' => $appointment1->id,
            'user_id' => $user->id,
            'rating' => 4,
            'comment' => 'Fast and efficient service! My delivery van\'s electrical system was causing issues and they fixed everything in one visit. Now I can focus on my deliveries without worrying about breakdowns.',
            'customer_name' => 'Lakmal Jayasinghe',
            'service_used' => 'Electrical System Diagnostics',
            'status' => 'approved',
            'is_featured' => true,
        ]);

        Review::create([
            'appointment_id' => $appointment2->id,
            'user_id' => $user->id,
            'rating' => 5,
            'comment' => 'Outstanding service for my hotel\'s fleet vehicles. They handle everything from battery replacements to complex electrical diagnostics. Always on time and professional.',
            'customer_name' => 'Roshan Gunasekara',
            'service_used' => 'Fleet Vehicle Service',
            'status' => 'approved',
            'is_featured' => true,
        ]);

        Review::create([
            'appointment_id' => $appointment1->id,
            'user_id' => $user->id,
            'rating' => 4,
            'comment' => 'As a student, I was worried about costs, but they provided excellent service at student-friendly prices. Fixed my car\'s lighting issues perfectly.',
            'customer_name' => 'Tharanga Wijesinghe',
            'service_used' => 'Lighting System Repair',
            'status' => 'approved',
            'is_featured' => true,
        ]);

        Review::create([
            'appointment_id' => $appointment2->id,
            'user_id' => $user->id,
            'rating' => 5,
            'comment' => 'Long drive from the village was worth it! They fixed my tractor\'s electrical system that other workshops couldn\'t handle. Very skilled technicians.',
            'customer_name' => 'Dinesh Karunaratne',
            'service_used' => 'Agricultural Equipment Repair',
            'status' => 'approved',
            'is_featured' => true,
        ]);

        $this->command->info('Sample testimonials created successfully!');
    }
}
