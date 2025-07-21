<template>
  <div class="max-w-md mx-auto mt-10 bg-gray-200 p-5 rounded-md">
    <h2 class="text-xl font-bold mb-4">Shop Create</h2>
    <form @submit.prevent="submitForm">
      <input v-model="form.name" type="text" placeholder="Shop Name"
             class="w-full border p-2 mb-3" />
      <span class="text-red-500" v-if="errors.name">{{ errors.name[0] }}</span>

      <input v-model="form.admin_id" type="text" placeholder="admin_id"
             class="w-full border p-2 mb-3" />
      <span class="text-red-500" v-if="errors.admin_id">{{ errors.admin_id[0] }}</span>

      <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">
        Save
      </button>
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
      },
      errors: {},
    };
  },
  methods: {
    async submitForm() {
      try {
        await axios.post('/api/shops', this.form);
        Swal.fire('Created!', 'Shop created successfully', 'success');
        this.form.name = '';
        this.errors = {};
      } catch (error) {
        if (error.response && error.response.data.errors) {
          this.errors = error.response.data.errors;
        }
      }
    },
  },
};
</script>
