<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\FeatureType;

class FeatureTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        FeatureType::insert([
            [
                'code' => 'basic',
                'name' => 'Basic Features',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'amenity',
                'name' => 'Amenities',
                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);
    }
}
