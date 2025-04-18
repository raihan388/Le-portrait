<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'My App')</title>
</head>
<body>
    <header>
        @include('components.header')
    </header>

    <h1>List produk</h1>
    <div class="container">
        @yield('content')
    </div>

    <footer>
        @include('components.footer')
    </footer>
</body>
</html>
