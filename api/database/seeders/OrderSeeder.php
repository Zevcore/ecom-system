<?php

namespace Database\Seeders;

use App\Lib\Status\Statuses;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cart = [
          0 => [
              "T-shirt",
              "Jeans",
          ]
        ];

        DB::table("orders")->insert([
            'name' => 'John',
            'surname' => 'Smith',
            'address' => 'xxx xx xx xx',
            'email' => "john.smith@yahoo.com",
            'status' => Statuses::STATUS_CREATED,
            'cart' => json_encode($cart),
            'value' => 42.0,
        ]);
    }
}
