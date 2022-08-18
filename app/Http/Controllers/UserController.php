<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function cart(){
        $cart = Cart::where('user_id', Auth::user()->id)->sum('quantity');
        return $cart;
    }
    
    public function index(){
        $cart_navbar = $this->cart();
        $product = Product::orderBy('id')->take(3)->get();
        return view('user.content.index', compact("product", "cart_navbar"));
    }
}
