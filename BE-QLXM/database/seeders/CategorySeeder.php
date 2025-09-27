<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        Category::insert([
            ['name' => 'Xe số', 'description' => 'Các dòng xe số phổ thông'],
            ['name' => 'Xe ga', 'description' => 'Các dòng xe tay ga'],
            ['name' => 'Xe côn tay', 'description' => 'Các dòng xe côn tay thể thao'],
        ]);
    }
}