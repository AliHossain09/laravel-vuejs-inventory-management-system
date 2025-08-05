<template>
  <div class="container p-6 bg-white rounded shadow-md mx-auto mt-8 rounded-b-xl">
    <div class="flex items-center justify-between mb-4 border-b-2 shadow-md p-2 rounded-md">
        
      <h2 class="text-xl font-semibold text-gray-700 flex items-center">
        <i class="fas fa-user mr-2"></i> Shop Insert
      </h2>
      <a href="/admin/shops/index" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded text-sm">
        All Shop
      </a>
    </div>

    <!-- Form -->
    <form form @submit.prevent="saveShop">
      <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        <!-- Full Name -->
        <div>
          <input v-model="form.name" name="name" type="text" placeholder="Shop Name"
            class="w-full border border-gray-300 p-2 rounded" />
          <span class="text-red-500 text-sm" v-if="errors.name">{{ errors.name[0] }}</span>
        </div>

        

        <!-- Address -->
        <div>
          <input v-model="form.address" name="address" type="text" placeholder="Address"
            class="w-full border border-gray-300 p-2 rounded" />
          <span class="text-red-500 text-sm" v-if="errors.address">{{ errors.address[0] }}</span>
        </div>

        <!-- phone -->
        <div>
          <input v-model="form.phone" name="phone" type="number" placeholder="phone number"
            class="w-full border border-gray-300 p-2 rounded" />
          <span class="text-red-500 text-sm" v-if="errors.phone">{{ errors.phone[0] }}</span>
        </div>

       <!-- Admin Id -->
        <div>
          <input v-model="form.admin_id" name="admin_id" type="text" placeholder="User_role"
            class="w-full border border-gray-300 p-2 rounded" />
          <span class="text-red-500 text-sm" v-if="errors.admin_id">{{ errors.admin_id[0] }}</span>
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
  props: ['id'],
  data() {
    return {
      form: {
       name: '',
        address: '',
        phone: '',
        admin_id: '',
      },
       errors: {}, // Validation error message
    };
  },
  
  methods: {
  fetchShop() {
    axios.get(`/api/shops/${this.id}`)
      .then(response => {
        const employee = response.data.employee;

        this.form.name = employee.name;
        this.form.email = employee.email;
        this.form.address = employee.address;
        this.form.salary = employee.salary;
        this.form.joining_date = employee.joining_date;
        this.form.nid = employee.nid;
        this.form.shop_id = employee.shop_id;
        

      })
      .catch(error => {
        console.error(error);
      });
  },

  updateShop() {
    

    axios
      .post(`/api/shops/${this.id}?_method=PUT`, {
        
      })
      .then((response) => {
        if (response.data.success) {
          Swal.fire({
            icon: 'success',
            title: 'আপনার একাউন্ট সফলভাবে updated হয়েছে।',
            text: 'কর্মচারী সফলভাবে updated হয়েছে!',
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

          setTimeout(() => {
            window.location.href = '/admin/shops/index';
          }, 3000);
        }
      })
      .catch((error) => {
        if (error.response.status === 422) {
          this.errors = error.response.data.errors;

          Swal.fire({
            icon: 'error',
            title: 'অনুগ্রহ করে সব ঘর পূরণ করুন!',
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
},

   mounted() {
    this.fetchShop();
  }
};
</script>
