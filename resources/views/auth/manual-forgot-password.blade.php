<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Lupa Password - LePortrait</title>
  <script src="{{ asset('styles/tailwindcss3.4.1.js') }}"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body class="bg-gray-100 font-sans">
  <div class="flex items-center justify-center min-h-screen">
    <div class="w-full max-w-md bg-white p-8 rounded-lg shadow-lg">
      <div class="text-center mb-6">
        <h2 class="text-2xl font-bold text-gray-800">Lupa Password</h2>
        <p class="text-sm text-gray-500">Masukkan email yang terdaftar untuk atur ulang password</p>
      </div>

      <form method="POST" action="{{ route('manual.password.check') }}">
        @csrf

        <div class="mb-5">
          <label for="email" class="block mb-2 text-sm font-medium text-gray-700">Email</label>
          <input type="email" id="email" name="email" required
                class="w-full px-4 py-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-red-500">
          @error('email')
            <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
          @enderror
        </div>

        <div class="mt-6">
          <button type="submit"
                  class="w-full py-3 bg-red-500 hover:bg-red-600 text-white font-semibold rounded-md transition duration-300">
            Lanjut
          </button>
        </div>
      </form>
    </div>
  </div>
</body>
</html>
