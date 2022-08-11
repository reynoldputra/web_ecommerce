<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Admin::factory()->create([
                'name' => 'Admin Pertama',
                'username' => 'admin1',
                'email' => 'admin1@example.com',
                'no_telp' => '08123123123'
        ]);

        \App\Models\Admin::factory()->create([
            'name' => 'Admin Kedua',
            'username' => 'admin2',
            'email' => 'admin2@example.com',
            'no_telp' => '08345345345'
        ]);
    }
}
