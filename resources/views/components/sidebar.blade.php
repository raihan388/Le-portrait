@php
    use Illuminate\Support\Str;
    $categorySlug = Str::slug($currentCategory ?? 'dslr'); // fallback default ke 'dslr'
@endphp

      <h2 class="text-lg font-semibold mb-4">Brands</h2>
<ul class="space-y-3 text-gray-700">
    <li><a href="{{ route('category.brand', ['category' => $categorySlug, 'brand' => 'Canon']) }}" class="hover:text-blue-600">Canon</a></li>
    <li><a href="{{ route('category.brand', ['category' => $categorySlug, 'brand' => 'Nikon']) }}" class="hover:text-blue-600">Nikon</a></li>
    <li><a href="{{ route('category.brand', ['category' => $categorySlug, 'brand' => 'Sony']) }}" class="hover:text-blue-600">Sony</a></li>
    <li><a href="{{ route('category.brand', ['category' => $categorySlug, 'brand' => 'Fujifilm']) }}" class="hover:text-blue-600">Fujifilm</a></li>
    <li><a href="{{ route('category.brand', ['category' => $categorySlug, 'brand' => 'Leica']) }}" class="hover:text-blue-600">Leica</a></li>
</ul> 