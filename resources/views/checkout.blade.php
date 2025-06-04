<!DOCTYPE html>
<html lang="en" class="h-full">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>CheckOut</title>
  <script src="{{ asset('styles/tailwindcss3.4.1.js') }}"></script>
</head>
<body class="font-sans bg-gray-100 text-gray-900 flex flex-col min-h-screen">

  @include('components.navbar')

  <!-- Cart Content -->
  <main class="flex-grow max-w-7xl mx-auto px-4 py-6 w-full">
    <h2 class="text-xl font-semibold mb-4">Cart</h2>
    <div class="grid md:grid-cols-3 gap-6">

      <!-- Cart Items -->
      <div class="md:col-span-2 border border-gray-300 bg-white rounded-lg shadow-sm">
        <table class="w-full text-sm">
          <thead class="bg-gray-100">
            <tr>
              <th class="p-3 text-left">Product</th>
              <th class="p-3 text-left">Price</th>
              <th class="p-3 text-center">Quantity</th>
              <th class="p-3 text-right">Subtotal</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($cartItems as $item)
              <tr class="border-t border-gray-200">
                <td class="p-4 flex items-center">
                  <img src="{{ asset('images/' . $item->product->image) }}" alt="{{ $item->product->name }}" class="w-16 h-16 object-cover rounded mr-4 flex-shrink-0">
                  <div class="font-medium">{{ $item->product->name }}</div>
                </td>
                <td class="p-4 text-gray-600">Rp {{ number_format($item->product->price, 0, ',', '.') }}</td>
                <td class="p-4 text-center">{{ $item->quantity }}</td>
                <td class="p-4 text-right font-medium">Rp {{ number_format($item->product->price * $item->quantity, 0, ',', '.') }}</td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>

      <!-- Cart Totals -->
      <div class="border border-gray-300 bg-white p-4 rounded-lg shadow-sm h-fit">
        <h3 class="font-semibold mb-4 border-b pb-2">Cart Total</h3>
        <div class="flex justify-between mb-2">
          <span class="text-gray-600">Subtotal</span>
          <span id="cart-subtotal">Loading...</span>
        </div>
        <div class="flex justify-between mb-4 border-b pb-2">
          <span class="font-medium">Total</span>
          <span id="cart-total" class="font-bold">Loading...</span>
        </div>

        <!-- Proceed button -->
        <a href="{{ route('checkoutdetails') }}" class="w-full block text-center bg-red-500 text-white hover:bg-red-600 py-2 font-semibold rounded transition-colors">
          Proceed to Checkout
        </a>
      </div>

    </div>
  </main>

  @include('components.cart')
  @include('components.footer')

  <!-- Subtotal Calculation -->
  @php
    $subtotal = $cartItems->sum(fn($item) => $item->product->price * $item->quantity);
  @endphp

  <script>
    document.addEventListener('DOMContentLoaded', () => {
      document.getElementById('cart-subtotal').innerText = "{{ 'Rp ' . number_format($subtotal, 0, ',', '.') }}";
      document.getElementById('cart-total').innerText = "{{ 'Rp ' . number_format($subtotal, 0, ',', '.') }}";
    });
  </script>

</body>
</html>
