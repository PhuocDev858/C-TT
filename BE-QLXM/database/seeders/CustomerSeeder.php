<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Customer;

class CustomerSeeder extends Seeder
{
    public function run(): void
    {
        Customer::insert([
            ['name' => 'Nguyễn Văn A', 'phone' => '0909123123', 'email' => 'vana@gmail.com', 'address' => 'Quận 1, TP.HCM'],
            ['name' => 'Lê Thị B', 'phone' => '0987654321', 'email' => 'leb@gmail.com', 'address' => 'Quận 3, TP.HCM'],
        ]);
    }
}