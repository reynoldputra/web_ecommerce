<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'id' => '1',
            'name' => 'Jamal Firdaus',
            'username' => 'jamalf1',
            'email' => 'jamalFirdaus@gmail.com',
            'alamat' => 'Jalan Keputih Makam, Kec Sukolilo, Surabaya Timur',
            'nomor_telepon' => "089564231155",
            'password' => Hash::make('password'),
            'role' => 'user'
        ]);
        User::create([
            'id' => '2',
            'name' => 'Christine Wynne',
            'username' => 'wynnech',
            'email' => 'christine_wynne@gmail.com',
            'alamat' => 'Jalan Pierre Tendean, Kec Balikpapan Kota, Kota Balikpapan',
            'nomor_telepon' => "081345226985",
            'password' => Hash::make('password'),
            'role' => 'user'
        ]);
        User::create([
            'id' => '3',
            'name' => 'Raffi Herman',
            'username' => 'raffihrmn',
            'email' => 'raffiherman21@gmail.com',
            'alamat' => 'Jalan Ahmad Yani, Kec Wonocolo, Surabaya Selatan',
            'nomor_telepon' => "082178556301",
            'password' => Hash::make('password'),
            'role' => 'user'
        ]);

        User::create([
            'name' => 'Admin Pertama',
            'username' => 'admin1',
            'email' => 'admin1@example.com',
            'nomor_telepon' => '08123123123',
            'password' => Hash::make('password'),
            'role' => 'super admin'
        ]);

        User::create([
            'name' => 'Admin Kedua',
            'username' => 'admin2',
            'email' => 'admin2@example.com',
            'nomor_telepon' => '08345345345',
            'password' => Hash::make('password'),
            'role' => 'admin'
        ]);
    }
}
