<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use App\Models\Cart;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    function index(){
        return view('admin.content.transaction.index', [
            'transaksis' => Transaksi::where('status_transaksi_id', 2)->get()->toArray()
        ]);
    }

    function show(Transaksi $transaksi){
        $detail_transaksi = Cart::where('id', $transaksi->cart_id)->with('detail_product')->get()->toArray();
        return response()->json(['transaksi' => $detail_transaksi], 200);
    }

    function confirm(Transaksi $transaksi){
        $confrimTrans = Transaksi::where('id', $transaksi->id)->update(["status_transaksi_id" => 3]);
        
        return redirect("/admin/transaction");
    }


}
