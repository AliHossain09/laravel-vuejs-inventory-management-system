<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Admin Dashboard</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <link
      href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="{{ asset('dashboard/css/tailwind.output.css') }}" />
    <script
      src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js"
      defer
    ></script>
    <script src="{{ asset('dashboard/js/init-alpine.js') }}"></script>
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.css"
    />
    <script
      src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"
      defer
    ></script>
    <script src="{{ asset('dashboard/js/init-alpine.js') }}" defer></script>
    <script src="{{ asset('dashboard/js/init-alpine.js') }}" defer></script>

   
      @vite(['resources/css/app.css', 'resources/js/admin.js'])
    
  </head>
  <body>
    <div id="admin" class="flex h-screen bg-gray-100" :class="{ 'overflow-hidden': isSideMenuOpen }">
      
      @yield('sidebar')

        <div class="flex flex-col flex-1 w-full">
        
        
        <header class="z-10 py-4  shadow-md bg-white border-b border-gray-200">

           @yield('topbar')
          
        </header>
        
        
        <main class="h-full overflow-y-auto">

          @yield('content')
          
        </main>
      </div>
    </div>
  </body>
</html>
