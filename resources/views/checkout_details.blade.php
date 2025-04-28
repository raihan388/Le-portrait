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
<body class="font-sans bg-gray-50 text-gray-900">
  <!-- Header -->
  <div class="flex items-center justify-between p-4 shadow bg-white">
  <!-- Logo -->
  <div class="flex items-center gap-2">
    <img src="logo.png" alt="Logo" class="h-8 w-auto" />
  </div>
      <input type="text" placeholder="Search cameras, lenses, accessories..." class="border p-2 rounded w-1/2" />
      <div class="space-x-4">
        <a href="#" class="hover:underline">Login</a>
        <a href="#" class="hover:underline">Sign Up</a>
        <a href="#" class="hover:underline">Cart (0)</a>
      </div>
    </div>

    <!-- Navigation Bar -->
<nav class="bg-white shadow-sm">
  <div class="max-w-7xl mx-auto px-4">
    <ul class="flex justify-center space-x-12 py-4 font-semibold text-sm">
      <li><a href="#" class="hover:underline">DSLR Cameras</a></li>
      <li><a href="#" class="hover:underline">Mirrorless Camera</a></li>
      <li><a href="#" class="hover:underline">Film Cameras</a></li>
      <li><a href="#" class="hover:underline">Lenses</a></li>
      <li><a href="#" class="hover:underline">Flash units</a></li>
      <li><a href="#" class="hover:underline">Tripods</a></li>
    </ul>
  </div>
</nav>
  </header>

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
 <footer class="bg-gray-800 text-white text-sm">
    <div class="max-w-7xl mx-auto grid grid-cols-2 md:grid-cols-4 gap-8 px-6 py-8">
      <div class="flex-1 min-w-[150px]">
        <h3 class="font-bold mb-2">Le Portrait</h3>
        <ul class="space-y-1 text-sm text-left inline-block">
          <li><a href="#" class="hover:underline">Tentang Kami</a></li>
          <li><a href="#" class="hover:underline">Karir</a></li>
          <li><a href="#" class="hover:underline">Blog</a></li>
          <li><a href="#" class="hover:underline">Kebijakan Privasi</a></li>
        </ul>
      </div>
      <div class="flex-1 min-w-[150px]">
        <h4 class="font-bold mb-2">Layanan Pelanggan</h4>
        <ul class="space-y-1 text-sm text-left inline-block">
          <li><a href="#" class="hover:underline">Bantuan</a></li>
          <li><a href="#" class="hover:underline">Cara Berbelanja</a></li>
          <li><a href="#" class="hover:underline">Pengiriman</a></li>
          <li><a href="#" class="hover:underline">Pengembalian</a></li>
        </ul>
      </div>
      <div class="flex-1 min-w-[150px]">
        <h4 class="font-bold mb-2">Pembayaran</h4>
        <ul class="space-y-1 text-sm text-left inline-block">
          <li><a href="#" class="hover:underline">Transfer Bank</a></li>
          <li><a href="#" class="hover:underline">Kartu Kredit</a></li>
          <li><a href="#" class="hover:underline">QRIS</a></li>
          <li><a href="#" class="hover:underline">Cicilan</a></li>
        </ul>
      </div>
      <div class="flex-1 min-w-[150px]">
        <h4 class="font-bold mb-2">Ikuti Kami</h4>
        <ul class="space-y-1 text-sm text-left inline-block">
          <li><a href="#" class="hover:underline">Instagram</a></li>
          <li><a href="#" class="hover:underline">Facebook</a></li>
          <li><a href="#" class="hover:underline">Twitter</a></li>
          <li><a href="#" class="hover:underline">YouTube</a></li>
        </ul>
      </div>
    </div>
    <div class="text-center text-xs py-4 bg-gray-900">© 2025 Le Portrait. Semua Hak Cipta Dilindungi.</div>
  </footer>
</body>
</html>