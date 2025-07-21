import './bootstrap';

import { createApp } from 'vue';

const app = createApp({});

import Topbar from './components/adminDashboard/Topbar.vue';
app.component('back-topbar-component', Topbar);

import Sidebar from './components/adminDashboard/Sidebar.vue';
app.component('back-sidebar-component', Sidebar);

// Employee
import IndexEmployees from './components/adminDashboard/employees/IndexEmployees.vue';
app.component('index-employee-component', IndexEmployees);

import CreateEmployee from './components/adminDashboard/employees/CreateEmployee.vue';
app.component('create-employee-component', CreateEmployee);

import EditEmployee from './components/adminDashboard/employees/EditEmployee.vue';
app.component('edit-employee-component', EditEmployee);

import ShowEmployee from './components/adminDashboard/employees/ShowEmployee.vue';
app.component('show-employee-component', ShowEmployee);

//Supplier
import IndexSupplier from './components/adminDashboard/suppliers/IndexSuppliers.vue';
app.component('index-supplier-component', IndexSupplier);

import CreateSupplier from './components/adminDashboard/suppliers/CreateSupplier.vue';
app.component('create-supplier-component', CreateSupplier);

import EditSupplier from './components/adminDashboard/suppliers/EditSupplier.vue';
app.component('edit-supplier-component', EditSupplier);

import ShowSupplier from './components/adminDashboard/suppliers/ShowSupplier.vue';
app.component('show-supplier-component', ShowSupplier);

//shop
import CreateShop from './components/adminDashboard/shop/CreateShop.vue';
app.component('create-shop-component', CreateShop);



app.mount('#admin');