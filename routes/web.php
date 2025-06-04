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


Route::get('/welcome', function () {
    return view('welcome');
});

Route::get('/dslr', [productController::class, 'dslr'])->name('dslr') ;

Route::get('/mirrorless', [productController::class, 'mirrorless'])->name('mirrorless') ;

Route::get('/film', [productController::class, 'film'])->name('film') ;

Route::get('/lenses', [productController::class, 'lenses'])->name('lenses') ;

Route::get('/flash', [productController::class, 'flash'])->name('flash') ;

Route::get('/tripods', [productController::class, 'tripods'])->name('tripods') ;

Route::get('/checkoutdetail', [CheckOutDetailsController::class, 'checkoutdetail'])->name('checkoutdetail');

Route::get('/home', [HomeController::class, 'home'])->name('home');
Route::get('/login', [LoginController::class, 'login'])->name('login');
Route::get('/shop', [ShopController::class, 'shop'])->name('shop');
Route::get('/registrasi', [RegistrasiController::class, 'registrasi'])->name('registrasi');
Route::get('/about' , [AboutController::class, 'about'])->name('about');
Route::get('/listproduk', [ListProdukController::class, 'list'])->name('listproduk');
Route::get('/homepage', [HomePageController::class, 'homepage'])->name('homepage');
Route::get('/cart', [CartController::class, 'cart'])->name('cart');
Route::post('/cart/add', [CartController::class, 'add'])->name('cart.add');
Route::get('/profile', [ProfileController::class, 'profile'])->name('profile');
Route::get('/checkout', [CheckOutController::class, 'checkout'])->name('pages.pembeli.checkout');
Route::post('/proceed-to-checkout', [CheckOutController::class, 'proceedToCheckout'])->name('pages.pembeli.checkoutsubmit');
Route::post('/checkoutsubmit', [CheckOutController::class, 'checkoutsubmit'])->name('pages.pembeli.checkoutsubmit');
Route::get('/produk/{slug}', [PageController::class, 'show'])->name('produk.show');
Route::get('/order-history', [PageController::class, 'index'])->name('pages.order-history');
Route::get('/produk/{slug}', [ProductController::class, 'detail'])->name('detailproduk');
Route::get('/search', [ProductController::class, 'search'])->name('produk.search');
Route::post('/profile/update', [UserController::class, 'update'])->middleware('auth');
Route::get('/order',[OrderController::class, 'order'])->name('order');
Route::post('/checkout', [OrderController::class, 'checkout']);

Route::get('/homepage', [ProductController::class, 'show'])->name('homepage.show');
Route::post('/profile/update', [UserController::class, 'update'])->middleware('auth');
Route::post('/add-to-cart', [CartController::class, 'addToCart'])->name('add.to.cart');


