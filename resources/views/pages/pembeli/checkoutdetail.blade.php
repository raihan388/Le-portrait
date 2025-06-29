@extends('layout.main')

@section('content')
    <!-- Progress Steps -->
    <div class="mb-8">
        <div class="flex items-center justify-center">
            <!-- Step 1: Cart (done) -->
            <div class="flex items-center text-red-500">
                <div class="flex items-center justify-center w-10 h-10 rounded-full bg-red-500 border-2 border-red-500">
                    <i class="fa-solid fa-check text-white text-sm"></i>
                </div>
                <div class="ml-2 text-sm font-medium">Cart</div>
            </div>

            <div class="flex-auto border-t-2 border-red-500 mx-2"></div>

            <!-- Step 2: Checkout (done) -->
            <div class="flex items-center text-red-500">
                <div class="flex items-center justify-center w-10 h-10 rounded-full bg-red-500 border-2 border-red-500">
                    <i class="fa-solid fa-check text-white text-sm"></i>
                </div>
                <div class="ml-2 text-sm font-medium">Checkout</div>
            </div>

            <div class="flex-auto border-t-2 border-red-500 mx-2"></div>

            <!-- Step 3: Details (current) -->
            <div class="flex items-center text-red-500">
                <div class="flex items-center justify-center w-10 h-10 rounded-full bg-red-100 border-2 border-red-500">
                    <span class="text-red-500 font-medium">3</span>
                </div>
                <div class="ml-2 text-sm font-medium">Details</div>
            </div>
        </div>
    </div>

    <!-- Page Title -->
    <h1 class="text-2xl md:text-3xl font-bold text-gray-900 mb-6">Complete Your Order</h1>

    <div class="grid lg:grid-cols-3 gap-8">
        <!-- LEFT COLUMN (ORDER ITEMS) -->
        <div class="lg:col-span-2">
            <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
                <div class="bg-gray-50 px-6 py-4 border-b border-gray-200">
                    <h2 class="text-lg font-semibold text-gray-900">
                        <i class="fas fa-shopping-cart mr-2 text-red-600"></i>
                        Your Order ({{ count($cart) }} items)
                    </h2>
                </div>

                <div class="p-6">
                    @php $total = 0; @endphp
                    @foreach ($cart as $index => $item)
                        @php
                            $subtotal = $item['price'] * $item['quantity'];
                            $total += $subtotal;
                        @endphp
                        <div class="flex items-start mb-6 pb-6 border-b border-gray-100 last:border-0 last:mb-0 last:pb-0">
                            <div class="flex-shrink-0 w-20 h-20 rounded-lg overflow-hidden bg-gray-100 mr-4">
                                @if ($item['image'])
                                    <img src="{{ asset('storage/' . $item['image']) }}" alt="{{ $item['product'] }}"
                                        class="w-full h-full object-cover">
                                @else
                                    <div class="w-full h-full flex items-center justify-center text-gray-400">
                                        <i class="fas fa-camera text-xl"></i>
                                    </div>
                                @endif
                            </div>
                            <div class="flex-1">
                                <h3 class="text-lg font-medium text-gray-900">{{ $item['product'] }}</h3>
                                <p class="text-sm text-gray-500 mt-1">SKU:
                                    {{ 'PRD-' . str_pad($index + 1, 3, '0', STR_PAD_LEFT) }}</p>

                                <div class="mt-4 flex justify-between items-center">
                                    <div class="flex items-center">
                                        <span class="text-sm text-gray-500 mr-2">Qty:</span>
                                        <span class="px-3 py-1 bg-gray-100 rounded-md text-sm font-medium">
                                            {{ $item['quantity'] }}
                                        </span>
                                    </div>
                                    <div class="text-right">
                                        <p class="text-base text-gray-500">
                                            Rp{{ number_format($item['price'], 0, ',', '.') }} each</p>
                                        <p class="text-lg font-semibold text-red-500">
                                            Rp{{ number_format($subtotal, 0, ',', '.') }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

        <!-- RIGHT COLUMN (CUSTOMER INFO + PAYMENT) -->
        <div class="space-y-6">
            <!-- Customer Information -->
            <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
                <div class="bg-gray-50 px-6 py-4 border-b border-gray-200">
                    <h2 class="text-lg font-semibold text-gray-900">
                        <i class="fas fa-user-circle mr-2 text-red-600"></i>
                        Customer Information
                    </h2>
                </div>
                <div class="p-6 space-y-4">
                    <div>
                        <p class="text-sm text-gray-500 mb-1">Email</p>
                        <p class="text-gray-900 font-medium">{{ $checkoutData['email'] }}</p>
                    </div>
                    <div>
                        <p class="text-sm text-gray-500 mb-1">Full Name</p>
                        <p class="text-gray-900 font-medium">
                            {{ $checkoutData['first_name'] }} {{ $checkoutData['last_name'] }}
                        </p>
                    </div>
                    <div>
                        <p class="text-sm text-gray-500 mb-1">Address</p>
                        <p class="text-gray-900 font-medium">{{ $checkoutData['address'] }}</p>
                    </div>
                    <div>
                        <p class="text-sm text-gray-500 mb-1">Phone</p>
                        <p class="text-gray-900 font-medium">{{ $checkoutData['phone'] }}</p>
                    </div>
                    @if ($checkoutData['notes'])
                        <div>
                            <p class="text-sm text-gray-500 mb-1">Notes</p>
                            <p class="text-gray-900 italic">{{ $checkoutData['notes'] }}</p>
                        </div>
                    @endif
                </div>
            </div>

            <!-- Order Summary -->
            <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
                <div class="bg-gray-50 px-6 py-4 border-b border-gray-200">
                    <h2 class="text-lg font-semibold text-gray-900">
                        <i class="fas fa-receipt mr-2 text-red-600"></i>
                        Order Summary
                    </h2>
                </div>
                <div class="p-6 space-y-3">
                    <div class="flex justify-between">
                        <span class="text-gray-600">Subtotal</span>
                        <span class="font-medium">Rp{{ number_format($total, 0, ',', '.') }}</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-gray-600">Shipping</span>
                        <span class="font-medium">Free</span>
                    </div>
                    <div class="border-t border-gray-200 pt-3 flex justify-between">
                        <span class="text-lg font-semibold">Total</span>
                        <span class="text-lg font-bold text-red-500">
                            Rp{{ number_format($total, 0, ',', '.') }}
                        </span>
                    </div>
                </div>
            </div>

            <!-- Confirm Button -->
            <!-- <form action="{{ route('checkout.confirm') }}" method="POST">
                @csrf
                <button type="submit"
                    class="w-full mt-6 px-6 py-3 bg-gradient-to-r from-red-500 to-red-600 text-white font-medium rounded-lg shadow-md hover:from-red-600 hover:to-red-700 focus:outline-none focus:ring-2 focus:ring-red-400 focus:ring-offset-2 transition-all flex items-center justify-center">
                    Confirm
                </button>
            </form> -->
            <button type="button" id="pay-button"
                class="w-full mt-6 px-6 py-3 bg-gradient-to-r from-red-500 to-red-600 text-white font-medium rounded-lg shadow-md hover:from-red-600 hover:to-red-700 focus:outline-none focus:ring-2 focus:ring-red-400 focus:ring-offset-2 transition-all flex items-center justify-center">
                Pay Now
            </button>
         
            <div class="text-center text-xs text-gray-500 mt-4">
                <p>By completing your purchase, you agree to our <a href="#"
                        class="text-red-500 hover:underline">Terms of Service</a></p>
            </div>
        </div>
    </div>
    <script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ config('midtrans.clientKey') }}"></script>

    <script>
document.getElementById('pay-button').addEventListener('click', function () {
    fetch('/checkout/confirm', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': '{{ csrf_token() }}',
        },
        body: JSON.stringify({})
    })
    .then(response => response.json())
    .then(data => {
        if (!data.snapToken) {
            alert("Token tidak ditemukan");
            return;
        }

        // Jalankan Midtrans Snap
        snap.pay(data.snapToken, {
            onSuccess: function(result) {
                console.log("Sukses:", result);

                // Kirim request ke server untuk ubah status jadi 'paid'
                fetch('/midtrans/update-payment-status', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    },
                    body: JSON.stringify({
                        order_id: data.order_id,
                        transaction_status: result.transaction_status,
                        payment_type: result.payment_type
                    })
                })
                .then(res => res.json())
                .then(res => {
                    if (res.success) {
                        alert("Pembayaran berhasil, status diubah!");
                        window.location.href = "/order-history";
                    } else {
                        alert("Pembayaran berhasil, tapi gagal mengubah status.");
                    }
                });
            },
            onError: function(error) {
                console.log("Gagal:", error);
                alert("Terjadi kesalahan saat pembayaran.");
            }
        });
    });
});
</script>

@endsection
