<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>DSLR Camera</title>
  <script src="styles/tailwindcss3.4.1.js"></script>
</head>
<body class="bg-gray-100 text-gray-800 min-h-screen flex flex-col">

@include('components.navbar')

@include('layout.main', [
    'title' => 'DSLR Cameras',
    'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
    'products' => [
      ['name' => 'Canon EOS R6', 'price' => 'Rp 28.500.000', 'rating' => '★ 4.8 (124 ulasan)'],
      ['name' => 'Sony Alpha a7 III', 'price' => 'Rp 25.999.000', 'rating' => '★ 4.7 (98 ulasan)'],
      ['name' => 'Fujifilm X-T4', 'price' => 'Rp 23.750.000', 'rating' => '★ 4.6 (76 ulasan)']
    ]
  ])

  <!-- Footer -->
  @include('components.footer')

</body>
</html>