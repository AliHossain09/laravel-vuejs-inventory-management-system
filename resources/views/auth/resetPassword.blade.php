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
      <reset-component></reset-component>
      {{-- <div class="max-w-xl mx-auto bg-white p-6 rounded-xl shadow-md mt-10 relative overflow-hidden">
    <h2 class="text-2xl font-bold text-gray-800 mb-4">Set new password</h2>
    <p class="text-gray-600 mb-6">Fill out the form with your email and new password.</p>

    <form action="{{ route('password.reset.post') }}" method="POST" class="space-y-4">
      @csrf

      <input type="hidden" name="token" value="{{ $token }}">

      <input
        name="email"
        type="email"
        placeholder="Enter your email"
        class="w-full px-4 py-2 border-b-2 border-orange-400 focus:outline-none text-gray-800"
      />
      {{-- <p v-if="errors.email" class="text-red-500 text-sm">{{ errors.email[0] }}</p> --}}

      {{-- <input
        name="password"
        type="password"
        placeholder="Enter new password"
        class="w-full px-4 py-2 border-b-2 border-orange-400 focus:outline-none text-gray-800"
      />
     

      <button
        type="submit"
        class="w-full py-2 bg-orange-500 hover:bg-orange-600 text-white font-semibold rounded-full"
      >
        Reset Password →
      </button>
    </form>
  </div>  --}}

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
