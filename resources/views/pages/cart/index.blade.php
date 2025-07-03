    <!DOCTYPE html>
    <html lang="id">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>Le-Portrait | Cart</title>
        <script src="https://cdn.tailwindcss.com"></script>
        <style>
              /* Hilangkan spinner dari input number */
              input[type=number]::-webkit-inner-spin-button,
              input[type=number]::-webkit-outer-spin-button {
                -webkit-appearance: none;
                margin: 0;
              }
          
              input[type=number] {
                -moz-appearance: textfield; /* Firefox */
              }
        </style>
    </head>
    <body class="bg-gray-50 text-gray-900">
    @include('components.navbar')

    <!-- Progress Steps - Halaman Cart -->
    <div class="py-10 bg-white border-b">
    <div class="max-w-6xl mx-auto px-4">
        <div class="flex items-center justify-center">
        <!-- Step 1: Cart (current) -->
        <div class="flex items-center text-red-500">
            <div class="flex items-center justify-center w-10 h-10 rounded-full bg-red-100 border-2 border-red-500">
            <span class="text-red-500 font-medium">1</span>
            </div>
            <div class="ml-2 text-sm font-medium">Cart</div>
        </div>

        <div class="flex-auto border-t-2 border-red-500 mx-2"></div>

        <!-- Step 2: Checkout -->
        <div class="flex items-center text-gray-400">
            <div class="flex items-center justify-center w-10 h-10 rounded-full bg-gray-100 border-2 border-gray-300">
            <span class="text-gray-400 font-medium">2</span>
            </div>
            <div class="ml-2 text-sm font-medium">Checkout</div>
        </div>

        <div class="flex-auto border-t-2 border-gray-300 mx-2"></div>

        <!-- Step 3: Details -->
        <div class="flex items-center text-gray-400">
            <div class="flex items-center justify-center w-10 h-10 rounded-full bg-gray-100 border-2 border-gray-300">
            <span class="text-gray-400 font-medium">3</span>
            </div>
            <div class="ml-2 text-sm font-medium">Details</div>
        </div>
        </div>
    </div>
    </div>

        <div class="max-w-6xl mx-auto py-10 px-4">
            <h2 class="text-2xl font-bold mb-6 flex items-center gap-2">
                🛒 Shopping Cart
            </h2>

            @if ($cartItems->count())
                <div class="overflow-x-auto bg-white shadow-md rounded-lg">
                    <table class="w-full table-auto border-collapse text-sm">
                        <thead class="bg-gray-100">
                            <tr>
                                <th class="px-4 py-3 text-center">Pilih</th>
                                <th class="px-4 py-3 text-center">No</th>
                                <th class="px-4 py-3 text-left">Image</th>
                                <th class="px-4 py-3 text-left">Product Name</th>
                                <th class="px-4 py-3 text-left">Price</th>
                                <th class="px-4 py-3 text-left">Qty</th>
                                <th class="px-4 py-3 text-left">Subtotal</th>
                                <th class="px-4 py-3 text-left">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $total = 0; @endphp
                            @foreach ($cartItems as $item)
                                @php
                                    $subtotal = $item->quantity * $item->price;
                                    $total += $subtotal;
                                @endphp

                                <tr class="border-t" data-id="{{ $item->id }}" data-price="{{ $item->price }}">
                                    <td class="px-4 py-3 text-center">
                                        <input type="checkbox" class="select-item" value="{{ $item->id }} {{ $item->product->stock == 0 ? 'disabled' : '' }}">
                                    </td>
                                    <td class="px-4 py-3 text-center">PRD-00{{ $loop->iteration }}</td>
                                    <td class="px-4 py-3 text-center">
                                        <img src="{{ asset('storage/' . ($item->product->images[0] ?? 'images/no-image.png')) }}"
                                            alt="{{ $item->product->name }}"
                                            class="w-16 h-16 object-cover rounded border">
                                    </td>
                                    <td class="px-4 py-3 font-medium">
                                        {{ $item->product->name }}
                                        @if ($item->product->stock == 0)
                                            <span class="text-xs text-red-500 font-semibold ml-2">(Stok Habis)</span>
                                        @endif
                                    </td>
                                    <td class="px-4 py-3">Rp{{ number_format($item->price, 0, ',', '.') }}</td>
                                    <td class="px-4 py-3">
                                        <div class="flex items-center gap-1">
                                            <button type="button" class="decrease-btn bg-gray-200 px-2 rounded" data-id="{{ $item->id }}">−</button>
                                            <input 
                                                type="number" 
                                                min="1"
                                                max="{{ $item->product->stock }}"
                                                value="{{ $item->quantity }}"
                                                class="quantity-input w-16 border px-2 py-1 rounded text-center"
                                                data-id="{{ $item->id }}"
                                                data-stock="{{ $item->product->stock }}"
                                                name="quantity"
                                            >
                                            <button type="button" class="increase-btn bg-gray-200 px-2 rounded" data-id="{{ $item->id }}">+</button>
                                        </div>
                                        <p class="stock-warning text-sm text-red-500 mt-1 hidden">
                                            Maksimal stok hanya {{ $item->product->stock }}
                                        </p>

                                    </td>
                                    <td class="px-4 py-3 font-semibold subtotal">Rp{{ number_format($subtotal, 0, ',', '.') }}</td>
                                    <td class="px-4 py-3">
                                    {{-- BUTTON AKSI --}}   
                                    </form>
                                    {{-- Form delete tetap di luar for  m update --}}
                                    <form action="{{ route('cart.destroy', $item->id) }}" method="POST" class="w-full">
                                        @csrf
                                        @method('DELETE')
                                        <button class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded-md w-full">
                                            Delete
                                        </button>
                                    </form>
                                    </td>
                                </tr>

                            @endforeach
                        </tbody>
                    </table>

                    {{-- Total & Checkout --}}
                    <div class="flex justify-between items-center px-6 py-4 bg-gray-50 border-t">
                        <p class="text-lg font-semibold">Total:<span id="total-amount">Rp{{ number_format($total, 0, ',', '.') }}</span></p>
                        <form action="{{ route('checkout') }}" method="POST" id="checkout-form">
                        @csrf
                        <input type="hidden" name="selected_items" id="selected-items-input">
                        <button type="submit" class="bg-green-500 hover:bg-green-600 text-white font-semibold px-6 py-2 rounded-md">
                            Checkout
                        </button>
                    </form>
                    </div>
                </div>
            @else
                {{-- Jika keranjang kosong --}}
                <div class="text-center py-10">
                    <h3 class="text-xl font-semibold text-gray-700">Your cart is still empty.</h3>
                    <a href="{{ route('homepage.show') }}" class="mt-4 inline-block bg-blue-500 hover:bg-blue-600 text-white px-5 py-2 rounded-md">
                        Shop Now
                    </a>
                </div>
            @endif
        </div>
    @include('components.footer')
    <script>
