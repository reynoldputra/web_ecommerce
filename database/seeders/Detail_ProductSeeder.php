<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Detail_Product;

class Detail_ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    
        Detail_Product::create([
            'id' => '1',
            'stock' => '10',
            'size_id' => '1',
            'product_id' => '1'
        ]);
        Detail_Product::create([
            'id' => '2',
            'stock' => '10',
            'size_id' => '2',
            'product_id' => '2'
        ]);
        Detail_Product::create([
            'id' => '3',
            'stock' => '10',
            'size_id' => '3',
            'product_id' => '3'
        ]);
    }
}
