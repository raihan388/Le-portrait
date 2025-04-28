<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Detail Produk Kamera</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 min-h-screen flex flex-col">

  @include('components.navbar')

  <main class="container mx-auto px-6 py-10">
    <!-- Product Container -->
    <div class="flex flex-col md:flex-row gap-8">
      <!-- Image Section -->
      <div class="w-full md:w-1/2 flex flex-col gap-4">
        <!-- Main Image -->
        <div class="bg-gray-200 rounded-lg overflow-hidden h-[500px] w-full">
          <div class="h-full w-full flex items-center justify-center bg-gray-300">
            <span class="text-gray-500 text-lg">Gambar Canon EOS</span>
          </div>
        </div>
        
        <!-- Thumbnails -->
        <div class="grid grid-cols-4 gap-2">
          <div class="bg-gray-300 aspect-square rounded-md flex items-center justify-center p-1">
            <span class="text-xs text-gray-500 text-center leading-tight">Thumb 1</span>
          </div>
          <div class="bg-gray-300 aspect-square rounded-md flex items-center justify-center p-1">
            <span class="text-xs text-gray-500 text-center leading-tight">Thumb 2</span>
          </div>
          <div class="bg-gray-300 aspect-square rounded-md flex items-center justify-center p-1">
            <span class="text-xs text-gray-500 text-center leading-tight">Thumb 3</span>
          </div>
          <div class="bg-gray-300 aspect-square rounded-md flex items-center justify-center p-1">
            <span class="text-xs text-gray-500 text-center leading-tight">Thumb 4</span>
          </div>
        </div>
      </div>

      <!-- Info Section -->
      <div class="w-full md:w-1/2">
        <!-- Breadcrumb -->
        <div class="text-sm text-gray-500 mb-4">
          <span>Home</span>
          <span> / </span>
          <span>Kamera</span>
          <span> / </span>
          <span class="text-gray-700">Canon EOS</span>
        </div>
        
        <!-- Product Title -->
        <h1 class="text-3xl md:text-4xl font-bold mb-3">Canon EOS R5 Full-Frame Mirrorless Camera</h1>
        <p class="text-2xl font-bold text-gray-800 mb-6">Rp 42.999.000</p>
        
        <!-- Features -->
        <div class="space-y-3 mb-8">
          <p class="font-semibold text-lg">Fitur Utama:</p>
          <ul class="list-disc list-inside text-gray-700 space-y-2">
            <li>Sensor Full-Frame 45MP</li>
            <li>Perekaman Video 8K</li>
            <li>Dual Pixel CMOS AF II</li>
            <li>Stabilizer Gambar 5-axis</li>
            <li>ISO 100-51200 (expandable to 102400)</li>
          </ul>
        </div>

        <!-- Quantity Control -->
        <div class="flex items-center space-x-4 mb-6">
          <button class="px-4 py-2 bg-gray-200 rounded-md hover:bg-gray-300 transition">-</button>
          <span class="text-lg w-8 text-center">1</span>
          <button class="px-4 py-2 bg-gray-200 rounded-md hover:bg-gray-300 transition">+</button>
        </div>

        <!-- Add to Cart Button -->
        <button class="w-full md:w-auto px-8 py-3 bg-blue-600 text-white rounded-md hover:bg-blue-700 mb-6 text-lg font-medium transition duration-200">
          Tambah ke Keranjang
        </button>

        <!-- Category -->
        <p class="text-gray-700">
          Kategori: 
          <a href="#" class="text-blue-600 hover:underline">Kamera Mirrorless</a>
        </p>
      </div>
    </div>
  </main>

  @include('components.footer')

</body>
</html>