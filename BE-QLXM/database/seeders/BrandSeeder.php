<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Brand;

class BrandSeeder extends Seeder
{
    public function run(): void
    {
        Brand::insert([
            ['name' => 'Honda', 'country' => 'Việt Nam'],
            ['name' => 'Yamaha', 'country' => 'Nhật Bản'],
            ['name' => 'Suzuki', 'country' => 'Nhật Bản'],
        ]);
    }
}