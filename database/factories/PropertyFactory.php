<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Property>
 */
class PropertyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => \App\Models\User::inRandomOrder()->first()?->id ?? 1,
            'slug' => $this->faker->unique()->slug(),
            'category_id' => \App\Models\Category::inRandomOrder()->first()?->id ?? 1,
            'property_type_id' => \App\Models\PropertyType::inRandomOrder()->first()?->id ?? 1,
            'contract_type_id' => \App\Models\ContractType::inRandomOrder()->first()?->id ?? 1,
            'price' => $this->faker->randomFloat(2, 10000, 10000000),
            'owner' => $this->faker->name(),
            'offerer' => $this->faker->company(),
            'lat' => $this->faker->latitude(24, 26),
            'lng' => $this->faker->longitude(46, 50),
            'location' => $this->faker->address(),
        ];
    }
}
