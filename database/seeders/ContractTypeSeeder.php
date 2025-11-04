<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ContractType;

class ContractTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ContractType::insert([
            [
                'code' => 'rent',
                'slug' => 'rent',
                'name_ar' => 'إيجار',
                'name_en' => 'Rent',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'sale',
                'slug' => 'sale',
                'name_ar' => 'بيع',
                'name_en' => 'Sale',
                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);
    }
}
