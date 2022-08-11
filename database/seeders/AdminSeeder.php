<?php

namespace Database\Seeders;
 
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
 
class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admins')->insert([
                'nama' => 'Admin Pertama',
                'username' => 'admin1',
                'email' => 'admin1@example.com',
                'no_telp' => '08123123123',
                'password' => Hash::make('password'),
        ]);

        DB::table('admins')->insert([
            'nama' => 'Admin Kedua',
            'username' => 'admin2',
            'email' => 'admin2@example.com',
            'no_telp' => '08345345345',
            'password' => Hash::make('password'),
        ]);
    }
}
