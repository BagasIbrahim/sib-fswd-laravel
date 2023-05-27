<?php

namespace Database\Seeders;

use App\Models\Products;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Products::create([
            "category_id" => 1,
            "name_product" => "Nevada",
            "description" => "Baju Oblong Nevada",
            "price" => 100000.00,
            "status" =>"accepted",
            "created_by" => 1,
            "verified_by" => 1,
        ]);
    }
}
