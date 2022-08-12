<?php

namespace Database\Seeders;
 
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class TransaksiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('transaksis')->insert([
            'nomor_transaksi' => 'uhas12231',
            'bank_user' => '031564865289',
            'admin_id' => '1',
            //'cart_id' => '1',
            'status_transaksi_id' => '1',
            'bank_id' => '1'
        ]);

        DB::table('transaksis')->insert([
            'nomor_transaksi' => 'affhy23425',
            'bank_user' => '031651684623164',
            'admin_id' => '2',
            //'cart_id' => '2',
            'status_transaksi_id' => '2',
            'bank_id' => '2'
        ]);
    }
}
