<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Size extends Model
{
    use HasFactory;
    protected $table = 'size';
    protected $fillable = ['id', 'nama_size'];

    public function detail_product(){
        return $this->belongsTo(Detail_Product::class);
    }
}
