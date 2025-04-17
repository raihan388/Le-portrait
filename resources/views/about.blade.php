<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us - BagItUp</title>

    <!-- Link Tailwind dari lokal -->
    <script src="{{ asset('styles/tailwindcss3.4.1.js') }}"></script>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
</head>
<body class="bg-gray-100 text-gray-800">

    <!-- Header Section -->
    <section class="flex justify-between items-center p-4 bg-white shadow-md">
        <a href="index.html">
            <img src="{{ asset('images/bagitup.png') }}" class="h-12" alt="BagItUp Logo">
        </a>
        <ul class="flex space-x-4">
            <li><a href="index.html" class="hover:text-blue-600">Home</a></li>
            <li><a href="shop.html" class="hover:text-blue-600">Shop</a></li>
            <li><a href="about.html" class="text-blue-600 font-semibold">About Us</a></li>
            <li><a href="contact.html" class="hover:text-blue-600">Contact</a></li>
            <li><a href="user.html"><i class="fa-solid fa-user"></i></a></li>
        </ul>
    </section>

    <!-- About Us Section -->
    <section class="py-10 px-6">
        <div class="max-w-5xl mx-auto bg-white p-6 rounded-lg shadow-lg flex flex-col md:flex-row items-center">
            <img src="{{ asset('images/about.jpeg') }}" alt="About Us Image" class="w-full md:w-1/2 rounded-lg mb-6 md:mb-0 md:mr-6">
            <div>
                <h2 class="text-3xl font-bold text-blue-700 mb-4">About BagItUp</h2>
                <p class="mb-3">Welcome to BagItUp! We specialize in high-quality and trendy bags that suit all your needs. Whether you're looking for casual, formal, or travel bags, we have it all.</p>
                <p class="mb-3">Our mission is to provide stylish, durable, and affordable bags for everyone. We are passionate about design and committed to quality.</p>
                <p>Thank you for choosing BagItUp. Your satisfaction is our priority!</p>
            </div>
        </div>
    </section>

    <!-- Footer Section -->
    <footer class="text-center py-4 bg-white mt-10 shadow-inner">
        <p>&copy; 2025 BagItUp. All rights reserved.</p>
    </footer>

</body>
</html>
