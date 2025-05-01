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
  <title>CheckOut</title>
  <script src="{{ asset('styles/tailwindcss3.4.1.js') }}"></script>
</head>
<body class="font-sans bg-gray-100 text-gray-900 flex flex-col min-h-screen">

@include('components.navbar')

<div class="container mx-auto p-8">
  <div class="grid grid-cols-1 md:grid-cols-3 gap-8">

    <!-- Form Section (2 kolom kiri) -->
    <div class="md:col-span-2 space-y-8">
      <h2 class="text-2xl font-bold mb-4">Checkout</h2>

      <form action="{{ route('checkoutsubmit') }}" method="POST" class="space-y-8">
        @csrf

        <!-- Customer Information -->
        <div class="space-y-2">
          <h3 class="text-lg font-semibold">Customer Information</h3>
          <input name="username" type="text" placeholder="Username or Email Address" class="w-full p-3 border border-gray-300 rounded-lg" required>
        </div>

        <!-- Billing Details -->
        <div class="space-y-2 mt-6">
          <h3 class="text-lg font-semibold">Billing Details</h3>
          <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <input name="first_name" type="text" placeholder="First Name" class="p-3 border border-gray-300 rounded-lg" required>
            <input name="last_name" type="text" placeholder="Last Name" class="p-3 border border-gray-300 rounded-lg" required>
          </div>

          <!-- Additional Billing Details -->
          <div class="space-y-2 mt-6">
            <h3 class="text-lg font-semibold">Billing Details</h3>
            <textarea name="notes" placeholder="Notes About Your Order" class="w-full p-3 border border-gray-300 rounded-lg h-24"></textarea>
          </div>
        </div>
      </div>

        <!-- Order Summary -->
        @php
  if (!is_null($cart) && isset($cart['quantity'], $cart['price'])) {
      $qty = $cart['quantity'];
      $price = $cart['price'];
      $subtotal = $qty * $price;
  } else {
      $qty = 0;
      $price = 0;
      $subtotal = 0;
  }
@endphp


    <div class="bg-white p-6 border border-gray-300 rounded-lg">
      <div class="space-y-4">
        <div class="flex items-center justify-between">
          <span class="font-medium">Your Order</span>
          <span class="font-medium">Subtotal</span>
        </div>

        @if(isset($cart) && isset($cart['image'], $cart['product'], $qty, $subtotal))
  <div class="flex items-center gap-4 mt-2">
    <img src="{{ asset($cart['image']) }}" alt="{{ $cart['product'] }}" class="w-16 h-16 object-cover rounded">
    <div>
      <p>{{ $cart['product'] }}</p>
      <p class="text-sm text-gray-500">x{{ $qty }}</p>
    </div>
    <div class="ml-auto font-semibold">Rp {{ number_format($subtotal, 0, ',', '.') }}</div>
  </div>
@else
  <p class="text-gray-500 italic">Keranjang kosong atau data tidak ditemukan.</p>
@endif
          <textarea name="address" placeholder="Address" class="w-full p-3 border border-gray-300 rounded-lg mt-4 h-24" required></textarea>
          <input name="phone" type="text" placeholder="Phone" class="w-full p-3 border border-gray-300 rounded-lg mt-4" required>
        </div>

        <!-- Notes -->
        <div class="space-y-2 mt-6">
          <h3 class="text-lg font-semibold">Billing Notes</h3>
          <textarea name="notes" placeholder="Notes About Your Order" class="w-full p-3 border border-gray-300 rounded-lg h-24"></textarea>
        </div>

        <!-- Hidden field for quantity -->
        <input type="hidden" name="qty" value="{{ $cart['quantity'] ?? 1 }}">

      </form>
    </div>

    <!-- Order Summary (1 kolom kanan) -->
    <div class="space-y-4">
      <h2 class="text-xl font-bold">Your Order</h2>
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

      <div class="bg-white p-6 border border-gray-300 rounded-lg space-y-4">
        <div class="flex items-center gap-4">
          <img src="{{ asset($cart['image']) }}" alt="{{ $cart['product'] }}" class="w-16 h-16 object-cover rounded">
          <div>
            <p>{{ $cart['product'] }}</p>
            <p class="text-sm text-gray-500">x{{ $qty }}</p>
          </div>
          <div class="ml-auto font-semibold">Rp {{ number_format($subtotal, 0, ',', '.') }}</div>
        </div>

        <div class="flex justify-between border-t pt-4">
          <span>Subtotal</span>
          <span>Rp {{ number_format($subtotal, 0, ',', '.') }}</span>
        </div>

        <div class="flex justify-between font-bold text-lg border-t pt-4">
          <span>Total</span>
          <span>Rp {{ number_format($subtotal, 0, ',', '.') }}</span>
      </div>
      <form action="{{ route('checkoutsubmit') }}" method="POST" class="space-y-8">
  @csrf
  
  
  <!-- Form fields di sini -->
  <button type="submit" class="mt-4 px-4 py-2 text-sm bg-red-500 text-white rounded-lg hover:bg-red-600 w-full">
    Order
  </button>
</form>

      </div>
    </div>

  </div>
</div>

@include('components.footer')

</body>
</html>
