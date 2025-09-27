<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        Product::insert([
            [
                'name' => 'Xe máy Honda Wave Alpha',
                'description' => 'Xe tiết kiệm xăng, phù hợp học sinh sinh viên',
                'image' => 'wavealpha.jpg',
                'price' => 18000000,
                'stock' => 15,
                'status' => 'available',
                'brand_id' => 1,
                'category_id' => 1
            ],
            [
                'name' => 'Xe máy Yamaha Sirius',
                'description' => 'Kiểu dáng thể thao, động cơ mạnh mẽ',
                'image' => 'sirius.jpg',
                'price' => 21000000,
                'stock' => 10,
                'status' => 'available',
                'brand_id' => 2,
                'category_id' => 1
            ],
            [
                'name' => 'Xe máy Honda Vision',
                'description' => 'Xe tay ga nhỏ gọn, tiết kiệm nhiên liệu',
                'image' => 'vision.jpg',
                'price' => 32000000,
                'stock' => 8,
                'status' => 'available',
                'brand_id' => 1,
                'category_id' => 2
            ],
            [
                'name' => 'Xe máy Yamaha Janus',
                'description' => 'Xe tay ga phong cách dành cho nữ',
                'image' => 'janus.jpg',
                'price' => 28000000,
                'stock' => 5,
                'status' => 'available',
                'brand_id' => 2,
                'category_id' => 2
            ],
            [
                'name' => 'Xe máy Suzuki Raider',
                'description' => 'Xe côn tay thể thao mạnh mẽ',
                'image' => 'raider.jpg',
                'price' => 48000000,
                'stock' => 3,
                'status' => 'available',
                'brand_id' => 3,
                'category_id' => 3
            ],
        ]);
    }
}
