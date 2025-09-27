<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::insert([
            [
                'name' => 'Admin QLXM',
                'email' => 'admin@qlxm.vn',
                'password' => Hash::make('admin123'),
                'role' => 'admin'
            ],
            [
                'name' => 'Nguyễn Văn Nhân viên',
                'email' => 'staff1@qlxm.vn',
                'password' => Hash::make('staff123'),
                'role' => 'staff'
            ],
            [
                'name' => 'Lê Thị Nhân viên',
                'email' => 'staff2@qlxm.vn',
                'password' => Hash::make('staff456'),
                'role' => 'staff'
            ],
        ]);
    }
}
