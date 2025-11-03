<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\PropertyType;

class PropertyTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        PropertyType::insert([
            [
                'category_id' => 1,
                'code' => 'apartment',
                'name_ar' => 'شقة',
                'name_en' => 'Apartment',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'category_id' => 1,
                'code' => 'villa',
                'name_ar' => 'فيلا',
                'name_en' => 'Villa',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'category_id' => 2,
                'code' => 'office',
                'name_ar' => 'مكتب',
                'name_en' => 'Office',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'category_id' => 2,
                'code' => 'shop',
                'name_ar' => 'محل',
                'name_en' => 'Shop',
                'created_at' => now(),
                'updated_at' => now()
            ],
        ]);
    }
}
