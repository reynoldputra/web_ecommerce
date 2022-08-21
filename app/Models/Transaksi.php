<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $with = ['user', 'status_transaksi', 'bank'];

    public function admin(){
        return $this->belongsTo(User::class);
    }
    
    public function user(){
        return $this->belongsTo(User::class);   
    }

    public function status_transaksi(){
        return $this->belongsTo(StatusTransaksi::class);
    }

    public function bank(){
        return $this->belongsTo(Bank::class);
    }
}
