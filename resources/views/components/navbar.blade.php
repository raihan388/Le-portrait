<header class="bg-white shadow-md border-b">
  <div class="max-w-7xl mx-auto px-4 py-3 flex items-center justify-between">

    <!-- Logo -->
    <a href="{{ route('homepage.show') }}" class="flex items-center gap-2">
      <img src="{{ asset('images/logo.png') }}" alt="Logo" class="h-10 w-auto object-contain">
    </a>

    <!-- Search -->
    <form action="{{ route('produk.search') }}" method="GET" class="hidden md:flex items-center w-1/2 mx-8">
      @csrf
      <input 
        type="text" 
        name="search" 
        placeholder="Search cameras, lenses..." 
        class="w-full px-4 py-2 border border-gray-300 rounded-l-md focus:outline-none focus:ring focus:border-blue-300">
      <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded-r-md hover:bg-red-600">
        Search
      </button>
    </form>

    <!-- User Dropdown -->
    @auth
    @php
      $image = Auth::user()->profile_image 
        ? asset('storage/' . Auth::user()->profile_image)
        : asset('images/default.png');
    @endphp

    <div class="relative group">
      <button class="flex items-center gap-2 focus:outline-none" id="userMenuToggle">
        <img src="{{ $image }}" class="w-8 h-8 rounded-full border object-cover" />
        <span>{{ Auth::user()->name }}</span>
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
        </svg>
      </button>

      <!-- Dropdown -->
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
    @endauth
  </div>

  <!-- Navigation Menu -->
  <nav class="bg-gray-100 border-t">
    <div class="max-w-7xl mx-auto px-4 py-3 flex flex-wrap justify-center gap-6 text-sm font-medium">
      <a href="{{ route('kategori.show','dslr') }}" class="hover:text-blue-600">DSLR Cameras</a>
      <a href="{{ route('kategori.show','mirrorless') }}" class="hover:text-blue-600">Mirrorless</a>
      <a href="{{ route('kategori.show','film') }}" class="hover:text-blue-600">Film</a>
      <a href="{{ route('kategori.show','lenses') }}" class="hover:text-blue-600">Lenses</a>
      <a href="{{ route('kategori.show','flash') }}" class="hover:text-blue-600">Flash Units</a>
      <a href="{{ route('kategori.show','tripods') }}" class="hover:text-blue-600">Tripods</a>
    </div>
  </nav>
</header>


<!-- Dropdown Toggle Script -->
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
         document.getElementById('btnCartToggle').addEventListener('click', function(e) {
    e.preventDefault();
    toggleCart();
  });
    document.getElementById('menuToggle').addEventListener('click', function () {
    const menu = document.getElementById('menu');
    menu.classList.toggle('hidden');
  });
</script>
