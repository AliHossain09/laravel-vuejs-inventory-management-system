<template>
  <div class="container p-6 bg-white rounded shadow-md mx-auto mt-8 rounded-b-xl">
    <div class="flex items-center justify-between mb-4 border-b-2 shadow-md p-2 rounded-md">
        
      <h2 class="text-xl font-semibold text-gray-700 flex items-center">
        <i class="fas fa-user mr-2"></i> Category Insert
      </h2>
      <a href="/admin/category/index" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded text-sm">
        All Category
      </a>
    </div>

    <!-- Form -->
    <form form @submit.prevent="saveCategory">
      <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        <!-- Full Name -->
        <div>
          <input v-model="form.name" name="name" type="text" placeholder="Category Name"
            class="w-full border border-gray-300 p-2 rounded" />
          <span class="text-red-500 text-sm" v-if="errors.name">{{ errors.name[0] }}</span>
        </div>

        <!-- Description -->
        <div>
          <input v-model="form.description" name="description" type="text" placeholder="Description "
            class="w-full border border-gray-300 p-2 rounded" />
          <span class="text-red-500 text-sm" v-if="errors.description">{{ errors.description[0] }}</span>
        </div>

       </div>

      <!-- Submit Button -->
      <div class="mt-6">
        <button type="submit"
          class="bg-green-600 hover:bg-green-700 text-white px-6 py-2 rounded shadow text-sm">Submit</button>
      </div>
    </form>
  </div>
</template>

 <script>

import axios from 'axios';
import Swal from 'sweetalert2';

export default {
  data() {
    return {
      form: {
       name: '',
        description: '',
        
      },
       errors: {}, // Validation error messages

       
    };
  },
  methods: {
    
    

    saveCategory() {
      axios.post('/api/categories', {
        
        name: this.form.name,
        description: this.form.description
        
      }).then(response => {
  const data = response.data;
  if (data.success) {
    Swal.fire({
      icon: 'success',
      title: 'আপনার category সফলভাবে তৈরি হয়েছে।',
      text: 'category সফলভাবে যুক্ত হয়েছে!',
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 3000,
      timerProgressBar: true,
      background: '#CFF4FC',
      color: '#055160',
      iconColor: '#0d9488',

      didOpen: (toast) => {
        toast.querySelector('.swal2-timer-progress-bar').style.background = '#0d9488';
      },
    });

    // redirect after 3 secounds later
    setTimeout(() => {
      window.location.href = '/admin/category/index';
    }, 3000);
  }
}).catch(error => {
        if (error.response.status === 422) {
        this.errors = error.response.data.errors;

    Swal.fire({
        icon: 'error',
        title: 'অনুগ্রহ করে সব ঘর পূরণ করুন!',
        // title: 'Form validation failed',
        // text: 'Please check the form fields',
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 5000,
        timerProgressBar: true,
        background: '#B6F500', 
        color: '#b00020', 
        iconColor: '#ff0000',
        didOpen: (toast) => {
        toast.querySelector('.swal2-timer-progress-bar').style.background = '#ff0000'; 
        },
        });
        }
        });
    }
  }
};
</script>
