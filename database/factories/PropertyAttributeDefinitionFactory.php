<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PropertyAttributeDefinition>
 */
class PropertyAttributeDefinitionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $attributes = [
            [
                'code' => 'floor_area',
                'name' => 'Floor Area'
            ],
            [
                'code' => 'room_count',
                'name' => 'Room Count'
            ],
            [
                'code' => 'bathroom_count',
                'name' => 'Number of Bathrooms'
            ],
            [
                'code' => 'plot_size',
                'name' => 'Plot Size'
            ],
        ];
        $pick = $this->faker->unique()->randomElement($attributes);

        return [
            'property_type_id' => \App\Models\PropertyType::inRandomOrder()->first()?->id ?? 1,
            'code' => $pick['code'],
            'name' => $pick['name'],
        ];
    }
}
