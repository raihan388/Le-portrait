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
use App\Http\Controllers\CartControll;
use App\Http\Controllers\UserController;


Route::get('/welcome', function () {
    return view('welcome');
});

// routes/web.php

Route::get('/dslr-cameras', function () {
    return view('dslr-cameras');
})->name('dslr');

Route::get('/mirrorless-cameras', function () {
    return view('mirrorless-cameras');
})->name('mirrorless');

Route::get('/film-cameras', function () {
    return view('film-cameras');
})->name('film');

Route::get('/lenses', function () {
    return view('lenses');
})->name('lenses');

Route::get('/flash-units', function () {
    return view('flash-units');
})->name('flash');

Route::get('/tripods', function () {
    return view('tripods');
})->name('tripods');

Route::get('/', function () {
    return view('homepage');
})->name('homepage');

Route::get('/home', [HomeController::class, 'home'])->name('home');
Route::get('/login', [LoginController::class, 'login'])->name('login');
Route::get('/shop', [ShopController::class, 'shop'])->name('shop');
Route::get('/registrasi', [RegistrasiController::class, 'registrasi'])->name('registrasi');
Route::get('/about' , [AboutController::class, 'about'])->name('about');
Route::get('/listproduk', [ListProdukController::class, 'list'])->name('listproduk');
Route::get('/homepage', [HomePageController::class, 'homepage'])->name('homepage');
Route::get('/cart', [CartController::class, 'cart'])->name('cart');
Route::get('/profile', [ProfileController::class, 'profile'])->name('profile');
Route::get('/checkout', [CheckOutController::class, 'index'])->name('checkout');
Route::get('/checkout', [CheckOutController::class, 'index'])->name('cart');
Route::post('/proceed-to-checkout', [CheckOutController::class, 'proceedToCheckout'])->name('proceedToCheckout');
Route::match(['get', 'post'], '/checkoutdetails', [CheckOutDetailsController::class, 'checkoutdetails'])->name('checkoutdetails');
Route::get('/checkoutform', [CheckOutDetailsController::class, 'checkoutform'])->name('checkoutform');
Route::post('/checkoutsubmit', [CheckOutDetailsController::class, 'checkoutsubmit'])->name('checkoutsubmit');
Route::get('/checkoutsuccess', [CheckOutDetailsController::class, 'checkoutsuccess'])->name('checkoutsuccess');
Route::get('/dslr', [PageController::class, 'dslr'])->name('dslr');
Route::get('/mirrorless', [PageController::class, 'mirrorless'])->name('mirrorless');
Route::get('/film', [PageController::class, 'film'])->name('film');
Route::get('/lenses', [PageController::class, 'lenses'])->name('lenses');
Route::get('/flash', [PageController::class, 'flash'])->name('flash');
Route::get('/tripods', [PageController::class, 'tripod'])->name('tripods');
Route::get('/produk/{slug}', [PageController::class, 'show'])->name('produk.show');
Route::get('/order-history', [PageController::class, 'index'])->name('pages.order-history');
Route::post('/profile/update', [UserController::class, 'update'])->middleware('auth');