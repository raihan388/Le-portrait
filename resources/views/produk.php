<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>DSLR Cameras</title>
  <script src="styles/tailwindcss3.4.1.js"></script>
</head>
<body class="bg-white text-gray-800">
  <!-- Header -->
  <header class="border-b shadow-sm">
  <header class="border-b shadow-sm">
  <div class="container mx-auto flex justify-between items-center p-4">
    <!-- Kiri: Logo -->
    <div class="flex-shrink-0">
      <img src="image/image3.jpeg" alt="Le Portrait Logo" class="h-8 w-auto">
    </div>

    <!-- Tengah: Search Bar -->
    <div class="flex-1 flex justify-center">
      <input type="text" placeholder="Search cameras, lenses, accessories..." class="border px-3 py-2 rounded-md w-full max-w-md">
    </div>

    <!-- Kanan: Navigation -->
    <nav class="flex items-center gap-6">
      <a href="#" class="hover:underline">Login</a>
      <a href="#" class="hover:underline">Sign Up</a>
      <a href="#" class="hover:underline">Cart (0)</a>
    </nav>
  </div>
  <nav class="bg-gray-100 border-t">
  <div class="container mx-auto">
  <div class="flex flex-wrap justify-center gap-x-32 gap-y-2 p-5 text-base font-medium text-center">
      <a href="#" class="hover:text-blue-600">DSLR Cameras</a>
      <a href="#" class="hover:text-blue-600">Mirrorless Camera</a>
      <a href="#" class="hover:text-blue-600">Film Cameras</a>
      <a href="#" class="hover:text-blue-600">Lenses</a>
      <a href="#" class="hover:text-blue-600">Flash units</a>
      <a href="#" class="hover:text-blue-600">Tripods</a>
    </div>
  </div>
</nav>
  </header>

  <!-- Main Content -->
  <main class="container mx-auto flex mt-8">
    <!-- Sidebar -->
    <aside class="w-1/5 pr-6 border-r border-gray-200">
      <h2 class="font-bold text-lg mb-4">Brands</h2>
      <ul class="space-y-2 text-gray-700">
        <li><a href="#" class="hover:underline">Canon</a></li>
        <li><a href="#" class="hover:underline">Nikon</a></li>
        <li><a href="#" class="hover:underline">Sony</a></li>
        <li><a href="#" class="hover:underline">Fujifilm</a></li>
        <li><a href="#" class="hover:underline">Leica</a></li>
      </ul>
    </aside>

    <!-- Products -->
    <div class="flex-1 p-4 pl-6">
    <section class="w-4/5">
      <h1 class="text-3xl font-bold mb-2">DSLR Cameras</h1>
      <p class="text-sm text-gray-600 mb-6">Lorem ipsum dolor sit amet, consectetur adipiscing elit. ...</p>
      <div class="grid grid-cols-3 gap-6">
        <!-- Card -->
        <div class="border rounded-lg shadow-sm p-4">
          <div class="bg-gray-200 w-full h-40 mb-4 flex items-center justify-center text-gray-500">280 × 200</div>
          <h3 class="font-semibold">Canon EOS R6</h3>
          <p class="text-red-600 font-bold">Rp 28.500.000</p>
          <p class="text-sm text-gray-500">★ 4.8 (124 ulasan)</p>
          <button class="mt-2 bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600">Tambah ke Keranjang</button>
        </div>

        <div class="border rounded-lg shadow-sm p-4">
          <div class="bg-gray-200 w-full h-40 mb-4 flex items-center justify-center text-gray-500">280 × 200</div>
          <h3 class="font-semibold">Sony Alpha a7 III</h3>
          <p class="text-red-600 font-bold">Rp 25.999.000</p>
          <p class="text-sm text-gray-500">★ 4.7 (98 ulasan)</p>
          <button class="mt-2 bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600">Tambah ke Keranjang</button>
        </div>

        <div class="border rounded-lg shadow-sm p-4">
          <div class="bg-gray-200 w-full h-40 mb-4 flex items-center justify-center text-gray-500">280 × 200</div>
          <h3 class="font-semibold">Fujifilm X-T4</h3>
          <p class="text-red-600 font-bold">Rp 23.750.000</p>
          <p class="text-sm text-gray-500">★ 4.6 (76 ulasan)</p>
          <button class="mt-2 bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600">Tambah ke Keranjang</button>
        </div>
      </div>
    </section>
  </main>

  <!-- Footer -->
  <footer class="bg-gray-900 text-white mt-16">
    <div class="container mx-auto grid grid-cols-4 gap-8 p-10 text-sm">
      <div>
        <div class="text-xl font-bold mb-2">Le <span class="italic">Portrait</span></div>
        <ul class="space-y-1">
          <li><a href="#" class="hover:underline">Tentang Kami</a></li>
          <li><a href="#" class="hover:underline">Karir</a></li>
          <li><a href="#" class="hover:underline">Blog</a></li>
          <li><a href="#" class="hover:underline">Kebijakan Privasi</a></li>
        </ul>
      </div>
      <div>
        <h4 class="font-semibold mb-2">Layanan Pelanggan</h4>
        <ul class="space-y-1">
          <li><a href="#" class="hover:underline">Bantuan</a></li>
          <li><a href="#" class="hover:underline">Cara Berbelanja</a></li>
          <li><a href="#" class="hover:underline">Pengiriman</a></li>
          <li><a href="#" class="hover:underline">Pengembalian</a></li>
        </ul>
      </div>
      <div>
        <h4 class="font-semibold mb-2">Pembayaran</h4>
        <ul class="space-y-1">
          <li><a href="#" class="hover:underline">Transfer Bank</a></li>
          <li><a href="#" class="hover:underline">Kartu Kredit</a></li>
          <li><a href="#" class="hover:underline">QRIS</a></li>
          <li><a href="#" class="hover:underline">Cicilan</a></li>
        </ul>
      </div>
      <div>
        <h4 class="font-semibold mb-2">Ikuti Kami</h4>
        <ul class="space-y-1">
          <li><a href="#" class="hover:underline">Instagram</a></li>
          <li><a href="#" class="hover:underline">Facebook</a></li>
          <li><a href="#" class="hover:underline">Twitter</a></li>
          <li><a href="#" class="hover:underline">YouTube</a></li>
        </ul>
      </div>
    </div>
    <div class="text-center text-xs bg-gray-800 py-3">
      &copy; 2025 CameraMart. Semua Hak Dilindungi.
    </div>
  </footer>
</body>
</html>
