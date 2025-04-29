<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>HomePage Le-Portrait</title>
  <script src="{{ asset('styles/tailwindcss3.4.1.js') }}"></script>
</head>
<body class="font-sans bg-gray-50 text-gray-900">
  <!-- Header -->

  @include('components.navbar')

  <!-- Hero Section -->
  <section class="bg-gray-200 py-16 text-center">
    <h1 class="text-3xl font-bold mb-2">Premium Camera Collection</h1>
    <p class="text-gray-600 mb-4">Discover high-quality cameras at the best prices</p>
    <button class="bg-red-500 text-white px-6 py-2 rounded">View Collection</button>
  </section>

  <!-- Featured Product -->
  <section class="max-w-7xl mx-auto px-4 mt-8">
    <h2 class="text-xl font-bold mb-4">Featured product</h2>
    <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
      <!-- Product Cards -->
    <div class="bg-white border rounded-lg shadow-sm p-4 flex flex-col h-full">
      <div class="bg-gray-300 h-40 flex items-center justify-center rounded">280 × 200</div>
      <h3 class="font-semibold text-sm mt-3">Canon EOS R6</h3>
      <p class="text-red-600 font-bold text-base">Rp 28.500.000</p>
      <p class="text-sm text-gray-700"><span class="text-yellow-500">★★★★★</span> (124 ulasan)</p>
      <button class="mt-3 w-full bg-red-500 text-white font-semibold py-2 rounded hover:bg-red-600">Tambah ke Keranjang</button>
    </div>

    <div class="bg-white rounded-lg shadow p-4">
      <div class="bg-gray-300 h-40 flex items-center justify-center rounded">280 × 200</div>
      <h3 class="font-semibold text-sm mt-3">Sony Alpha a7 III</h3>
      <p class="text-red-600 font-bold text-base">Rp 25.999.000</p>
      <p class="text-sm text-gray-700"><span class="text-yellow-500">★★★★★</span> (98 ulasan)</p>
      <button class="mt-3 w-full bg-red-500 text-white font-semibold py-2 rounded hover:bg-red-600">Tambah ke Keranjang</button>
    </div>

    <div class="bg-white rounded-lg shadow p-4">
      <div class="bg-gray-300 h-40 flex items-center justify-center rounded">280 × 200</div>
      <h3 class="font-semibold text-sm mt-3">Fujifilm X-T4</h3>
      <p class="text-red-600 font-bold text-base">Rp 23.750.000</p>
      <p class="text-sm text-gray-700"><span class="text-yellow-500">★★★★☆</span> (76 ulasan)</p>
      <button class="mt-3 w-full bg-red-500 text-white font-semibold py-2 rounded hover:bg-red-600">Tambah ke Keranjang</button>
    </div>

    <div class="bg-white rounded-lg shadow p-4">
      <div class="bg-gray-300 h-40 flex items-center justify-center rounded">280 × 200</div>
      <h3 class="font-semibold text-sm mt-3">Nikon Z6 II</h3>
      <p class="text-red-600 font-bold text-base">Rp 26.200.000</p>
      <p class="text-sm text-gray-700"><span class="text-yellow-500">★★★★☆</span> (65 ulasan)</p>
      <button class="mt-3 w-full bg-red-500 text-white font-semibold py-2 rounded hover:bg-red-600">Tambah ke Keranjang</button>
    </div>
  </div>
</section>

<!-- Special Offers & Best Selling Product -->
<div class="max-w-7xl mx-auto px-4 py-12">
  <h2 class="text-2xl font-bold mb-6">Special Offers</h2>
  <div class="grid md:grid-cols-3 gap-6 mb-12">
    <!-- Tempatkan kartu produk spesial di sini -->
    <div class="bg-white p-4 rounded shadow">Produk Spesial 1</div>
    <div class="bg-white p-4 rounded shadow">Produk Spesial 2</div>
    <div class="bg-white p-4 rounded shadow">Produk Spesial 3</div>
  </div>

  <h2 class="text-2xl font-bold mb-6">Best Selling Product</h2>
  <div class="grid md:grid-cols-3 gap-6">
    <!-- Tempatkan kartu produk best seller di sini -->
    <div class="bg-white p-4 rounded shadow">Best Seller 1</div>
    <div class="bg-white p-4 rounded shadow">Best Seller 2</div>
    <div class="bg-white p-4 rounded shadow">Best Seller 3</div>
  </div>
