<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\Category;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        $products = [
            // Batteries & Charging
            [
                'name' => 'Amaron Battery 45Ah',
                'part_number' => 'AMA-BAT-45-001',
                'description' => 'Amaron maintenance-free car battery 45Ah, suitable for compact cars',
                'quantity' => 25,
                'buying_price' => 14500.00,
                'selling_price' => 17500.00,
                'category_id' => Category::where('name', 'Batteries & Charging')->value('id'),
                'vehicle_make' => 'Toyota',
                'vehicle_model' => 'Axio',
                'vehicle_year' => '2015-2020',
                'image' => null,
            ],
            [
                'name' => 'Exide Battery 60Ah',
                'part_number' => 'EXI-BAT-60-002',
                'description' => 'Exide high-performance battery 60Ah for mid-size vehicles',
                'quantity' => 20,
                'buying_price' => 18500.00,
                'selling_price' => 22000.00,
                'category_id' => Category::where('name', 'Batteries & Charging')->value('id'),
                'vehicle_make' => 'Honda',
                'vehicle_model' => 'City',
                'vehicle_year' => '2016-2021',
                'image' => null,
            ],
            [
                'name' => 'Alternator - 90A',
                'part_number' => 'ALT-90A-003',
                'description' => '90A alternator for Toyota and Honda vehicles',
                'quantity' => 15,
                'buying_price' => 22000.00,
                'selling_price' => 28000.00,
                'category_id' => Category::where('name', 'Batteries & Charging')->value('id'),
                'vehicle_make' => 'Toyota',
                'vehicle_model' => 'Corolla',
                'vehicle_year' => '2010-2018',
                'image' => null,
            ],

            // Lighting Systems
            [
                'name' => 'LED Headlight Bulb H4',
                'part_number' => 'LED-H4-004',
                'description' => '6000K white LED headlight bulb H4, 60W equivalent',
                'quantity' => 50,
                'buying_price' => 2500.00,
                'selling_price' => 3500.00,
                'category_id' => Category::where('name', 'Lighting Systems')->value('id'),
                'vehicle_make' => 'Universal',
                'vehicle_model' => 'All Models',
                'vehicle_year' => '2000-2025',
                'image' => null,
            ],
            [
                'name' => 'Halogen Headlight Bulb H7',
                'part_number' => 'HAL-H7-005',
                'description' => '12V 55W halogen headlight bulb H7, standard replacement',
                'quantity' => 100,
                'buying_price' => 350.00,
                'selling_price' => 600.00,
                'category_id' => Category::where('name', 'Lighting Systems')->value('id'),
                'vehicle_make' => 'Universal',
                'vehicle_model' => 'All Models',
                'vehicle_year' => '2000-2025',
                'image' => null,
            ],
            [
                'name' => 'LED Tail Light Assembly',
                'part_number' => 'LED-TAIL-006',
                'description' => 'Complete LED tail light assembly for Toyota Axio',
                'quantity' => 20,
                'buying_price' => 8500.00,
                'selling_price' => 12000.00,
                'category_id' => Category::where('name', 'Lighting Systems')->value('id'),
                'vehicle_make' => 'Toyota',
                'vehicle_model' => 'Axio',
                'vehicle_year' => '2015-2020',
                'image' => null,
            ],

            // Starting Systems
            [
                'name' => 'Starter Motor - 1.4kW',
                'part_number' => 'ST-1.4KW-007',
                'description' => '1.4kW starter motor for Toyota and Honda vehicles',
                'quantity' => 15,
                'buying_price' => 15000.00,
                'selling_price' => 19500.00,
                'category_id' => Category::where('name', 'Starting Systems')->value('id'),
                'vehicle_make' => 'Toyota',
                'vehicle_model' => 'Corolla',
                'vehicle_year' => '2010-2018',
                'image' => null,
            ],
            [
                'name' => 'Starter Solenoid',
                'part_number' => 'SOL-12V-008',
                'description' => '12V starter solenoid switch for reliable starting',
                'quantity' => 30,
                'buying_price' => 1200.00,
                'selling_price' => 1800.00,
                'category_id' => Category::where('name', 'Starting Systems')->value('id'),
                'vehicle_make' => 'Universal',
                'vehicle_model' => 'All Models',
                'vehicle_year' => '2000-2025',
                'image' => null,
            ],

            // Electrical Components
            [
                'name' => 'Automotive Relay 40A',
                'part_number' => 'REL-40A-009',
                'description' => '40A automotive relay SPDT, standard ISO size',
                'quantity' => 100,
                'buying_price' => 150.00,
                'selling_price' => 250.00,
                'category_id' => Category::where('name', 'Electrical Components')->value('id'),
                'vehicle_make' => 'Universal',
                'vehicle_model' => 'All Models',
                'vehicle_year' => '2000-2025',
                'image' => null,
            ],
            [
                'name' => 'Fuse Box Kit',
                'part_number' => 'FUSE-KIT-010',
                'description' => 'Complete fuse box with various amperage fuses (5A-30A)',
                'quantity' => 50,
                'buying_price' => 800.00,
                'selling_price' => 1200.00,
                'category_id' => Category::where('name', 'Electrical Components')->value('id'),
                'vehicle_make' => 'Universal',
                'vehicle_model' => 'All Models',
                'vehicle_year' => '2000-2025',
                'image' => null,
            ],
            [
                'name' => 'Power Window Switch',
                'part_number' => 'PWS-DRIVER-011',
                'description' => 'Driver side power window switch assembly',
                'quantity' => 25,
                'buying_price' => 2200.00,
                'selling_price' => 3500.00,
                'category_id' => Category::where('name', 'Electrical Components')->value('id'),
                'vehicle_make' => 'Toyota',
                'vehicle_model' => 'Axio',
                'vehicle_year' => '2015-2020',
                'image' => null,
            ],

            // Wiring & Connectors
            [
                'name' => 'Wiring Harness Repair Kit',
                'part_number' => 'WHR-KIT-012',
                'description' => 'Complete wiring repair kit with connectors, heat shrink, and tools',
                'quantity' => 40,
                'buying_price' => 1800.00,
                'selling_price' => 2800.00,
                'category_id' => Category::where('name', 'Wiring & Connectors')->value('id'),
                'vehicle_make' => 'Universal',
                'vehicle_model' => 'All Models',
                'vehicle_year' => '2000-2025',
                'image' => null,
            ],
            [
                'name' => 'Battery Terminal Kit',
                'part_number' => 'BAT-TERM-013',
                'description' => 'Complete battery terminal and cable kit with clamps',
                'quantity' => 60,
                'buying_price' => 600.00,
                'selling_price' => 950.00,
                'category_id' => Category::where('name', 'Wiring & Connectors')->value('id'),
                'vehicle_make' => 'Universal',
                'vehicle_model' => 'All Models',
                'vehicle_year' => '2000-2025',
                'image' => null,
            ],

            // Car Audio & Security
            [
                'name' => 'Car Stereo Head Unit',
                'part_number' => 'STEREO-2DIN-014',
                'description' => '2-DIN car stereo with Bluetooth, USB, and AUX input',
                'quantity' => 20,
                'buying_price' => 12000.00,
                'selling_price' => 16500.00,
                'category_id' => Category::where('name', 'Car Audio & Security')->value('id'),
                'vehicle_make' => 'Universal',
                'vehicle_model' => 'All Models',
                'vehicle_year' => '2000-2025',
                'image' => null,
            ],
            [
                'name' => 'Car Alarm System',
                'part_number' => 'ALARM-2WAY-015',
                'description' => '2-way car alarm system with remote and sensors',
                'quantity' => 25,
                'buying_price' => 8500.00,
                'selling_price' => 12000.00,
                'category_id' => Category::where('name', 'Car Audio & Security')->value('id'),
                'vehicle_make' => 'Universal',
                'vehicle_model' => 'All Models',
                'vehicle_year' => '2000-2025',
                'image' => null,
            ],

            // Climate Control
            [
                'name' => 'Blower Motor',
                'part_number' => 'BLOWER-12V-016',
                'description' => '12V blower motor for car AC and heating system',
                'quantity' => 30,
                'buying_price' => 4500.00,
                'selling_price' => 6500.00,
                'category_id' => Category::where('name', 'Climate Control')->value('id'),
                'vehicle_make' => 'Toyota',
                'vehicle_model' => 'Axio',
                'vehicle_year' => '2015-2020',
                'image' => null,
            ],
            [
                'name' => 'AC Compressor Relay',
                'part_number' => 'AC-RELAY-017',
                'description' => 'AC compressor control relay for climate control system',
                'quantity' => 40,
                'buying_price' => 350.00,
                'selling_price' => 550.00,
                'category_id' => Category::where('name', 'Climate Control')->value('id'),
                'vehicle_make' => 'Universal',
                'vehicle_model' => 'All Models',
                'vehicle_year' => '2000-2025',
                'image' => null,
            ],

            // Instrumentation
            [
                'name' => 'Oil Pressure Sensor',
                'part_number' => 'OPS-12V-018',
                'description' => '12V oil pressure sensor for engine monitoring',
                'quantity' => 50,
                'buying_price' => 800.00,
                'selling_price' => 1200.00,
                'category_id' => Category::where('name', 'Instrumentation')->value('id'),
                'vehicle_make' => 'Toyota',
                'vehicle_model' => 'Corolla',
                'vehicle_year' => '2010-2018',
                'image' => null,
            ],
            [
                'name' => 'Temperature Sensor',
                'part_number' => 'TEMP-SENSOR-019',
                'description' => 'Engine coolant temperature sensor',
                'quantity' => 50,
                'buying_price' => 600.00,
                'selling_price' => 950.00,
                'category_id' => Category::where('name', 'Instrumentation')->value('id'),
                'vehicle_make' => 'Universal',
                'vehicle_model' => 'All Models',
                'vehicle_year' => '2000-2025',
                'image' => null,
            ],
        ];

        foreach ($products as $product) {
            Product::updateOrCreate([
                'part_number' => $product['part_number']
            ], $product);
        }
    }
}
