<!DOCTYPE html>
<html lang="en" class="h-full">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Checkout</title>
  <script src="{{ asset('styles/tailwindcss3.4.1.js') }}"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="font-sans bg-gray-50 text-gray-800 flex flex-col min-h-screen">

  @include('components.navbar')

  @if (session('success'))
<script>
  document.addEventListener('DOMContentLoaded', function () {
    Swal.fire({
      icon: 'success',
      title: 'Success!',
      text: @json(session('success')),
      confirmButtonColor: '#dc2626',
      background: '#f8fafc',
      color: '#1e293b'
    }).then(() => {
      window.location.href = "{{ route('checkoutdetail') }}";
    });
  });
</script>
@endif

@if (session('error'))
<script>
  document.addEventListener('DOMContentLoaded', function () {
    Swal.fire({
      icon: 'error',
      title: 'Oops...',
      text: @json(session('error')),
      confirmButtonColor: '#dc2626',
      background: '#f8fafc',
      color: '#1e293b'
    });
  });
</script>
@endif

<main class="flex-grow max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8 w-full">

  <!-- Progress Steps -->
  <div class="mb-8">
    <div class="flex items-center justify-center">
      <div class="flex items-center text-red-500">
        <div class="flex items-center justify-center w-10 h-10 rounded-full bg-red-100 border-2 border-red-500">
          <span class="text-red-500 font-medium">1</span>
        </div>
        <div class="ml-2 text-sm font-medium">Cart</div>
      </div>
      <div class="flex-auto border-t-2 border-red-500 mx-2"></div>
      <div class="flex items-center text-red-500">
        <div class="flex items-center justify-center w-10 h-10 rounded-full bg-red-500 border-2 border-red-500">
          <i class="fas fa-check text-white text-sm"></i>
        </div>
        <div class="ml-2 text-sm font-medium">Checkout</div>
      </div>
      <div class="flex-auto border-t-2 border-gray-300 mx-2"></div>
      <div class="flex items-center text-gray-400">
        <div class="flex items-center justify-center w-10 h-10 rounded-full bg-gray-100 border-2 border-gray-300">
          <span class="text-gray-400 font-medium">3</span>
        </div>
        <div class="ml-2 text-sm font-medium">Details</div>
      </div>
    </div>
  </div>

  <h1 class="text-2xl md:text-3xl font-bold text-gray-900 mb-6">Complete Your Order</h1>
  
  <div class="grid lg:grid-cols-3 gap-8">
    <!-- Order Summary -->
    <div class="lg:col-span-2 space-y-6">
      <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
        <div class="bg-gray-50 px-6 py-4 border-b border-gray-200">
          <h2 class="text-lg font-semibold text-gray-900 flex items-center">
            <i class="fas fa-shopping-cart mr-2 text-red-600"></i>
            Your Order ({{ count($cartItems) }} items)
          </h2>
        </div>
        <div class="divide-y divide-gray-200">
          @php $subtotal = 0; @endphp
          @foreach ($cartItems as $item)
            @php
              $itemTotal = $item->price * $item->quantity;
              $subtotal += $itemTotal;
              $images = is_array($item->product->images) ? $item->product->images : json_decode($item->product->images, true);
            @endphp
            <div class="p-6 flex items-start">
              <div class="flex-shrink-0 w-20 h-20 rounded-lg overflow-hidden bg-gray-100">
                @if($images)
                  <img src="{{ asset('storage/' . $images[0]) }}" alt="{{ $item->product->name }}" class="w-full h-full object-cover">
                @else
                  <div class="w-full h-full flex items-center justify-center">
                    <i class="fas fa-image text-gray-300 text-xl"></i>
                  </div>
                @endif
              </div>
              <div class="ml-4 flex-1">
                <div class="flex items-start justify-between">
                  <div>
                    <h3 class="text-base font-medium text-gray-900">{{ $item->product->name }}</h3>
                    <p class="mt-1 text-sm text-gray-500">SKU: PRD-00{{ $loop->iteration }}</p>
                  </div>
                  <p class="text-base font-medium text-gray-900">Rp {{ number_format($item->price, 0, ',', '.') }}</p>
                </div>
                <div class="mt-4 flex items-center justify-between">
                  <div class="flex items-center">
                    <span class="text-sm text-gray-500 mr-2">Qty:</span>
                    <span class="px-3 py-1 bg-gray-100 rounded-md text-sm font-medium">{{ $item->quantity }}</span>
                  </div>
                  <p class="text-base font-medium text-red-600">Rp {{ number_format($itemTotal, 0, ',', '.') }}</p>
                </div>
              </div>
            </div>
          @endforeach
        </div>
      </div>
    </div>

    <!-- Checkout Form -->
    <div class="space-y-6">
      <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden sticky top-6">
        <div class="bg-gray-50 px-6 py-4 border-b border-gray-200">
          <h2 class="text-lg font-semibold text-gray-900 flex items-center">
            <i class="fas fa-user-circle mr-2 text-red-600"></i>
            Customer Information
          </h2>
        </div>
        <form action="{{ route('checkoutsubmit') }}" method="POST" class="p-6 space-y-4">
            @csrf
            <div>
              <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email Address</label>
              <div class="relative">
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                  <i class="fas fa-envelope text-gray-400"></i>
                </div>
                <input name="email" type="email" placeholder="your@email.com" value="{{ session('checkout.email', old('email')) }}" 
                       class="pl-10 w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500" required>
              </div>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
    <div>
        <label for="first_name" class="block text-sm font-medium text-gray-700 mb-1">First Name</label>
        <div class="relative">
            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                <i class="fas fa-user text-gray-400"></i>
            </div>
            <input name="first_name" type="text" placeholder="First Name" value="{{ old('first_name') }}" 
                   class="pl-10 w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500" required>
        </div>
    </div>
    
    <div>
        <label for="last_name" class="block text-sm font-medium text-gray-700 mb-1">Last Name</label>
        <div class="relative">
            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                <i class="fas fa-user text-gray-400"></i>
            </div>
            <input name="last_name" type="text" placeholder="Last Name" value="{{ old('last_name') }}" 
                   class="pl-10 w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500" required>
        </div>
    </div>
