<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <script src="styles/tailwindcss3.4.1.js"></script>
</head>
<body class="bg-gray-100 text-gray-800 min-h-screen flex flex-col">
  
  @include('components.navbar')
  <div class="flex-1">
    <div class="mb-6">
      <h1 class="text-2xl font-bold mb-2">apakek</h1>
      <p class="text-gray-600">{{ $description ?? 'Default description if none provided' }}</p>
    </div>
    @include('layout.main')
    
  </div>
  
</body>
</html>