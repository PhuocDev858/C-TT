<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    public function run()
    {
        Product::insert([
            [
                'name' => 'Honda Wave Alpha',
                'description' => 'Xe tiết kiệm xăng, phù hợp học sinh sinh viên',
                'image' => 'wavealpha.jpg',
                'price' => 18000000,
                'stock' => 15,
                'status' => 'available',
                'brand_id' => 1,
                'category_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Yamaha Janus',
                'description' => 'Xe ga nhỏ gọn, dễ điều khiển, tiết kiệm nhiên liệu',
                'image' => 'janus.jpg',
                'price' => 28500000,
                'stock' => 20,
                'status' => 'available',
                'brand_id' => 2,
                'category_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Suzuki Raider R150',
                'description' => 'Xe côn tay thể thao mạnh mẽ, thiết kế nổi bật',
                'image' => 'raider.jpg',
                'price' => 55000000,
                'stock' => 10,
                'status' => 'available',
                'brand_id' => 3,
                'category_id' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'SYM Attila',
                'description' => 'Xe ga thiết kế đẹp, vận hành êm ái',
                'image' => 'attila.jpg',
                'price' => 22000000,
                'stock' => 12,
                'status' => 'available',
                'brand_id' => 4,
                'category_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
