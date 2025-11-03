<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 */
class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $names_en = [
            'Residential',
            'Commercial',
            'Industrial',
            'Agricultural'
        ];
        $names_ar = [
            'سكني',
            'تجاري',
            'صناعي',
            'زراعي'
        ];
        $idx = $this->faker->unique()->numberBetween(0, 3);
        return [
            'code' => strtolower($names_en[$idx]),
            'name_ar' => $names_ar[$idx],
            'name_en' => $names_en[$idx],
        ];
    }
}
