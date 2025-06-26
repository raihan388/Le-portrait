<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\RegistrasiController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\AuthController;
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
use App\Http\Controllers\PaymentController;



Route::prefix('produk')->group(function () {
    Route::get('/dslr', [productController::class, 'dslr'])->name('produk.dslr');
    Route::get('/mirrorless', [productController::class, 'mirrorless'])->name('produk.mirrorless');
    Route::get('/film', [productController::class, 'film'])->name('produk.film');
    Route::get('/lenses', [productController::class, 'lenses'])->name('produk.lenses');
    Route::get('/flash', [productController::class, 'flash'])->name('produk.flash');
    Route::get('/tripods', [productController::class, 'tripods'])->name('produk.tripods');
    Route::get('/{slug}', [ProductController::class, 'detail'])->name('detailproduk');
});

Route::prefix('checkout')->group(function () {
    Route::get('/', [CheckOutController::class, 'checkout'])->name('checkout');
    Route::post('/proceed-to-checkout', [CheckOutController::class, 'proceedToCheckout'])->name('pages.pembeli.checkoutsubmit');
    Route::post('/checkoutsubmit', [CheckOutController::class, 'checkoutsubmit'])->name('checkoutsubmit');;
    Route::post('/checkout/direct', [CheckOutController::class, 'checkoutDirect'])->name('checkout.direct');
});

Route::middleware('auth')->group(function () {
    Route::get('/', [ProductController::class, 'show'])->name('homepage.show');
});
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'auth'])->name('login');
    Route::post('/login', [AuthController::class, 'submitLogin'])->name('login.submit');
    Route::post('/registrasi', [AuthController::class, 'submitRegistrasi'])->name('registrasi');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [UserController::class, 'profile'])->name('profile');
    Route::post('/profile/update', [UserController::class, 'update'])->name('profile.update');
});

Route::post('/logout',[AuthController::class,'logout'])->name('logout');



Route::get('/search', [ProductController::class, 'search'])->name('search');
Route::get('/order-history', [PageController::class, 'index'])->name('pages.order-history');
Route::get('/search', [ProductController::class, 'search'])->name('produk.search');
Route::get('/order',[OrderController::class, 'order'])->name('order');
Route::prefix('cart')->group(function() {
    Route::post('/add', [CartController::class, 'addToCart'])->name('cart.add');
    Route::delete('/{id}', [CartController::class, 'destroy'])->name('cart.destroy');
    Route::get('/', [CartController::class, 'showCart'])->name('cart.show');
    Route::get('/count', [CartController::class, 'getCartCount'])->name('cart.count');
    Route::put('/{id}', [CartController::class, 'update'])->name('cart.update');
});

Route::get('/profile', [UserController::class, 'profile'])->name('profile');

Route::get('/order-history', [PageController::class, 'index'])->name('pages.order-history');
Route::get('/search', [ProductController::class, 'search'])->name('produk.search');
Route::post('/profile/update', [UserController::class, 'update'])->middleware('auth')->name('profile.update');

Route::get('/order',[OrderController::class, 'order'])->name('order');
Route::get('/checkoutdetail', [CheckoutController::class, 'checkoutdetail'])->name('checkoutdetail');
Route::post('/checkout/confirm', [CheckOutController::class, 'checkoutConfirm'])->name('checkout.confirm');
