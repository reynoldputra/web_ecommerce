<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use App\Models\Size;
use App\Models\Product;
use App\Models\Detail_Product;
use App\Models\User;
use App\Models\Category;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        User::create([
            'id' => '1',
            'name' => 'Jamal Firdaus',
            'username' => 'jamalf1',
            'email' => 'jamalFirdaus@gmail.com',
            'alamat' => 'Jalan Keputih Makam, Kec Sukolilo, Surabaya Timur',
            'nomor_telepon' => "089564231155",
            'password' => Hash::make('password')
        ]);
        User::create([
            'id' => '2',
            'name' => 'Christine Wynne',
            'username' => 'wynnech',
            'email' => 'christine_wynne@gmail.com',
            'alamat' => 'Jalan Pierre Tendean, Kec Balikpapan Kota, Kota Balikpapan',
            'nomor_telepon' => "081345226985",
            'password' => Hash::make('password')
        ]);
        User::create([
            'id' => '3',
            'name' => 'Raffi Herman',
            'username' => 'raffihrmn',
            'email' => 'raffiherman21@gmail.com',
            'alamat' => 'Jalan Ahmad Yani, Kec Wonocolo, Surabaya Selatan',
            'nomor_telepon' => "082178556301",
            'password' => Hash::make('password')
        ]);

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
        
        Product::create([
            'id' => '1',
            'nama' => 'Pure Pineapple',
            'deskripsi' => '100% berbahan dasar Merino Wool, bahan eksklusif yang lembut dan nyaman digunakan sepanjang hari. Bahannya yang licin juga akan membuat sweater tidak mudah kotor atau terkena noda bandel!',
            'harga' => 250000,
            'category_id' => '2'
            // 'gambar' => null
        ]);
        Product::create([
            'id' => '2',
            'nama' => 'Converse High Yellow',
            'deskripsi' => 'Sneakers bernuansa cheerful untuk effortless street look dengan warna sunflower (kuning)
            dan Upper tekstil. Sneaker ini dilengkapi dengan Insole tekstil dan Rubber outsole membuatnya nyaman dipakai dalam kegiatan sehari-hari',
            'harga' => 750000,
            'category_id' => '4'
            // 'gambar' => null
        ]);
        Product::create([
            'id' => '3',
            'nama' => 'Vander Baseball Cap',
            'deskripsi' => 'Topi baseball buatan Italia dengan jersey katun, beraksen Vander Monogram dan detail triple-stud',
            'harga' => 500000,
            'category_id' => '3'
            // 'gambar' => null
        ]);
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
