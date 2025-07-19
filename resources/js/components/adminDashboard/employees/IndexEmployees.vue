<template>
  <div class="container mx-auto p-6">
    <h2 class="text-2xl font-bold mb-4">All Employees</h2>
    <table class="min-w-full bg-white shadow rounded">
      <thead>
        <tr>
          <th class="p-2">#</th>
          <th class="p-2">Name</th>
          <th class="p-2">Email</th>
          <th class="p-2">Position</th>
          <th class="p-2">Action</th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="(employee, index) in employees" :key="employee.id" class="border-b">
          <td class="p-2">{{ index + 1 }}</td>
          <td class="p-2">{{ employee.name }}</td>
          <td class="p-2">{{ employee.email }}</td>
          <td class="px-5 py-3">
                    <img :src="'/employeeImages/' + employee.image" alt="Image" class="h-12 w-auto rounded shadow" />
                  </td>
          <td class="p-2">
            <a :href="`/admin/employee/show/${employee.id}`" class="text-blue-600">Show</a> |
            <a :href="`/admin/employee/edit/${employee.id}`" class="text-yellow-600">Edit</a> |
            <button @click="deleteEmployee(employee.id)" class="text-red-600">Delete</button>
          </td>
        </tr>
      </tbody>
    </table>
  </div>
</template>

<script>
import axios from 'axios';
import Swal from 'sweetalert2';
export default {
  data() {
    return {
      employees: [],
    };
  },
  methods: {
       getpost() {
      axios.get('/api/employees')
     .then(res => {
       this.employees = res.data.employees;
      }).catch(error => {
          console.error('Error fetching posts:', error);
        })
        
    },
    
     deleteEmployee(id) {
      Swal.fire({
        title: 'Are you sure?',
        text: "This post will be permanently deleted!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#3085d6',
        confirmButtonText: 'Yes, delete it!'
      }).then((result) => {
        if (result.isConfirmed) {
          axios.delete(`/api/employees/${id}`)
            .then(response => {
              if (response.data.success) {
                this.getpost(); // reload list
                Swal.fire('Deleted!', 'The post has been deleted.', 'success');
              }
            })
            .catch(error => {
              console.error(error);
              Swal.fire('Error', 'Something went wrong!', 'error');
            });
        }
      });
    }
  },
   mounted() {
    this.getpost();
  }
}
</script>
