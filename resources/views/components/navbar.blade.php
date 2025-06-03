<header class="bg-white border-b shadow-sm">
  <div class="container mx-auto flex items-center p-4 gap-4  ">
    <!-- Logo -->
    <div class="flex items-center">
      <a href="/homepage">
        <img src="images/logo.png" alt="Logo" class="h-10 w-auto object-contain hover:opacity-90 transition-opacity">
      </a>
    </div>
    
    <!-- Search Bar -->
    <div class="flex-1 flex justify-center px-4">
      <input type="text" placeholder="Search cameras, lenses, accessories..." 
             class="w-full max-w-md px-3 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-gray-300">
    </div>

    <!-- Navigation kanan -->
    <nav class="flex items-center gap-4 ml-auto">
      <a href="/login" class="hover:text-gray-600 transition-colors">Login</a>
      <a href="/signup" class="hover:text-gray-600 transition-colors">Sign Up</a>
      <button id="btnCartToggle" class="flex items-center gap-1 hover:text-gray-600 hover:underline transition-colors relative" type="button">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 
                   1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 
                   014 0z" />
        </svg>
        <span>Cart (0)</span>
      </button>
    </nav>
  </div>
</header>

<script>
  document.getElementById('btnCartToggle').addEventListener('click', function(e) {
    e.preventDefault();
    toggleCart();
  });
</script>

      </a>
    </nav>
  </div>

  <!-- Navigation bawah -->
  <nav class="bg-gray-100 border-t">
    <div class="container mx-auto">
      <div class="flex flex-wrap justify-center gap-x-16 gap-y-2 p-5 text-base font-medium text-center">
        <a href="/dslr" class="hover:text-blue-600 transition-colors">DSLR Cameras</a>
        <a href="/mirrorless" class="hover:text-blue-600 transition-colors">Mirrorless Cameras</a>
        <a href="/film" class="hover:text-blue-600 transition-colors">Film Cameras</a>
        <a href="/lenses" class="hover:text-blue-600 transition-colors">Lenses</a>
        <a href="/flash" class="hover:text-blue-600 transition-colors">Flash Units</a>
        <a href="/tripods" class="hover:text-blue-600 transition-colors">Tripods</a>
      </div>
    </div>
  </nav>

  
</header>
