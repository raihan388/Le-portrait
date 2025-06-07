<!-- Sidebar Cart -->
<div id="cartSidebar" class="fixed top-0 right-0 w-[350px] max-w-full h-full bg-white shadow-2xl border-l border-gray-200 z-50 transform translate-x-full transition-transform duration-300 ease-in-out p-6 overflow-y-auto">
  <div class="flex justify-between items-center mb-4">
    <h2 class="text-2xl font-bold">Keranjang</h2>
    <button onclick="toggleCart()" class="text-gray-500 hover:text-red-500 text-2xl font-bold">&times;</button>
  </div>

   <div id="cartItems" class="flex flex-col gap-5">
    @isset($cart)
      @if($cart->count())
        @foreach($cart as $item)
          <div class="flex justify-between items-center border-b pb-3">
            <div>
              <p class="font-semibold">{{ $item->product->name ?? 'Produk tidak ditemukan' }}</p>
              <p>{{ $item->quantity }} x Rp{{ number_format($item->price) }}</p>
            </div>
            <form id="removeForm-{{ $item->id }}" action="{{ route('cart.remove', $item->id) }}" method="POST" class="inline">
              @csrf
              @method('DELETE')
              <button type="button" onclick="confirmRemove({{ $item->id }})" class="text-red-500 hover:text-red-700">
                &times;
              </button>
            </form>
          </div>
        @endforeach
      @else
        <p class="text-gray-500">Keranjang kosong.</p>
      @endif
    @else
      <p class="text-gray-500">Data keranjang tidak tersedia.</p>
    @endisset
  </div>

  <div class="mt-6 border-t pt-4 text-lg font-semibold flex justify-between">
    <span>Subtotal:</span>
    <span id="cartSubtotal">
      @if($cart->count())
        Rp{{ number_format($cart->sum(fn($item) => $item->price * $item->quantity)) }}
      @else
        Rp 0
      @endif
    </span>
  </div>

  <div class="mt-5 flex flex-col gap-3">
    <a href="{{ route('cart.view') }}" class="bg-red-500 hover:bg-red-600 text-white py-2 rounded text-center">
      View Cart
    </a>
    <a href="{{ route('checkout') }}" class="bg-green-600 text-white py-2 rounded hover:bg-green-500 text-center">
      Checkout
    </a>
  </div>
</div>

<script>
  function toggleCart() {
    const cartSidebar = document.getElementById('cartSidebar');
    cartSidebar.classList.toggle('translate-x-full');
  }

  function renderCart() {
    const container = document.getElementById('cartItems');
    container.innerHTML = '';
    let subtotal = 0;

    cartItems.forEach((item, index) => {
      const itemTotal = item.price * item.quantity;
      subtotal += itemTotal;

      const itemElem = document.createElement('div');
      itemElem.className = "flex items-center gap-4";

      itemElem.innerHTML = `
        <img src="${item.image}" alt="${item.name}" class="w-16 h-16 object-cover rounded border">
        <div class="flex-1">
          <div class="flex justify-between items-center">
            <h3 class="font-bold">${item.name}</h3>
            <button onclick="removeItem(${index})" class="text-red-600 text-xl font-bold hover:text-red-800">&times;</button>
          </div>
          <div class="text-sm text-gray-600 mb-2">Rp ${item.price.toLocaleString('id-ID')}</div>
          <div class="flex items-center gap-2">
            <button onclick="updateQuantity(${index}, -1)" class="w-6 h-6 text-sm border rounded hover:bg-gray-100">-</button>
            <span id="qty-${index}" class="w-6 text-center">${item.quantity}</span>
            <button onclick="updateQuantity(${index}, 1)" class="w-6 h-6 text-sm border rounded hover:bg-gray-100">+</button>
          </div>
        </div>
      `;
      container.appendChild(itemElem);
    });

    document.getElementById('cartSubtotal').textContent = 'Rp ' + subtotal.toLocaleString('id-ID');
  }

  function updateQuantity(index, change) {
    const item = cartItems[index];
    const newQty = item.quantity + change;
    if (newQty < 1) return;

    item.quantity = newQty;
    document.getElementById(`qty-${index}`).textContent = newQty;
    renderCart();
  }

  function removeItem(index) {
    cartItems.splice(index, 1);
    renderCart();
  }

  // Render cart on page load
  document.addEventListener("DOMContentLoaded", renderCart);
</script>
