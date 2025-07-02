<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach ($products as $product)
            
            <!-- Product 1 -->
            <!-- Canon EOS 200D II Card -->
            <div class="bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-xl transition-shadow duration-300">
                <div class="relative bg-gradient-to-br from-gray-100 to-gray-200 p-8">
                    <div class="flex justify-center items-center h-64">
                    @php
                        $images = is_array($product->images) ? $product->images : json_decode($product->images, true);
                    @endphp


                    @if (!empty($images))
                        <img src="{{ asset('storage/' . $images[2]) }}" 
                             alt="{{$product->name}}" 
                             class="max-w-full max-h-full object-contain drop-shadow-lg">
                             @else
                      <span class="text-sm text-gray-400">Gambar tidak tersedia</span>
                    @endif

                    </div>
                    <div class="absolute top-4 right-4">
                        <span class="bg-blue-500 text-white px-3 py-1 rounded-full text-sm font-medium">{{ $product->category->name }}</span>
                        <span class="bg-red-500 text-white px-3 py-1 rounded-full text-sm font-medium">{{ $product->brand->name }}</span>
                    </div>
                </div>
                
                <div class="p-6">
                    <a href="/produk/{{ $product->slug }}" >
                        <h3 class="text-xl font-bold text-gray-800 mb-2">{{$product->name}}</h3>
                    </a>
                    <div class="flex items-center mb-4">
                        <div class="flex text-yellow-400 text-sm">
                            ★★★★★
                        </div>
                        <span class="text-gray-500 text-sm ml-2">(4.8/5)</span>
                    </div>
                    
                    <div class="mb-6 flex justify-between items-center" >
                        <span class="text-3xl font-bold text-red-600">Rp {{ number_format($product->price, 0, ',', '.') }}</span>
                        <span class="text-sm {{ $product->stock > 0 ? 'text-green-600' : 'text-red-600' }} font-semibold flex items-center">
                            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" d="M16 21v-4a4 4 0 00-8 0v4"></path>
                            </svg>
                            Stok: {{ $product->stock > 0 ? $product->stock : 'Habis' }}
                        </span>
                    </div>

      

                    <form action="{{ route('cart.add') }}" method="POST">
                        @csrf
                        <input  type="hidden" name="quantity" value="1">
                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                        @if ($product->stock > 0)
                        <button 
                            type="submit"
                            class="w-full bg-red-500 hover:bg-red-600 text-white font-semibold py-3 px-4 rounded-lg transition-colors duration-200 flex items-center justify-center">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                      d="M3 3h2l.4 2M7 13h10l4-8H5.4m0 0L7 13m0 0l-2.5 7M7 13l2.5 7m0 0h5.5m-5.5 0v2a1 1 0 001 1h5.5a1 1 0 001-1v-2"></path>
                            </svg>
                            Tambah ke Keranjang
                        </button>
                    @else
                        <button 
                            type="button"
                            disabled
                            class="w-full bg-gray-400 text-white font-semibold py-3 px-4 rounded-lg flex items-center justify-center cursor-not-allowed">
                            Stok Habis
                        </button>
                    @endif
                </form>
                </div>
            </div>
        @endforeach
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
            alert('Produk berhasil ditambahkan ke keranjang!');
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
</script>