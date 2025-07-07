<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lé Portrait - Premium Camera Collection</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="icon" href="camera.png" type="image/x-icon">
    <style>
        body { font-family: 'Inter', sans-serif; }
        .hero-bg {
            background: linear-gradient(135deg, #f3f4f6 0%, #e5e7eb 100%);
        }
        .floating-animation {
            animation: float 6s ease-in-out infinite;
        }
        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-20px); }
        }
        .pulse-animation {
            animation: pulse 2s infinite;
        }
        .card-hover {
            transition: all 0.3s ease;
        }
        .card-hover:hover {
            transform: translateY(-10px);
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
        }
        .gradient-text {
            background: linear-gradient(135deg, #ef4444 0%, #dc2626 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }
    </style>
</head>
<body class="bg-gray-50">
    <!-- Header -->
    <header class="bg-white shadow-sm sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-16">
                <div class="flex items-center">
                    <img src="{{ asset('images/logo.png') }}" alt="Logo" class="h-10 w-auto object-contain">
                </div>
                
                <div class="flex items-center space-x-4">
                    <div class="hidden md:flex items-center bg-gray-100 rounded-lg px-4 py-2">
                        <input type="text" placeholder="Search cameras, lenses..." class="bg-transparent outline-none text-gray-700 placeholder-gray-500 w-64">
                        <button class="bg-red-500 text-white px-4 py-2 rounded-md ml-2 hover:bg-red-600 transition-colors">
                            Search
                        </button>
                    </div>
                    <div class="flex items-center space-x-2">
                        <a href="{{ route('login') }}" class="hidden md:block border-2 border-red-500 text-red-500 px-6 py-2 rounded-lg font-medium hover:bg-red-50 transition-all duration-300 transform hover:scale-105">
                            Login
                        </a>
                        <a href="{{ route('login') }}" class="bg-red-500 text-white px-6 py-2 rounded-lg font-medium hover:bg-red-600 transition-all duration-300 transform hover:scale-105 shadow-md hover:shadow-lg">
                            Register
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- Hero Section -->
    <section class="hero-bg min-h-screen flex items-center relative overflow-hidden">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
            <!-- Left Content -->
            <div class="text-center lg:text-left z-10">
                <h1 class="text-5xl lg:text-7xl font-bold text-gray-800 mb-6 leading-tight">
                    Premium <span class="gradient-text">Camera</span> Collection
                </h1>
                <p class="text-xl text-gray-600 mb-8 max-w-lg">
                    Discover high-quality cameras at the best prices. Capture your moments with professional-grade equipment.
                </p>
                <div class="flex flex-col sm:flex-row gap-4 justify-center lg:justify-start">
                    <button class="bg-red-500 text-white px-8 py-4 rounded-lg text-lg font-semibold hover:bg-red-600 transition-all duration-300 transform hover:scale-105 shadow-lg">
                        View Collection
                    </button>
                    <button class="border-2 border-gray-300 text-gray-700 px-8 py-4 rounded-lg text-lg font-semibold hover:border-red-500 hover:text-red-500 transition-all duration-300">
                        Browse Catalog
                    </button>
                </div>
            </div>

            <!-- Right Visual -->
            <div class="relative flex items-center justify-center">
                <!-- Camera Illustration -->
                <div class="floating-animation">
                    <div class="w-96 h-96 bg-black rounded-3xl shadow-2xl relative overflow-hidden">
                        <!-- Camera Body -->
                        <div class="absolute inset-4 bg-gray-900 rounded-2xl">
                            <!-- Lens -->
                            <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-32 h-32 bg-gradient-to-br from-yellow-400 to-orange-500 rounded-full shadow-inner">
                                <div class="absolute inset-4 bg-blue-400 rounded-full">
                                    <div class="absolute inset-2 bg-blue-600 rounded-full"></div>
                                </div>
                            </div>
                            <!-- Flash -->
                            <div class="absolute top-4 left-4 w-6 h-4 bg-white rounded-sm"></div>
                            <!-- Viewfinder -->
                            <div class="absolute top-4 right-4 w-8 h-6 bg-gray-700 rounded-sm"></div>
                        </div>
                        <!-- Camera Strap -->
                        <div class="absolute -top-2 left-8 w-4 h-6 bg-gray-800 rounded-sm"></div>
                        <div class="absolute -top-2 right-8 w-4 h-6 bg-gray-800 rounded-sm"></div>
                    </div>
                </div>

                <!-- Floating Elements -->
                <div class="absolute top-10 left-10 w-16 h-20 bg-orange-400 rounded-lg shadow-lg floating-animation" style="animation-delay: -2s;"></div>
                <div class="absolute bottom-10 right-10 w-20 h-16 bg-blue-400 rounded-lg shadow-lg floating-animation" style="animation-delay: -4s;"></div>
                
                <!-- Decorative Photos -->
                <div class="absolute -top-8 -left-8 w-24 h-32 bg-gradient-to-br from-red-400 to-pink-500 rounded-lg shadow-lg transform rotate-12 floating-animation" style="animation-delay: -1s;"></div>
                <div class="absolute -bottom-8 -right-8 w-28 h-20 bg-gradient-to-br from-green-400 to-teal-500 rounded-lg shadow-lg transform -rotate-12 floating-animation" style="animation-delay: -3s;"></div>
            </div>
        </div>

        <!-- Background Decorations -->
        <div class="absolute top-20 left-20 w-32 h-32 bg-yellow-200 rounded-full opacity-20"></div>
        <div class="absolute bottom-20 right-20 w-48 h-48 bg-green-200 rounded-full opacity-20"></div>
    </section>

    <!-- Products Section -->
    <section class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <h2 class="text-4xl font-bold text-gray-800 mb-12 text-center">Featured Products</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach ($featuredProducts as $product)    
                <!-- Product Card 1 -->
                <div class="card-hover bg-white rounded-2xl shadow-lg overflow-hidden border border-gray-100">
                    <div class="h-64 bg-gradient-to-br from-gray-100 to-gray-200 flex items-center justify-center">
                        @php
                            $images = is_array($product->images) ? $product->images : json_decode($product->images, true);
                        @endphp
                        @if (!empty($images) && isset($images[0]))
                            <img src="{{ asset('storage/' . $images[0]) }}" 
                                 alt="{{ $product->name }}" 
                                 class="h-36 object-contain transition-transform duration-300 group-hover:scale-105">
                        @else
                            <span class="text-sm text-gray-400">Gambar tidak tersedia</span>
                        @endif
                    </div>
                    <div class="p-6">
                        <div class="flex items-center gap-2 mb-3">
                            <span class="bg-blue-500 text-white px-3 py-1 rounded-full text-sm font-medium">{{$product->category->name}}</span>
                            <span class="bg-red-500 text-white px-3 py-1 rounded-full text-sm font-medium">Nikon</span>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-800 mb-2">{{ $product->name }}</h3>
                        <p class="text-gray-600 mb-4">{{ $product->description }}</p>
                        <div class="flex items-center justify-between">
                            <span class="text-2xl font-bold text-red-500">Rp. {{ number_format($product->price, 0, ',', '.') }}</span>
                            <a href="{{ route('login') }}" class="bg-red-500 text-white px-4 py-2 rounded-lg hover:bg-red-600 transition-colors">
                                View Details
                            </a>
                        </div>
                    </div>
                </div>
                @endforeach

            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section class="py-20 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <h2 class="text-4xl font-bold text-gray-800 mb-12 text-center">Why Choose Lé Portrait?</h2>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="text-center p-8 bg-white rounded-2xl shadow-lg card-hover">
                    <div class="w-16 h-16 bg-red-500 rounded-full flex items-center justify-center mx-auto mb-6">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-800 mb-4">Premium Quality</h3>
                    <p class="text-gray-600">Only the finest cameras from top brands, thoroughly tested and verified.</p>
                </div>
                
                <div class="text-center p-8 bg-white rounded-2xl shadow-lg card-hover">
                    <div class="w-16 h-16 bg-blue-500 rounded-full flex items-center justify-center mx-auto mb-6">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-800 mb-4">Best Prices</h3>
                    <p class="text-gray-600">Competitive pricing with regular discounts and special offers.</p>
                </div>
                
                <div class="text-center p-8 bg-white rounded-2xl shadow-lg card-hover">
                    <div class="w-16 h-16 bg-green-500 rounded-full flex items-center justify-center mx-auto mb-6">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.364 5.636l-3.536 3.536m0 5.656l3.536 3.536M9.172 9.172L5.636 5.636m3.536 9.192L5.636 18.364M12 12h.01"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-800 mb-4">Expert Support</h3>
                    <p class="text-gray-600">Professional guidance from photography experts to help you choose.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Newsletter Section -->
    <section class="py-20 bg-red-500">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h2 class="text-4xl font-bold text-white mb-4">Stay Updated</h2>
            <p class="text-xl text-red-100 mb-8">Get the latest camera deals and photography tips delivered to your inbox.</p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center max-w-md mx-auto">
                <input type="email" placeholder="Enter your email" class="flex-1 px-6 py-3 rounded-lg text-gray-800 placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-white">
                <button class="bg-white text-red-500 px-8 py-3 rounded-lg font-semibold hover:bg-gray-100 transition-colors">
                    Subscribe
                </button>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-gray-900 text-white py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                <div>
                    <div class="flex items-center mb-4">
                        <div class="bg-white text-black px-3 py-1 rounded font-bold text-lg">
                            Lé
                        </div>
                        <span class="ml-2 text-xl font-semibold">Portrait</span>
                    </div>
                    <p class="text-gray-400">Your trusted partner for premium photography equipment.</p>
                </div>
                
                <div>
                    <h4 class="font-semibold mb-4">Products</h4>
                    <ul class="space-y-2 text-gray-400">
                        <li><a href="#" class="hover:text-white transition-colors">DSLR Cameras</a></li>
                        <li><a href="#" class="hover:text-white transition-colors">Mirrorless</a></li>
                        <li><a href="#" class="hover:text-white transition-colors">Lenses</a></li>
                        <li><a href="#" class="hover:text-white transition-colors">Accessories</a></li>
                    </ul>
                </div>
                
                <div>
                    <h4 class="font-semibold mb-4">Support</h4>
                    <ul class="space-y-2 text-gray-400">
                        <li><a href="#" class="hover:text-white transition-colors">Help Center</a></li>
                        <li><a href="#" class="hover:text-white transition-colors">Contact Us</a></li>
                        <li><a href="#" class="hover:text-white transition-colors">Warranty</a></li>
                        <li><a href="#" class="hover:text-white transition-colors">Returns</a></li>
                    </ul>
                </div>
                
                <div>
                    <h4 class="font-semibold mb-4">Connect</h4>
                    <ul class="space-y-2 text-gray-400">
                        <li><a href="#" class="hover:text-white transition-colors">Instagram</a></li>
                        <li><a href="#" class="hover:text-white transition-colors">Facebook</a></li>
                        <li><a href="#" class="hover:text-white transition-colors">Twitter</a></li>
                        <li><a href="#" class="hover:text-white transition-colors">YouTube</a></li>
                    </ul>
                </div>
            </div>
            
            <div class="border-t border-gray-800 mt-8 pt-8 text-center text-gray-400">
                <p>&copy; 2025 Lé Portrait. All rights reserved.</p>
            </div>
        </div>
    </footer>
</body>
</html>