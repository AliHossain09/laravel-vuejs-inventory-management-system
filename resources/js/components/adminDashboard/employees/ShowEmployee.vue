<template>
<div
    class=" container mx-auto max-w-3xl sm:mx-4 xs:mx-2 md:mx-auto lg:mx-auto xl:mx-auto mt-16  bg-white shadow-xl rounded-lg text-gray-900">
    <div class="rounded-t-lg h-32 overflow-hidden">
        <img class="object-cover object-top w-full" src='https://images.unsplash.com/photo-1549880338-65ddcdfd017b?ixlib=rb-1.2.1&q=80&fm=jpg&crop=entropy&cs=tinysrgb&w=400&fit=max&ixid=eyJhcHBfaWQiOjE0NTg5fQ' alt='Mountain'>
    </div>
    <div class="mx-auto w-34 h-34 relative -mt-16 border-4 border-white rounded-full overflow-hidden">
        <img class="object-cover object-center h-32" :src="'/employeeImages/' + employee.image" alt='Employee Image'>
    </div>
    <div class="text-center mt-2">
        <h2 class="font-semibold">{{ employee.name }}</h2>
        <p class="text-gray-500">{{ employee.email }}</p>
    </div>


    <!-- Features List -->
       
         <ul class="my-6 ">
          <div class="md:flex md:justify-around">
            <li class="flex items-center text-black text-sm">
            <svg class="w-4 h-4 mr-2 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
            </svg>
            <strong class="md:pr-2">Address:</strong>
            {{ employee.address }}
          </li>
          <li class="flex items-center text-black text-sm xs:my-1 sm:my-1">
            <svg class="w-4 h-4 mr-2 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
            </svg>
            <strong class="md:pr-2">Salary:</strong>
            {{ employee.salary }} Tk
          </li>
          </div>
          <div class="md:flex md:justify-around">
            <li class="flex items-center text-black text-sm">
            <svg class="w-4 h-4 mr-2 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
            </svg>
            <strong class="md:pr-2">Joining Date:</strong>
            {{ employee.joining_date }}
          </li>
          <li class="flex items-center text-black text-sm xs:mt-1 sm:mt-1">
            <svg class="w-4 h-4 mr-2 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
            </svg>
            <strong class="md:pr-2">NID:</strong>
            {{ employee.nid }}
          </li>
          </div>
        </ul>
       


    <div class="p-4 border-t mx-8 mt-2">
        <a href="/admin/employee/index" class="w-1/2 block mx-auto rounded-full text-center bg-blue-800 hover:bg-blue-700 font-semibold text-white px-6 py-2">Back</a>
    </div>
</div>

</template>

<script>
import axios from 'axios';

export default {
  props: ['id'],
  data() {
    return {
      employee: {},
    };
  },
  methods: {
    getpost(){
      axios.get(`/api/employees/show/${this.id}`).then(res => {
      this.employee = res.data.employee;
    });
    }
    
  },

  mounted() {
    this.getpost();
  }
}

</script>

