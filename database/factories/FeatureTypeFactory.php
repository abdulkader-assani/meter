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
                'slug' => 'basic',
                'name' => 'Basic Features'
            ],
            [
                'code' => 'amenity',
                'slug' => 'amenity',
                'name' => 'Amenities'
            ],
            [
                'code' => 'security',
                'slug' => 'security',
                'name' => 'Security Features'
            ],
        ];
        $pick = $this->faker->unique()->randomElement($types);
        return [
            'code' => $pick['code'],
            'slug' => $pick['slug'],
            'name' => $pick['name'],
        ];
    }
}
