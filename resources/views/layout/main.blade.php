<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Le-Portrait | @yield('title')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script type="text/javascript"
		src="https://app.stg.midtrans.com/snap/snap.js"
    data-client-key="{{ config('midtrans.clientKey') }}"></script>
    @stack('head')
</head>
<body class="bg-gray-100 text-gray-800">

    @include('components.navbar')

    <div class="container mx-auto px-4 py-8">
    <div class="grid grid-cols-1 lg:grid-cols-4 gap-6">
        {{-- Sidebar --}}
        @hasSection('sidebar')
        <aside class="lg:col-span-1 bg-white p-4 rounded shadow h-fit">
            @yield('sidebar')
        </aside>
        @endif

        {{-- Konten Utama --}}
        <div class="lg:col-span-3 space-y-6">
            @hasSection('content')
                <section class="bg-white p-6 rounded shadow">
                    @yield('content')
                </section>
            @endif

            @hasSection('produk')
                <section class="bg-white p-6 rounded shadow">
                    @yield('produk')
                </section>
            @endif
        </div>
    </div>
</div>


    @include('components.footer')

    @stack('scripts')
</body>
</html>
