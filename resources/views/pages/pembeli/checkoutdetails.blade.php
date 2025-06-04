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
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body class="font-sans bg-gray-100 text-gray-900 flex flex-col min-h-screen">

  @include('components.navbar')
  @if (session('success'))
  <script>
    Swal.fire({
      icon: 'success',
      title: 'Success!',
      text: '{{ session('success') }}',
      confirmButtonColor: '#d33'
    }).then(() => {
      window.location.href = "{{ url('/pembayaran') }}"; // arahkan setelah popup ditutup
    });
  </script>
@endif

@if (session('error'))
  <script>
    Swal.fire({
      icon: 'error',
      title: 'Oops...',
      text: '{{ session('error') }}',
      confirmButtonColor: '#d33'
    });
  </script>
@endif


  <div class="container mx-auto p-6 md:p-8 flex-grow">
    <form action="{{ route('checkoutsubmit') }}" method="POST" class="grid grid-cols-1 md:grid-cols-3 gap-8">
      @csrf 

      <!-- Form Section -->
      <div class="md:col-span-2 space-y-6">
        <h2 class="text-2xl font-bold mb-4">Checkout Details</h2>

        <!-- Customer Info -->
        <div class="space-y-2">
          <h3 class="text-lg font-semibold">Customer Information</h3>
          <input name="email" type="email" placeholder="Email Address" class="w-full p-3 border border-gray-300 rounded-lg" required>
        </div>

        <!-- Billing Info -->
        <div class="space-y-2">
          <h3 class="text-lg font-semibold">Billing Details</h3>
          <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <input name="first_name" type="text" placeholder="First Name" class="p-3 border border-gray-300 rounded-lg" required>
            <input name="last_name" type="text" placeholder="Last Name" class="p-3 border border-gray-300 rounded-lg" required>
          </div>
          <textarea name="address" placeholder="Address" class="w-full p-3 border border-gray-300 rounded-lg h-24" required></textarea>
          <input name="phone" type="tel" pattern="[0-9]*" inputmode="numeric" placeholder="Phone" class="w-full p-3 border border-gray-300 rounded-lg" required>
        </div>

        <!-- Notes -->
        <div class="space-y-2">
          <h3 class="text-lg font-semibold">Billing Notes</h3>
          <textarea name="notes" placeholder="Notes About Your Order" class="w-full p-3 border border-gray-300 rounded-lg h-24"></textarea>
        </div>
      </div>

      <!-- Order Summary -->
      <div class="space-y-4">
        <h2 class="text-2xl font-bold mb-4">Your Order</h2>

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

          <input type="hidden" name="qty" value="{{ $qty }}">

          <button type="submit" class="mt-4 w-full px-4 py-2 text-sm bg-red-500 text-white rounded-lg hover:bg-red-600 transition">
            Checkout
          </button>
        </div>
      </div>
    </form>
  </div>
 
  <script>
  document.querySelector('input[name="phone"]').addEventListener('input', function (e) {
    this.value = this.value.replace(/[^0-9]/g, '');
  });
 </script>

  @include('components.cart')
  @include('components.footer')


</body>
</html> 