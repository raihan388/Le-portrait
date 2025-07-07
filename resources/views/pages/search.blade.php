<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Le-Portrait | Search</title>
  <script src="{{ asset('styles/tailwindcss3.4.1.js') }}"></script>
</head>
<body class="font-sans bg-gray-50 text-gray-900 overflow-x-hidden">

  <!-- Navbar -->
  @include('components.navbar')

  <!-- Result Section -->
  <section class="max-w-7xl mx-auto px-4 mt-6 mb-20">
    <h2 class="text-xl font-bold mb-4">
      Search Results for: <span class="text-red-600">"{{ request('search') }}"</span>
    </h2>

    @if($products->count() > 0)
      <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
        @foreach ($products as $product)
          @include('components.produk-card', ['product' => $product])
        @endforeach
      </div>

      <div class="mt-8">
        {{ $products->appends(['query' => request('query')])->links() }}
      </div>
    @else
      <div class="text-center text-gray-500 py-16">
        <p>No products found for <span class="font-medium text-red-500">"{{ request('search') }}"</span>.</p>
      </div>
    @endif
  </section>

  <!-- Footer -->
  @include('components.footer')

</body>
</html>
