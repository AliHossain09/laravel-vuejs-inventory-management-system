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

            <form class="space-y-3">

                    <input  v-model="form.firstName"
                        type="text" 
                        name="firstName"
                        id="firstName" 
                        placeholder="Enter Your First Name"
                        class="w-full border-b-2 border-orange-400 focus:outline-none py-1 text-gray-700 placeholder-gray-400 bg-transparent" >
                    
                        
                    <input v-model="form.lastName"
                        type="text" 
                        name="lastName"
                        id="lastName" 
                        placeholder="Enter Your Last Name"
                        class="w-full border-b-2 border-orange-400 focus:outline-none py-1 text-gray-700 placeholder-gray-400 bg-transparent" >
                      

                    <input :value="userName"
                        type="text" 
                        name="userName"
                        id="userName" 
                        placeholder="Enter Your User Name"
                        class="w-full border-b-2 border-orange-400 focus:outline-none py-1 text-gray-700 placeholder-gray-400 bg-transparent" >
                   

                    <input  v-model="form.email"
                        type="email" 
                        name="email" 
                        placeholder="Enter Your Email"
                        class="w-full border-b-2 border-orange-400 focus:outline-none py-1 text-gray-700 placeholder-gray-400 bg-transparent" >
                   


                    <input v-model="form.password"
                        type="password" 
                        name="password" 
                        placeholder="Enter Your Password"
                        class="w-full border-b-2 border-orange-400 focus:outline-none py-1 text-gray-700 placeholder-gray-400 bg-transparent" >
                    

                    <input v-model="form.role"
                        type="text" 
                        name="role" 
                        placeholder="Enter Users Role"
                        class="w-full border-b-2 border-orange-400 focus:outline-none py-1 text-gray-700 placeholder-gray-400 bg-transparent" >
                    

                    <input @change="handleFileChange"
                        type="file" 
                        name="image" 
                        class="w-full border-b-2 border-orange-400 focus:outline-none py-1 text-gray-700 placeholder-gray-400 bg-transparent" >
                    

                    <button 
                        type="submit" 
                        class="w-full py-1 text-blue-700 font-semibold rounded-full bg-gradient-to-r from-orange-400 to-orange-600 hover:from-orange-500 hover:to-orange-700 transition"
                    >Registration → 
                    </button>
                </form>
                <p class="mt-4 text-sm"> Already have an account?
                    <a href="/" class="text-blue-500 hover:underline">Login</a>
                </p>
                
            </div>
        </div>

        
       
    

    </div>
</template>


 <script>
export default {
  data() {
    return {
      form: {
        firstName: '',
        lastName: '',
        email: '',
        password: '',
        role: '',
        image: null
      }
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
    // -- Geting Realtime User Name--
    handleFileChange(e) {
      this.form.image = e.target.files[0];
    }
  }
};
</script>