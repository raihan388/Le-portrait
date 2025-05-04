<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>DSLR Cameras</title>
  <script src="styles/tailwindcss3.4.1.js"></script>
</head>
<body class="bg-gray-100 text-gray-800 min-h-screen flex flex-col">

  @include('components.navbar')

  <main class="container mx-auto flex flex-col lg:flex-row mt-8 gap-6 px-4 mb-10">
    <!-- Pass data to the main layout -->
    @include('layout.main', compact('description', 'products'))
  </main>

  @include('components.footer')
  @include('components.cart')

</body>
</html>