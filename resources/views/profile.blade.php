<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Profile Le-Portrait</title>
  <script src="{{ asset('styles/tailwindcss3.4.1.js') }}"></script>
</head>
<body class="font-sans bg-gray-50 text-gray-900">

  <!-- Header -->
<div class="flex items-center justify-between p-4 shadow bg-white">
  <div class="flex items-center gap-2 ml-6">  <!-- Added ml-4 for margin-left -->
    <img src="poto.jpg" alt="Logo" class="h-12 w-auto" />
  </div>
  <input type="text" placeholder="Search cameras, lenses, accessories..." class="border p-2 rounded w-1/2" />
  <div class="space-x-4">
    <a href="/login" class="hover:underline">Login</a>
    <a href="#" class="hover:underline">Sign Up</a>
    <a href="#" class="hover:underline" onclick="toggleCart(); return false;">Cart (0)</a>
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

  <!-- Container Profile -->
  <div class="container flex justify-center items-start py-12">
    <div class="profile-section flex gap-16">
      <!-- Profile Pic -->
      <div class="profile-pic-section flex flex-col items-center gap-4">
        <div class="relative">
          <div class="w-52 h-52 bg-gray-300 rounded-full overflow-hidden flex items-center justify-center">
            <img src="default.jpg" alt="" class="w-full h-full object-cover" id="profileImagePreview">
          </div>
          <input type="file" accept="image/*" class="absolute top-0 left-0 w-full h-full opacity-0 cursor-pointer" onchange="previewProfileImage(event)">
        </div>
        <div class="button-group flex flex-col gap-3 mt-4">
          <button type="submit" form="profileForm" class="w-36 py-2 bg-gray-800 text-white rounded">Edit Profil</button>
          <button type="button" onclick="alert('Belum ada data riwayat pesanan.');" class="w-36 py-2 bg-gray-800 text-white rounded">Riwayat Pesanan</button>
        </div>
      </div>
      
      <!-- Profile Info Form -->
      <form class="profile-info flex flex-col" id="profileForm" method="post">
        <input type="text" name="name" placeholder="Nama" value="<?php echo $_SESSION['name'] ?? ''; ?>" required class="w-80 px-4 py-2 mb-4 border border-gray-300 rounded">
        <input type="email" name="email" placeholder="Email" value="<?php echo $_SESSION['email'] ?? ''; ?>" required class="w-80 px-4 py-2 mb-4 border border-gray-300 rounded">
        <input type="text" name="phone" placeholder="No. Telepon" value="<?php echo $_SESSION['phone'] ?? ''; ?>" required class="w-80 px-4 py-2 mb-4 border border-gray-300 rounded">
        <input type="text" name="address" placeholder="Alamat" value="<?php echo $_SESSION['address'] ?? ''; ?>" required class="w-80 px-4 py-2 mb-4 border border-gray-300 rounded">
      </form>
    </div>
  </div>

  <!-- Footer -->
  <footer class="bg-gray-800 text-white text-sm">
    <div class="max-w-7xl mx-auto grid grid-cols-2 md:grid-cols-4 gap-8 px-6 py-8">
      <!-- Footer Column 1 -->
      <div class="flex-1 min-w-[150px]">
        <h3 class="font-bold mb-2">Le Portrait</h3>
        <ul class="space-y-1 text-sm text-left inline-block">
          <li><a href="#" class="hover:underline">Tentang Kami</a></li>
          <li><a href="#" class="hover:underline">Karir</a></li>
          <li><a href="#" class="hover:underline">Blog</a></li>
          <li><a href="#" class="hover:underline">Kebijakan Privasi</a></li>
        </ul>
      </div>

      <!-- Footer Column 2 -->
      <div class="flex-1 min-w-[150px]">
        <h4 class="font-bold mb-2">Layanan Pelanggan</h4>
        <ul class="space-y-1 text-sm text-left inline-block">
          <li><a href="#" class="hover:underline">Bantuan</a></li>
          <li><a href="#" class="hover:underline">Cara Berbelanja</a></li>
          <li><a href="#" class="hover:underline">Pengiriman</a></li>
          <li><a href="#" class="hover:underline">Pengembalian</a></li>
        </ul>
      </div>

      <!-- Footer Column 3 -->
      <div class="flex-1 min-w-[150px]">
        <h4 class="font-bold mb-2">Pembayaran</h4>
        <ul class="space-y-1 text-sm text-left inline-block">
          <li><a href="#" class="hover:underline">Transfer Bank</a></li>
          <li><a href="#" class="hover:underline">Kartu Kredit</a></li>
          <li><a href="#" class="hover:underline">QRIS</a></li>
          <li><a href="#" class="hover:underline">Cicilan</a></li>
        </ul>
      </div>

      <!-- Footer Column 4 -->
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

  <!-- Cart Sidebar -->
  <div id="cartSidebar" class="fixed top-0 right-0 w-[350px] h-full bg-gray-100 border-l border-gray-300 p-5 shadow-lg z-50 hidden">
    <h2 class="text-xl font-bold mb-5">Shopping Cart</h2>
    <button onclick="toggleCart()" class="absolute top-4 right-4 text-xl font-bold text-gray-600 hover:text-black">&times;</button>

    <div class="cart-item flex justify-between items-center mb-5">
      <div class="w-[50px] h-[50px] bg-gray-300 rounded"></div>
      <div class="flex-grow mx-3">
        <div class="font-bold mb-1">Canon EOS R6</div>
        <div class="flex items-center gap-2">
          <button onclick="decreaseQty(this)" class="w-6 h-6 border border-gray-400 bg-white text-sm rounded">-</button>
          <input type="text" value="1" readonly class="w-8 text-center border border-gray-300 rounded">
          <button onclick="increaseQty(this)" class="w-6 h-6 border border-gray-400 bg-white text-sm rounded">+</button>
        </div>
      </div>
      <div class="font-bold text-right">Rp 28.500.000</div>
    </div>

    <div class="flex justify-between font-bold border-t border-gray-300 pt-3 mt-3 text-base">
      <span>Subtotal:</span>
      <span id="subtotal">Rp 28.500.000</span>
    </div>

    <div class="mt-5 flex flex-col gap-3">
      <button class="bg-gray-800 text-white py-2 font-bold rounded hover:bg-gray-700 transition" onclick="location.href='/cart'">View cart</button>
      <button class="bg-gray-800 text-white py-2 font-bold rounded hover:bg-gray-700 transition" onclick="location.href='/checkout'">Checkout</button>
    </div>
  </div>

  <!-- JavaScript -->
  <script>
    function toggleCart() {
      const cart = document.getElementById('cartSidebar');
      cart.classList.toggle('hidden');
    }

    function increaseQty(button) {
      const input = button.previousElementSibling;
      let qty = parseInt(input.value);
      input.value = qty + 1;
      updateSubtotal();
    }

    function decreaseQty(button) {
      const input = button.nextElementSibling;
      let qty = parseInt(input.value);
      if (qty > 1) {
        input.value = qty - 1;
        updateSubtotal();
      }
    }

    function updateSubtotal() {
      const input = document.querySelector('.cart-item input');
      const price = 28500000;
      const total = price * parseInt(input.value);
      document.getElementById('subtotal').innerText = 'Rp ' + total.toLocaleString('id-ID');
    }

    function previewProfileImage(event) {
      const reader = new FileReader();
      reader.onload = function() {
        const preview = document.getElementById('profileImagePreview');
        preview.src = reader.result;
      }
      reader.readAsDataURL(event.target.files[0]);
    }
  </script>
</body>
</html>
