<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\OrderItem;

class OrderItemSeeder extends Seeder
{
    public function run(): void
    {
        OrderItem::insert([
            [
                'order_id' => 1,
                'product_id' => 1,
                'quantity' => 1,
                'price' => 18000000
            ],
            [
                'order_id' => 1,
                'product_id' => 2,
                'quantity' => 1,
                'price' => 21000000
            ],
            [
                'order_id' => 2,
                'product_id' => 3,
                'quantity' => 1,
                'price' => 32000000
            ],
        ]);
    }
}