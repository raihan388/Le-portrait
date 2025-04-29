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
  <title>CheckOut Le-Portrait</title>
  <script src="{{ asset('styles/tailwindcss3.4.1.js') }}"></script>
</head>
<body class="font-sans bg-gray-100 text-gray-900 flex flex-col min-h-screen">

@include('components.navbar')

  <body class="bg-gray-50">

  <div class="container mx-auto p-8">
    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">

      <!-- Form Section -->
      <div class="md:col-span-2 space-y-8">
        <div>
          <h2 class="text-2xl font-bold mb-4">Checkout</h2>
    
          <form action="{{ route('checkoutsubmit') }}" method="POST" class="space-y-8">
    @csrf
          <!-- Customer Information -->
          <div class="space-y-2">
            <h3 class="text-lg font-semibold">Customer information</h3>
            <input name="username" type="text" placeholder="Username or Email Address *" class="w-full p-3 border border-gray-300 rounded-lg" required>
          </div>

          <!-- Billing Details -->
          <div class="space-y-2 mt-6">
            <h3 class="text-lg font-semibold">Billing details</h3>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <input name="first_name" type="text" placeholder="First name *" class="p-3 border border-gray-300 rounded-lg" required>
            <input name="last_name" type="text" placeholder="Last name *" class="p-3 border border-gray-300 rounded-lg" required>
            </div>
            <textarea name="address" placeholder="Address..." class="w-full p-3 border border-gray-300 rounded-lg mt-4 h-24" required></textarea>
            <input name="phone" type="text" placeholder="Phone *" class="w-full p-3 border border-gray-300 rounded-lg mt-4" required>
          </div>

          <!-- Additional Billing Details -->
          <div class="space-y-2 mt-6">
            <h3 class="text-lg font-semibold">Billing details</h3>
            <textarea name="notes" placeholder="Notes about your order" class="w-full p-3 border border-gray-300 rounded-lg h-24"></textarea>
          </div>
        </div>
      </div>

      <!-- Order Summary -->
      <div class="bg-white p-6 border border-gray-300 rounded-lg">
        <h3 class="text-lg font-semibold mb-4">Your order</h3>
        <div class="space-y-4">
          <div class="flex items-center justify-between">
            <span class="font-medium">Your order</span>
            <span class="font-medium">Subtotal</span>
          </div>
          <div class="flex items-center gap-4 mt-2">
            <img src="https://via.placeholder.com/60" alt="Product" class="w-16 h-16 object-cover rounded">
            <div>
              <p>Canon EOS R6</p>
              <p class="text-sm text-gray-500">x1</p>
            </div>
            <div class="ml-auto font-semibold">Rp 28.500.00</div>
          </div>

          <div class="flex justify-between border-t pt-4 mt-4">
            <span>Subtotal</span>
            <span>Rp 28.500.00</span>
          </div>

          <div class="flex justify-between font-bold text-lg border-t pt-4">
            <span>Total</span>
            <span>Rp 28.500.00</span>
          </div>
        </div>
      </div>
    </div>
  </div>
  
  <button type="submit" class="px-6 py-3 bg-blue-600 text-white rounded-lg hover:bg-blue-700">
    Submit Order
  </button>
</form>

  <!-- Footer -->
 <@include('components.footer')
</body>
</html>