<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;
    protected $table = 'cart';
    protected $fillable = ['id', 'quantity', 'user_id', 'detail_product_id'];

    public function user(){
        return $this->belongsTo(User::class);
    }
    public function detail_product(){
        return $this->belongsTo(Detail_Product::class);
    }

    public function transaksi(){
        return $this->hasMany(Transaksi::class);
    }
}
