<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>CheckOut Le-Portrait</title>
  <script src="{{ asset('styles/tailwindcss3.4.1.js') }}"></script>
</head>
<body class="font-sans bg-gray-50 text-gray-900">
  <!-- Header -->
  <div class="flex items-center justify-between p-4 shadow bg-white">
  <!-- Logo -->
  <div class="flex items-center gap-2">
    <img src="logo.png" alt="Logo" class="h-8 w-auto" />
  </div>
      <input type="text" placeholder="Search cameras, lenses, accessories..." class="border p-2 rounded w-1/2" />
      <div class="space-x-4">
        <a href="#" class="hover:underline">Login</a>
        <a href="#" class="hover:underline">Sign Up</a>
        <a href="#" class="hover:underline">Cart (0)</a>
      </div>
    </div>

    <!-- Navigation Bar -->
<nav class="bg-white shadow-sm">
  <div class="max-w-7xl mx-auto px-4">
    <ul class="flex justify-center space-x-12 py-4 font-semibold text-sm">
      <li><a href="#" class="hover:underline">DSLR Cameras</a></li>
      <li><a href="#" class="hover:underline">Mirrorless Camera</a></li>
      <li><a href="#" class="hover:underline">Film Cameras</a></li>
      <li><a href="#" class="hover:underline">Lenses</a></li>
      <li><a href="#" class="hover:underline">Flash units</a></li>
      <li><a href="#" class="hover:underline">Tripods</a></li>
    </ul>
  </div>
</nav>
  </header>

 <!-- Cart Content -->
 <main class="max-w-7xl mx-auto px-4 py-6">
    <h2 class="text-xl font-semibold mb-4">Cart</h2>
    <div class="grid md:grid-cols-3 gap-6">

      <!-- Cart Items -->
      <div class="md:col-span-2 border border-gray-600 bg-white">
        <table class="w-full text-sm">
          <thead class="bg-gray-200">
            <tr>
              <th class="p-3 text-left">Product</th>
              <th class="p-3 text-left">Price</th>
              <th class="p-3 text-center">Quantity</th>
              <th class="p-3 text-right">Subtotal</th>
            </tr>
          </thead>
          <tbody>
            <tr class="border-t">
              <td class="p-4">
                <div class="w-16 h-16 bg-gray-300"></div>
              </td>
              <td class="p-4">
                <div class="font-medium">Canon EOS R6</div>
                <div class="text-gray-500">Rp 28.500.00</div>
              </td>
              <td class="p-4 text-center">
                <div class="inline-flex border border-gray-300">
                  <button class="px-2">−</button>
                  <input type="text" value="1" class="w-10 text-center border-x border-gray-300 outline-none" />
                  <button class="px-2">+</button>
                </div>
              </td>
              <td class="p-4 text-right font-medium">Rp 28.500.00</td>
            </tr>
          </tbody>
        </table>
      </div>

      <!-- Cart Totals -->
      <div class="border border-gray-600 bg-white p-4">
        <h3 class="font-semibold mb-4 border-b pb-2">Cart totals</h3>
        <div class="flex justify-between mb-2">
          <span>Subtotal</span>
          <span>Rp 28.500.00</span>
        </div>
        <div class="flex justify-between mb-4 border-b pb-2">
          <span>Total</span>
          <span>Rp 28.500.00</span>
        </div>
        <button class="w-full bg-gray-800 text-white py-2 font-semibold hover:bg-gray-700">
          Proceed to checkout
        </button>
      </div>
    </div>
  </main>

 <!-- Footer -->
 <footer class="bg-gray-800 text-white text-sm">
    <div class="max-w-7xl mx-auto grid grid-cols-2 md:grid-cols-4 gap-8 px-6 py-8">
      <div class="flex-1 min-w-[150px]">
        <h3 class="font-bold mb-2">Le Portrait</h3>
        <ul class="space-y-1 text-sm text-left inline-block">
          <li><a href="#" class="hover:underline">Tentang Kami</a></li>
          <li><a href="#" class="hover:underline">Karir</a></li>
          <li><a href="#" class="hover:underline">Blog</a></li>
          <li><a href="#" class="hover:underline">Kebijakan Privasi</a></li>
        </ul>
      </div>
      <div class="flex-1 min-w-[150px]">
        <h4 class="font-bold mb-2">Layanan Pelanggan</h4>
        <ul class="space-y-1 text-sm text-left inline-block">
          <li><a href="#" class="hover:underline">Bantuan</a></li>
          <li><a href="#" class="hover:underline">Cara Berbelanja</a></li>
          <li><a href="#" class="hover:underline">Pengiriman</a></li>
          <li><a href="#" class="hover:underline">Pengembalian</a></li>
        </ul>
      </div>
      <div class="flex-1 min-w-[150px]">
        <h4 class="font-bold mb-2">Pembayaran</h4>
        <ul class="space-y-1 text-sm text-left inline-block">
          <li><a href="#" class="hover:underline">Transfer Bank</a></li>
          <li><a href="#" class="hover:underline">Kartu Kredit</a></li>
          <li><a href="#" class="hover:underline">QRIS</a></li>
          <li><a href="#" class="hover:underline">Cicilan</a></li>
        </ul>
      </div>
      <div class="flex-1 min-w-[150px]">
        <h4 class="font-bold mb-2">Ikuti Kami</h4>
        <ul class="space-y-1 text-sm text-left inline-block">
          <li><a href="#" class="hover:underline">Instagram</a></li>
          <li><a href="#" class="hover:underline">Facebook</a></li>
          <li><a href="#" class="hover:underline">Twitter</a></li>
          <li><a href="#" class="hover:underline">YouTube</a></li>
        </ul>
      </div>
    </div>
    <div class="text-center text-xs py-4 bg-gray-900">© 2025 Le Portrait. Semua Hak Cipta Dilindungi.</div>
  </footer>
</body>
</html>