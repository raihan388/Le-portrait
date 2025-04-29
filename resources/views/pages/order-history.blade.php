<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Riwayat Pesanan - Le Portrait</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen flex flex-col">

    @include('components.navbar')

    <main class="container mx-auto flex-1 py-8 px-4 sm:px-6">
        <div class="max-w-4xl mx-auto">
            <div class="mb-8">
                <h1 class="text-2xl font-bold text-gray-800">Riwayat Pesanan</h1>
                <p class="text-gray-600">Daftar pesanan yang telah Anda lakukan</p>
            </div>

            <div class="space-y-4">
                @foreach ($orders as $order)
                <div class="bg-white p-6 rounded-lg border border-gray-200 shadow-sm hover:shadow-md transition-shadow duration-200">
                    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
                        <!-- Product Info -->
                        <div class="flex items-start gap-4">
                            <!-- Product Image - Dengan pengecekan aman -->
                            <div class="w-20 h-20 bg-gray-200 rounded flex-shrink-0 flex items-center justify-center overflow-hidden">
                                @isset($order['image'])
                                    <img src="{{ $order['image'] }}" alt="{{ $order['name'] ?? 'Produk' }}" class="object-cover w-full h-full">
                                @else
                                    <span class="text-gray-400 text-sm">No Image</span>
                                @endisset
                            </div>
                            
                            <!-- Product Details - Dengan fallback -->
                            <div>
                                <h2 class="font-semibold text-lg">{{ $order['name'] ?? 'Nama Produk Tidak Tersedia' }}</h2>
                                @isset($order['order_id'])
                                    <p class="text-gray-600 text-sm">Order #{{ $order['order_id'] }}</p>
                                @endisset
                            </div>
                        </div>

                        <!-- Order Summary - Dengan pengecekan -->
                        <div class="text-right">
                            <p class="text-gray-600">Jumlah: {{ $order['quantity'] ?? 0 }} item</p>
                            <p class="font-semibold mt-1">
                                Total: Rp {{ isset($order['total_price']) ? number_format($order['total_price'], 0, ',', '.') : '0' }}
                            </p>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </main>

    @include('components.footer')

</body>
</html>