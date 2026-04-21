<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            ['name' => 'Batteries & Charging', 'description' => 'Car batteries, alternators, and charging system components'],
            ['name' => 'Lighting Systems', 'description' => 'Headlights, taillights, bulbs, and lighting accessories'],
            ['name' => 'Starting Systems', 'description' => 'Starter motors, solenoids, and ignition components'],
            ['name' => 'Electrical Components', 'description' => 'Relays, fuses, switches, and electrical accessories'],
            ['name' => 'Wiring & Connectors', 'description' => 'Wiring harnesses, connectors, and electrical repair kits'],
            ['name' => 'Car Audio & Security', 'description' => 'Stereos, speakers, alarms, and security systems'],
            ['name' => 'Climate Control', 'description' => 'AC components, blower motors, and climate control systems'],
            ['name' => 'Instrumentation', 'description' => 'Gauges, sensors, and dashboard components'],
        ];

        foreach ($categories as $category) {
            Category::updateOrCreate([
                'name' => $category['name']
            ], $category);
        }
    }
}
