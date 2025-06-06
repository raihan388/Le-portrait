<!-- components/produk-card.blade.php -->

<div class="bg-white border rounded-lg shadow-sm p-4 flex flex-col h-full">
  
  <!-- Gambar Produk -->
  <div class="w-full aspect-square mb-4 overflow-hidden rounded-lg bg-gray-200 flex items-center justify-center">
    @if (isset($image) && $image)
    <a href="{{ route('detailproduk', ) }}">
      <img src="{{ asset($image) }}" alt="" 
        class="max-w-3/4 h-full object-cover hover:scale-105 transition-transform duration-300">
    </a>
        @else
      <span class="text-gray-400">{{ $imagePlaceholder ?? 'No Image' }}</span>
    @endif
  </div>

  <!-- Info Produk -->
<!-- Info Produk -->
<h3 class="text-base font-medium text-gray-800 mb-2"></h3>
<p class="text-lg font-bold text-red-600 mb-2"></p>

<!-- Rating dan Ulasan -->
<div class="flex items-center mb-3">
  <!-- Bintang -->
  

  <!-- Jumlah ulasan -->
  <span class="text-gray-500 text-sm">(reviews)</span>
</div>

  <!-- Tombol -->
  <button type="submit" class="mt-auto bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600 transition">
    Add to Cart
  </button>
</div>
