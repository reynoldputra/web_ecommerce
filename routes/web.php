<?php
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/',function(){
    return view('welcome');
});
<<<<<<< HEAD
Route::get('/product',function(){
    return view('user.content.product');
});
Route::get('/shop',function(){
    return view('user.content.shopping-cart');
});
Route::get('/success',function(){
    return view('user.content.success');
});
=======

>>>>>>> 812f57f31f368f39563f40cd21d385e45aaee599
Auth::routes();

Route::group(["prefix"=>'user', 'middleware'=>['isUser','auth']], function(){
    Route::get('/home', [UserController::class, 'index'])->name('user.index');
    Route::get('/product/{id}', [UserController::class, 'product'])->name('user.product');
    Route::delete('/deleteCart', [UserController::class, 'deleteCart'])->name('user.deleteCart');
    Route::post('/addToCart', [UserController::class, 'addToCart'])->name('user.addToCart');
    Route::get('/shopping-cart', [UserController::class, 'shoppingcart'])->name('user.shoppingCart');
    Route::post('/checkout', [UserController::class, 'checkout'])->name('user.checkout');
    Route::get('/success', [UserController::class, 'success'])->name('user.success');
});

Route::group(["prefix"=>'admin', 'middleware'=>['isAdmin','auth']], function(){
    Route::resource('product', ProductController::class, ['as' => 'product']);
    Route::resource('category', CategoryController::class, ['as' => 'category']);
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
