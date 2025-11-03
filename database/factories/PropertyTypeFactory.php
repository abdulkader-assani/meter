<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PropertyType>
 */
class PropertyTypeFactory extends Factory
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
                'code' => 'apartment',
                'name_en' => 'Apartment',
                'name_ar' => 'شقة'
            ],
            [
                'code' => 'villa',
                'name_en' => 'Villa',
                'name_ar' => 'فيلا'
            ],
            [
                'code' => 'office',
                'name_en' => 'Office',
                'name_ar' => 'مكتب'
            ],
            [
                'code' => 'shop',
                'name_en' => 'Shop',
                'name_ar' => 'محل'
            ],
        ];
        $pick = $this->faker->unique()->randomElement($types);
        return [
            'category_id' => \App\Models\Category::inRandomOrder()->first()?->id ?? 1,
            'code' => $pick['code'],
            'name_en' => $pick['name_en'],
            'name_ar' => $pick['name_ar'],
        ];
    }
}
