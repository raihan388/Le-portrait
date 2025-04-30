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

  @include('components.footer')

  <!-- Cart Sidebar -->
  @include('components.cart')