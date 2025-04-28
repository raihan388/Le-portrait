<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\RegistrasiController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\ListProdukController;
use App\Http\Controllers\HomePageController;
use App\Http\Controllers\CheckOutController;
use App\Http\Controllers\CheckOutDetailsController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\DetailProdukController;

Route::get('/welcome', function () {
    return view('welcome');
});

Route::get('/home', [HomeController::class, 'home'])->name('home');
Route::get('/login', [LoginController::class, 'login'])->name('login');
Route::get('/shop', [ShopController::class, 'shop'])->name('shop');
Route::get('/registrasi', [RegistrasiController::class, 'registrasi'])->name('registrasi');
Route::get('/about' , [AboutController::class, 'about'])->name('about');
Route::get('/listproduk', [ListProdukController::class, 'list'])->name('listproduk');
Route::get('/homepage', [HomePageController::class, 'homepage'])->name('homepage');
Route::get('/checkout', [CheckOutController::class, 'checkout'])->name('checkout');
Route::get('/checkoutdetails', [CheckOutDetailsController::class, 'checkoutdetails'])->name('checkoutdetails');
Route::get('/checkout', [CheckOutDetailsController::class, 'checkoutform'])->name('checkout.form');
Route::post('/checkout-submit', [CheckOutDetailsController::class, 'checkoutsubmit'])->name('checkoutsubmit');
Route::get('/dslr', [PageController::class, 'dslr'])->name('dslr');
Route::get('/mirrorless', [PageController::class, 'mirrorless'])->name('mirrorless');
Route::get('/film', [PageController::class, 'film'])->name('film');
Route::get('/lenses', [PageController::class, 'lenses'])->name('lenses');
Route::get('/flash', [PageController::class, 'flash'])->name('flash');
Route::get('/tripod', [PageController::class, 'tripod'])->name('tripod');
Route::get('/produk/{slug}', [PageController::class, 'show'])->name('produk.show');


