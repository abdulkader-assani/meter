<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ContractType>
 */
class ContractTypeFactory extends Factory
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
                'code' => 'rent',
                'name_en' => 'Rent',
                'name_ar' => 'إيجار'
            ],
            [
                'code' => 'sale',
                'name_en' => 'Sale',
                'name_ar' => 'بيع'
            ],
            [
                'code' => 'lease',
                'name_en' => 'Lease',
                'name_ar' => 'تأجير'
            ],
        ];
        $pick = $this->faker->unique()->randomElement($types);
        return [
            'code' => $pick['code'],
            'name_en' => $pick['name_en'],
            'name_ar' => $pick['name_ar'],
        ];
    }
}
