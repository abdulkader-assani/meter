<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Feature;

class FeatureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Feature::insert([
            [
                'type_id' => 1,
                'slug' => 'elevator',
                'code' => 'elevator',
                'name' => 'Elevator',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'type_id' => 1,
                'slug' => 'balcony',
                'code' => 'balcony',
                'name' => 'Balcony',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'type_id' => 2,
                'slug' => 'parking',
                'code' => 'parking',
                'name' => 'Parking',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'type_id' => 2,
                'slug' => 'gym',
                'code' => 'gym',
                'name' => 'Gym',
                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);
    }
}
