@extends('layout.main')

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

  @section('content')
  @foreach ($product as $item  )
       <div class="space-y-4">
                    <!-- Main Image -->
                    <div class="relative border rounded-lg overflow-hidden zoom-container">
                        <button class="absolute top-4 right-4 z-10 bg-white p-2 rounded-full shadow-md hover:shadow-lg transition-shadow">
                            <svg class="w-5 h-5 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0zM10 7v3m0 0v3m0-3h3m-3 0H7"></path>
                            </svg>
                        </button>
                        @php
                          $images = is_array($item->images) ? $item->images : json_decode($item->images, true);
                        @endphp
                         @if (!empty($images))
                        <img id="mainImage" 
                             src="{{ asset('storage/' . $images[2]) }}" 
                             alt="Nikon Z6 II Body Only" 
                             class="w-full h-96 object-contain bg-gray-50 zoom-image">
                    </div>
                    
                    <!-- Thumbnail Images -->
                    <div class="grid grid-cols-4 gap-3">
                        <button class="thumbnail-btn border-2 border-blue-500 rounded-lg overflow-hidden" data-image="https://images.unsplash.com/photo-1606983340126-99ab4feaa64a?w=600&h=500&fit=crop&crop=center">
                            <img src="{{ asset('storage/' . $images[0]) }}" 
                                 alt="View 1" class="w-full h-20 object-contain bg-gray-50">
                        </button>
                        <button class="thumbnail-btn border-2 border-gray-200 hover:border-blue-500 rounded-lg overflow-hidden transition-colors" data-image="https://images.unsplash.com/photo-1502920917128-1aa500764cbd?w=600&h=500&fit=crop&crop=center">
                            <img src="{{ asset('storage/' . $images[1]) }}" 
                                 alt="View 2" class="w-full h-20 object-contain bg-gray-50">
                        </button>
                        <button class="thumbnail-btn border-2 border-gray-200 hover:border-blue-500 rounded-lg overflow-hidden transition-colors" data-image="https://images.unsplash.com/photo-1617005082133-48dc4d6e05c2?w=600&h=500&fit=crop&crop=center">
                            <img src="{{ asset('storage/' . $images[3]) }}" 
                                 alt="View 3" class="w-full h-20 object-contain bg-gray-50">
                        </button>
                        <button class="thumbnail-btn border-2 border-gray-200 hover:border-blue-500 rounded-lg overflow-hidden transition-colors" data-image="https://images.unsplash.com/photo-1617005082133-48dc4d6e05c2?w=600&h=500&fit=crop&crop=center">
                            <img src="{{ asset('storage/' . $images[4]) }}" 
                                 alt="View 4" class="w-full h-20 object-contain bg-gray-50">
                        </button>
                    </div>
                    @else
                          <span class="text-sm text-gray-400">Gambar tidak tersedia</span>
                        @endif
                </div>

                <!-- Product Details Section -->
                <div class="space-y-6">
                    <div>
                        <h1 class="text-3xl font-bold text-gray-900 mb-4">{{$item->name}}</h1>
                        
                        <!-- Price Section -->
                        <div class="flex items-center gap-4 mb-4">
                            <span class="text-3xl font-bold text-red-600">Rp {{ number_format($item->price, 0, ',', '.') }}</span>
                        </div>
                        
                        <!-- apakek -->
                        <div class="inline-block bg-red-100 text-red-600 px-3 py-1 rounded-full text-sm font-medium mb-4">
                            {{$item->category->name}}
                        </div>
                        <!-- apakek -->
                        <div class="inline-block bg-blue-100 text-blue-600 px-3 py-1 rounded-full text-sm font-medium mb-4">
                            {{$item->brand->name}}
                        </div>
                    </div>

                    <!-- Description -->
                    <div class="space-y-3">
                        <h3 class="font-semibold text-gray-700">Description</h3>
                        <div class="space-y-2">
                            <div class="flex items-start gap-2">
                                <span class="text-sm text-gray-700">{{$item->description}}</span>
                            </div>
                        </div>
                    </div>

                    <!-- Specifications -->
                    <div class="space-y-3">
                        <h3 class="font-semibold text-gray-700">Specification</h3>
                        <div class="space-y-2">
                            <div class="flex items-start gap-2">
                                <svg class="w-4 h-4 text-green-500 mt-1 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                                </svg>
                                <span class="text-sm text-gray-700">Garansi Resmi 2 Tahun</span>
                            </div>
                            <div class="flex items-start gap-2">
                                <svg class="w-4 h-4 text-green-500 mt-1 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                                </svg>
                                <span class="text-sm text-gray-700">1 Tahun Full Coverage (Service & Spareparts)</span>
                            </div>
                            <div class="flex items-start gap-2">
                                <svg class="w-4 h-4 text-green-500 mt-1 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                                </svg>
                                <span class="text-sm text-gray-700">1 Tahun Free Service Only</span>
                            </div>
                            <div class="flex items-start gap-2">
                                <svg class="w-4 h-4 text-green-500 mt-1 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                                </svg>
                                <span class="text-sm text-gray-700 font-medium">24.5MP FX-Format BSI CMOS Sensor</span>
                            </div>
                            <div class="flex items-start gap-2">
                                <svg class="w-4 h-4 text-green-500 mt-1 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                                </svg>
                                <span class="text-sm text-gray-700 font-medium">Dual EXPEED 6 Image Processors</span>
                            </div>
                            <div class="flex items-start gap-2">
                                <svg class="w-4 h-4 text-green-500 mt-1 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                                </svg>
                                <span class="text-sm text-gray-700 font-medium">UHD 4K30 Video; N-Log & 10-Bit HDMI Out</span>
                            </div>
                            <div class="flex items-start gap-2">
                                <svg class="w-4 h-4 text-green-500 mt-1 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                                </svg>
                                <span class="text-sm text-gray-700 font-medium">14 fps Cont. Shooting; ISO 100-51200</span>
                            </div>
                        </div>
                    </div>

                    <!-- Quantity and Add to Cart -->
                    <div class=" space-y-4 pt-4 border-t">
                        <div class="flex items-center gap-4">
                            <label class="font-semibold text-gray-700">Jumlah:</label>
                            <div class="flex items-center border rounded-lg">
                                <button id="decreaseBtn" class="px-3 py-2 hover:bg-gray-100 transition-colors">-</button>
                                <input id="quantityInput" type="number" value="1" min="1" max="10" class="w-16 text-center py-2 border-x">
                                <button id="increaseBtn" class="px-3 py-2 hover:bg-gray-100 transition-colors">+</button>
                            </div>
                        </div>
                        <div class="flex gap-4">
                            <button id="addToCartBtn" class="w-full bg-cyan-400 hover:bg-cyan-500 text-white font-semibold py-3 px-6 rounded-lg transition-colors duration-200 flex items-center justify-center gap-2">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4m0 0L7 13m0 0l-2.5 7M7 13l2.5 7m0 0h5.5m-5.5 0v2a1 1 0 001 1h5.5a1 1 0 001-1v-2"></path>
                                </svg>
                                ADD TO CART
                            </button>
                            <button id="checkoutBtn" class="w-full bg-red-500 hover:bg-red-600 text-white font-semibold py-3   px-6 rounded-lg transition-colors duration-200 flex items-center justify-center gap-2">
                                <a href="/checkout" class="flex items-center gap-2">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4m0 0L7 13m0 0l-2.5 7M7 13l2.5 7m0 0h5.5m-5.5 0v2a1 1 0 001 1h5.5a1 1 0 001-1v-2"></path>
                                    </svg>
                                    CHECKOUT
                                </a>
                            </button>
                        </div>
                    </div>
                </div>
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
      @endforeach
     @endsection 
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

        decreaseBtn.addEventListener('click', () => {
            const currentValue = parseInt(quantityInput.value);
            if (currentValue > 1) {
                quantityInput.value = currentValue - 1;
            }
        });

        increaseBtn.addEventListener('click', () => {
            const currentValue = parseInt(quantityInput.value);
            if (currentValue < 10) {
                quantityInput.value = currentValue + 1;
            }
        });

        // Validate quantity input
        quantityInput.addEventListener('input', () => {
            let value = parseInt(quantityInput.value);
            if (isNaN(value) || value < 1) {
                quantityInput.value = 1;
            } else if (value > 10) {
                quantityInput.value = 10;
            }
        });

        // Add to cart functionality
        const addToCartBtn = document.getElementById('addToCartBtn');
        const successModal = document.getElementById('successModal');
        const closeModal = document.getElementById('closeModal');

        addToCartBtn.addEventListener('click', () => {
            // Add loading state
            addToCartBtn.disabled = true;
            addToCartBtn.innerHTML = `
                <svg class="animate-spin -ml-1 mr-3 h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                </svg>
                Adding...
            `;

            // Simulate API call
            setTimeout(() => {
                // Reset button
                addToCartBtn.disabled = false;
                addToCartBtn.innerHTML = `
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4m0 0L7 13m0 0l-2.5 7M7 13l2.5 7m0 0h5.5m-5.5 0v2a1 1 0 001 1h5.5a1 1 0 001-1v-2"></path>
                    </svg>
                    ADD TO CART
                `;
                
                // Show success modal
                successModal.classList.remove('hidden');
                successModal.classList.add('flex');
            }, 1000);
        });

        // Close modal functionality
        closeModal.addEventListener('click', () => {
            successModal.classList.add('hidden');
            successModal.classList.remove('flex');
        });

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
    </script>
