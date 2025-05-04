<!DOCTYPE html>
<html lang="en" class="h-full">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>CheckOut Le-Portrait</title>
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
            <tr class="border-t border-gray-200">
              <td class="p-4 flex items-center">
                <img src="{{ asset('images/canon r6.jpg') }}" alt="Canon EOS R6" class="w-16 h-16 object-cover rounded mr-4 flex-shrink-0">
                <div class="font-medium">Canon EOS R6</div>
              </td>
              <td class="p-4 text-gray-600">Rp 28.500.000</td>
              <td class="p-4 text-center">
                <div class="inline-flex items-center border border-gray-300 rounded">
                  <button onclick="changeQuantity(-1)" class="px-2 hover:bg-gray-100">−</button>
                  <input id="qty" type="text" value="1" class="w-10 text-center border-x border-gray-300 outline-none" readonly />
                  <button onclick="changeQuantity(1)" class="px-2 hover:bg-gray-100">+</button>
                </div>
              </td>
              <td class="p-4 text-right font-medium" id="item-subtotal">Rp 28.500.000</td>
            </tr>
          </tbody>
        </table>
      </div>

      <!-- Cart Totals -->
      <div class="border border-gray-300 bg-white p-4 rounded-lg shadow-sm h-fit">
        <h3 class="font-semibold mb-4 border-b pb-2">Cart totals</h3>
        <div class="flex justify-between mb-2">
          <span class="text-gray-600">Subtotal</span>
          <span id="cart-subtotal">Rp 28.500.000</span>
        </div>
        <div class="flex justify-between mb-4 border-b pb-2">
          <span class="font-medium">Total</span>
          <span id="cart-total" class="font-bold">Rp 28.500.000</span>
        </div>

        <!-- Proceed button -->
        <a href="{{ route('checkoutdetails') }}" class="w-full block text-center bg-gray-800 hover:bg-gray-700 text-white py-2 font-semibold rounded transition-colors">
          Proceed to checkout
        </a>
      </div>

    </div>
  </main>
  
  @include('components.footer')
  

  <!-- Script -->
  <script>
    const unitPrice = 28500000;

    function formatRupiah(num) {
      return new Intl.NumberFormat('id-ID', {
        style: 'currency',
        currency: 'IDR'
      }).format(num);
    }

    function changeQuantity(delta) {
      const qtyInput = document.getElementById('qty');
      let qty = parseInt(qtyInput.value);
      qty += delta;
      if (qty < 1) qty = 1;
      qtyInput.value = qty;

      const subtotal = unitPrice * qty;
      document.getElementById('item-subtotal').innerText = formatRupiah(subtotal);
      document.getElementById('cart-subtotal').innerText = formatRupiah(subtotal);
      document.getElementById('cart-total').innerText = formatRupiah(subtotal);
    }

    // Inisialisasi saat pertama kali load
    document.addEventListener('DOMContentLoaded', () => changeQuantity(0));
  </script>

</body>
</html>
