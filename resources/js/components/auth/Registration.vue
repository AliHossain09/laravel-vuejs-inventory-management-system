<template>
    this is register
    <div class="container bg-[#ffffffd7]  shadow-lg rounded-xl p-10 md:flex w-full max-w-4xl relative overflow-hidden">
        
        <!-- Abstract Blobs background) Design Element-->
        <div class="absolute top-0 left-0 w-32 h-32 bg-orange-400 rounded-full mix-blend-multiply filter blur-xl opacity-70 animate-blob"></div>
        <div class="absolute bottom-0 right-0 w-32 h-32 bg-yellow-400 rounded-full mix-blend-multiply filter blur-xl opacity-70 animate-blob animation-delay-2000"></div>

        <div class="flex flex-row justify-baseline w-full ">
            <!-- Logo Section -->
           <div class="w-1/2   flex flex-col justify-center ">
            <div class="mb-6">
                <div class="w-8 h-8 rounded-full bg-gradient-to-r from-orange-400 to-yellow-400"></div>
                <span class="text-orange-500 font-semibold text-lg">LOGO</span>
                
            </div>
            <h2 class="text-2xl font-bold mb-2 text-gray-800">Store Inventory Management</h2>
            <p class="text-gray-500 mb-6">Sign in to continue access pages</p>

           </div>

           <!-- Form Section -->
            <div class="w-1/2">

            <form @submit.prevent="userRegister" class="space-y-3">

                    <input v-model="form.firstName"
                        type="text" 
                        name="firstName"
                        id="firstName" 
                        placeholder="Enter Your First Name"
                        class="w-full border-b-2 border-orange-400 focus:outline-none py-1 text-gray-700 placeholder-gray-400 bg-transparent" >
                    <p v-if="errors.firstName" class="text-red-500 text-sm">{{ errors.firstName[0] }}</p>
                        
                    <input v-model="form.lastName"
                        type="text" 
                        name="lastName"
                        id="lastName" 
                        placeholder="Enter Your Last Name"
                        class="w-full border-b-2 border-orange-400 focus:outline-none py-1 text-gray-700 placeholder-gray-400 bg-transparent" >
                  <p v-if="errors.lastName" class="text-red-500 text-sm">{{ errors.lastName[0] }}</p>
                        <input 
   
                       :value="userName"
                    type="text" 
                        name="userName"
                        id="userName" 
                        placeholder="Enter Your User Name"
                        class="w-full border-b-2 border-orange-400 focus:outline-none py-1 text-gray-700 placeholder-gray-400 bg-transparent" >
                   <p v-if="errors.userName" class="text-red-500 text-sm">{{ errors.userName[0] }}</p>

                    <input  v-model="form.email"
                        type="email" 
                        name="email" 
                        placeholder="Enter Your Email"
                        class="w-full border-b-2 border-orange-400 focus:outline-none py-1 text-gray-700 placeholder-gray-400 bg-transparent" >
                   <p v-if="errors.email" class="text-red-500 text-sm">{{ errors.email[0] }}</p>


                    <input v-model="form.password"
                        type="password" 
                        name="password" 
                        placeholder="Enter Your Password"
                        class="w-full border-b-2 border-orange-400 focus:outline-none py-1 text-gray-700 placeholder-gray-400 bg-transparent" >
                    <p v-if="errors.password" class="text-red-500 text-sm">{{ errors.password[0] }}</p>

                    <input v-model="form.role"
                        type="text" 
                        name="role" 
                        placeholder="Enter Users Role"
                        class="w-full border-b-2 border-orange-400 focus:outline-none py-1 text-gray-700 placeholder-gray-400 bg-transparent" >
                    <p v-if="errors.role" class="text-red-500 text-sm">{{ errors.role[0] }}</p>

                    <input @change="handleFileChange"
                        type="file" 
                        name="image" 
                        class="w-full border-b-2 border-orange-400 focus:outline-none py-1 text-gray-700 placeholder-gray-400 bg-transparent" >
                    

                    <button  
                        type="submit" 
                        class="w-full py-2 bg-orange-500 hover:bg-orange-600 text-white font-semibold rounded-full"
                    >Registration → 
                    </button>
                </form>
                <p class="mt-4 text-sm"> Already have an account?
                    <a href="/" class="text-blue-500 font-bold hover:underline">Login</a>
                </p>
                
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
      form: {
       firstName: '',
       lastName: '',
        userName: '',
        email: '',
        password: '',
        role: '',
        image: null
      },
       errors: {} // Validation error messages
    };
  },

  computed: {
    // --userName computed field--
    userName() {
      const f = this.form.firstName.trim();
      const l = this.form.lastName.trim();
      return `${f}${l}`.replace(/\s+/g, '');
    }
  },

  methods: {
    
    handleFileChange(e) {
      this.form.image = e.target.files[0];
    },

    userRegister() {
      const formData = new FormData();
      formData.append('firstName', this.form.firstName);
      formData.append('lastName', this.form.lastName);
      formData.append('userName', this.userName);
      formData.append('email', this.form.email);
      formData.append('password', this.form.password);
      formData.append('role', this.form.role);
     
      // formData.append('image', this.form.image);
      if (this.form.image) {
        formData.append('image', this.form.image);
        }

      axios.post('/api/register', formData, {
        headers: {
          'Content-Type': 'multipart/form-data'
        },
      }).then(response => {
  const data = response.data;
  if (data.success) {
    Swal.fire({
      icon: 'success',
      title: 'রেজিস্ট্রেশন সম্পন্ন হয়েছে!',
      text: 'আপনার একাউন্ট সফলভাবে তৈরি হয়েছে।',
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

    // ৩ সেকেন্ড পর redirect
    setTimeout(() => {
      window.location.href = '/';
    }, 3000);
  }
})

      


      .catch(error => {
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