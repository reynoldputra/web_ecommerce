<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detail_Product extends Model
{
    use HasFactory;
    protected $table = 'detail_product';
    protected $fillable = ['id', 'stock', 'size_id', 'product_id'];
    protected $with = ['size', 'product'];


    public function size(){
        return $this->belongsTo(Size::class);
    }
    public function product(){
        return $this->belongsTo(Product::class);
    }
    public function cart(){
        return $this->hasMany(Cart::class);
    }
}
