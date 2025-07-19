<div class="bg-white rounded-xl shadow-md hover:shadow-xl transition duration-300 overflow-hidden flex flex-col group group-hover:ring-2 group-hover:ring-red-500">
    <!-- Klik area produk -->
    <a href="/produk/{{ $product->slug }}" class="block flex-1">
        <div class="relative bg-gradient-to-br from-gray-100 to-gray-200 p-4">
            <div class="flex justify-center items-center h-48">
                @php
                    $images = is_array($product->images) ? $product->images : json_decode($product->images, true);
                @endphp
                @if (!empty($images) && isset($images[0]))
                    <img src="{{ asset('storage/' . $images[0]) }}" 
                         alt="{{ $product->name }}" 
                         class="h-36 object-contain transition-transform duration-300 group-hover:scale-105">
                @else
                    <span class="text-sm text-gray-400">Image not available</span>
                @endif
            </div>

            <!-- Label kategori & brand -->
            <div class="absolute top-3 left-3 space-y-2">
                <span class="bg-blue-500 text-white text-xs px-3 py-1 rounded-full font-semibold">
                    {{ $product->category->name }}
                </span>
                <span class="bg-red-500 text-white text-xs px-3 py-1 rounded-full font-semibold">
                    {{ $product->brand->name }}
                </span>
            </div>
        </div>

        <!-- Konten Produk -->
        <div class="p-5">
            <h3 class="text-lg font-bold text-gray-800 mb-2 line-clamp-2">{{ $product->name }}</h3>

            <!-- Rating -->
            <div class="flex items-center text-sm mb-3">
                <div class="text-yellow-400 mr-2">★★★★★</div>
                <span class="text-gray-500">(4.8/5)</span>
            </div>

            <!-- Harga & Stok -->
            <div class="mb-4">
                <div class="text-xl font-bold text-red-600 mb-1">Rp {{ number_format($product->price, 0, ',', '.') }}</div>
                <div class="text-sm font-medium {{ $product->stock > 0 ? 'text-green-600' : 'text-red-600' }}">
                    Stock: {{ $product->stock > 0 ? $product->stock : 'Finished' }}
                </div>
            </div>
        </div>
    </a>

    <!-- Tombol Add to Cart -->
    <div class="p-4 pt-0">
        <form method="POST" action="{{ route('cart.add') }}" onClick="event.stopPropagation();">
            @csrf
            <input type="hidden" name="product_id" value="{{ $product->id }}">
            <input type="hidden" name="quantity" value="1">
            @if ($product->stock > 0)
                <button type="submit" class="w-full bg-red-500 hover:bg-red-600 text-white py-2 rounded-lg font-semibold flex items-center justify-center transition-colors duration-200">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                              d="M3 3h2l.4 2M7 13h10l4-8H5.4m0 0L7 13m0 0l-2.5 7M7 13l2.5 7m0 0h5.5m-5.5 0v2a1 1 0 001 1h5.5a1 1 0 001-1v-2"></path>
                    </svg>
                    Add To Cart
                </button>
            @else
                <button type="button" disabled class="w-full bg-gray-400 text-white py-2 rounded-lg font-semibold cursor-not-allowed">
                    Out of stock
                </button>
            @endif
        </form>
    </div>
</div>
<!-- Success Modal -->
    <div id="successModal" class="fixed inset-0 bg-black bg-opacity-50 hidden items-center justify-center z-50">
        <div class="bg-white p-6 rounded-lg shadow-xl max-w-sm mx-4">
            <div class="text-center">
                <div class="w-12 h-12 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-4">
                    <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                    </svg>
                </div>
                <h3 class="font-semibold text-gray-900 mb-2">Added Successfully!</h3>
                <p class="text-gray-600 text-sm mb-4">The product has been added to your shopping cart.</p>
                <button id="closeModal" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-lg transition-colors">
                    OK
                </button>
            </div>
        </div>
    </div>




<script>
function addToCart(productId) {
    fetch('{{ route("cart.add") }}', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': '{{ csrf_token() }}'
        },
        body: JSON.stringify({
            product_id: productId
        })
    })
    .then(response => response.json())
    .then(data => {
        if(data.success) {
            // Update tampilan keranjang
            updateCartCount();
            // Tampilkan notifikasi
            alert('Product successfully added to cart!');
        }
    })
    .catch(error => console.error('Error:', error));
}

function updateCartCount() {
    // Implementasi update jumlah item di keranjang
    // Contoh:
    fetch('{{ route("cart.count") }}')
        .then(response => response.json())
        .then(data => {
            document.getElementById('cart-count').innerText = data.count;
        });
}
// Success Modal functionality
        const successModal = document.getElementById('successModal');
        const closeModal = document.getElementById('closeModal');

        // Close modal functionality
        if (closeModal) {
            closeModal.addEventListener('click', () => {
                successModal.classList.add('hidden');
                successModal.classList.remove('flex');
            });
        }

        // Close modal when clicking outside
        successModal.addEventListener('click', (e) => {
            if (e.target === successModal) {
                successModal.classList.add('hidden');
                successModal.classList.remove('flex');
            }
        });
</script>
@if (session('success'))
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                const successModal = document.getElementById('successModal');
                if (successModal) {
                    successModal.classList.remove('hidden');
                    successModal.classList.add('flex');
                }
            });
        </script>
    @endif