@php
    use Illuminate\Support\Str;
    $categorySlug = Str::slug($currentCategory ?? 'dslr'); // fallback default ke 'dslr'
@endphp

      <h2 class="text-lg font-semibold mb-4">Brands</h2>
<ul class="space-y-2     text-gray-700">
    <li><a href="{{ route('brand.show', 'canon')}}" class="hover:text-blue-600">Canon</a></li>
    <li><a href="{{ route('brand.show', 'nikon') }}" class="hover:text-blue-600">Nikon</a></li>
    <li><a href="{{ route('brand.show', 'sony') }}" class="hover:text-blue-600">Sony</a></li>
    <li><a href="{{ route('brand.show', 'fujifilm') }}" class="hover:text-blue-600">Fujifilm</a></li>
    <li><a href="{{ route('brand.show', 'leica') }}" class="hover:text-blue-600">Leica</a></li>
</ul> 