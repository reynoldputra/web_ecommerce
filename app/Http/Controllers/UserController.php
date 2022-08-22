<?php

namespace App\Http\Controllers;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Detail_Product;
use App\Models\Cart;
use App\Models\Bank;
use App\Models\Transaksi;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class UserController extends Controller
{
    public function cart(){
        $cart = Cart::where('user_id', Auth::user()->id)->sum('quantity');
        return $cart;
    }

    public function index(){
        $product = Product::orderBy('id')->take(3)->get();
        return view('user.content.index', compact("product"));
    }

    public function deleteCart(Request $request){
        Cart::first('id', $request['id'])->delete();
        return redirect()->back();
    }
    public function addToCart(Request $request){
        $match_request= ['product_id' => $request['id'], 'size_id' => $request['size']];
        $detail_product_id = Detail_Product::where($match_request)->first()->id;
        Cart::create([
            'detail_product_id' => $detail_product_id,
            'quantity' => 1,
            'user_id' => Auth::user()->id,
            'total_harga' => Product::where('id', $request['id'])->first()->harga
        ]);
        if (is_null(Transaksi::where('user_id', Auth::user()->id))){
            $nomor_transaksi = Str::random(10);
            Transaksi::create([
                'bank_id' => '',
                'user_id' => Auth::user()->id,
                'bank_user' => '',
                'status_transaksi_id' => '1',
                'nomor_transaksi' => $nomor_transaksi
            ]);
        }
        return redirect()->back();
    }
    public function product($id){
        $product = Product::where('id', $id)->get();
        $product_size = Detail_Product::where('product_id', $id)->get();
        $related_products = Product::orderBy('id')->take(4)->get();
        return view('user.content.product', compact("product", "related_products", "product_size"));
    }
    public function shoppingcart(){
        $id = Auth::user()->id;
        $cart = Cart::where('user_id', $id)->get();
        $user_trans = Transaksi::where('user_id', $id)->get();
        $cart_total = Cart::where('user_id', $id)->sum('total_harga');
        $bank_admin = Bank::all();
        return view('user.content.shopping-cart', compact("cart", "cart_total", 'bank_admin','user_trans'));
    }
    
    public function checkout(Request $request){
        
        $request->validate([
            "bank" => 'required',
            'nomor_bank' => 'required',
        ],
        [
            "bank.required" => "Nama harus diisi",
            "nomor_bank.required" => "Nomor bank harus diisi"
        ]
        );
        Transaksi::where('user_id', Auth::user()->id)->update([
            'bank_id' => $request['bank'],
            'bank_user' => $request['nomor_bank'],
            'status_transaksi_id' => '2',
        ]);
        return redirect()->back();
    }
}
