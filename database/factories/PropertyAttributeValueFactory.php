<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PropertyAttributeValue>
 */
class PropertyAttributeValueFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'slug' => $this->faker->unique()->slug(),
            'property_id' => \App\Models\Property::inRandomOrder()->first()?->id ?? 1,
            'attribute_id' => \App\Models\PropertyAttributeDefinition::inRandomOrder()->first()?->id ?? 1,
            'value' => $this->faker->word(),
        ];
    }
}
