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
      <forgot-component></forgot-component>
      {{-- <div class="container bg-[#ffffffd7] shadow-lg rounded-xl p-10 md:flex w-full relative overflow-hidden">

    <!-- Background Animation Blobs -->
    <div class="absolute top-0 left-0 w-32 h-32 bg-orange-400 rounded-full mix-blend-multiply filter blur-xl opacity-70 animate-blob"></div>
    <div class="absolute bottom-0 right-0 w-32 h-32 bg-yellow-400 rounded-full mix-blend-multiply filter blur-xl opacity-70 animate-blob animation-delay-2000"></div>

    <div class="flex flex-row justify-between w-full relative z-10">
      <!-- Left Section -->
      <div class="w-1/2 pr-8">
        <div class="flex items-center space-x-2 mb-6">
          <div class="w-8 h-8 rounded-full bg-gradient-to-r from-orange-400 to-yellow-400"></div>
          <span class="text-orange-500 font-semibold text-lg">LOGO</span>
        </div>
        <h2 class="text-2xl font-bold mb-2 text-gray-800">Forgot Your Password?</h2>
        <p class="text-gray-500 mb-6">Enter your email address and we'll send you a password reset link.</p>
      </div>

      <!-- Right Section -->
      <div class="w-1/2">
        <form action="{{ route('password.forgot.post') }}" method="POST"  class="space-y-6">
          @csrf
          
          <!-- Email Input -->
          <div>
            <label class="block text-sm text-gray-600 mb-1">Email Address</label>
            <input
             name="email"
              type="email"
              placeholder="Enter your email"
              class="w-full border-b-2 border-orange-400 focus:outline-none py-2 text-gray-700 placeholder-gray-400 bg-transparent"
            />
            @error('email')
              <p  class="text-red-500 text-sm">{{ $message }}</p>
            @enderror
            
          </div>

          <!-- Submit Button -->
          
            {{-- <a
            href="/resetPassword"
            class= "block w-full text-center py-2 bg-orange-500 hover:bg-orange-600 text-white font-semibold rounded-full"
          >
            Send Reset Link →
          </a> --}}
           {{-- <button type="submit" class= "block w-full text-center py-2 bg-orange-500 hover:bg-orange-600 text-white font-semibold rounded-full">
            Submit →
          </button> --}}
          

          <!-- Back to Login -->
          {{-- <div class="text-sm text-right">
            <a href="/" class="text-blue-500 font-bold hover:underline">← Back to Login</a>
          </div>
        </form>
      </div>
    </div>
  </div> --}} 

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
