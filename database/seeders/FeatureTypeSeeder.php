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
                'slug' => 'basic',
                'name' => 'Basic Features',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'amenity',
                'slug' => 'amenity',
                'name' => 'Amenities',
                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);
    }
}
