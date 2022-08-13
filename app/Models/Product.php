<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table = 'product';
    protected $fillable = ['id', 'nama', 'deskripsi', 'harga', 'category_id', 'gambar'];
    public function category(){
        return $this->belongsTo(Category::class);
    }
    public function detail_product(){
        return $this->hasMany(Detail_Product::class);
    }
}
