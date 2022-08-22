<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use App\Models\User;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    function index(){
        return view('admin.content.transaction.index', [
            'transaksis' => Transaksi::where('status_transaksi_id', 2)->get()->toArray()
        ]);
    }

    function history(){
        return view('admin.content.transaction.history', [
            'transaksis' => Transaksi::where('status_transaksi_id', 3)->get()->toArray()
        ]);
    }

    function show(Transaksi $transaksi){
        $bank_user = $transaksi->bank_user;
        $bank_tujuan = $transaksi->bank->nama;
        $datas = User::where('id', $transaksi->user_id)->with('cart')->get()->toArray();
        $datas = $datas[0];
        
        $total_harga = 0;
        $info_product = $datas["cart"];
        foreach($datas["cart"] as $data){
            $total_harga += $data["detail_product"]["product"]["harga"] * $data["quantity"];
        }
        $info_trans = [
            'nama' => $datas["name"],
            'alamat' => $datas["alamat"],
            'no_telp' => $datas["nomor_telepon"],
            'bank_pengirim' => $bank_user,
            'bank_tujuan' =>  $bank_tujuan,
            'total_harga' => $total_harga
        ];

        return response()->json([
            'info_trans' => $info_trans,
            'info_product' => $info_product
        ], 200);
        }

    function confirm(Transaksi $transaksi){
        $confrimTrans = Transaksi::where('id', $transaksi->id)->update(["status_transaksi_id" => 3]);
        return redirect("/admin/transaction");
    }

    function undo(Transaksi $transaksi){
        $confrimTrans = Transaksi::where('id', $transaksi->id)->update(["status_transaksi_id" => 2]);
        return redirect("/admin/transaction/history");
    }


}
