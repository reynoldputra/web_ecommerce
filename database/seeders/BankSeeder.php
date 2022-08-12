<?php

namespace Database\Seeders;
 
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
class BankSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('banks')->insert([
                'nama' => 'Mandiri',
                'no_rekening' => '016486546218'
        ]);

        DB::table('banks')->insert([
            'nama' => 'BCA',
            'no_rekening' => '78465151654'
    ]);
    }
}
