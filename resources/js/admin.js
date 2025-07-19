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

import Suppliers from './components/adminDashboard/suppliers/CreateSuppliers.vue';
app.component('show-suppliers-component', Suppliers);



app.mount('#admin');