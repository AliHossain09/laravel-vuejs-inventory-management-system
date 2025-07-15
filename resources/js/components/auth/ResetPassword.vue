<template>
  <div class="max-w-xl mx-auto bg-white p-6 rounded-xl shadow-md mt-10 relative overflow-hidden">
    <h2 class="text-2xl font-bold text-gray-800 mb-4">Set new password</h2>
    <p class="text-gray-600 mb-6">Fill out the form with your email and new password.</p>

    <form @submit.prevent="submitResetPassword" class="space-y-4">
      <input
        v-model="form.email"
        type="email"
        placeholder="Enter your email"
        class="w-full px-4 py-2 border-b-2 border-orange-400 focus:outline-none text-gray-800"
      />
      <p v-if="errors.email" class="text-red-500 text-sm">{{ errors.email[0] }}</p>

      <input
        v-model="form.password"
        type="password"
        placeholder="Enter new password"
        class="w-full px-4 py-2 border-b-2 border-orange-400 focus:outline-none text-gray-800"
      />
      <p v-if="errors.password" class="text-red-500 text-sm">{{ errors.password[0] }}</p>

     

      <button
        type="submit"
        class="w-full py-2 bg-orange-500 hover:bg-orange-600 text-white font-semibold rounded-full"
      >
        Reset Password →
      </button>
    </form>
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
        password: '',
        token: ''
      },
      errors: {}
    }
  },
  mounted() {
    // Query string থেকে token ও email extract করা
    const params = new URLSearchParams(window.location.search)
    this.form.token = params.get('token')
    this.form.email = params.get('email') || ''
  },
  methods: {
  submitResetPassword() {
    axios.post('/api/reset-password', this.form)
      .then(response => {
        Swal.fire({
          icon: 'success',
          title: 'পাসওয়ার্ড রিসেট সফল!',
          text: response.data.message || 'আপনার পাসওয়ার্ড সফলভাবে পরিবর্তন হয়েছে।',
          toast: true,
          position: 'top-end',
          timer: 3000,
          background: '#CFF4FC',
          color: '#055160',
          showConfirmButton: false
        })

        // Reset form
        this.form.password = ''
        this.form.password_confirmation = ''
        this.errors = {}

        // Redirect to login page (if needed)
        setTimeout(() => {
          window.location.href = '/' // বা '/login' যদি আলাদা পেজ থাকে
        }, 1500)
      })
      .catch(error => {
        if (error.response && error.response.status === 422) {
          this.errors = error.response.data.errors
        } else {
          Swal.fire({
            icon: 'error',
            title: 'দুঃখিত!',
            text: 'কিছু সমস্যা হয়েছে, পরে আবার চেষ্টা করুন।',
            toast: true,
            position: 'top-end',
            timer: 3000,
            background: '#FFE4E6',
            color: '#B91C1C',
            showConfirmButton: false
          })
        }
      })
  }
}
}
</script>
