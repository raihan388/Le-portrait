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

  <!-- Main Content -->
  <main class="container mx-auto py-16 flex justify-center">
    <div class="flex gap-16">

      <!-- Left Side - Profile Image and Buttons -->
      <div class="flex flex-col items-center">
        <div class="w-44 h-44 bg-gray-300 rounded-full mb-4 overflow-hidden">
          <img src="{{ asset($user->profile_image ?? 'images/default-avatar.jpg') }}" id="sidebarProfileImage" class="w-full h-full object-cover">
        </div>
        <h2 class="text-base font-medium mb-8">{{ $user->name ?? 'Nama Username' }}</h2>

        <div class="flex flex-col space-y-4 w-44">
          <button type="submit" form="profileForm" class="w-full py-2 bg-gray-800 text-white text-sm rounded hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500">Edit profil</button>
          <a href="/orders/history" class="w-full py-2 bg-gray-800 text-white text-sm rounded hover:bg-gray-700 text-center focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500">
            Riwayat Pesanan
          </a>
        </div>
      </div>

      <!-- Right Side - Profile Form -->
      <div class="w-[630px] border border-gray-200 bg-white p-10">
        <h1 class="text-xl font-medium">Profil Saya</h1>
        <p class="text-sm text-gray-600 mb-8">Kelola informasi profil Anda untuk mengontrol, melindungi dan mengamankan akun</p>

        <hr class="mb-8">

        <form id="profileForm" action="/profile/update" method="POST" enctype="multipart/form-data" class="flex">
          @csrf

          <!-- Form Input -->
          <div class="flex-1 pr-10">
            <div class="mb-6">
              <input type="text" name="username" placeholder="Username *" value="{{ $user->username ?? '' }}" required class="w-full py-2 px-3 border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
            </div>

            <div class="mb-6">
              <input type="email" name="email" placeholder="Email Address *" value="{{ $user->email ?? '' }}" required class="w-full py-2 px-3 border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
            </div>

            <div class="mb-6">
              <input type="tel" name="phone" placeholder="No telp *" value="{{ $user->phone ?? '' }}" required class="w-full py-2 px-3 border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
            </div>

            <div class="mb-6">
              <input type="text" name="address" placeholder="Alamat *" value="{{ $user->address ?? '' }}" required class="w-full py-2 px-3 border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
            </div>
          </div>

          <!-- Gambar Profil -->
          <div class="border-l border-gray-200 pl-10 flex flex-col items-center">
            <div class="w-24 h-24 bg-gray-300 rounded-full mb-4 overflow-hidden">
              <img src="{{ asset($user->profile_image ?? 'images/default-avatar.jpg') }}" id="formProfileImage" class="w-full h-full object-cover">
            </div>

            <label for="profile_image" class="text-sm border border-gray-300 px-4 py-1 cursor-pointer hover:bg-gray-50">
              Pilih Gambar *
              <input type="file" name="profile_image" id="profile_image" class="hidden" accept="image/*" onchange="previewImages(event)">
            </label>
          </div>
        </form>
      </div>

    </div>
  </main>

  <!-- Footer -->
  @include('components.footer')


  <!-- Preview Gambar Script -->
  <script>
    function previewImages(event) {
      const reader = new FileReader();
      reader.onload = function() {
        document.getElementById('formProfileImage').src = reader.result;
        document.getElementById('sidebarProfileImage').src = reader.result;
      }
      reader.readAsDataURL(event.target.files[0]);
    }
  </script>
</body>
</html>
