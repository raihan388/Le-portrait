
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produk</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <!-- Header bagian atas -->
    <section id="header">
        <a href="#"><img src="img/bagitup.png" class="logo" alt=""></a>

        <div>
            <ul id="navbar">
                <li><a href="index.php">Beranda</a></li>
                <li><a class="active" href="shop.php">Produk</a></li>
                <li><a href="about.html">Tentang Kami</a></li>
                <li><a href="contact.php">Hubungi Kami</a></li>
                <li><a href="cart.php"><i class="fa-solid fa-bag-shopping"><span></span> </i></a></li>
                <li><a href="user.php"><i class="fa-solid fa-user"></i></a></li>
                <li><a href="login.php"><i class="fa-solid fa-right-from-bracket"></i></a></li>
            </ul>
        </div>
    </section>

    <!-- Header halaman produk -->
    <section id="page-header">
        <h2>#Tetap di Rumah</h2>
        <p>Hemat lebih banyak dengan kupon & diskon hingga 70%!</p>
    </section>

    <!-- Menampilkan daftar produk -->
    <section id="product1" class="section-p1">
        <div class="pro-container">
            <div class="pro">
                <a href="sproduct.php?id=1">
                    <img src="img/bahan/" alt="">
                    <div class="des">
                        <span>apakek</span>
                        <h5>apakek</h5>
                        <div class="star">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                        <h4>Rp 10000000></h4>
                    </div>
                    <a href="sproduct.php?id=<1" class="cart"><i class="fa-solid fa-cart-plus"></i></a>
                </a>
            </div>
        </div>
    </section>

    <!-- Pagination -->
    <section id="pagination" class="section-p1">
        <a href="#">1</a>
        <a href="#">2</a>
        <a href="#"><i class="fal fa-long-arrow-alt-right"></i></a>
    </section>

    <!-- Newsletter -->
    <section id="newsletter" class="section-p1">
        <div class="newstext">
            <h4>Daftar untuk Info Terbaru</h4>
            <p>Dapatkan Pembaruan Email Tentang Toko Terbaru Kami dan <span>Penawaran Spesial.</span></p>
        </div>
        <div class="form">
            <input type="text" placeholder="Alamat email Anda">
            <button class="normal">Daftar</button>
        </div>
    </section>

    <!-- Footer -->
    <footer class="section-p1">
        <div class="col">
            <img class="logo" src="img/bagitup.png" alt="">
            <h4>Kontak</h4>
            <p><strong>Alamat:</strong> Jl. Ahmad Yani, Tlk. Tering, Kec. Batam Kota, Kota Batam, Kepulauan Riau 29461</p>
            <p><strong>Telepon:</strong> +62 821 4423 2308</p>
            <p><strong>Jam Operasional:</strong> 10:00 - 18.00, Senin - Sabtu</p>
            <div class="follow">
                <h4>Ikuti Kami</h4>
                <div class="icon">
                    <i class="fa-brands fa-facebook"></i>
                    <i class="fa-brands fa-instagram"></i>
                    <i class="fa-brands fa-x-twitter"></i>
                    <i class="fa-brands fa-whatsapp"></i>
                    <i class="fa-brands fa-snapchat"></i>
                </div>
            </div>
        </div>
        <div class="col">
            <h4>Tentang</h4>
            <a href="#">Tentang Kami</a>
            <a href="#">Informasi Pengiriman</a>
            <a href="#">Kebijakan Privasi</a>
            <a href="#">Syarat & Ketentuan</a>
            <a href="#">Kontak Kami</a>
        </div>
        <div class="col">
            <h4>Akun Saya</h4>
            <a href="#">Masuk</a>
            <a href="#">Lihat Keranjang</a>
            <a href="#">Dompet Saya</a>
            <a href="#">Lacak Pesanan Saya</a>
            <a href="#">Bantuan</a>
        </div>
        <div class="copyright">
            <p>2024, PiayuPride</p>
        </div>
    </footer>

    <script src="script.js"></script>
</body>
</html>