</div>
            
            <div>
              <label for="address" class="block text-sm font-medium text-gray-700 mb-1">Shipping Address</label>
              <div class="relative">
                <div class="absolute inset-y-0 left-0 pl-3 pt-3 flex items-start pointer-events-none">
                  <i class="fas fa-map-marker-alt text-gray-400"></i>
                </div>
                <textarea name="address" placeholder="Your complete address" 
                          class="pl-10 w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 h-24" required>{{ session('checkout.address', old('address')) }}</textarea>
              </div>
            </div>
            
            <div>
              <label for="phone" class="block text-sm font-medium text-gray-700 mb-1">Phone Number</label>
              <div class="relative">
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                  <i class="fas fa-phone text-gray-400"></i>
                </div>
                <input name="phone" type="tel" pattern="[0-9]*" inputmode="numeric" placeholder="08123456789" value="{{ session('checkout.phone', old('phone')) }}" 
                       class="pl-10 w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500" required>
              </div>
            </div>
            
            <div>
              <label for="notes" class="block text-sm font-medium text-gray-700 mb-1">Order Notes (Optional)</label>
              <textarea name="notes" placeholder="Special instructions for your order..." 
                        class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 h-24">{{ session('checkout.notes', old('notes')) }}</textarea>
            </div>
          
          <div class="bg-gray-50 px-6 py-4 border-t border-gray-200">
            <h2 class="text-lg font-semibold text-gray-900 flex items-center">
              <i class="fas fa-receipt mr-2 text-red-600"></i>
              Order Summary
            </h2>
          </div>

          <div class="p-6 space-y-4">
            <div class="flex justify-between">
              <span class="text-gray-600">Subtotal</span>
              <span class="font-medium">Rp {{ number_format($subtotal, 0, ',', '.') }}</span>
            </div>
            <div class="flex justify-between">
              <span class="text-gray-600">Shipping</span>
              <span class="font-medium">Free</span>
            </div>
            <div class="border-t border-gray-200 pt-4 flex justify-between">
              <span class="text-lg font-semibold">Total</span>
              <span class="text-lg font-bold text-red-600">Rp {{ number_format($subtotal, 0, ',', '.') }}</span>
            </div>

            <!-- Tombol merah -->
            <button type="submit" class="w-full bg-red-500 hover:bg-red-600 text-white font-semibold py-3 px-4 rounded-lg transition-colors duration-200 flex items-center justify-center">
              <i class="fas fa-lock mr-2"></i>
              Complete Order
            </button>

            <div class="text-center text-xs text-gray-500 mt-4">
              <p>By completing your purchase, you agree to our <a href="#" class="text-red-500 hover:underline">Terms of Service</a></p>
            </div>
          </div>
        </form>
      </div>
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