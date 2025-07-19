<!-- ShowEmployee.vue -->
<template>
  <div class="max-w-xl mx-auto bg-white p-6 shadow rounded">
    <h2 class="text-xl font-bold mb-4">Employee Details</h2>
    <p><strong>Name:</strong> {{ employee.name }}</p>
    <p><strong>Email:</strong> {{ employee.email }}</p>
    <p><strong>Position:</strong> {{ employee.position }}</p>
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
  mounted() {
    axios.get(`/api/employees/show/${this.id}`).then(res => {
      this.employee = res.data.employee;
    });
  }
}
</script>
