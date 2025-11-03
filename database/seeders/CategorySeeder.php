<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::insert([
            [
                'code' => 'residential',
                'name_ar' => 'سكني',
                'name_en' => 'Residential',
                'created_at' => now(), 'updated_at' => now()
            ],
            [
                'code' => 'commercial',
                'name_ar' => 'تجاري',
                'name_en' => 'Commercial',
                'created_at' => now(), 'updated_at' => now()
            ]
        ]);
    }
}
