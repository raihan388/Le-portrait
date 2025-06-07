<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="styles/tailwindcss3.4.1.js"></script>
</head>
<body>
    @include('components.navbar')
     <div class="container mx-auto flex flex-col lg:flex-row gap-4 px-4 mt-8 mb-10">
    
    <!-- Sidebar -->
    <aside class="w-64 text-center bg-white p-4  pr-8 border-r  ">
      @yield('sidebar')
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
      <div class="max-w-7xl mx-auto p-4 lg:p-8">
        <div class="bg-white rounded-lg shadow-lg overflow-hidden">
          <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 p-6 lg:p-8">
            @yield('content')
          </div>
        </div>
    </div>
  @include('components.footer')


  @stack('scripts')
</body>
</html>