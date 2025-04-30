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

  @include('components.navbar')

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
  @include('components.cart')