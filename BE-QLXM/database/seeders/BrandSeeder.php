<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Brand;

class BrandSeeder extends Seeder
{
    public function run()
    {
        Brand::insert([
            ['name' => 'Honda', 'country' => 'Nhật Bản', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Yamaha', 'country' => 'Nhật Bản', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Suzuki', 'country' => 'Nhật Bản', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'SYM', 'country' => 'Đài Loan', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
