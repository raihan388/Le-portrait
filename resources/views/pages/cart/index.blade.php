<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Keranjang Belanja</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 text-gray-900">
@include('components.navbar')
    <div class="max-w-6xl mx-auto py-10 px-4">
        <h2 class="text-2xl font-bold mb-6 flex items-center gap-2">
            🛒 Shopping Cart
        </h2>

        @if ($cartItems->count())
            <div class="overflow-x-auto bg-white shadow-md rounded-lg">
                <table class="min-w-full table-auto border-collapse">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="px-4 py-3 text-center">No</th>
                            <th class="px-4 py-3 text-left">Image</th>
                            <th class="px-4 py-3 text-left">Product Name</th>
                            <th class="px-4 py-3 text-left">Price</th>
                            <th class="px-4 py-3 text-left">Qty</th>
                            <th class="px-4 py-3 text-left">Subtotal</th>
                            <th class="px-4 py-3 text-left">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $total = 0; @endphp
                        @foreach ($cartItems as $item)
                            @php
                                $subtotal = $item->quantity * $item->price;
                                $total += $subtotal;
                            @endphp

                        <form action="{{ route('cart.update', $item->id) }}" method="POST" class="flex items-center gap-2">
                            @csrf
                            @method('PUT')

                            <tr class="border-t">
                                <td class="px-4 py-3 text-center">PRD-0{{ $loop->iteration }}</td>
                                <td class="px-4 py-3 text-center">
                                    <img src="{{ asset('storage/' . ($item->product->images[0] ?? 'images/no-image.png')) }}"
                                         alt="{{ $item->product->name }}"
                                         class="w-16 h-16 object-cover rounded border">
                                </td>
                                <td class="px-4 py-3 font-medium">{{ $item->product->name }}</td>
                                <td class="px-4 py-3">Rp{{ number_format($item->price, 0, ',', '.') }}</td>
                                <td class="px-4 py-3">
                                     <input type="number" name="quantity" min="1" value="{{ $item->quantity }}" class="w-16 border px-2 py-1 rounded text-center">
                                </td>
                                <td class="px-4 py-3 font-semibold">Rp{{ number_format($subtotal, 0, ',', '.') }}</td>
                                <td class="px-4 py-3">
                                {{-- BUTTON AKSI --}}
                                    <button type="submit"
                                        class="bg-cyan-500 hover:bg-cyan-600 text-white px-4 py-2 rounded-md w-full">
                                        Update
                                    </button>
                                 </form>
                                {{-- Form delete tetap di luar form update --}}
                                <form action="{{ route('cart.destroy', $item->id) }}" method="POST" class="w-full">
                                    @csrf
                                    @method('DELETE')
                                    <button class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded-md w-full">
                                        Delete
                                    </button>
                                </form>
                                </td>
                            </tr>

                        @endforeach
                    </tbody>
                </table>

                {{-- Total & Checkout --}}
                <div class="flex justify-between items-center px-6 py-4 bg-gray-50 border-t">
                    <p class="text-lg font-semibold">Total: Rp{{ number_format($total, 0, ',', '.') }}</p>
                    <a href="{{ route('checkout') }}" class="bg-green-500 hover:bg-green-600 text-white font-semibold px-6 py-2 rounded-md">
                        Checkout
                    </a>
                </div>
            </div>
        @else
            {{-- Jika keranjang kosong --}}
            <div class="text-center py-10">
                <h3 class="text-xl font-semibold text-gray-700">Your cart is still empty.</h3>
                <a href="/products" class="mt-4 inline-block bg-blue-500 hover:bg-blue-600 text-white px-5 py-2 rounded-md">
                    Shop Now
                </a>
            </div>
        @endif
    </div>
@include('components.footer')
</body>
</html>
