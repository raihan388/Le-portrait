@if ($errors->any())
  <div class="bg-red-100 text-red-700 p-4 rounded mb-6">
    <ul>
      @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
      @endforeach
    </ul>
  </div>
@endif

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Checkout Details</title>
  <script src="{{ asset('styles/tailwindcss3.4.1.js') }}"></script>
</head>
<body class="font-sans bg-gray-100 text-gray-900 flex flex-col min-h-screen">

@include('components.navbar')

<div class="container mx-auto px-4 md:px-8 py-8">
  <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">

    <!-- LEFT SIDE: Checkout Form -->
    <div class="lg:col-span-2">
      <h2 class="text-2xl font-bold mb-6">Checkout</h2>

      <form action="{{ route('checkoutsubmit') }}" method="POST" class="space-y-6">
        @csrf

        <!-- Customer Info -->
        <div class="space-y-2">
          <label class="block text-sm font-semibold">Username or Email Address</label>
          <input name="username" type="text" placeholder="Username or Email Address" class="w-full p-3 border border-gray-300 rounded-lg" required>
        </div>

        <!-- Billing Details -->
        <div class="space-y-2">
          <h3 class="block text-sm font-semibold">Billing Details</h3>
          <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <input name="first_name" type="text" placeholder="First Name" class="p-3 border border-gray-300 rounded-lg" required>
            <input name="last_name" type="text" placeholder="Last Name" class="p-3 border border-gray-300 rounded-lg" required>
          </div>

          <textarea name="address" placeholder="Address" class="w-full p-3 border border-gray-300 rounded-lg h-24 mt-4" required></textarea>
          <input name="phone" type="text" placeholder="Phone" class="w-full p-3 border border-gray-300 rounded-lg mt-4" required>

          <label class="block text-sm font-semibold">Billing Notes</label>
          <textarea name="notes" placeholder="Notes About Your Order" class="w-full p-3 border border-gray-300 rounded-lg h-24"></textarea>
        </div>

        <input type="hidden" name="qty" value="{{ $cart['quantity'] ?? 1 }}">
      </form>
    </div>

    <!-- RIGHT SIDE: Order Summary -->
    <div>
      <h2 class="text-xl font-bold mb-4">Your Order</h2>
      @php
        $cart = $cart ?? [
          'product' => 'Canon EOS R6',
          'price' => 28500000,
          'quantity' => 1,
          'image' => 'images/canon r6.jpg',
        ];
        $qty = $cart['quantity'];
        $price = $cart['price'];
        $subtotal = $qty * $price;
      @endphp

      <div class="bg-white p-6 rounded-lg border border-gray-300 space-y-4">
        <div class="flex gap-4">
          <img src="{{ asset($cart['image']) }}" alt="{{ $cart['product'] }}" class="w-16 h-16 object-cover rounded">
          <div class="flex flex-col">
            <p>{{ $cart['product'] }}</p>
            <span class="text-sm text-gray-500">x{{ $qty }}</span>
          </div>
          <div class="ml-auto font-semibold text-right">
            Rp {{ number_format($subtotal, 0, ',', '.') }}
          </div>
        </div>

        <div class="flex justify-between pt-4 border-t">
          <span>Subtotal</span>
          <span>Rp {{ number_format($subtotal, 0, ',', '.') }}</span>
        </div>

        <div class="flex justify-between font-bold text-lg border-t pt-4">
          <span>Total</span>
          <span>Rp {{ number_format($subtotal, 0, ',', '.') }}</span>
        </div>
        
        <button type="submit" class="w-full bg-red-500 hover:bg-red-600 text-white py-3 rounded-lg text-base font-semibold mt-4">
          Order
        </button>
      </div>
    </div>

  </div>
</div>

@include('components.footer')

</body>
</html>
