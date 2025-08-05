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
import IndexShop from './components/adminDashboard/shop/IndexShops.vue';
app.component('index-shop-component', IndexShop);

import CreateShop from './components/adminDashboard/shop/CreateShop.vue';
app.component('create-shop-component', CreateShop);

import EditShop from './components/adminDashboard/shop/EditShop.vue';
app.component('edit-shop-component', EditShop);

import ShowShop from './components/adminDashboard/shop/ShowShop.vue';
app.component('show-shop-component', ShowShop);


//Product
import IndexProduct from './components/adminDashboard/product/IndexProducts.vue';
app.component('index-product-component', IndexProduct);

import CreateProduct from './components/adminDashboard/product/CreateProduct.vue';
app.component('create-product-component', CreateProduct);

import EditProduct from './components/adminDashboard/product/EditProduct.vue';
app.component('edit-product-component', EditProduct);

import ShowProduct from './components/adminDashboard/product/Show.vue';
app.component('show-product-component', ShowProduct);

//Category
import IndexCategory from './components/adminDashboard/category/IndexCategories.vue';
app.component('index-category-component', IndexCategory);

import CreateCategory from './components/adminDashboard/category/CreateCategories.vue';
app.component('create-category-component', CreateCategory);

import EditCategory from './components/adminDashboard/category/EditCategories.vue';
app.component('edit-category-component', EditCategory);

// //Customer
// import IndexCustomer from './components/adminDashboard/customer/IndexCustomer.vue';
// app.component('index-customer-component', IndexCustomer);

// import CreateCustomer from './components/adminDashboard/customer/CreateCustomer.vue';
// app.component('create-customer-component', CreateCustomer);

// import EditCustomer from './components/adminDashboard/customer/EditCustomer.vue';
// app.component('edit-customer-component', EditCustomer);

// // import ShowCustomer from './components/adminDashboard/customer';
// // app.component('show-customer-component', ShowCustomer);

// //Stock
// import IndexStock from './components/adminDashboard/stock/IndexStocks.vue';
// app.component('index-stock-component', IndexStock);

// import CreateStock from './components/adminDashboard/stock/CreateStock.vue';
// app.component('create-stock-component', CreateStock);

// import EditStock from './components/adminDashboard/stock/EditStock.vue';
// app.component('edit-stock-component', EditStock);

// // import ShowStock from './components/adminDashboard/stock';
// // app.component('show-stock-component', ShowStock);

// //Expense
// import IndexExpense from './components/adminDashboard/expense/IndexExpense.vue';
// app.component('index-expense-component', IndexExpense);

// import CreateExpense from './components/adminDashboard/expense/CreateExpense.vue';
// app.component('create-expense-component', CreateExpense);

// import EditExpense from './components/adminDashboard/expense/EditExpense.vue';
// app.component('edit-expense-component', EditExpense);

// // import ShowExpense from './components/adminDashboard/stock';
// // app.component('show-expense-component', ShowExpense);

// //Report
// import IndexReport from './components/adminDashboard/reports/IndexCategories.vue';
// app.component('index-report-component', IndexReport);

// import CreateReport from './components/adminDashboard/reports/CreateCategories.vue';
// app.component('create-report-component', CreateReport);

// import EditReport from './components/adminDashboard/reports/EditCategories.vue';
// app.component('edit-report-component', EditReport);

// // import ShowReport from './components/adminDashboard/stock';
// // app.component('show-report-component', ShowReport);

// //Salary
// import IndexSalary from './components/adminDashboard/salary/IndexSalarys.vue';
// app.component('index-salary-component', IndexSalary);

// import CreateReport from './components/adminDashboard/salary/CreateSalary.vue';
// app.component('create-salary-component', CreateSalary);

// import EditSalary from './components/adminDashboard/salary/EditSalary.vue';
// app.component('edit-salary-component', EditSalary);

// // import ShowSalary from './components/adminDashboard/salary/ShowSalary.vue';

// //Order
// import IndexOrder from './components/adminDashboard/orders/IndexOrders.vue';
// app.component('index-order-component', IndexOrder);

// import CreateReport from './components/adminDashboard/orders/CreateOrder.vue';
// app.component('create-order-component', CreateOrder);

// import EditOrder from './components/adminDashboard/orders/EditOrder.vue';
// app.component('edit-order-component', EditOrder);

// // import ShowOrder from './components/adminDashboard/orders';
// // app.component('show-order-component', ShowOrder);


app.mount('#admin');