<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Feature>
 */
class FeatureFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $features = [
            [
                'code' => 'elevator',
                'name' => 'Elevator'
            ],
            [
                'code' => 'balcony',
                'name' => 'Balcony'
            ],
            [
                'code' => 'parking',
                'name' => 'Parking'
            ],
            [
                'code' => 'gym',
                'name' => 'Gym'
            ],
            [
                'code' => 'security',
                'name' => 'Security'
            ],
        ];
        $pick = $this->faker->unique()->randomElement($features);
        return [
            'type_id' => \App\Models\FeatureType::inRandomOrder()->first()?->id ?? 1,
            'code' => $pick['code'],
            'name' => $pick['name'],
        ];
    }
}
