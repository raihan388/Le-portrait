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

  <main class="container mx-auto flex flex-col lg:flex-row mt-8 gap-6 px-4 mb-10">
    <!-- Pass data to the main layout -->
    @include('layout.main', [
      'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit...',
      'products' => [
        [
          'title' => 'Canon EOS R6',
          'price' => 'Rp 28.500.000',
          'rating' => '4.8',
          'reviews' => '124',
          'image' => 'images/canon r6.jpg' // Pastikan file ada di public/images/
        ],
        [
          'title' => 'Sony Alpha a7 III',
          'price' => 'Rp 25.999.000',
          'rating' => '4.7',
          'reviews' => '98',
          'image' => 'images/sony a7iii.jpg'
        ],
        [
          'title' => 'Fujifilm X-T4',
          'price' => 'Rp 23.750.000',
          'rating' => '4.6',
          'reviews' => '76',
          'image' => 'images/fujifilm xt4.jpg'
        ],
        [
          'title' => 'Fujifilm X-T4',
          'price' => 'Rp 23.750.000',
          'rating' => '4.6',
          'reviews' => '76',
          'image' => 'images/fujifilm xt4.jpg'
        ]
      ]
    ])
  </main>

  @include('components.footer')

</body>
</html>