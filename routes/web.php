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
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\OrderController;

Route::prefix('produk')->group(function () {
    Route::get('/dslr', [productController::class, 'dslr'])->name('produk.dslr');
    Route::get('/mirrorless', [productController::class, 'mirrorless'])->name('produk.mirrorless');
    Route::get('/film', [productController::class, 'film'])->name('produk.film');
    Route::get('/lenses', [productController::class, 'lenses'])->name('produk.lenses');
    Route::get('/flash', [productController::class, 'flash'])->name('produk.flash');
    Route::get('/tripods', [productController::class, 'tripods'])->name('produk.tripods');
    Route::get('/{slug}', [ProductController::class, 'detail'])->name('detailproduk');
    
});
  
route::prefix('checkout')->group(function () {
    Route::get('/', [CheckOutController::class, 'checkout'])->name('pages.pembeli.checkout');
    Route::post('/proceed-to-checkout', [CheckOutController::class, 'proceedToCheckout'])->name('pages.pembeli.checkoutsubmit');
    Route::post('/checkoutsubmit', [CheckOutController::class, 'checkoutsubmit'])->name('pages.pembeli.checkoutsubmit');;
});

route::prefix('auth')->group(function () {
    Route::get('/login', [LoginController::class, 'login'])->name('login');
    Route::get('/registrasi', [RegistrasiController::class, 'registrasi'])->name('registrasi');
});
Route::get('/checkoutdetail', [CheckOutController::class, 'checkoutdetail'])->name('checkoutdetail');


Route::get('/cart', [CartController::class, 'cart'])->name('cart');
Route::post('/cart/add', [CartController::class, 'add'])->name('cart.add');
Route::get('/profile', [ProfileController::class, 'profile'])->name('profile');

Route::get('/order-history', [PageController::class, 'index'])->name('pages.order-history');
Route::get('/search', [ProductController::class, 'search'])->name('produk.search');
Route::post('/profile/update', [UserController::class, 'update'])->middleware('auth');
Route::get('/order',[OrderController::class, 'order'])->name('order');

Route::get('/homepage', [ProductController::class, 'show'])->name('homepage.show');
Route::post('/profile/update', [UserController::class, 'update'])->middleware('auth');
Route::post('/cart/add', [CartController::class, 'addToCart'])->name('cart.add');
Route::post('/cart/remove', [CartController::class, 'remove'])->name('cart.remove');
Route::get('/cart', [CartController::class, 'showCart'])->name('cart.show');
Route::get('/cart/count', [CartController::class, 'getCartCount'])->name('cart.count');
Route::post('/checkoutdetail', [CheckoutController::class, 'checkoutdetail'])->name('checkoutdetail');

