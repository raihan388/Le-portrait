
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Checkout Success</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="flex items-center justify-center min-h-screen bg-gray-100">
  <div class="bg-white p-10 rounded-lg shadow text-center w-full max-w-xl">
    <h1 class="text-3xl font-bold text-red-500 mb-4">Checkout Successful!</h1>

    {{-- Periksa apakah data ada --}}
    @if ($data)
      <p class="text-gray-700">Thank you, {{ $data['username'] ?? 'Guest' }}.</p>
      <p class="text-gray-700">{{ $data['first_name'] ?? '' }} {{ $data['last_name'] ?? '' }}!</p>
      <p class="text-gray-500 mt-2">Order confirmed to {{ $data['address'] ?? 'Address not available' }}.</p>
    @else
      <p class="text-gray-500">No order data available.</p>
    @endif

    <a href="{{ route('homepage') }}" class="inline-block mt-6 px-6 py-2 bg-red-500 text-white rounded hover:bg-red-600">Back to Home</a>
  </div>
</body>
</html>
