<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <script src="styles/tailwindcss3.4.1.js"></script>
</head>
<body>
    @include('components.navbar')
   
     <div class="container mx-auto flex flex-col lg:flex-row gap-4 px-4 mt-8 mb-10">
    
    <!-- Sidebar -->
    <aside class="w-64   bg-white p-6 pr-6 border-r  ">
      @include('components.sidebar')
    </aside>

    <!-- Konten Utama -->
    <main class="w-full lg:w-3/4">
      <section class="mb-6">
        @yield('title')
      </section>

      <div class="flex flex-col gap-6">
        @yield('produk')
      </div>
    </main>

  </div>
    @include('components.footer')
</body>
</html>