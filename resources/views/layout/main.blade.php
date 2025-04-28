<main class="container mx-auto flex mt-8">
  <!-- Sidebar -->
  <aside class="w-1/5 pr-6 border-r border-gray-200">
    <h2 class="font-bold text-lg mb-4">Brands</h2>
    <ul class="space-y-2 text-gray-700">
      @foreach (['Canon', 'Nikon', 'Sony', 'Fujifilm', 'Leica'] as $brand)
        <li><a href="#" class="hover:underline">{{ $brand }}</a></li>
      @endforeach
    </ul>
  </aside>

  <!-- Products -->
  <section class="flex-1 p-4 pl-6">
    <h1 class="text-3xl font-bold mb-2">{{ $title }}</h1>
    <p class="text-sm text-gray-600 mb-6">{{ $description }}</p>

    <div class="grid grid-cols-3 gap-6">
      @foreach ($products as $product)
        <div class="border rounded-lg shadow-sm p-4">
          <div class="bg-gray-200 w-full h-40 mb-4 flex items-center justify-center text-gray-500">280 × 200</div>
          <h3 class="font-semibold">{{ $product['name'] }}</h3>
          <p class="text-red-600 font-bold">{{ $product['price'] }}</p>
          <p class="text-sm text-gray-500">{{ $product['rating'] }}</p>
          <button class="mt-2 bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600">Tambah ke Keranjang</button>
        </div>
      @endforeach
    </div>
  </section>
</main>
