<header class="bg-white border-b shadow-sm">
  <div class="container mx-auto flex items-center p-4 gap-4  ">
    <!-- Logo -->
    <div class="flex items-center">
      <a href="{{ route('homepage.show') }}">
        <img src="images/logo.png" alt="Logo" class="h-10 w-auto object-contain hover:opacity-90 transition-opacity">
      </a>
    </div>
    
    <!-- Search Bar -->
    
    <div class="flex-1 flex justify-center px-4">
      <form action="{{ route('produk.search') }}" method="GET" class="flex items-center">
        <input type="text" 
        name="search" 
        placeholder="Search cameras, lenses, accessories..." 
        class="w-full max-w-md px-3 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-gray-300">
        <button type="submit" 
        class="ml-2 px-4 py-2 bg-red-500 hover:bg-red-600 font-semibold text-white rounded-md transition-colors" value="{{ request('search') }}">
        Search
      </button>
    </form>
  </div>
    <!-- Navigation kanan -->
    <nav class="flex items-center gap-4 ml-auto">
    @auth
    <div class="relative">
        <button id="userMenuToggle" class="flex items-center gap-2 hover:text-gray-600 transition-colors">
          <img src="{{ asset('storage/profile/' . Auth::user()->photo ?? 'default.png') }}"
             alt="Avatar"
             class="w-6 h-6 rounded-full object-cover border">
            {{ Auth::user()->name }}
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
            </svg>
        </button>

        <div id="userMenuDropdown" class="absolute right-0 mt-2 w-48 bg-white border border-gray-200 rounded-md shadow-lg hidden z-50">
            <a href="{{ route('profile') }}" class="flex items-center gap-2 px-4 py-2 hover:bg-gray-100">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.804A9 9 0 1119.121 3.804 9 9 0 015.121 17.804z" />
              </svg>
              Profile
            </a>

            <a href="{{ route('cart.show') }}" class="flex items-center gap-2 px-4 py-2 hover:bg-gray-100">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13l-2.5 7M7 13l2.5 7h5.5l2.5-7" />
              </svg>
              Cart ({{ \App\Models\Cart::where('user_id', auth()->id())->count() }})
            </a>

            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="flex items-center gap-2 w-full text-left px-4 py-2 hover:bg-gray-100">
                  <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7" />
                  </svg>
                  Logout
                </button>
            </form>
        </div>
    </div>

    <script>
        const toggleBtn = document.getElementById('userMenuToggle');
        const dropdown = document.getElementById('userMenuDropdown');

        toggleBtn.addEventListener('click', function (e) {
            e.stopPropagation();
            dropdown.classList.toggle('hidden');
        });

        // Optional: close menu if clicked outside
        document.addEventListener('click', function (e) {
            if (!dropdown.contains(e.target) && !toggleBtn.contains(e.target)) {
                dropdown.classList.add('hidden');
            }
        });
    </script>
    @endauth
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

 <nav class="bg-gray-100 border-t">
  <div class="container mx-auto px-4 py-6">
    
    <!-- Mobile Menu Header -->
    <div class="flex justify-between items-center lg:hidden">
      <h1 class="text-lg font-semibold">Kategori</h1>
      <button id="menuToggle" class="text-gray-600 hover:text-blue-600 focus:outline-none">
        <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2"
          viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round">
          <path d="M4 6h16M4 12h16M4 18h16" />
        </svg>
      </button>
    </div>

    <!-- Menu Links -->
    <div id="menu" class="hidden lg:flex flex-wrap justify-center gap-x-12 gap-y-4 text-base font-medium mt-6 lg:mt-0 ">
      <a href="{{ route('produk.dslr') }}" class="hover:text-blue-600 transition-colors mr-3">DSLR Cameras</a>
      <a href="{{ route('produk.mirrorless') }}" class="hover:text-blue-600 transition-colors mr-3">Mirrorless Cameras</a>
      <a href="{{ route('produk.film') }}" class="hover:text-blue-600 transition-colors mr-3">Film Cameras</a>
      <a href="{{ route('produk.lenses') }}" class="hover:text-blue-600 transition-colors mr-3">Lenses</a>
      <a href="{{ route('produk.flash') }}" class="hover:text-blue-600 transition-colors mr-3">Flash Units</a>
      <a href="{{ route('produk.tripods') }}" class="hover:text-blue-600 transition-colors text-center">Tripods</a>
    </div>

  </div>
</nav>

<!-- Script Toggle -->
<script>
  document.getElementById('menuToggle').addEventListener('click', function () {
    const menu = document.getElementById('menu');
    menu.classList.toggle('hidden');
  });
</script>



  
</header>
