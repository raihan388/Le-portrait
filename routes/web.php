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
use App\Http\Controllers\ManualResetPasswordController;
use Filament\Notifications\Notification;
use App\Models\User;


Route::prefix('produk')->group(function () {
    Route::get('/category/{categoryName}', [ProductController::class, 'showCategory'])->name('kategori.show');
    Route::get('/brand/{brandName}', [ProductController::class, 'showBrand'])->name('brand.show');

    Route::get('/{slug}', [ProductController::class, 'detail'])->name('detailproduk');
});

Route::prefix('checkout')->group(function () {
    Route::post('/', [CheckOutController::class, 'checkout'])->name('checkout');
    Route::post('/proceed-to-checkout', [CheckOutController::class, 'proceedToCheckout'])->name('pages.pembeli.checkoutsubmit');
    Route::post('/checkoutsubmit', [CheckOutController::class, 'checkoutsubmit'])->name('checkoutsubmit');;
    Route::post('/checkout/direct', [CheckOutController::class, 'checkoutDirect'])->name('checkout.direct');
});

Route::post('/checkout1', [CartController::class, 'checkoutStep1'])->name('checkout1');


Route::middleware('auth')->group(function () {
    Route::get('/', [ProductController::class, 'show'])->name('homepage.show');
});
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'auth'])->name('login');
    Route::post('/login', [AuthController::class, 'submitLogin'])->name('login.submit');
    Route::post('/registrasi', [AuthController::class, 'submitRegistrasi'])->name('registrasi');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [UserController::class, 'profile'])->name('profile');
    Route::post('/profile/update', [UserController::class, 'update'])->name('profile.update');
});

Route::post('/logout',[AuthController::class,'logout'])->name('logout');



Route::get('/search', [ProductController::class, 'search'])->name('search');

Route::get('/order-history', [OrderController::class, 'history'])->name('pages.order-history');

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
Route::get('/orders/{order}/receipt', [OrderController::class, 'receipt'])
         ->name('orders.receipt');

Route::get('/search', [ProductController::class, 'search'])->name('produk.search');
Route::post('/profile/update', [UserController::class, 'update'])->middleware('auth')->name('profile.update');

Route::get('/order',[OrderController::class, 'order'])->name('order');
Route::get('/checkoutdetail', [CheckoutController::class, 'checkoutdetail'])->name('checkoutdetail');
Route::post('/checkout/confirm', [CheckOutController::class, 'checkoutConfirm'])->name('checkout.confirm');

Route::post('/get-snap-token', [PaymentController::class, 'getSnapToken'])->name('midtrans.token');
Route::post('/midtrans/update-payment-status', [CheckOutController::class, 'updatePaymentStatus']);
Route::patch('/orders/{id}/complete', [OrderController::class, 'markAsComplete'])->name('orders.complete');

Route::get('/lupa-password', [ManualResetPasswordController::class, 'formEmail'])->name('manual.password.request');
Route::post('/lupa-password', [ManualResetPasswordController::class, 'cekEmail'])->name('manual.password.check');

Route::get('/atur-password/{email}', [ManualResetPasswordController::class, 'formReset'])->name('manual.password.form');
Route::post('/atur-password', [ManualResetPasswordController::class, 'reset'])->name('manual.password.reset');

