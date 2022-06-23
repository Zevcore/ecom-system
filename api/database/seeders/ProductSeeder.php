<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $images = [
            0 => [
                "id" => 1,
                "src" => "https://via.placeholder.com/300",
                "alt" => "Alternative text",
                "active" => "true",
            ]
        ];

        $specifications = [
            "Lorem ipsum",
            "Ipsum lorem",
        ];


        DB::table("products")->insert([
            'name' => Str::random(10),
            'description' => Str::random(10),
            'images' => json_encode($images),
            'stock' => 5,
            'specifications' => json_encode($specifications),
            'basePrice' => 21.37,
            'discountPercent' => 10,
            'manufacturer' => Str::random(15)
        ]);
    }
}
