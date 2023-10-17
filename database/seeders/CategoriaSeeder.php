<?php

namespace Database\Seeders;

use App\Models\Brands;
use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Brands::create([
            'name'=>"Zara"
        ]);

        $category1=Category::create([
            'name'=>"Hombre"
        ]);

        $category2=Category::create([
            'name'=>"Mujer"
        ]);

        $category3=Category::create([
            'name'=>"Unisex"
        ]);

        Subcategory::create([
            'name'=>"Poleras",
            'category_id'=>$category1->id
        ]);

        Subcategory::create([
            'name'=>"Camisas",
            'category_id'=>$category1->id
        ]);

        Subcategory::create([
            'name'=>"Blusas",
            'category_id'=>$category2->id
        ]);

        Subcategory::create([
            'name'=>"Pantalon",
            'category_id'=>$category2->id
        ]);

    }
}
