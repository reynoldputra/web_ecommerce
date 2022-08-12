<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Size;

class SizeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Size::create([
            'id' => '1',
            'nama_size' => 'S'
        ]);
        Size::create([
            'id' => '2',
            'nama_size' => 'M'
        ]);
        Size::create([
            'id' => '3',
            'nama_size' => 'L'
        ]);
        Size::create([
            'id' => '4',
            'nama_size' => 'XL'
        ]);
    }
}
