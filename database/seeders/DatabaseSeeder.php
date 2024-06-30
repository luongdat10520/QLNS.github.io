<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Department;
use App\Models\Position;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $departments = [
            [
                'department_name' => 'Phòng Nhân Sự',
                'phone_number' => '0123456789',
                'address' => 'P301',
            ],
            [
                'department_name' => 'Phòng Kế Toán',
                'phone_number' => '0123456780',
                'address' => 'P302',
            ],
            [
                'department_name' => 'Phòng Kỹ Thuật',
                'phone_number' => '0123456781',
                'address' => 'P303',
            ],
            [
                'department_name' => 'Phòng Chăm Sóc Khách Hàng',
                'phone_number' => '0123456782',
                'address' => 'P304',
            ],
            [
                'department_name' => 'Phòng Marketing',
                'phone_number' => '0123456783',
                'address' => 'P305',
            ],
            
        ];

        foreach ($departments as $department) {
            Department::create($department);
        }

        $positions = [
            [
                'position_name' => 'Trưởng Phòng',
                'base_salary' => 15000000,
            ],
            [
                'position_name' => 'Phó Phòng',
                'base_salary' => 12000000,
            ],
            [
                'position_name' => 'Nhân Viên Full-Time',
                'base_salary' => 10000000,
            ],
            [
                'position_name' => 'Nhân Viên Part-Time',
                'base_salary' => 8000000,
            ],
        ];

        foreach ($positions as $position) {
            Position::create($position);
        }

        User::create([
            'email' => 'admin@gmail.com',
            'password' => Hash::make(1),
            'role' => 1
        ]);
    }
}
