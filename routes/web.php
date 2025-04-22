<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\RegistrasiController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\ListProdukController;
use App\Http\Controllers\ProdukController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', [HomeController::class, 'home'])->name('home');
Route::get('/login', [LoginController::class, 'login'])->name('login');
Route::get('/shop', [ShopController::class, 'shop'])->name('shop');
Route::get('/registrasi', [RegistrasiController::class, 'registrasi'])->name('registrasi');
Route::get('/about' , [AboutController::class, 'about'])->name('about');
Route::get('/listproduk', [ListProdukController::class, 'list'])->name('listproduk');
Route::get('/produk', [ProdukController::class, 'produk'])->name('produk');


