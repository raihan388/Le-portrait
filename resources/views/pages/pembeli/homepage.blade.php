<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Le-Portrait | homepage</title>
  <script src="{{ asset('styles/tailwindcss3.4.1.js') }}"></script>
</head>
<body class="font-sans bg-gray-50 text-gray-900">
  <!-- Header -->
  @include('components.navbar')

  <!-- Hero Section -->
  <div class="max-w-7xl mx-auto px-4 mt-5 mb-5">
    <div class="h-96 bg-gray-800 text-white rounded-lg flex items-center justify-center bg-center bg-cover" 
         style="background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('images/about.jpeg')">
      <div class="text-center p-5">
        <h1 class="text-4xl font-bold mb-4">Premium Camera Collection</h1>
        <p class="text-lg mb-6">Discover high-quality cameras at the best prices</p>
        <a href="#" class="py-3 px-6 bg-red-600 text-white font-bold rounded-md inline-block">View Collection</a>
      </div>
    </div>
  </div>

  <!-- Featured Product -->
  <div class="max-w-7xl mx-auto px-4 mt-8">
  <h2 class="text-2xl font-bold mb-4">Featured Product</h2>

  @include('components.produk-card')

</d>


<!-- Special Offers & Best Selling Product -->
<div class="max-w-7xl mx-auto px-4 py-12">
  <h2 class="text-2xl font-bold mb-6">Special Offers</h2>

    @include('components.produk-card')
</div>
<!-- About -->
@include('components.about')

  <!-- Footer -->
  @include('components.footer')
  
  @include('components.cart')
    <h2 class="text-2xl font-bold mb-4">Featured Product</h2>
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-3 gap-6">
      @include('components.produk-card')
    </div>
  </div>

  <!-- Special Offers & Best Selling Product -->
  <div class="max-w-7xl mx-auto px-4 py-12">
    <h2 class="text-2xl font-bold mb-6">Special Offers</h2>
    <div class="grid md:grid-cols-3 gap-6 mb-12">
      @include('components.produk-card')
    </div>
  </div>

  <!-- About -->
  @include('components.about')

  <!-- Footer (DIBIARKAN DI LUAR SEMUA CONTAINER YANG TERBATAS) -->
  @include('components.footer')

</body>
</html>

