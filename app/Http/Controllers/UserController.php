<?php

namespace App\Http\Controllers;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Detail_Product;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;

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
        Cart::first('id', $request->id)->delete();
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
        return redirect()->back();
    }
    public function product($id){
        $product = Product::where('id', $id)->get();
        $product_size = Detail_Product::where('product_id', $id)->get();
        $related_products = Product::orderBy('id')->take(4)->get();
        return view('user.content.product', compact("product", "related_products", "product_size"));
    }
    public function shoppingcart(){
        $cart = Cart::where('user_id', Auth::user()->id)->get();
        $cart_total = Cart::where('user_id', Auth::user()->id)->sum('total_harga');
        return view('user.content.shopping-cart', compact("cart", "cart_total"));
    }
    public function checkout(Request $request){
        $request->validate([
            "nama" => 'required',
            'email' => 'required',
            'nohp' => 'required',
            'alamat' => 'required'
        ],
        [
            "nama.required" => "Nama harus diisi",
            "email.required" => "Email harus diisi",
            "nohp.required" => "Nomor HP harus diisi",
            "alamat.required" => "Alamat harus diisi"
        ]
        );
        
    }
}
