<!DOCTYPE html>
<html>
<head>
    <title>Contoh Gambar dan Style</title>
<script src="{{ asset('styles/tailwindcss3.4.1.js') }}"></script>
</head>
<body>
    <h1 class="text-xl text-red-500">Ini adalah judul H1</h1>
    
    <img src="{{ asset('images/camera1.jpg') }}" alt="Gambar 1" width="300">
    <img src="{{ asset('images/camera2.jpg') }}" alt="Gambar 2" width="300">
</body>
</html>
