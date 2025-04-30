<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Profile Le-Portrait</title>
  <script src="{{ asset('styles/tailwindcss3.4.1.js') }}"></script>
</head>
<body class="font-sans bg-gray-100 text-gray-900">

  <!-- Header -->
@include('components.navbar')

  <!-- Container Profile -->
<div class="container max-w-7xl mx-auto flex justify-center items-start py-12 px-6">
  <div class="profile-section flex gap-24">

    <!-- Profile Pic -->
    <div class="profile-pic-section flex flex-col items-center gap-6">
      <div class="relative">
        <div class="w-60 h-60 bg-gray-300 rounded-full overflow-hidden flex items-center justify-center">
          <img src="default.jpg" alt="" class="w-full h-full object-cover" id="profileImagePreview">
        </div>
        <input type="file" accept="image/*" class="absolute inset-0 opacity-0 cursor-pointer" onchange="previewProfileImage(event)">
      </div>
      <div class="button-group flex flex-col gap-4 mt-6">
        <button type="submit" form="profileForm" class="w-40 py-3 text-lg bg-gray-800 text-white rounded">Edit Profil</button>
        <button type="button" onclick="alert('Belum ada data riwayat pesanan.');" class="w-40 py-3 text-lg bg-gray-800 text-white rounded">Riwayat Pesanan</button>
      </div>
    </div>

    <!-- Profile Info Form -->
    <form class="profile-info flex flex-col" id="profileForm" method="post">
      <input type="text" name="name" placeholder="Nama" value="<?php echo $_SESSION['name'] ?? ''; ?>" required class="text-lg w-96 px-5 py-3 mb-5 border border-gray-300 rounded">
      <input type="email" name="email" placeholder="Email" value="<?php echo $_SESSION['email'] ?? ''; ?>" required class="text-lg w-96 px-5 py-3 mb-5 border border-gray-300 rounded">
      <input type="text" name="phone" placeholder="No. Telepon" value="<?php echo $_SESSION['phone'] ?? ''; ?>" required class="text-lg w-96 px-5 py-3 mb-5 border border-gray-300 rounded">
      <input type="text" name="address" placeholder="Alamat" value="<?php echo $_SESSION['address'] ?? ''; ?>" required class="text-lg w-96 px-5 py-3 mb-5 border border-gray-300 rounded">
    </form>
  </div>
</div>


  @include('components.footer')

  <!-- Cart Sidebar -->
  @include('components.cart')