<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Checkout Success</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="flex items-center justify-center min-h-screen bg-green-100">
  <div class="bg-white p-8 rounded-lg shadow text-center">
    <h1 class="text-3xl font-bold text-green-600 mb-4">Checkout Successful!</h1>
    <p class="text-gray-700">Thank you, {{ $data['first_name'] }} {{ $data['last_name'] }}!</p>
    <p class="text-gray-500 mt-2">Order confirmed to {{ $data['address'] }}.</p>
    <a href="{{ route('checkout.form') }}" class="inline-block mt-6 px-6 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">Back to Home</a>
  </div>
</body>
</html>
