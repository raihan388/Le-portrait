<header class="bg-white border-b shadow-sm">
  <div class="container mx-auto flex items-center p-4 gap-4">
    <!-- Logo -->
    <div class="flex-shrink-0">
      <a href="/">
        <img src="images/logo.png" alt="Logo"
             class="h-10 w-auto object-contain hover:opacity-90 transition-opacity">
      </a>
    </div>

    <!-- Tengah: Search Bar -->
    <div class="flex-1 flex justify-center px-4"> <!-- Ditambahkan px-4 untuk spacing -->
      <input type="text" placeholder="Search cameras, lenses, accessories..." 
             class="border px-3 py-2 rounded-md w-full max-w-md focus:outline-none focus:ring-2 focus:ring-gray-300">
    </div>

    <!-- Kanan: Navigation -->
    <nav class="flex items-center gap-4 ml-auto">
      <a href="#" class="hover:text-gray-600 transition-colors">Login</a>
      <a href="#" class="hover:text-gray-600 transition-colors">Sign Up</a>
      <a href="#" class="hover:text-gray-600 transition-colors flex items-center gap-1">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
        </svg>
        <span>Cart (0)</span>
      </a>
    </nav>
  </div>

  <!-- Navigation bawah tetap sama -->
  <nav class="bg-gray-100 border-t">
    <div class="container mx-auto">
      <div class="flex flex-wrap justify-center gap-x-32 gap-y-2 p-5 text-base font-medium text-center">
        <a href="{{ route('dslr') }}" class="hover:text-blue-600 transition-colors">DSLR Cameras</a>
        <a href="{{ route('mirrorless') }}" class="hover:text-blue-600 transition-colors">Mirrorless Camera</a>
        <a href="{{ route('film') }}" class="hover:text-blue-600 transition-colors">Film Cameras</a>
        <a href="{{ route('lenses') }}" class="hover:text-blue-600 transition-colors">Lenses</a>
        <a href="{{ route('flash') }}" class="hover:text-blue-600 transition-colors">Flash units</a>
        <a href="{{ route('tripods') }}" class="hover:text-blue-600 transition-colors">Tripods</a>
      </div>
    </div>
  </nav>
</header>