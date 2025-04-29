<!-- components/produk-card.blade.php -->

<div class="bg-white border rounded-lg shadow-sm p-4 flex flex-col h-full">
  
  <!-- Gambar Produk -->
  <div class="w-full aspect-square mb-4 overflow-hidden rounded-lg bg-gray-200 flex items-center justify-center">
    @if (isset($image) && $image)
      <img src="{{ asset($image) }}" alt="{{ $title }}" 
        class="w-full h-full object-cover hover:scale-105 transition-transform duration-300">
    @else
      <span class="text-gray-400">{{ $imagePlaceholder ?? 'No Image' }}</span>
    @endif
  </div>

  <!-- Info Produk -->
  <h3 class="font-semibold text-lg">{{ $title }}</h3>
  <p class="text-red-600 font-bold">{{ $price }}</p>
  <p class="text-sm text-gray-500 mb-4">★ {{ $rating }} ({{ $reviews }} ulasan)</p>

  <!-- Tombol -->
  <button class="mt-auto bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600 transition">
    Tambah ke Keranjang
  </button>
</div>
