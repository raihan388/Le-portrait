<!-- components/special-offer-card.blade.php -->
<div class="flex bg-white rounded-xl shadow-md overflow-hidden w-full max-w-3xl transition transform hover:scale-105 hover:shadow-lg duration-300">
  <!-- Gambar -->
  <div class="w-[350px] h-[220px] bg-gray-200 flex items-center justify-center text-gray-400 text-sm">
    @if (!empty($image))
      <img src="{{ asset($image) }}" alt="{{ $title ?? 'Promo' }}" class="w-full h-full object-cover">
    @else
      350 × 220
    @endif
  </div>

  <!-- Konten -->
  <div class="p-6 flex flex-col justify-between flex-1">
    <div>
      <h3 class="text-xl font-bold text-gray-800 mb-2">{{ $title ?? 'Judul Promo' }}</h3>
      <p class="text-base text-gray-600 mb-6">{{ $description ?? 'Deskripsi singkat promo atau penawaran' }}</p>
    </div>
    <a href="{{ $link ?? '#' }}" class="inline-block bg-red-500 text-white text-base font-semibold px-5 py-3 rounded hover:bg-red-600 transition w-max">
      Lihat Penawaran
    </a>
  </div>
</div>

