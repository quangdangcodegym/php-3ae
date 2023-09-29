<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Categories extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        // Dùng insert DB này thì không tự động thêm 2 trường updated_at, created_ad
        DB::table('categories')->insert([
            "name" => "Phone",
            "description" => "Phone dep lam"
        ]);
        DB::table('categories')->insert([
            "name" => "Laptop",
            "description" => "Laptop dep lam"
        ]);

        // Dùng olequent thì có tự động cập nhật timestamp
        $product = new Product();
        $product->name = "Iphone 11";
        $product->description = "Iphone 11 dep lam";
        $product->status = false;
        $product->price = 10000;
        $product->category_id = 5;

        $product->save();
    }
}
