<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Shopping Cart Sidebar</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 font-sans">

<!-- Cart Sidebar -->
<div id="cartSidebar" class="fixed top-0 right-0 w-[350px] h-full bg-gray-100 border-l border-gray-300 p-5 shadow-lg z-50">
  <h2 class="text-xl font-bold mb-5">Shopping Cart</h2>
  
  <!-- Cart Item -->
  <div class="cart-item flex justify-between items-center mb-5">
    <div class="w-[50px] h-[50px] bg-gray-300 rounded"></div>
    <div class="flex-grow mx-3">
      <div class="font-bold mb-1">Canon EOS R6</div>
      <div class="flex items-center gap-2">
        <button onclick="decreaseQty(this)" class="w-6 h-6 border border-gray-400 bg-white text-sm rounded">-</button>
        <input type="text" value="1" readonly class="w-8 text-center border border-gray-300 rounded">
        <button onclick="increaseQty(this)" class="w-6 h-6 border border-gray-400 bg-white text-sm rounded">+</button>
      </div>
    </div>
    <div class="font-bold text-right">Rp 28.500.000</div>
  </div>
  
  <!-- Action Buttons -->
  <div class="mt-5 flex flex-col gap-3">
    <button class="bg-gray-800 text-white py-2 font-bold rounded hover:bg-gray-700 transition" onclick="location.href='/cart'">View cart</button>
    <button class="bg-gray-800 text-white py-2 font-bold rounded hover:bg-gray-700 transition" onclick="location.href='/checkout'">Checkout</button>
  </div>

  <!-- Subtotal (Moved below the buttons) -->
  <div class="flex justify-between font-bold border-t border-gray-300 pt-3 mt-5 text-base">
    <span>Subtotal:</span>
    <span id="subtotal">Rp 28.500.000</span>
  </div>
</div>

<!-- Script -->
<script>
function increaseQty(button) {
  const input = button.previousElementSibling;
  let qty = parseInt(input.value);
  input.value = qty + 1;
  updateSubtotal();
}

function decreaseQty(button) {
  const input = button.nextElementSibling;
  let qty = parseInt(input.value);
  if (qty > 1) {
    input.value = qty - 1;
    updateSubtotal();
  }
}

function updateSubtotal() {
  const input = document.querySelector('.cart-item input');
  const price = 28500000;
  const total = price * parseInt(input.value);
  document.getElementById('subtotal').innerText = 'Rp ' + total.toLocaleString('id-ID');
}
</script>

</body>
</html>