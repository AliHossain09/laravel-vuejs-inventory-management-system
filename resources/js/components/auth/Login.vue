<template>
  <div class="container bg-[#ffffffd7] shadow-lg rounded-xl p-10 md:flex w-full relative overflow-hidden">

    <!-- Abstract Background Blobs -->
    <div class="absolute top-0 left-0 w-32 h-32 bg-orange-400 rounded-full mix-blend-multiply filter blur-xl opacity-70 animate-blob"></div>
    <div class="absolute bottom-0 right-0 w-32 h-32 bg-yellow-400 rounded-full mix-blend-multiply filter blur-xl opacity-70 animate-blob animation-delay-2000"></div>

    <div class="flex flex-row justify-baseline w-full">
      <!-- Left Section -->
      <div class="w-1/2">
        <div class="flex items-center space-x-2 mb-6">
          <div class="w-8 h-8 rounded-full bg-gradient-to-r from-orange-400 to-yellow-400"></div>
          <span class="text-orange-500 font-semibold text-lg"> 
            <img class="object-cover w-8 h-8 rounded-full"
                src="https://logos-world.net/wp-content/uploads/2020/06/Instagram-Logo-700x394.png"
                    alt="" aria-hidden="true" /> </span>
        </div>
        <h2 class="text-2xl font-bold mb-2 text-gray-800">Store Inventory Management</h2>
        <p class="text-gray-500 mb-6">Sign in to continue access pages</p>
      </div>

      <!-- Right Section -->
      <div class="w-1/2">
        <form class="space-y-4">
          <!-- Email Input -->
          <input
            v-model="form.email"
            type="email"
            name="email"
            placeholder="Enter Your Email"
            class="w-full border-b-2 border-orange-400 focus:outline-none py-2 text-gray-700 placeholder-gray-400 bg-transparent"
          >
          <p v-if="errors.email" class="text-red-500 text-sm">{{ errors.email[0] }}</p>

          <!-- Password Input -->
          <input
            v-model="form.password"
            type="password"
            name="password"
            placeholder="Enter Your Password"
            class="w-full border-b-2 border-orange-400 focus:outline-none py-2 text-gray-700 placeholder-gray-400 bg-transparent"
          >
          <p v-if="errors.password" class="text-red-500 text-sm">{{ errors.password[0] }}</p>

          <!-- Remember Me & Forgot Password -->
          <div class="flex items-center justify-between">
            <label class="inline-flex items-center">
              <input
                type="checkbox"
                v-model="form.remember"
                class="form-checkbox h-4 w-4 text-orange-500"
              >
              <span class="ml-2 text-sm font-bold text-gray-600">Remember Me</span>
            </label>
            <a href="/forgot" class="text-sm font-bold text-blue-500 hover:underline">Forgot Password?</a>
          </div>

          <!-- Login Button -->
          <button
            @click="userLogin"
            type="button"
            class="w-full py-2 bg-orange-500 hover:bg-orange-600 text-white font-semibold rounded-full"
          >
            Login →
          </button>
          
        </form>

        <!-- Register Link -->
        <span class="mt-4 text-sm block">
          Don't have an account?
          <a href="/register" class="text-blue-500 font-bold hover:underline">Register</a>
        </span>
      </div>
    </div>
  </div>
</template>


<script>

 import axios from 'axios';
import Swal from 'sweetalert2';
export default {
  data() {
    return {
         posts: [],
      form: {
        email: '',
        password: '',
         remember: false 
        
      },
       errors: {} // Validation error messages
    };
  },


  methods: {
    userLogin() {
        console.log(this.form);
  axios.post('/login', {
    email: this.form.email,
    password: this.form.password
  })
    .then(response => {
      const data = response.data;
      if (data.success) {
        Swal.fire({
          icon: 'success',
          title: 'লগইন সফল!',
          text: 'আপনি সফলভাবে লগইন করেছেন।',
          toast: true,
          position: 'top-end',
          timer: 3000,
          background: '#CFF4FC',
          color: '#055160',
          iconColor: '#0d9488',
          showConfirmButton: false,
        });

        setTimeout(() => {
          //  user data save in local storage
    localStorage.setItem('user', JSON.stringify(data.user));
          window.location.href = data.redirect;
        }, 3000);
      }
    })
    .catch(error => {
      if (error.response.status === 422) {
        this.errors = error.response.data.errors;
        Swal.fire({
          icon: 'error',
          title: 'অনুগ্রহ করে সঠিক তথ্য দিন!',
          toast: true,
          position: 'top-end',
          timer: 3000,
          background: '#FFE4E6',
          color: '#B91C1C',
          iconColor: '#EF4444',
          showConfirmButton: false,
        });
      } else if (error.response.status === 401) {
        Swal.fire({
          icon: 'error',
          title: 'ইমেইল বা পাসওয়ার্ড ভুল!',
          toast: true,
          position: 'top-end',
          timer: 3000,
          background: '#FFE4E6',
          color: '#B91C1C',
          iconColor: '#EF4444',
          showConfirmButton: false,
        });
      }
    });
}

  }
};
</script>