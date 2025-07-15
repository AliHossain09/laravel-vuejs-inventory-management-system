<template>
  <div class="container bg-[#ffffffd7] shadow-lg rounded-xl p-10 md:flex w-full relative overflow-hidden">

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
        <form @submit.prevent="submitForgotPassword" class="space-y-6">

          <!-- Email Input -->
          <div>
            <label class="block text-sm text-gray-600 mb-1">Email Address</label>
            <input
              v-model="form.email"
              type="email"
              placeholder="Enter your email"
              class="w-full border-b-2 border-orange-400 focus:outline-none py-2 text-gray-700 placeholder-gray-400 bg-transparent"
            />
            <p v-if="errors.email" class="text-red-500 text-sm mt-1">{{ errors.email[0] }}</p>
          </div>

          <!-- Submit Button -->
          <button
            type="submit"
            class="w-full py-2 bg-orange-500 hover:bg-orange-600 text-white font-semibold rounded-full"
          >
            Send Reset Link →
          </button>

          <!-- Back to Login -->
          <div class="text-sm text-right">
            <a href="/" class="text-blue-500 font-bold hover:underline">← Back to Login</a>
          </div>
        </form>
      </div>
    </div>
  </div>
</template>

<script>
import axios from 'axios'
import Swal from 'sweetalert2'

export default {
  data() {
    return {
      form: {
        email: '',
      },
      errors: {},
    }
  },
  methods: {
    submitForgotPassword() {
      axios.post('/api/forgot-password', this.form)
        .then(response => {
          Swal.fire({
            icon: 'success',
            title: 'Check your email!',
            text: response.data.message || 'A reset link has been sent to your email.',
            toast: true,
            position: 'top-end',
            timer: 3000,
            background: '#CFF4FC',
            color: '#055160',
            iconColor: '#0d9488',
            showConfirmButton: false,
          })

          // ইনপুট ক্লিয়ার এবং error রিসেট
          this.form.email = ''
          this.errors = {}

          // ৩ সেকেন্ড পর redirect
          setTimeout(() => {
            window.location.href = '/'
          }, 3000)
        })
        .catch(error => {
          if (error.response && error.response.status === 422) {
            this.errors = error.response.data.errors
          } else {
            Swal.fire({
              icon: 'error',
              title: 'Something went wrong!',
              text: 'Please try again later.',
              toast: true,
              position: 'top-end',
              timer: 3000,
              background: '#FFE4E6',
              color: '#B91C1C',
              iconColor: '#EF4444',
              showConfirmButton: false,
            })
          }
        })
    }
  }
}
</script>


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
