<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Checkout')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    @stack('head')
</head>
<body class="bg-gray-100 text-gray-800">

    @include('components.navbar')

    <div class="container mx-auto px-4 py-8">

        {{-- Kontainer untuk konten utama --}}
        @hasSection('content')
            @yield('content')
        @endif

        {{-- Jika kamu pakai section lain seperti sidebar atau produk, bisa ditambahkan di sini --}}
        @hasSection('sidebar')
            <aside>
                @yield('sidebar')
            </aside>
        @endif

        @hasSection('produk')
            <section>
                @yield('produk')
            </section>
        @endif

    </div>

    @include('components.footer')

    @stack('scripts')
</body>
</html>
