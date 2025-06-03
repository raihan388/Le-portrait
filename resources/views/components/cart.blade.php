@php
$cart = [
  [
    'name' => 'Kamera DSLR Canon EOS 1500D',
    'price' => 5500000,
    'quantity' => 1,
    'image' => 'products/canon-eos-1500d.jpg'
  ],
  [
    'name' => 'Lensa Kamera 50mm',
    'price' => 1500000,
    'quantity' => 2,
    'image' => 'products/lensa-50mm.jpg'
  ]
];
@endphp

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <title>Shopping Cart Sidebar</title>
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 font-sans">

<!-- Cart Sidebar -->
<div id="cartSidebar" class="fixed top-0 right-0 w-[350px] h-full bg-white border-l border-gray-300 p-5 shadow-lg z-50 transform translate-x-full transition-transform duration-300 ease-in-out">

  <div class="flex justify-between items-center mb-5">
    <h2 class="text-xl font-bold">Shopping Cart</h2>
    <button onclick="toggleCart()" class="text-gray-500 hover:text-red-600 text-2xl font-bold">&times;</button>
  </div>

  @php $subtotal = 0; @endphp

  @if(!empty($cart))
    @foreach ($cart as $index => $item)
      @php $subtotal += $item['price'] * $item['quantity']; @endphp

      <div class="cart-item flex items-center mb-5 gap-3" id="item-{{ $index }}">
        <input type="checkbox" class="w-5 h-5" checked onchange="updateSubtotal()" />
        <div class="w-[50px] h-[50px] bg-gray-300 rounded overflow-hidden flex-shrink-0">
          @if($item['image'])
            <img src="{{ asset('storage/' . $item['image']) }}" alt="{{ $item['name'] }}" class="w-full h-full object-cover" />
          @endif
        </div>

        <div class="flex-grow">
          <div class="font-bold mb-1 flex justify-between items-center">
            <span>{{ $item['name'] }}</span>
            <button onclick="removeItem({{ $index }})" class="text-red-600 font-bold text-xl ml-3 hover:text-red-800">×</button>
          </div>
          <div class="flex items-center gap-2">
            <button type="button" onclick="updateQuantity({{ $index }}, -1)" class="w-6 h-6 border border-gray-400 bg-white text-sm rounded">-</button>
            <input
              id="qty-{{ $index }}"
              type="text"
              value="{{ $item['quantity'] }}"
              readonly
              class="w-8 text-center border border-gray-300 rounded"
            />
            <button type="button" onclick="updateQuantity({{ $index }}, 1)" class="w-6 h-6 border border-gray-400 bg-white text-sm rounded">+</button>
          </div>
        </div>

        <div
          id="price-{{ $index }}"
          data-base-price="{{ $item['price'] }}"
          class="font-bold text-right flex-shrink-0 w-[100px]"
        >
          Rp {{ number_format($item['price'] * $item['quantity'], 0, ',', '.') }}
        </div>
      </div>
    @endforeach

    <div class="mt-5 flex flex-col gap-3">
      <button onclick="location.href='/cart'" class="bg-gray-800 text-white py-2 font-bold rounded hover:bg-gray-700 transition">View cart</button>
      <button onclick="location.href='/checkout'" class="bg-gray-800 text-white py-2 font-bold rounded hover:bg-gray-700 transition">Checkout</button>
    </div>

    <div class="flex justify-between font-bold border-t border-gray-300 pt-3 mt-5 text-base">
      <span>Subtotal:</span>
      <span id="subtotal">Rp {{ number_format($subtotal, 0, ',', '.') }}</span>
    </div>
  @else
    <p class="text-gray-500">Keranjang belanja kosong.</p>
  @endif

</div>

<script>
  function toggleCart() {
    const sidebar = document.getElementById('cartSidebar');
    sidebar.classList.toggle('translate-x-full');
  }

  function updateQuantity(index, delta) {
    const qtyInput = document.getElementById('qty-' + index);
    let currentQty = parseInt(qtyInput.value);
    let newQty = currentQty + delta;
    if (newQty < 1) return;

    qtyInput.value = newQty;

    const priceElem = document.getElementById('price-' + index);
    let basePrice = parseInt(priceElem.getAttribute('data-base-price'));
    let totalPrice = basePrice * newQty;
    priceElem.textContent = 'Rp ' + totalPrice.toLocaleString('id-ID');

    updateSubtotal();
  }

  function updateSubtotal() {
    let subtotal = 0;
    const cartItems = document.querySelectorAll('.cart-item');

    cartItems.forEach((item, index) => {
      const checkbox = item.querySelector('input[type="checkbox"]');
      if (checkbox && checkbox.checked) {
        const priceElem = item.querySelector('[id^="price-"]');
        if (priceElem) {
          let priceText = priceElem.textContent.replace(/[^0-9]/g, '');
          subtotal += parseInt(priceText) || 0;
        }
      }
    });

    const subtotalElem = document.getElementById('subtotal');
    subtotalElem.textContent = 'Rp ' + subtotal.toLocaleString('id-ID');
  }

  function removeItem(index) {
    const itemElem = document.getElementById('item-' + index);
    if (itemElem) {
      itemElem.remove();
      updateSubtotal();
    }
  }
</script>

</body>
</html>
