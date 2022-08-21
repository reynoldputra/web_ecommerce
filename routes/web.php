<?php
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\TransactionController;
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

Auth::routes();

Route::group(["prefix"=>'user', 'middleware'=>['isUser','auth']], function(){
    Route::get('/home', [UserController::class, 'index'])->name('user.index');
});

Route::group(["prefix"=>'admin', 'middleware'=>['isAdmin','auth']], function(){
    Route::resource('product', ProductController::class, ['as' => 'product']);
    Route::resource('category', CategoryController::class, ['as' => 'category']);
    Route::get("/transaction", [TransactionController::class, 'index']);
    Route::get("/transaction/show/{transaksi}", [TransactionController::class, 'show']);
    Route::put("/transaction/confirm/{transaksi}", [TransactionController::class, 'confirm']);
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
