<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create some example users
        User::create([
            'slug' => Str::slug('ahmed-ali'),
            'full_name' => 'Ahmed Ali',
            'phone' => '0900000001',
            'type' => 'individual',
            'experience_years' => 5,
            'location' => 'Riyadh',
            'lat' => 24.7136,
            'lng' => 46.6753,
            'profile_image' => null,
        ]);

        User::create([
            'slug' => Str::slug('mohammed-real-estate-agency'),
            'full_name' => 'Mohammed Real Estate Agency',
            'phone' => '0900000002',
            'type' => 'agency',
            'experience_years' => 15,
            'location' => 'Jeddah',
            'lat' => 21.4858,
            'lng' => 39.1925,
            'profile_image' => null,
        ]);

        User::create([
            'slug' => Str::slug('sara-ahmed'),
            'full_name' => 'Sara Ahmed',
            'phone' => '0900000003',
            'type' => 'individual',
            'experience_years' => 2,
            'location' => 'Dammam',
            'lat' => 26.4207,
            'lng' => 50.0888,
            'profile_image' => null,
        ]);

        // Create additional users using factory
        // User::factory(20)->create();
    }
}
