<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;
class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create([
            'id' => '1',
            'nama' => 'Baju Pria'
        ]);
        Category::create([
            'id' => '2',
            'nama' => 'Baju Wanita'
        ]);
        Category::create([
            'id' => '3',
            'nama' => 'Topi'
        ]);
        Category::create([
            'id' => '4',
            'nama' => 'Sepatu'
        ]);
    }
}