</div>

<!-- About Us -->
<section class="max-w-7xl mx-auto px-4 py-12">
  <h2 class="text-2xl font-bold text-center mb-10">About Us</h2>
  <div class="grid md:grid-cols-2 gap-8 justify-items-center">

    <!-- Raihan -->
    <div class="bg-white p-4 rounded shadow hover:shadow-xl transition duration-300 transform hover:-translate-y-1 text-center w-full max-w-xs">
      <img src="image.jpg" class="w-full h-52 object-cover rounded-lg mb-4" />
      <p class="text-sm font-semibold">Front-End Developer</p>
      <h2 class="text-lg font-bold">Muhammad Raihan Fauzan</h2>
      <p class="text-sm mt-2 text-justify">
        The man behind the cool look of this website! Raihan is our Front-End Developer who is really good at making websites look good and easy to use.
      </p>
      <p class="text-sm mt-2 text-justify">
        He works with HTML, CSS, JavaScript, and frameworks like Vue and Tailwind to turn designs into interactive and responsive web pages.
      </p>
    </div>

    <!-- Sabrina -->
    <div class="bg-white p-4 rounded shadow hover:shadow-xl transition duration-300 transform hover:-translate-y-1 text-center w-full max-w-xs">
      <img src="image.jpg" class="w-full h-52 object-cover rounded-lg mb-4" />
      <p class="text-sm font-semibold">Front-End Developer</p>
      <h2 class="text-lg font-bold">Sabrina Rosa</h2>
      <p class="text-sm mt-2 text-justify">
        The woman behind the cool look of this website! Sabrina is our Front-End Developer who is really good at making websites look good and easy to use.
      </p>
      <p class="text-sm mt-2 text-justify">
        She works with HTML, CSS, JavaScript, and frameworks like Vue and Tailwind to turn designs into interactive and responsive web pages.
      </p>
    </div>

    <!-- Yuki -->
    <div class="bg-white p-4 rounded shadow hover:shadow-xl transition duration-300 transform hover:-translate-y-1 text-center w-full max-w-xs">
      <img src="image.jpg" class="w-full h-52 object-cover rounded-lg mb-4" />
      <p class="text-sm font-semibold">Back-End Developer</p>
      <h2 class="text-lg font-bold">Muhamad Yuki</h2>
      <p class="text-sm mt-2 text-justify">
        Yuki is the powerhouse behind our server-side logic! He ensures data flows smoothly and securely.
      </p>
      <p class="text-sm mt-2 text-justify">
        He works with Node.js, Express, and database systems to build solid back-end architecture for our site.
      </p>
    </div>

    <!-- Dilla -->
    <div class="bg-white p-4 rounded shadow hover:shadow-xl transition duration-300 transform hover:-translate-y-1 text-center w-full max-w-xs">
      <img src="image.jpg" class="w-full h-52 object-cover rounded-lg mb-4" />
      <p class="text-sm font-semibold">Back-End Developer</p>
      <h2 class="text-lg font-bold">Annisa Fadilla</h2>
      <p class="text-sm mt-2 text-justify">
        Dilla makes sure our backend runs like a charm! She’s passionate about clean code and efficient queries.
      </p>
      <p class="text-sm mt-2 text-justify">
        Her skills include Laravel, PHP, and RESTful API development for scalable applications.
      </p>
    </div>

  </div>
</section>


  <!-- Footer -->
  @include('components.footer')
</body>
</html>
