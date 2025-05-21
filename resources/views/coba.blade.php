<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Checkout Sederhana</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 text-gray-800">
  <div class="max-w-4xl mx-auto py-10 px-4">
    <h1 class="text-3xl font-bold mb-6">Checkout</h1>
    
    <div class="grid md:grid-cols-2 gap-8">
      
      <!-- Form Pengiriman -->
      <div class="bg-white p-6 rounded-lg shadow">
        <h2 class="text-xl font-semibold mb-4">Informasi Pengiriman</h2>
        <form class="space-y-4">
          <div>
            <label class="block text-sm font-medium">Nama Lengkap</label>
            <input type="text" class="mt-1 w-full p-2 border border-gray-300 rounded" placeholder="Nama Anda" />
          </div>
          <div>
            <label class="block text-sm font-medium">Alamat</label>
            <textarea class="mt-1 w-full p-2 border border-gray-300 rounded" placeholder="Alamat lengkap"></textarea>
          </div>
          <div>
            <label class="block text-sm font-medium">Metode Pembayaran</label>
            <select class="mt-1 w-full p-2 border border-gray-300 rounded">
              <option>Transfer Bank</option>
              <option>Kartu Kredit</option>
              <option>COD</option>
            </select>
          </div>
        </form>
      </div>
      
      <!-- Ringkasan Pesanan -->
      <div class="bg-white p-6 rounded-lg shadow">
        <h2 class="text-xl font-semibold mb-4">Ringkasan Pesanan</h2>
        <div class="space-y-4">
          <div class="flex justify-between">
            <span>Produk A (x1)</span>
            <span>Rp 100.000</span>
          </div>
          <div class="flex justify-between">
            <span>Produk B (x2)</span>
            <span>Rp 200.000</span>
          </div>
          <hr />
          <div class="flex justify-between font-semibold text-lg">
            <span>Total</span>
            <span>Rp 300.000</span>
          </div>
          <button type="submit" class="w-full bg-blue-600 text-white py-2 rounded hover:bg-blue-700 transition">
            Bayar Sekarang
          </button>
        </div>
      </div>
    </div>
  </div>
</body>
</html>
