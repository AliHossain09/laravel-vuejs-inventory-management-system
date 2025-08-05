<template>
  <div class="container p-6 bg-white rounded shadow-md mx-auto mt-8 rounded-b-xl">
    <div class="flex items-center justify-between mb-4 border-b-2 shadow-md p-2 rounded-md">
        
      <h2 class="text-xl font-semibold text-gray-700 flex items-center">
        <i class="fas fa-user mr-2"></i> Product Edit
      </h2>
      <a href="/admin/product/index" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded text-sm">
        All Product
      </a>
    </div>

    <!-- Form -->
    <form @submit.prevent="updateProduct">
      <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        
        <!-- Products name -->
        <div>
          <label class="text-md font-semibold text-gray-700 flex" for="">Products Name</label>
          <input v-model="form.products_name" name="products_name" type="text" placeholder="Products name"
            class="w-full border border-gray-300 p-2 rounded" />
            
          <span class="text-red-500 text-sm" v-if="errors.products_name">{{ errors.products_name[0] }}</span>
        </div>

        <!-- Products code -->
        <div>
          <label class="text-md font-semibold text-gray-700 flex" for="">Products code</label>
          <input v-model="form.products_code" name="products_code" type="products_code" placeholder="Products code"
            class="w-full border border-gray-300 p-2 rounded" />
          <span class="text-red-500 text-sm" v-if="errors.products_code">{{ errors.products_code[0] }}</span>
        </div>

        <!-- Category id -->
        <div>
          <label class="text-md font-semibold text-gray-700 flex" for="">Category</label>
          <select v-model="form.category_id" class="w-full border border-gray-300 p-2 rounded">
            <option disabled value="">-- Select Category --</option>
            <option v-for="category in categories" :key="category.id" :value="category.id">
              {{ category.name }}
            </option>
          </select>
          <span class="text-red-500 text-sm" v-if="errors.category_id">{{ errors.category_id[0] }}</span>
        </div>

        <!-- Supplier id -->
        <div>
          <label class="text-md font-semibold text-gray-700 flex" for="">Supplier</label>
          <select v-model="form.supplier_id" class="w-full border border-gray-300 p-2 rounded">
            <option disabled value="">-- Select Supplier --</option>
            <option v-for="supplier in suppliers" :key="supplier.id" :value="supplier.id">
              {{ supplier.name }}
            </option>
          </select>
          <span class="text-red-500 text-sm" v-if="errors.supplier_id">{{ errors.supplier_id[0] }}</span>
        </div>
        

        <!-- Buying price -->
        <div>
          <label class="text-md font-semibold text-gray-700 flex" for="">Buying Price</label>
          <input v-model="form.buying_price" name="buying_price" type="text" placeholder="Buying price"
            class="w-full border border-gray-300 p-2 rounded" />
          <span class="text-red-500 text-sm" v-if="errors.buying_price">{{ errors.buying_price[0] }}</span>
        </div>

        <!-- Buying date -->
        <div>
          <label class="text-md font-semibold text-gray-700 flex" for="">Buying Date</label>
          <input v-model="form.buying_date" name="buying_date" type="buying_date" placeholder="Buying date"
            class="w-full border border-gray-300 p-2 rounded" />
          <span class="text-red-500 text-sm" v-if="errors.buying_date">{{ errors.buying_date[0] }}</span>
        </div>

        <!-- Selling price -->
        <div>
          <label class="text-md font-semibold text-gray-700 flex" for="">Selling Price</label>
          <input v-model="form.selling_price" name="selling_price" type="text" placeholder="Selling price"
            class="w-full border border-gray-300 p-2 rounded" />
          <span class="text-red-500 text-sm" v-if="errors.selling_price">{{ errors.selling_price[0] }}</span>
        </div>

        <!-- Unit -->
        <div>
          <label class="text-md font-semibold text-gray-700 flex" for="">Unit</label>
          <input v-model="form.unit" name="unit" type="number" placeholder="Unit"
            class="w-full border border-gray-300 p-2 rounded" />
          <span class="text-red-500 text-sm" v-if="errors.unit">{{ errors.unit[0] }}</span>
        </div>

        <!-- Stock quantity -->
        <div>
          <label class="text-md font-semibold text-gray-700 flex" for="">Stock Quantity</label>
          <input v-model="form.stock_quantity" name="stock_quantity" type="text" placeholder="Stock quantity"
            class="w-full border border-gray-300 p-2 rounded" />
          <span class="text-red-500 text-sm" v-if="errors.stock_quantity">{{ errors.stock_quantity[0] }}</span>
        </div>

        <!-- Shop id -->
        <div>
            <label class="text-md font-semibold text-gray-700 flex" for="">Shop</label>
            <select v-model="form.shop_id" class="w-full border border-gray-300 p-2 rounded">
              <option disabled value="">-- Select Shop --</option>
              <option v-for="shop in shops" :key="shop.id" :value="shop.id">
                {{ shop.name }}
              </option>
            </select>
            <span class="text-red-500 text-sm" v-if="errors.shop_id">{{ errors.shop_id[0] }}</span>
        </div>
        
        <!-- Image Upload -->
        <div>
          <!-- Old Image Preview -->
            <div v-if="oldImage" class="w-27 h-20 md:mb-2 sm:mb-1">
              <img :src="oldImage" alt="OldImage" class="w-full h-full object-cover rounded border-2 border-black" />
            </div>

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
  props: ['id'],
  data() {
    return {
      form: {
        products_name: '',
        products_code: '',
        category_id: '',
        supplier_id: '',
        buying_price: '',
        buying_date: '',
        selling_price: '',
        unit: '',
        stock_quantity: '',
        shop_id: '',
        image: null
      },
       errors: {}, // Validation error messages
       categories: {},
       suppliers: {},
       shops: {},

       previewImage: null,
       oldImage: null,
    };
  },
  created() {
  this.fetchDropdownData();
},
  
  methods: {
  handleFileChange(e) {
    this.form.image = e.target.files[0];

    const oldFileReader = new FileReader();
    oldFileReader.onload = (e) => {
      this.oldImage = e.target.result;
    };
    oldFileReader.readAsDataURL(this.form.image);

    const reader = new FileReader();
    reader.onload = (e) => {
      this.previewImage = e.target.result;
    };
    reader.readAsDataURL(this.form.image);
  },

  fetchPost() {
    axios.get(`/api/products/${this.id}`)
      .then(response => {
        const product = response.data.product;

        this.form.products_name = product.products_name;
        this.form.products_code = product.products_code;
        this.form.category_id = product.category_id;
        this.form.supplier_id = product.supplier_id;
        this.form.buying_price = product.buying_price;
        this.form.buying_date = product.buying_date;
        this.form.selling_price = product.selling_price;
        this.form.unit = product.unit;
        this.form.stock_quantity = product.stock_quantity;
        this.form.shop_id = product.shop_id;
        

        this.oldImage = '/productImages/' + product.image;
      })
      .catch(error => {
        console.error(error);
      });
  },

  updateProduct() {
    const formData = new FormData();
     formData.append('products_name', this.form.products_name);
      formData.append('products_code', this.form.products_code);
      formData.append('category_id', this.form.category_id);
      formData.append('supplier_id', this.form.supplier_id);
      formData.append('buying_price', this.form.buying_price);
      formData.append('buying_date', this.form.buying_date);
      formData.append('selling_price', this.form.selling_price);
      formData.append('unit', this.form.unit);
      formData.append('stock_quantity', this.form.stock_quantity);
      formData.append('shop_id', this.form.shop_id);

    if (this.form.image) {
      formData.append('image', this.form.image);
    }

    axios
      .post(`/api/products/${this.id}?_method=PUT`, formData, {
        headers: {
          'Content-Type': 'multipart/form-data',
        },
      })
      .then((response) => {
        if (response.data.success) {
          Swal.fire({
            icon: 'success',
            title: 'আপনার product সফলভাবে updated হয়েছে।',
            text: 'product সফলভাবে updated হয়েছে!',
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
            window.location.href = '/admin/product/index';
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
  },
  fetchDropdownData() {
    axios.get('/api/dropdowns/product-form').then(response => {
      this.categories = response.data.categories;
      this.suppliers = response.data.suppliers;
      this.shops = response.data.shops;
    });
  },
},

   mounted() {
    this.fetchPost();
  }
};
</script>
