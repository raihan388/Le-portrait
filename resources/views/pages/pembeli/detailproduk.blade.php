<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Detail Produk</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="styles/tailwindcss3.4.1.js"></script>
    <script src="{{ asset('styles/tailwindcss3.4.1.js') }}"></script>
    <style>
        .zoom-container {
            position: relative;
            overflow: hidden;
            cursor: zoom-in;
        }
        .zoom-image {
            transition: transform 0.3s ease;
        }
        .zoom-container:hover .zoom-image {
            transform: scale(1.2);
        }
    </style>
</head>
<body class="bg-gray-100">
    @include('components.navbar')
    <!-- Wrapper Layout -->
    <div class="max-w-7xl mx-auto p-4 lg:p-8">
        <div class="bg-white rounded-lg shadow-lg overflow-hidden">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 p-6 lg:p-8">
                <!-- Product Images -->
                @foreach ($product as $item)
                <div class="bg-white p-6 rounded-lg shadow-md">
                    @php
                        $images = is_array($item->images) ? $item->images : json_decode($item->images, true);
                    @endphp

                    @if (!empty($images))
                        <div class="zoom-container border rounded-lg overflow-hidden">
                            <img id="mainImage" src="{{ asset('storage/' . $images[2]) }}" alt="Main Image" class="w-full h-96 object-contain bg-gray-50 zoom-image">
                        </div>

                        <!-- Thumbnails -->
                        <div class="grid grid-cols-4 gap-3 mt-4">
                            @foreach ($images as $key => $img)
                                <button class="thumbnail-btn border-2 {{ $key == 0 ? 'border-blue-500' : 'border-gray-200' }} rounded-lg overflow-hidden transition-colors" data-image="{{ asset('storage/' . $img) }}">
                                    <img src="{{ asset('storage/' . $img) }}" alt="Thumb {{ $key }}" class="w-full h-20 object-contain bg-gray-50">
                                </button>
                            @endforeach
                        </div>
                    @else
                        <span class="text-sm text-gray-400">Gambar tidak tersedia</span>
                    @endif
                </div>

                <!-- Product Details -->
                <div class="bg-white p-6 rounded-lg shadow-md space-y-6">
                    <!-- Product Info -->
                    <div class="space-y-4">
                        <h1 class="text-3xl font-bold text-gray-900">{{ $item->name }}</h1>
                        <p class="text-red-600 text-2xl font-bold">Rp {{ number_format($item->price, 0, ',', '.') }}</p>

                        <div class="flex gap-2">
                            <span class="bg-red-100 text-red-600 px-3 py-1 rounded-full text-sm">{{ $item->category->name }}</span>
                            <span class="bg-blue-100 text-blue-600 px-3 py-1 rounded-full text-sm">{{ $item->brand->name }}</span>
                        </div>
                    </div>

                    <!-- Description -->
                    <div class="space-y-2">
                        <h2 class="font-semibold text-lg text-gray-700">Description</h2>
                        <p class="text-gray-700">{{ $item->description }}</p>
                    </div>

                    <!-- Specifications -->
                    <div class="space-y-3">
                        <h3 class="font-semibold text-lg text-gray-700">Specification</h3>
                        <div class="space-y-2">
                            <div class="flex items-start gap-2">
                                <svg class="w-4 h-4 text-green-500 mt-1 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                                </svg>
                                <span class="text-gray-700">Garansi Resmi 2 Tahun</span>
                            </div>
                            <div class="flex items-start gap-2">
                                <svg class="w-4 h-4 text-green-500 mt-1 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                                </svg>
                                <span class="text-gray-700">1 Tahun Full Coverage (Service & Spareparts)</span>
                            </div>
                            <div class="flex items-start gap-2">
                                <svg class="w-4 h-4 text-green-500 mt-1 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                                </svg>
                                <span class="text-gray-700">1 Tahun Free Service Only</span>
                            </div>
                            <div class="flex items-start gap-2">
                                <svg class="w-4 h-4 text-green-500 mt-1 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                                </svg>
                                <span class="text-gray-700 font-medium">24.5MP FX-Format BSI CMOS Sensor</span>
                            </div>
                            <div class="flex items-start gap-2">
                                <svg class="w-4 h-4 text-green-500 mt-1 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                                </svg>
                                <span class="text-gray-700 font-medium">Dual EXPEED 6 Image Processors</span>
                            </div>
                            <div class="flex items-start gap-2">
                                <svg class="w-4 h-4 text-green-500 mt-1 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                                </svg>
                                <span class="text-gray-700 font-medium">UHD 4K30 Video; N-Log & 10-Bit HDMI Out</span>
                            </div>
                            <div class="flex items-start gap-2">
                                <svg class="w-4 h-4 text-green-500 mt-1 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                                </svg>
                                <span class="text-gray-700 font-medium">14 fps Cont. Shooting; ISO 100-51200</span>
                            </div>
                        </div>
                    </div>

                    <!-- Quantity and Add to Cart -->
                    <form action="{{ route('cart.add') }}" method="POST">
                        @csrf
                        <input type="hidden" name="product_id" value="{{ $item->id }}">
                        <div class="space-y-4 pt-4 border-t">
                            <div class="flex items-center gap-4">
                                <label class="font-semibold text-gray-700">Jumlah:</label>
                                <div class="flex items-center border rounded-lg">
                                    <button id="decreaseBtn" type="button" class="px-3 py-2 hover:bg-gray-100 transition-colors">-</button>
                                    <input id="quantityInput" name="quantity" type="number" value="1" min="1" max="10" class="w-16 text-center py-2 border-x">
                                    <button id="increaseBtn" type="button" class="px-3 py-2 hover:bg-gray-100 transition-colors">+</button>
                                </div>
                            </div>
                            <div class="flex gap-4">    
                                <button type="submit" class="w-full bg-red-500 hover:bg-red-600 text-white font-semibold py-3 px-6 rounded-lg transition-colors duration-200 flex items-center justify-center gap-2">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4m0 0L7 13m0 0l-2.5 7M7 13l2.5 7m0 0h5.5m-5.5 0v2a1 1 0 001 1h5.5a1 1 0 001-1v-2"></path>
                                    </svg>
                                    ADD TO CART
                                </button>
                            </div>
                        </div>
                    </form>
                    
                    <div class="flex gap-4">
                        <button type="submit" class="w-full bg-cyan-500 hover:bg-cyan-600 text-white font-semibold py-3 px-6 rounded-lg transition-colors duration-200 flex items-center justify-center gap-2">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4m0 0L7 13m0 0l-2.5 7M7 13l2.5 7m0 0h5.5m-5.5 0v2a1 1 0 001 1h5.5a1 1 0 001-1v-2"></path>
                                </svg>
                                CHECKOUT
                            </button>
                         </div>

                            
                    </div>
                </div>
                @endforeach
            </div>
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
                <h3 class="font-semibold text-gray-900 mb-2">Berhasil Ditambahkan!</h3>
                <p class="text-gray-600 text-sm mb-4">Produk telah ditambahkan ke keranjang belanja Anda.</p>
                <button id="closeModal" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-lg transition-colors">
                    OK
                </button>
            </div>
        </div>
    </div>
    <!-- Footer -->
    @include('components.footer')
    <!-- End Footer -->

    <!-- Script -->
    <script>
        // Image gallery functionality
        const mainImage = document.getElementById('mainImage');
        const thumbnailBtns = document.querySelectorAll('.thumbnail-btn');

        thumbnailBtns.forEach(btn => {
            btn.addEventListener('click', () => {
                // Remove active class from all thumbnails
                thumbnailBtns.forEach(t => {
                    t.classList.remove('border-blue-500');
                    t.classList.add('border-gray-200');
                });
                
                // Add active class to clicked thumbnail
                btn.classList.remove('border-gray-200');
                btn.classList.add('border-blue-500');
                
                // Change main image
                const newImageSrc = btn.dataset.image;
                mainImage.src = newImageSrc;
            });
        });

        // Quantity controls
        const quantityInput = document.getElementById('quantityInput');
        const decreaseBtn = document.getElementById('decreaseBtn');
        const increaseBtn = document.getElementById('increaseBtn');
        const checkoutQuantity = document.getElementById('checkoutQuantity');

        decreaseBtn.addEventListener('click', function(e) {
            e.preventDefault();
            const currentValue = parseInt(quantityInput.value);
            if (currentValue > 1) {
                quantityInput.value = currentValue - 1;
                checkoutQuantity.value = currentValue - 1;
            }
        });

        increaseBtn.addEventListener('click', function(e) {
            e.preventDefault();
            const currentValue = parseInt(quantityInput.value);
            if (currentValue < 10) {
                quantityInput.value = currentValue + 1;
                checkoutQuantity.value = currentValue + 1;
            }
        });

        // Sync quantity between forms
        quantityInput.addEventListener('input', function() {
            let value = parseInt(quantityInput.value);
            if (isNaN(value) || value < 1) {
                quantityInput.value = 1;
                value = 1;
            } else if (value > 10) {
                quantityInput.value = 10;
                value = 10;
            }
            checkoutQuantity.value = value;
        });

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

        // Update total price based on quantity
        quantityInput.addEventListener('input', updateTotalPrice);

        function updateTotalPrice() {
            const quantity = parseInt(quantityInput.value) || 1;
            const basePrice = 24999000;
            const totalPrice = basePrice * quantity;
            
            // You can update a total price display here if needed
            console.log(`Total: ${formatPrice(totalPrice)} for ${quantity} item(s)`);
        }

        function formatPrice(price) {
            return 'Rp ' + price.toLocaleString('id-ID');
        }
    </script>
</body>
</html>