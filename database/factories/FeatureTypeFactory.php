<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\FeatureType>
 */
class FeatureTypeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        $types = [
            [
                'code' => 'basic',
                'name' => 'Basic Features'
            ],
            [
                'code' => 'amenity',
                'name' => 'Amenities'
            ],
            [
                'code' => 'security',
                'name' => 'Security Features'
            ],
        ];
        $pick = $this->faker->unique()->randomElement($types);
        return [
            'code' => $pick['code'],
            'name' => $pick['name'],
        ];
    }
}
