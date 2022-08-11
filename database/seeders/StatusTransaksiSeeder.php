<?php
namespace Database\Seeders;
 
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class StatusTransaksiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('status_transaksis')->insert([
            'status' => 'Belum dibayar',
        ]);

        DB::table('status_transaksis')->insert([
            'status' => 'Menunggu verifikasi',
        ]);

        DB::table('status_transaksis')->insert([
            'status' => 'Terverifikasi',
        ]);
    }
}
