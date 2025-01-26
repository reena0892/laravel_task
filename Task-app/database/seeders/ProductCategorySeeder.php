<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ProductCategory;
class ProductCategorySeeder extends Seeder
{
    public function run()
    {
        ProductCategory::create(['name' => 'Socks']);
        ProductCategory::create(['name' => 'Shoes']);
        ProductCategory::create(['name' => 'Hats']);
    }
}