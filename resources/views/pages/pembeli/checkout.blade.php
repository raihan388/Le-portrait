<!DOCTYPE html>
<html lang="en" class="h-full">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Checkout</title>
  <script src="{{ asset('styles/tailwindcss3.4.1.js') }}"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body class="font-sans bg-gray-100 text-gray-900 flex flex-col min-h-screen">

  @include('components.navbar')

  <!-- Flash Alerts -->
@if (session('success'))
  <script>
    Swal.fire({
      icon: 'success',
      title: 'Success!',
      text: @json(session('success')),
      confirmButtonColor: '#d33'
    }).then(() => {
      window.location.href = "{{ url('/checkoutdetail') }}";
    });
  </script>
@endif

@if (session('error'))
  <script>
    Swal.fire({
      icon: 'error',
      title: 'Oops...',
      text: @json(session('error')),
      confirmButtonColor: '#d33'
    });
  </script>
@endif

  <!-- Validation Errors -->
  @if ($errors->any())
    <div class="bg-red-100 text-red-700 p-4 rounded mb-6 mx-auto max-w-4xl mt-6">
      <ul class="list-disc list-inside">
        @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
  @endif

  <!-- Main Checkout Content -->
  <main class="flex-grow max-w-7xl mx-auto px-4 py-6 w-full">
    <!-- Cart -->
    <h2 class="text-xl font-semibold mb-4">Checkout</h2>
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
            @php
              $subtotal = 0;
            @endphp
            @foreach ($cartItems as $item)
  @php
    $itemTotal = $item['price'] * $item['quantity'];
    $subtotal += $itemTotal;
  @endphp
  <tr class="border-t border-gray-200">
    <td class="p-4 flex items-center">
      <img src="{{ asset('images/' . $item['image']) }}" alt="{{ $item['product'] }}" class="w-16 h-16 object-cover rounded mr-4 flex-shrink-0">
      <div class="font-medium">{{ $item['product'] }}</div>
    </td>
    <td class="p-4 text-gray-600">Rp {{ number_format($item['price'], 0, ',', '.') }}</td>
    <td class="p-4 text-center">{{ $item['quantity'] }}</td>
    <td class="p-4 text-right font-medium">Rp {{ number_format($itemTotal, 0, ',', '.') }}</td>
  </tr>
@endforeach

          </tbody>
        </table>
      </div>

      <!-- Order Summary & Form -->
      <div class="border border-gray-300 bg-white p-4 rounded-lg shadow-sm h-fit">
        <form action="{{ route('pages.pembeli.checkoutsubmit') }}" method="POST" class="space-y-6">

          <h3 class="text-lg font-semibold mt-4">Customer Information</h3>
          <input name="email" type="email" placeholder="Email Address" class="w-full p-3 border border-gray-300 rounded-lg" required>

          <h3 class="text-lg font-semibold mt-4">Billing Details</h3>
          <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <input name="first_name" type="text" placeholder="First Name" class="p-3 border border-gray-300 rounded-lg" required>
            <input name="last_name" type="text" placeholder="Last Name" class="p-3 border border-gray-300 rounded-lg" required>
          </div>
          <textarea name="address" placeholder="Address" class="w-full p-3 border border-gray-300 rounded-lg h-24 mt-2" required></textarea>
          <input name="phone" type="tel" pattern="[0-9]*" inputmode="numeric" placeholder="Phone" class="w-full p-3 border border-gray-300 rounded-lg" required>

          <h3 class="text-lg font-semibold mt-4">Billing Notes</h3>
          <textarea name="notes" placeholder="Notes About Your Order" class="w-full p-3 border border-gray-300 rounded-lg h-24"></textarea>

          @csrf

          <h3 class="font-semibold border-b pb-2 text-lg">Payment Details</h3>
          <div class="flex justify-between">
            <span>Subtotal</span>
            <span class="font-medium">Rp {{ number_format($subtotal, 0, ',', '.') }}</span>
          </div>
          <div class="flex justify-between font-bold text-lg border-t pt-2">
            <span>Total</span>
            <span>Rp {{ number_format($subtotal, 0, ',', '.') }}</span>
          </div>

          <button type="submit" class="w-full px-4 py-2 text-sm bg-red-500 text-white rounded-lg hover:bg-red-600 transition">
            Checkout
          </button>
        </form>
      </div>
    </div>
  </main>

  @include('components.footer')

  <script>
    document.querySelector('input[name="phone"]').addEventListener('input', function (e) {
      this.value = this.value.replace(/[^0-9]/g, '');
    });
  </script>

</body>
</html>
