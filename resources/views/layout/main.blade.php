<!-- Sidebar -->
<aside class="lg:w-1/5 lg:pr-6 lg:border-r border-gray-200">
  <h2 class="font-bold text-lg mb-4">Brands</h2>
  <ul class="space-y-2 text-gray-700">
    @foreach (['Canon', 'Nikon', 'Sony', 'Fujifilm', 'Leica'] as $brand)
      <li>
        <a href="#" class="hover:underline hover:text-red-500 transition-colors duration-200">
          {{ $brand }}
        </a>
      </li>
    @endforeach
  </ul>
</aside>

<!-- Main Content -->


  <!-- Products Grid -->
  <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
  @foreach ($products as $product)
  @include('components.produk-card', [
    'title' => $product['title'] ?? 'Nama Produk',
    'price' => $product['price'] ?? 'Rp 0',
    'rating' => $product['rating'] ?? '0.0',
    'reviews' => $product['reviews'] ?? '0',
    'image' => $product['image'] ?? null,
    'imagePlaceholder' => '280 × 200'
  ])
@endforeach

  </div>
<script>
  document.getElementById('nav-toggle').addEventListener('click', function () {
    const navContent = document.getElementById('nav-content');
    navContent.classList.toggle('hidden');
  });
</script>