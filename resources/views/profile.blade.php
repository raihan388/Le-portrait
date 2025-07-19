<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Le-Portrait | Profile</title>
  <script src="{{ asset('styles/tailwindcss3.4.1.js') }}"></script>
</head>
<body class="font-sans bg-gray-100 text-gray-900">

  <!-- Header -->
  @include('components.navbar')

  <!-- Main Content -->
  <main class="container mx-auto py-10 px-4 sm:px-6 lg:px-8 flex justify-center">
    <div class="flex flex-col lg:flex-row gap-10 w-full max-w-6xl">

      <!-- Left Side - Profile Image and Buttons -->
      <div class="flex flex-col items-center lg:items-start">
        <div class="w-36 h-36 sm:w-44 sm:h-44 bg-gray-300 rounded-full mb-4 overflow-hidden">
          <img
            id="sidebarProfileImage"
            src="{{ $user->profile_image_url }}"
            class="w-full h-full object-cover"
            alt="Foto Profil"
          >
        </div>
        <h2 class="text-base font-medium mb-6 text-center lg:text-left">{{ $user->name ?? 'name' }}</h2>

        <div class="flex flex-col space-y-3 w-36 sm:w-44">
          <button type="submit" form="profileForm" class="w-full py-2 bg-gray-800 text-white text-sm rounded hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500">Edit Profile</button>
          <a href="{{ route('pages.order-history') }}" class="w-full py-2 bg-gray-800 text-white text-sm rounded hover:bg-gray-700 text-center focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500">Order History</a>
        </div>
      </div>

      <!-- Right Side - Profile Form -->
      <div class="w-full border border-gray-200 bg-white p-6 sm:p-10 rounded-md">
        <h1 class="text-xl font-medium">My Profile</h1>
        <p class="text-sm text-gray-600 mb-6">Manage your profile information to control, protect, and secure your account.</p>

        <hr class="mb-6">

        @if (session('success'))
          <div class="mb-4 text-green-600 font-medium">
            {{ session('success') }}
          </div>
        @endif

        <form id="profileForm" action="/profile/update" method="POST" enctype="multipart/form-data" class="flex flex-col lg:flex-row gap-6">
          @csrf

          <!-- Form Input -->
          <div class="flex-1 space-y-4">
            <input type="text" name="name" placeholder="Name *" value="{{ $user->name ?? '' }}" required class="w-full py-2 px-3 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500">
            
            <input type="email" name="email" placeholder="Email Address *" value="{{ $user->email ?? '' }}" required class="w-full py-2 px-3 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500">
            
            <input type="tel" name="phone" placeholder="No Telp *" value="{{ $user->phone ?? '' }}" required class="w-full py-2 px-3 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500">
            
            <input type="text" name="address" placeholder="Alamat *" value="{{ $user->address ?? '' }}" required class="w-full py-2 px-3 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500">
          </div>

          <!-- Gambar Profil -->
          <div class="flex flex-col items-center border-t lg:border-t-0 lg:border-l border-gray-200 pt-6 lg:pt-0 lg:pl-6">
            <div class="w-24 h-24 bg-gray-300 rounded-full mb-4 overflow-hidden">
              <img
                id="formProfileImage"
                src="{{ $user->profile_image && file_exists(public_path('storage/' . $user->profile_image)) ? asset('storage/' . $user->profile_image) : asset('images/default-avatar.jpg') }}"
                class="w-full h-full object-cover"
                alt="Foto Profil"
              >
            </div>

            <label for="profile_image" class="text-sm border border-gray-300 px-4 py-1 cursor-pointer hover:bg-gray-50 rounded text-center">
              Select Image *
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
      const file = event.target.files[0];
      if (!file) return;

      const reader = new FileReader();
      reader.onload = function(e) {
        const src = e.target.result;
        document.getElementById('formProfileImage').src = src;
        document.getElementById('sidebarProfileImage').src = src;
      }
      reader.readAsDataURL(file);
    }
  </script>
</body>
</html>
