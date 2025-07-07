<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Le-Portrait | Homepage</title>
  <script src="{{ asset('styles/tailwindcss3.4.1.js') }}"></script>
</head>
<body class="font-sans bg-gray-50 text-gray-900 overflow-x-hidden">

  <!-- Navbar -->
  @include('components.navbar')

  <!-- Hero Section -->
  <div class="max-w-7xl mx-auto px-4 mb-10">
    <div class="h-[28rem] w-full bg-gray-800 text-white rounded-xl flex items-center justify-center bg-center bg-cover overflow-hidden"
         style="background-image: linear-gradient(rgba(0,0,0,0.5), rgba(0,0,0,0.5)), url('{{ asset('images/about.jpeg') }}')">
      <div class="text-center p-5 max-w-xl">
        <h1 class="text-3xl sm:text-4xl font-bold mb-4">Premium Camera Collection</h1>
        <p class="text-base sm:text-lg mb-6">Discover high-quality cameras at the best prices</p>
        <a href="#" class="inline-block py-3 px-6 bg-red-600 text-white font-bold rounded-md hover:bg-red-700 transition">View Collection</a>
      </div>
    </div>
  </div>

  <!-- Product -->
  <section class="max-w-7xl mx-auto px-4 mt-12">
    <h2 class="text-xl sm:text-2xl font-bold mb-6">Products</h2>
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
      @foreach ($products as $product)
        @include('components.produk-card', ['product' => $product])
      @endforeach
    </div>
  </section>

  <!-- Featured Offers -->
  <section class="max-w-7xl mx-auto px-4 mt-16">
    <h2 class="text-xl sm:text-2xl font-bold mb-6">Featured Offers</h2>
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
      @foreach ($featuredProducts as $product)
        @include('components.produk-card', ['product' => $product])
      @endforeach
    </div>
  </section>

  <!-- About Section -->
  <section class="max-w-7xl mx-auto px-4 mt-20">
    @include('components.about')
  </section>

  <!-- Footer -->
  <footer class="mt-20">
    @include('components.footer')
  </footer>

</body>
</html>
