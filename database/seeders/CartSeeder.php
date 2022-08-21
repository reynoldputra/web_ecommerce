<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Cart;

class CartSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Cart::create([
            'id' => '1',
            'quantity' => '1',
            'user_id' => '1',
            'detail_product_id' => '1',
            'total_harga' =>  '250000'
        ]);
        Cart::create([
            'id' => '2',
            'quantity' => '2',
            'user_id' => '3',
            'detail_product_id' => '2',
            'total_harga' => '1500000'
        ]);
        Cart::create([
            'id' => '3',
            'quantity' => '1',
            'user_id' => '2',
            'detail_product_id' => '3',
            'total_harga' => '500000'
        ]);
    }
}
