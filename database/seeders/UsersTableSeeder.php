<?php

namespace Database\Seeders;

use App\Models\Users;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Users::create([
            "name_user" => "Bagas Maulana",
            "email" => "bagasibrahim@gmail.com",
            "role" => "admin",
            "phone" => "081234567890",
            "address" => "Tangerang",
            "password" => bcrypt("bagas123"),
        ]);
    }
}
