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
Route::post('/cart/add', [CartController::class, 'add'])->name('cart.add');
Route::get('/profile', [ProfileController::class, 'profile'])->name('profile');
Route::get('/checkout', [CheckOutController::class, 'checkout'])->name('checkout');
Route::post('/proceed-to-checkout', [CheckOutController::class, 'proceedToCheckout'])->name('checkoutsubmit');
Route::match(['get', 'post'], '/checkoutdetails', [CheckOutDetailsController::class, 'checkoutdetails'])->name('checkoutdetails');
Route::get('/checkoutform', [CheckOutDetailsController::class, 'checkoutform'])->name('checkoutform');
Route::post('/checkoutsubmit', [CheckOutDetailsController::class, 'checkoutsubmit'])->name('checkoutsubmit');
Route::get('/produk/{slug}', [PageController::class, 'show'])->name('produk.show');
Route::get('/order-history', [PageController::class, 'index'])->name('pages.order-history');
Route::get('/detailproduk', [DetailProdukController::class, 'show'])->name('detailproduk');
Route::get('/search', [ProductController::class, 'search'])->name('produk.search');
Route::post('/profile/update', [UserController::class, 'update'])->middleware('auth');
Route::get('/order',[OrderController::class, 'order'])->name('order');
Route::post('/checkout', [OrderController::class, 'checkout']);

Route::get('/dslr', function () {
    return view('dslr', [
        "title" => "DSLR Cameras",
        "description" => "Explore our range of DSLR cameras.",
        "produk" => [ [
            "namaproduk" => "Nikon D5600",
            "harga" => "Rp 10.000.000",
            "deskripsi" => "Nikon D5600 adalah kamera DSLR dengan sensor APS-C 24.2 MP, perekaman video Full HD, dan layar sentuh vari-angle.",
            "ulasan" => "34 ulasan",
        ],
          [ "namaproduk" => "Canon EOS 90D",
            "harga" => "Rp 15.000.000",
            "deskripsi" => "Canon EOS 90D adalah kamera DSLR dengan sensor APS-C 32.5 MP, perekaman video 4K, dan sistem autofocus Dual Pixel CMOS AF.",
            "ulasan" => "52 ulasan",
    ],
        ],
    ]);
});
Route::get('/mirrorless', function () {
    return view('mirrorless', [
        "title" => "Mirrorless Cameras",
        "description" => "Explore our range of Mirrorless cameras.",
        "produk" => [ [
            "namaproduk" => "Canon EOS RP Body Only",
            "harga" => "Rp 12.499.000",
            "deskripsi" => "Canon EOS RP Body Only sudah 4k dan full HD 1080 video.",
            "ulasan" => "12  ulasan",
        ],
          [ "namaproduk" => "Canon EOS 90D",
            "harga" => "Rp 15.000.000",
            "deskripsi" => "Canon EOS 90D adalah kamera DSLR dengan sensor APS-C 32.5 MP, perekaman video 4K, dan sistem autofocus Dual Pixel CMOS AF.",
            "ulasan" => "52 ulasan",
    ],
        ],
    ]);
});
Route::get('/film', function () {
    return view('film', [
        "title" => "Film Cameras",
        "description" => "Explore our range of Film cameras.",
        "produk" => [ [
            "namaproduk" => "Canon EOS RP Body Only",
            "harga" => "Rp 12.499.000",
            "deskripsi" => "Canon EOS RP Body Only sudah 4k dan full HD 1080 video.",
            "ulasan" => "12  ulasan",
        ],
          [ "namaproduk" => "Canon EOS 90D",
            "harga" => "Rp 15.000.000",
            "deskripsi" => "Canon EOS 90D adalah kamera DSLR dengan sensor APS-C 32.5 MP, perekaman video 4K, dan sistem autofocus Dual Pixel CMOS AF.",
            "ulasan" => "52 ulasan",
    ],
        ],
    ]);
});
Route::get('/lenses', function () {
    return view('lenses', [
        "title" => "Lenses ",
        "description" => "Explore our range of Lenses cameras.",
        "produk" => [ [
            "namaproduk" => "Canon EOS RP Body Only",
            "harga" => "Rp 12.499.000",
            "deskripsi" => "Canon EOS RP Body Only sudah 4k dan full HD 1080 video.",
            "ulasan" => "12  ulasan",
        ],
          [ "namaproduk" => "Canon EOS 90D",
            "harga" => "Rp 15.000.000",
            "deskripsi" => "Canon EOS 90D adalah kamera DSLR dengan sensor APS-C 32.5 MP, perekaman video 4K, dan sistem autofocus Dual Pixel CMOS AF.",
            "ulasan" => "52 ulasan",
    ],
        ],
    ]);
});
Route::get('/flash', function () {
    return view('flash', [
        "title" => "Flash Units",
        "description" => "Explore our range of Flash cameras.",
        "produk" => [ [
            "namaproduk" => "Canon EOS RP Body Only",
            "harga" => "Rp 12.499.000",
            "deskripsi" => "Canon EOS RP Body Only sudah 4k dan full HD 1080 video.",
            "ulasan" => "12  ulasan",
        ],
          [ "namaproduk" => "Canon EOS 90D",
            "harga" => "Rp 15.000.000",
            "deskripsi" => "Canon EOS 90D adalah kamera DSLR dengan sensor APS-C 32.5 MP, perekaman video 4K, dan sistem autofocus Dual Pixel CMOS AF.",
            "ulasan" => "52 ulasan",
    ],
        ],
    ]);
});
Route::get('/tripods', function () {
    return view('tripod', [
        "title" => "Tripods Units",
        "image" => "tripod.jpg",
        "description" => "Explore our range of Flash cameras.",
        "produk" => [ [
            "namaproduk" => "Canon EOS RP Body Only",
            "harga" => "Rp 12.499.000",
            "deskripsi" => "Canon EOS RP Body Only sudah 4k dan full HD 1080 video.",
            "ulasan" => "12  ulasan",
        ],
          [ "namaproduk" => "Canon EOS 90D",
            "harga" => "Rp 15.000.000",
            "deskripsi" => "Canon EOS 90D adalah kamera DSLR dengan sensor APS-C 32.5 MP, perekaman video 4K, dan sistem autofocus Dual Pixel CMOS AF.",
            "ulasan" => "52 ulasan",
    ],
        ],
    ]);
});

Route::post('/profile/update', [UserController::class, 'update'])->middleware('auth');
Route::post('/add-to-cart', [CartController::class, 'addToCart'])->name('add.to.cart');



