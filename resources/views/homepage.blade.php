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

  <section class="max-w-7xl mx-auto px-4 mt-8">
  <h2 class="text-2xl font-bold mb-4">Featured Product</h2>
  <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-3 gap-6">

  @include('components.produk-card', [
        'title' => 'Canon EOS R6',
        'price' => 'Rp 28.500.000',
        'rating' => '5',
        'reviews' => '124',
        'image' => 'images/canon r6.jpg'
      ])

      @include('components.produk-card', [
        'title' => 'Sony Alpha a7 III',
        'price' => 'Rp 25.999.000',
        'rating' => '4.7',
        'reviews' => '98',
        'image' => 'images/sony a7iii.jpg'
      ])

      @include('components.produk-card', [
        'title' => 'Fujifilm X-T4',
        'price' => 'Rp 23.750.000',
        'rating' => '4.6',
        'reviews' => '76',
        'image' => 'images/fujifilm xt4.jpg'
      ])

      @include('components.produk-card', [
        'title' => 'Nikon Z6 II',
        'price' => 'Rp 26.200.000',
        'rating' => '3',
        'reviews' => '65',
        'image' => 'images/nikon z6.jpg'
      ])

  </div>
</section>


<!-- Special Offers & Best Selling Product -->
<div class="max-w-7xl mx-auto px-4 py-12">
  <h2 class="text-2xl font-bold mb-6">Special Offers</h2>
  <div class="grid md:grid-cols-3 gap-6 mb-12">

  @include('components.produk-card', [
        'title' => 'Canon EOS R6',
        'price' => 'Rp 28.500.000',
        'rating' => '5',
        'reviews' => '124',
        'image' => 'images/canon r6.jpg'
      ])

      @include('components.produk-card', [
        'title' => 'Sony Alpha a7 III',
        'price' => 'Rp 25.999.000',
        'rating' => '4.7',
        'reviews' => '98',
        'image' => 'images/sony a7iii.jpg'
      ])

      @include('components.produk-card', [
        'title' => 'Fujifilm X-T4',
        'price' => 'Rp 23.750.000',
        'rating' => '4.6',
        'reviews' => '76',
        'image' => 'images/fujifilm xt4.jpg'
      ])

      </div>
      
  <h2 class="text-2xl font-bold mb-6">Best Selling Product</h2>
  <div class="grid md:grid-cols-3 gap-6">
  @include('components.produk-card', [
        'title' => 'Canon EOS R6',
        'price' => 'Rp 28.500.000',
        'rating' => '5',
        'reviews' => '124',
        'image' => 'images/canon r6.jpg'
      ])

      @include('components.produk-card', [
        'title' => 'Sony Alpha a7 III',
        'price' => 'Rp 25.999.000',
        'rating' => '4.7',
        'reviews' => '98',
        'image' => 'images/sony a7iii.jpg'
      ])

      @include('components.produk-card', [
        'title' => 'Fujifilm X-T4',
        'price' => 'Rp 23.750.000',
        'rating' => '4.6',
        'reviews' => '76',
        'image' => 'images/fujifilm xt4.jpg'
      ])

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

    <!-- Cart Sidebar -->
    @include('components.cart')
    
</body>
</html>
