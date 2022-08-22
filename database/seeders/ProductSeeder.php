<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::create([
            'id' => '1',
            'nama' => 'Pure Pineapple',
            'deskripsi' => '100% berbahan dasar Merino Wool, bahan eksklusif yang lembut dan nyaman digunakan sepanjang hari. Bahannya yang licin juga akan membuat sweater tidak mudah kotor atau terkena noda bandel!',
            'harga' => 250000,
            'category_id' => '2',
            'gambar' => 'aidhfah0sihfpaorowaeru.jpg'
        ]);
        Product::create([
            'id' => '2',
            'nama' => 'Converse High Yellow',
            'deskripsi' => 'Sneakers bernuansa cheerful untuk effortless street look dengan warna sunflower (kuning)
            dan Upper tekstil. Sneaker ini dilengkapi dengan Insole tekstil dan Rubber outsole membuatnya nyaman dipakai dalam kegiatan sehari-hari',
            'harga' => 750000,
            'category_id' => '4',
            'gambar' => 'product-9.jpg'
        ]);
        Product::create([
            'id' => '3',
            'nama' => 'Vander Baseball Cap',
            'deskripsi' => 'Topi baseball buatan Italia dengan jersey katun, beraksen Vander Monogram dan detail triple-stud',
            'harga' => 500000,
            'category_id' => '3',
            'gambar' => 'product-5.jpg'
        ]);
        Product::create([
            'id' => '4',
            'nama' => 'Livy Scarf',
            'deskripsi' => 'Livy Scarf berbahan wol sangat direkomendasikan untuk cuaca dingin. Bahan wol yang terbilang tebal selain terlihat mewah dan elegan juga mampu untuk menghangatkan bagian tubuhmu yang terasa dingin. Wool scarf bermotif akan sangat cocok untuk outfit polos liburan musim dinginmu agar lebih eye-catching',
            'harga' => 200000,
            'category_id' => '2',
            'gambar' => 'product-4.jpg'
        ]);
    }
}
