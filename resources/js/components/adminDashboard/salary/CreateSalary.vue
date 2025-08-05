<template>
  <div class="container p-6 bg-white rounded shadow-md mx-auto mt-8 rounded-b-xl">
    <div class="flex items-center justify-between mb-4 border-b-2 shadow-md p-2 rounded-md">
        
      <h2 class="text-xl font-semibold text-gray-700 flex items-center">
        <i class="fas fa-user mr-2"></i> Employee Insert
      </h2>
      <a href="/admin/employee/index" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded text-sm">
        All Employee
      </a>
    </div>

    <!-- Form -->
    <form form @submit.prevent="saveEmployee">
      <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        <!-- Full Name -->
        <div>
          <input v-model="form.name" name="name" type="text" placeholder="Full Name"
            class="w-full border border-gray-300 p-2 rounded" />
          <span class="text-red-500 text-sm" v-if="errors.name">{{ errors.name[0] }}</span>
        </div>

        <!-- Email -->
        <div>
          <input v-model="form.email" name="email" type="email" placeholder="Email Address"
            class="w-full border border-gray-300 p-2 rounded" />
          <span class="text-red-500 text-sm" v-if="errors.email">{{ errors.email[0] }}</span>
        </div>

        <!-- Address -->
        <div>
          <input v-model="form.address" name="address" type="text" placeholder="Address"
            class="w-full border border-gray-300 p-2 rounded" />
          <span class="text-red-500 text-sm" v-if="errors.address">{{ errors.address[0] }}</span>
        </div>

        <!-- Salary -->
        <div>
          <input v-model="form.salary" name="salary" type="number" placeholder="Salary"
            class="w-full border border-gray-300 p-2 rounded" />
          <span class="text-red-500 text-sm" v-if="errors.salary">{{ errors.salary[0] }}</span>
        </div>

        <!-- Joining Date -->
        <div>
          <input v-model="form.joining_date" name="joining_date" type="date"
            class="w-full border border-gray-300 p-2 rounded" />
          <span class="text-red-500 text-sm" v-if="errors.joining_date">{{ errors.joining_date[0] }}</span>
        </div>

        <!-- NID Number -->
        <div>
          <input v-model="form.nid" name="nid" type="text" placeholder="NID Number"
            class="w-full border border-gray-300 p-2 rounded" />
          
        </div>
        <!-- shop_id Number -->
        <!-- <div>
          <input v-model="form.shop_id" name="shop_id" type="text" placeholder="shop_id"
            class="w-full border border-gray-300 p-2 rounded" />
          </div> -->


        <!-- //shop_id loop -->
         <!-- <div>
    <select v-model="form.shop_id" class="border p-2 mb-3 w-full">
      <option value="">Select Shop</option>
      <option v-for="shop in shops" :key="shop.id" :value="shop.id">
        {{ shop.name }}
      </option>
    </select>
    <span class="text-red-500" v-if="errors.shop_id">{{ errors.shop_id[0] }}</span>
  </div> -->

        <!-- Image Upload -->
        <div>
            <input @change="handleFileChange"
                    type="file" 
                    name="image" 
                    class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded file:border-0 file:text-sm file:font-semibold file:bg-blue-600 file:text-white hover:file:bg-blue-700" >
                    

        </div>

        <!-- Image Preview -->
        <div v-if="previewImage" class="w-20 h-20">
          <img :src="previewImage" alt="Preview" class="w-full h-full object-cover rounded" />
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
        email: '',
        address: '',
        salary: '',
        joining_date: '',
        nid: '',
        image: null
      },
       errors: {}, // Validation error messages
      shops: [],
       previewImage: null,
    };
  },
  methods: {
    
    handleFileChange(e) {
      this.form.image = e.target.files[0];

      // Preview image
       const reader = new FileReader();
       reader.onload = (e) => {
         this.previewImage = e.target.result;
       };
       reader.readAsDataURL(this.form.image);
    },

    saveEmployee() {
      const formData = new FormData();
      formData.append('name', this.form.name);
      formData.append('email', this.form.email);
      formData.append('address', this.form.address);
      formData.append('salary', this.form.salary);
      formData.append('joining_date', this.form.joining_date);
      formData.append('nid', this.form.nid);
     
      // formData.append('image', this.form.image);
      if (this.form.image) {
        formData.append('image', this.form.image);
        }

      axios.post('/api/employees', formData, {
        headers: {
          'Content-Type': 'multipart/form-data'
        },
      }).then(response => {
  const data = response.data;
  if (data.success) {
    Swal.fire({
      icon: 'success',
      title: 'আপনার একাউন্ট সফলভাবে তৈরি হয়েছে।',
      text: 'কর্মচারী সফলভাবে যুক্ত হয়েছে!',
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
      window.location.href = '/admin/employee/index';
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
    },
    //  async fetchShops() {
    //   const res = await axios.get('/api/shops');
    //   this.shops = res.data;
    // },
  },
  // mounted() {
  //   this.fetchShops();
  // },
};
</script>
