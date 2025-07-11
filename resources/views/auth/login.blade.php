<!-- resources/views/auth/login.blade.php -->

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Inventory Login</title>
     <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="shortcut icon" href="projectImages/logo.png" type="image/x-icon">

    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
      @vite(['resources/css/app.css', 'resources/js/auth.js'])
    @endif
  </head>

  <body class="min-h-screen flex items-center justify-center  bg-[url(projectImages/background.png)] bg-contain ">
    <div id="app">
      @if (Request::is('register'))
        <register-component></register-component>
      @else
        <login-component></login-component>
      @endif
    </div>

       {{-- Regisreation Page Animation --}}
    <style>
        @keyframes blob {
            0%, 100% {
                transform: translate(0px, 0px) scale(1);
            }
            33% {
                transform: translate(30px, -50px) scale(1.1);
            }
            66% {
                transform: translate(-20px, 20px) scale(0.9);
            }
        }
        .animate-blob {
            animation: blob 8s infinite;
        }
        .animation-delay-2000 {
            animation-delay: 2s;
        }
    </style>

</html>
