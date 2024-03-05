<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ServiceCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('service_categories')->insert([
            [
                "name" => "Air Conditioning amd Heating",
                "slug" => 'air-conditioning-and-heating',
                "image" => "air-conditioning-and-heating.png"
            ],
            [
                "name" => "Brake Services",
                "slug" => 'brake-services',
                "image" => "brake-services.png"
            ],
            [
                "name" => "Diagnostic Services",
                "slug" => 'diagnostic-services',
                "image" => "diagnostic-services.jpg"
            ],
            [
                "name" => "Electrical System Services",
                "slug" => 'electrical-system-services',
                "image" => "electrical-system-services.jpg"
            ],
            [
                "name" => "Engine Repairs",
                "slug" => 'engine-repairs',
                "image" => "engine-repairs.jpg"
            ],
            [
                "name" => "Exhaust System Repair",
                "slug" => 'exhaust-system-repair',
                "image" => "exhaust-system-repairs.png"
            ],
            [
                "name" => "General Mechanical Repairs",
                "slug" => 'general-mechanical-repairs',
                "image" => "general-mechanical-repairs.jpg"
            ],
            [
                "name" => "Routine Maintenance",
                "slug" => 'routine-maintenance',
                "image" => "routine-maintenance.jpg"
            ],
            [
                "name" => "Suspension and Steering",
                "slug" => 'suspension-and-steering',
                "image" => "suspension-and-steering.png"
            ],
            [
                "name" => "Tire Services",
                "slug" => 'tire-services',
                "image" => "tire-services.png"
            ]
        ]);
    }
}
