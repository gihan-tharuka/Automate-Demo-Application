<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $services = [
            [
                'title' => 'Automotive Electrical Diagnostics',
                'description' => 'Advanced diagnostic services for complex electrical issues using modern equipment.',
                'price' => 120.00,
                'image' => null,
                'included_services' => [
                    ['name' => 'ECU/ECM Diagnostics & Reprogramming'],
                    ['name' => 'CAN Bus System Analysis'],
                    ['name' => 'Sensor & Actuator Testing'],
                    ['name' => 'Electrical Circuit Tracing'],
                    ['name' => 'Fault Code Reading & Analysis'],
                ],

                'is_active' => true,
            ],
            [
                'title' => 'Battery & Charging System Services',
                'description' => 'Complete battery and charging system solutions for reliable vehicle starting.',
                'price' => 90.00,
                'image' => null,
                'included_services' => [
                    ['name' => 'Battery Testing & Load Testing'],
                    ['name' => 'Battery Replacement & Installation'],
                    ['name' => 'Alternator Testing & Repair'],
                    ['name' => 'Starter Motor Repair & Replacement'],
                    ['name' => 'Charging System Diagnostics'],
                ],

                'is_active' => true,
            ],
            [
                'title' => 'Lighting & Wiring Repairs',
                'description' => 'Professional lighting system and wiring harness repairs for all vehicle types.',
                'price' => 75.00,
                'image' => null,
                'included_services' => [
                    ['name' => 'Headlight & Taillight Repairs'],
                    ['name' => 'LED Conversion Services'],
                    ['name' => 'Wiring Harness Repair & Replacement'],
                    ['name' => 'Fog Light Installation'],
                    ['name' => 'Interior Lighting Repairs'],
                ],

                'is_active' => true,
            ],
            [
                'title' => 'Car Audio & Security Systems',
                'description' => 'Installation and repair of modern car audio and security systems.',
                'price' => 150.00,
                'image' => null,
                'included_services' => [
                    ['name' => 'Car Stereo Installation'],
                    ['name' => 'Amplifier & Subwoofer Setup'],
                    ['name' => 'GPS Tracking System Installation'],
                    ['name' => 'Alarm System Installation & Repair'],
                    ['name' => 'Reverse Camera Installation'],
                ],

                'is_active' => true,
            ],
            [
                'title' => 'Climate Control & Comfort Systems',
                'description' => 'Electrical components of climate control and vehicle comfort systems.',
                'price' => 100.00,
                'image' => null,
                'included_services' => [
                    ['name' => 'AC Compressor Electrical Repairs'],
                    ['name' => 'Blower Motor Replacement'],
                    ['name' => 'Power Window & Lock Repairs'],
                    ['name' => 'Power Seat Motor Repairs'],
                    ['name' => 'Heated Seat Installation'],
                ],

                'is_active' => true,
            ],
            [
                'title' => 'Ignition & Starting System Services',
                'description' => 'Complete ignition system services for reliable engine starting.',
                'price' => 85.00,
                'image' => null,
                'included_services' => [
                    ['name' => 'Ignition Coil Replacement'],
                    ['name' => 'Spark Plug Wire Replacement'],
                    ['name' => 'Distributor Cap & Rotor Replacement'],
                    ['name' => 'Ignition Switch Repair'],
                    ['name' => 'Immobilizer System Diagnostics'],
                ],

                'is_active' => true,
            ],
            [
                'title' => 'Commercial Vehicle Electrical Services',
                'description' => 'Specialized electrical services for trucks, buses, and commercial vehicles.',
                'price' => 200.00,
                'image' => null,
                'included_services' => [
                    ['name' => 'Heavy-Duty Battery Systems'],
                    ['name' => 'Truck Lighting System Repairs'],
                    ['name' => 'Commercial Vehicle Wiring'],
                    ['name' => 'Fleet Vehicle Diagnostics'],
                    ['name' => 'Generator & Inverter Installation'],
                ],

                'is_active' => true,
            ],
            [
                'title' => 'Emergency Electrical Services',
                'description' => '24/7 emergency electrical repair services for breakdown situations.',
                'price' => 180.00,
                'image' => null,
                'included_services' => [
                    ['name' => 'Emergency Battery Jump Start'],
                    ['name' => 'On-Site Electrical Repairs'],
                    ['name' => 'Stranded Vehicle Diagnostics'],
                    ['name' => 'After-Hours Service Calls'],
                    ['name' => 'Roadside Electrical Assistance'],
                ],

                'is_active' => true,
            ],
        ];

        foreach ($services as $service) {
            Service::create($service);
        }
    }
}