document.addEventListener("DOMContentLoaded", () => {
    const formatter = new Intl.NumberFormat("id-ID");

    function updateTotal() {
        let total = 0;
        document.querySelectorAll('.select-item:checked').forEach(checkbox => {
            const row = checkbox.closest('tr');
            const q = parseInt(row.querySelector('.quantity-input').value) || 1;
            const p = parseInt(row.dataset.price);
            if (!isNaN(p)) total += q * p;
        });
        document.querySelector('#total-amount').textContent = 'Rp' + formatter.format(total);
    }

    function updateSubtotalAndSend(row, quantity) {
        const input = row.querySelector('.quantity-input');
        const price = parseInt(row.dataset.price);
        const stock = parseInt(input.dataset.stock);
        const warningText = row.querySelector('.stock-warning');

        if (quantity > stock) {
            quantity = stock;
            if (warningText) warningText.classList.remove('hidden');
        } else {
            if (warningText) warningText.classList.add('hidden');
        }

        input.value = quantity;

        // Update subtotal
        const subtotalCell = row.querySelector('.subtotal');
        if (subtotalCell) {
            subtotalCell.textContent = 'Rp' + formatter.format(quantity * price);
        }

        const cartId = input.dataset.id;
        if (!cartId) return;

        fetch(`/cart/${cartId}`, {
            method: 'PUT',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
            },
            body: JSON.stringify({ quantity })
        }).catch((err) => console.error('Gagal update ke server:', err));

        updateTotal();
    }

    // Event: input manual quantity
    document.querySelectorAll('.quantity-input').forEach(input => {
        input.addEventListener('input', (e) => {
            const row = e.target.closest('tr');
            let quantity = parseInt(e.target.value) || 1;
            updateSubtotalAndSend(row, quantity);
        });
    });

    // Event: tombol tambah quantity
    document.querySelectorAll('.increase-btn').forEach(button => {
        button.addEventListener('click', () => {
            const row = button.closest('tr');
            const input = row.querySelector('.quantity-input');
            let quantity = parseInt(input.value) || 1;
            const stock = parseInt(input.dataset.stock);
            if (quantity < stock) {
                quantity++;
                updateSubtotalAndSend(row, quantity);
            }
        });
    });

    // Event: tombol kurang quantity
    document.querySelectorAll('.decrease-btn').forEach(button => {
        button.addEventListener('click', () => {
            const row = button.closest('tr');
            const input = row.querySelector('.quantity-input');
            let quantity = parseInt(input.value) || 1;
            if (quantity > 1) {
                quantity--;
                updateSubtotalAndSend(row, quantity);
            }
        });
    });

    // Event: centang produk
    document.querySelectorAll('.select-item').forEach(box => {
        box.addEventListener('change', updateTotal);
    });

    // Event: checkout submit
    const checkoutForm = document.getElementById('checkout-form');
    if (checkoutForm) {
        checkoutForm.addEventListener('submit', function (e) {
            const selectedBoxes = document.querySelectorAll('.select-item:checked');
            const selectedIds = [];
            let hasOutOfStock = false;

            selectedBoxes.forEach(cb => {
                const row = cb.closest('tr');
                const input = row.querySelector('.quantity-input');
                const stock = parseInt(input.dataset.stock);
                if (stock === 0) {
                    hasOutOfStock = true;
                } else {
                    selectedIds.push(cb.value);
                }
            });
        
            if (selectedIds.length === 0) {
                e.preventDefault();
                alert("Pilih setidaknya 1 produk yang memiliki stok.");
                return;
            }
        
            if (hasOutOfStock) {
                e.preventDefault();
                alert("Ada produk dengan stok kosong. Hapus atau hilangkan centang sebelum checkout.");
                return;
            }
        
            document.getElementById('selected-items-input').value = selectedIds.join(',');
        });

    }
});
</script>
    </body>
    </html>
