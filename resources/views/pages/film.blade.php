<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Film Camera</title>
  <script src="styles/tailwindcss3.4.1.js"></script>
</head>
<body class="bg-gray-100 text-gray-800 min-h-screen flex flex-col">

@include('components.navbar')

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
  @include('components.footer')

</body>
</html>