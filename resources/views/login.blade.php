<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>Login</title>
  <script src="{{ asset('styles/tailwindcss3.4.1.js') }}"></script>
</head>
<body class="flex flex-col min-h-screen bg-gray-100 font-sans">
  <!-- Header -->
  <header class="bg-white shadow sticky top-0 z-10">
    <div class="max-w-7xl mx-auto px-4">
      <div class="flex justify-between items-center py-4">
        <a href="#" class="text-2xl font-bold text-gray-800">Le<span class="text-red-500">Portrait</span></a>
      </div>
    </div>
  </header>
  
  <!-- Auth Container -->
  <div class="flex-1 flex justify-center items-center py-10">
    <div class="flex w-full max-w-4xl bg-white rounded-lg shadow-lg overflow-hidden">
      <div class="w-5/12 bg-gray-800 bg-opacity-60 bg-blend-overlay bg-cover bg-center flex flex-col justify-center items-center text-white p-8 text-center" style="background-image: url('public/images/camera2.jpg')">
        <div class="text-3xl font-bold mb-5">Le<span class="text-red-500">Portrait</span></div>
        <h2 class="text-2xl mb-4">Welcome to LePortrait</h2>
        <p class="text-base mb-8 leading-relaxed">Discover the most complete and trusted camera collection. Get the best prices for your dream camera.</p>
      </div>
      
      <div class="w-7/12 p-10">
        <div class="flex mb-8 border-b">
          <div id="login-tab" class="px-4 py-2 text-base font-semibold text-gray-500 cursor-pointer mr-5 transition-all duration-300 border-b-2 border-red-500 text-red-500" onclick="switchTab('login')">Login</div>
          <div id="signup-tab" class="px-4 py-2 text-base font-semibold text-gray-500 cursor-pointer mr-5 transition-all duration-300" onclick="switchTab('signup')">Sign Up</div>
        </div>
        
        <div class="form-container">
          <!-- Login Form -->
          <form method="POST" id="login-form" action="{{ route('login') }}">
            @csrf
            <div class="mb-5">
              <label for="login-email" class="block mb-2 font-medium text-gray-700">Email</label>
              <input type="email" name="email" id="login-email" placeholder="Enter your email" class="w-full px-4 py-3 border border-gray-300 rounded-md text-base focus:border-red-500 focus:outline-none transition duration-300">
            </div>
            
            <div class="mb-5">
              <label for="login-password" class="block mb-2 font-medium text-gray-700">Password</label>
              <input type="password" name="password" id="login-password" placeholder="Enter your password" class="w-full px-4 py-3 border border-gray-300 rounded-md text-base focus:border-red-500 focus:outline-none transition duration-300">
            </div>
            
            <div class="flex items-center mt-4">
              <input type="checkbox" id="remember-me" class="mr-2">
              <label for="remember-me" class="text-sm text-gray-600">Remember me</label>
            </div>
            
            <div class="text-right mt-2">
              <a href="#" class="text-red-500 text-sm">Forgot password?</a>
            </div>
            
            <div class="mt-8">
              <button type="submit" class="w-full py-3 px-6 bg-red-500 text-white font-bold rounded-md hover:bg-red-600 transition duration-300">Login</button>
            </div>

            <div class="mt-6 text-center text-sm text-gray-500">
              Don't have an account? <a href="#" class="text-red-500 font-medium" onclick="switchTab('signup')">Sign up now</a>
            </div>
          </form>
          
          <!-- Signup Form -->
          <form id="signup-form" class="hidden" method="POST" action="{{ route('registrasi') }}">
            @csrf
            <div class="mb-5">
              <label for="signup-name" class="block mb-2 font-medium text-gray-700">Full Name</label>
              <input type="text" id="signup-name" name="name" placeholder="Enter your full name" class="w-full px-4 py-3 border border-gray-300 rounded-md text-base focus:border-red-500 focus:outline-none transition duration-300" required>
            </div>
            
            <div class="mb-5">
              <label for="signup-email" class="block mb-2 font-medium text-gray-700">Email</label>
              <input type="email" id="signup-email" name="email" placeholder="Enter your email" class="w-full px-4 py-3 border border-gray-300 rounded-md text-base focus:border-red-500 focus:outline-none transition duration-300" required>
            </div>
            
            <div class="mb-5">
              <label for="signup-phone" class="block mb-2 font-medium text-gray-700">Phone Number</label>
              <input type="tel" id="signup-phone" name="phone" placeholder="Enter your phone number" class="w-full px-4 py-3 border border-gray-300 rounded-md text-base focus:border-red-500 focus:outline-none transition duration-300" required>
            </div>
            
            <div class="mb-5">
              <label for="signup-password" class="block mb-2 font-medium text-gray-700">Password</label>
              <input type="password" id="signup-password" name="password" placeholder="Create a password (min. 8 characters)" class="w-full px-4 py-3 border border-gray-300 rounded-md text-base focus:border-red-500 focus:outline-none transition duration-300" required>
            </div>
            
            <div class="mb-5">
              <label for="signup-confirm-password" class="block mb-2 font-medium text-gray-700">Confirm Password</label>
              <input type="password" id="signup-confirm-password" name="password_confirmation" placeholder="Confirm your password" class="w-full px-4 py-3 border border-gray-300 rounded-md text-base focus:border-red-500 focus:outline-none transition duration-300" required>
            </div>
            <input type="hidden" name="role" value="pembeli">
            <div class="mt-8">
              <button type="submit" class="w-full py-3 px-6 bg-red-500 text-white font-bold rounded-md hover:bg-red-600 transition duration-300">Sign Up</button>
            </div>
            
            <div class="mt-6 text-center text-sm text-gray-500">
              Already have an account? <a href="#" class="text-red-500 font-medium" onclick="switchTab('login')">Login now</a>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  
  <!-- Footer -->
  <footer class="bg-gray-800 text-white py-5 mt-auto">
    <div class="max-w-7xl mx-auto px-4">
      <div class="text-center text-sm text-gray-300">
        &copy; 2025 Le Portrait. All Rights Reserved.
      </div>
    </div>
  </footer>
  
  <script>
    function switchTab(tab) {
      // Toggle active class on tabs
      if (tab === 'login') {
        document.getElementById('login-tab').classList.add('border-b-2', 'border-red-500', 'text-red-500');
        document.getElementById('signup-tab').classList.remove('border-b-2', 'border-red-500', 'text-red-500');
        document.getElementById('login-form').classList.remove('hidden');
        document.getElementById('login-form').classList.add('block');
        document.getElementById('signup-form').classList.remove('block');
        document.getElementById('signup-form').classList.add('hidden');
      } else {
        document.getElementById('signup-tab').classList.add('border-b-2', 'border-red-500', 'text-red-500');
        document.getElementById('login-tab').classList.remove('border-b-2', 'border-red-500', 'text-red-500');
        document.getElementById('signup-form').classList.remove('hidden');
        document.getElementById('signup-form').classList.add('block');
        document.getElementById('login-form').classList.remove('block');
        document.getElementById('login-form').classList.add('hidden');
      }
    }
  </script>
</body>
</html>