<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Detail Produk</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
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
                @foreach($product as $item)
                <!-- Product Images -->
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
                        <h1 class="text-3xl font-bold text-gray-900">{{$item->name}}</h1>
                        <p class="text-red-600 text-2xl font-bold">Rp {{ number_format($item->price, 0, ',', '.') }}</p>

                        <div class="flex gap-2">
                            <span class="bg-red-100 text-red-600 px-3 py-1 rounded-full text-sm">{{$item->category->name}}</span>
                            <span class="bg-blue-100 text-blue-600 px-3 py-1 rounded-full text-sm">{{ $item->brand->name }}</span>
                        </div>
                    </div>

                    <!-- Description -->
                    <div class="space-y-2">
                        <h2 class="font-semibold text-lg text-gray-700">Description</h2>
                        <p class="text-gray-700">{{ $item->description }}.</p>
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
                                <span class="text-gray-700">24.5MP FX-Format BSI CMOS Sensor</span>
                            </div>
                            <div class="flex items-start gap-2">
                                <svg class="w-4 h-4 text-green-500 mt-1 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                                </svg>
                                <span class="text-gray-700">Dual EXPEED 6 Image Processors</span>
                            </div>
                            <div class="flex items-start gap-2">
                                <svg class="w-4 h-4 text-green-500 mt-1 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                                </svg>
                                <span class="text-gray-700">UHD 4K30 Video; N-Log & 10-Bit HDMI Out</span>
                            </div>
                            <div class="flex items-start gap-2">
                                <svg class="w-4 h-4 text-green-500 mt-1 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                                </svg>
                                <span class="text-gray-700">14 fps Cont. Shooting; ISO 100-51200</span>
                            </div>
                        </div>
                    </div>

                    <!-- Quantity and Add to Cart -->
                    <form id="addToCartForm" method="POST" action="{{ route('cart.add') }}">
                        @csrf
                        <input type="hidden" name="product_id" value="{{ $item->id }}">
                        <div class="space-y-4 pt-4 border-t">
                            <div class="flex items-center gap-4">
                                <label class="font-semibold text-gray-700">Jumlah:</label>
                                <div class="flex items-center border rounded-lg">
                                    <button type="button" id="decreaseBtn" class="px-3 py-2 hover:bg-gray-100 transition-colors">-</button>
                                    <input id="quantityInput" name="quantity" type="number" value="1" min="1" max="10" class="w-16 text-center py-2 border-x">
                                    <button type="button" id="increaseBtn" class="px-3 py-2 hover:bg-gray-100 transition-colors">+</button>
                                </div>
                            </div>
                            <div class="flex gap-4">    
                                <button id="addToCartBtn" type="submit" class="w-full bg-cyan-400 hover:bg-cyan-500 text-white font-semibold py-3 px-6 rounded-lg transition-colors duration-200 flex items-center justify-center gap-2">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4m0 0L7 13m0 0l-2.5 7M7 13l2.5 7m0 0h5.5m-5.5 0v2a1 1 0 001 1h5.5a1 1 0 001-1v-2"></path>
                                    </svg>
                                    ADD TO CART
                                </button>
                            </div>
                        </div>
                    </form>
                    
                    <div class="flex gap-4">
                        <button id="checkoutBtn" class="w-full bg-red-500 hover:bg-red-600 text-white font-semibold py-3 px-6 rounded-lg transition-colors duration-200 flex items-center justify-center gap-2">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4m0 0L7 13m0 0l-2.5 7M7 13l2.5 7m0 0h5.5m-5.5 0v2a1 1 0 001 1h5.5a1 1 0 001-1v-2"></path>
                            </svg>
                            CHECKOUT
                        </button>
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
                <button id="closeSuccessModal" class="bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded-lg transition-colors">
                    OK
                </button>
            </div>
        </div>
    </div>

    <!-- Error Modal -->
    <div id="errorModal" class="fixed inset-0 bg-black bg-opacity-50 hidden items-center justify-center z-50">
        <div class="bg-white p-6 rounded-lg shadow-xl max-w-sm mx-4">
            <div class="text-center">
                <div class="w-12 h-12 bg-red-100 rounded-full flex items-center justify-center mx-auto mb-4">
                    <svg class="w-6 h-6 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </div>
                <h3 class="font-semibold text-gray-900 mb-2">Gagal Ditambahkan!</h3>
                <p id="errorMessage" class="text-gray-600 text-sm mb-4">Terjadi kesalahan saat menambahkan produk ke keranjang.</p>
                <button id="closeErrorModal" class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded-lg transition-colors">
                    Coba Lagi
                </button>
            </div>
            @endforeach
        </div>
    </div>
    
    <script>
        // Declare all variables first
        const mainImage = document.getElementById('mainImage');
        const thumbnailBtns = document.querySelectorAll('.thumbnail-btn');
        const quantityInput = document.getElementById('quantityInput');
        const decreaseBtn = document.getElementById('decreaseBtn');
        const increaseBtn = document.getElementById('increaseBtn');
        const addToCartForm = document.getElementById('addToCartForm');
        const addToCartBtn = document.getElementById('addToCartBtn');
        const successModal = document.getElementById('successModal');
        const errorModal = document.getElementById('errorModal');
        const errorMessage = document.getElementById('errorMessage');
        const closeSuccessModal = document.getElementById('closeSuccessModal');
        const closeErrorModal = document.getElementById('closeErrorModal');
        const checkoutBtn = document.getElementById('checkoutBtn');

        // Image gallery functionality
        thumbnailBtns.forEach(function(btn) {
            btn.addEventListener('click', function() {
                // Remove active class from all thumbnails
                thumbnailBtns.forEach(function(t) {
                    t.classList.remove('border-blue-500');
                    t.classList.add('border-gray-200');
                });
                
                // Add active class to clicked thumbnail
                btn.classList.remove('border-gray-200');
                btn.classList.add('border-blue-500');
                
                // Change main image
                const newImageSrc = btn.getAttribute('data-image');
                mainImage.src = newImageSrc;
            });
        });

        // Quantity controls
        decreaseBtn.addEventListener('click', function(e) {
            e.preventDefault();
            const currentValue = parseInt(quantityInput.value);
            if (currentValue > 1) {
                quantityInput.value = currentValue - 1;
            }
        });

        increaseBtn.addEventListener('click', function(e) {
            e.preventDefault();
            const currentValue = parseInt(quantityInput.value);
            if (currentValue < 10) {
                quantityInput.value = currentValue + 1;
            }
        });

        // Validate quantity input
        quantityInput.addEventListener('input', function() {
            let value = parseInt(quantityInput.value);
            if (isNaN(value) || value < 1) {
                quantityInput.value = 1;
            } else if (value > 10) {
                quantityInput.value = 10;
            }
        });

        // Form submission handling
        addToCartForm.addEventListener('submit', function(e) {
            e.preventDefault(); // Prevent default form submission
            
            const quantity = parseInt(quantityInput.value);
            
            // Validate quantity
            if (isNaN(quantity) || quantity < 1) {
                showErrorModal('Jumlah produk minimal 1');
                return;
            }
            
            if (quantity > 10) {
                showErrorModal('Jumlah produk maksimal 10');
                return;
            }

            // Show loading state
            showLoadingState();

            // Simulate API call (replace with actual form submission)
            setTimeout(function() {
                // Simulate random success/failure for demo
                const isSuccess = Math.random() > 0.3; // 70% success rate
                
                if (isSuccess) {
                    showSuccessModal();
                } else {
                    showErrorModal('Stok produk tidak mencukupi atau terjadi kesalahan server');
                }
                
                // Reset button state
                resetButtonState();
            }, 2000);
        });

        function showLoadingState() {
            addToCartBtn.disabled = true;
            addToCartBtn.innerHTML = '<svg class="animate-spin -ml-1 mr-3 h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path></svg>Menambahkan...';
        }

        function resetButtonState() {
            addToCartBtn.disabled = false;
            addToCartBtn.innerHTML = '<svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4m0 0L7 13m0 0l-2.5 7M7 13l2.5 7m0 0h5.5m-5.5 0v2a1 1 0 001 1h5.5a1 1 0 001-1v-2"></path></svg>ADD TO CART';
        }

        function showSuccessModal() {
            successModal.classList.remove('hidden');
            successModal.classList.add('flex');
        }

        function showErrorModal(message) {
            errorMessage.textContent = message;
            errorModal.classList.remove('hidden');
            errorModal.classList.add('flex');
        }

        // Close success modal
        closeSuccessModal.addEventListener('click', function() {
            successModal.classList.add('hidden');
            successModal.classList.remove('flex');
        });

        // Close error modal
        closeErrorModal.addEventListener('click', function() {
            errorModal.classList.add('hidden');
            errorModal.classList.remove('flex');
        });

        // Close modals when clicking outside
        successModal.addEventListener('click', function(e) {
            if (e.target === successModal) {
                successModal.classList.add('hidden');
                successModal.classList.remove('flex');
            }
        });

        errorModal.addEventListener('click', function(e) {
            if (e.target === errorModal) {
                errorModal.classList.add('hidden');
                errorModal.classList.remove('flex');
            }
        });

        // Checkout button
        checkoutBtn.addEventListener('click', function() {
            alert('Mengarahkan ke halaman checkout...');
        });
    </script>
</body>
</html>