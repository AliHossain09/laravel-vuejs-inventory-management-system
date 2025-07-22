<template>
 <!-- Sidebar -->
      <div class="flex flex-col top-14 left-0 w-14 hover:w-64 md:w-64 bg-blue-900 dark:bg-bg-blue-800 h-full text-white transition-all duration-300 border-none z-10 sidebar">

        <div class="hidden md:flex items-center justify-center h-21 px-4 bg-blue-950">
              <span class="text-xl font-semibold text-white">Author Dashboard</span>
        </div>

        <div class="overflow-y-auto overflow-x-hidden flex flex-col justify-between flex-grow">

          

          <ul class="flex flex-col py-4 space-y-1">
            
            <li>
              <a href="#" class="relative flex flex-row items-center h-11 focus:outline-none hover:bg-blue-800 dark:hover:bg-blue-950 text-white-600 hover:text-white-800 border-l-4 border-transparent hover:border-blue-500 dark:hover:border-gray-800 pr-6">
                <span class="inline-flex justify-center items-center ml-4">
                  <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path></svg>
                </span>
                <span class="ml-2 text-xl text-white font-medium tracking-wide truncate">Dashboard</span>
              </a>
            </li>

            <!-- .......................... -->
           <!-- Employ Dropdown -->
<li class="relative px-6 py-3">
  <button
    class="inline-flex items-center justify-between w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
    @click="toggleEmployMenu"
  >
    <span class="inline-flex items-center">
      <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
        <path d="M5 13l4 4L19 7" />
      </svg>
      <span>Employee</span>
    </span>
    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
      <path
        fill-rule="evenodd"
        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
        clip-rule="evenodd"
      />
    </svg>
  </button>

  <transition name="fade">
    <ul
      v-if="isEmployMenuOpen"
      class="p-2 mt-2 space-y-2 overflow-hidden text-sm font-medium text-gray-500 rounded-md shadow-inner bg-gray-50 dark:text-gray-400 dark:bg-blue-950"
      aria-label="submenu"
    >
      <li class="px-2 py-1 hover:text-gray-800 dark:hover:text-gray-200">
        <a href="/employee/create" class="block w-full">Add Employee</a>
      </li>
      <li class="px-2 py-1 hover:text-gray-800 dark:hover:text-gray-200">
        <a href="/employee/index" class="block w-full">All Employee</a>
      </li>
    </ul>
  </transition>
</li>


<!-- Supplier Dropdown -->
<li class="relative px-6 py-3">
  <button
    class="inline-flex items-center justify-between w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
    @click="toggleSupplierMenu"
  >
    <span class="inline-flex items-center">
      <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
        <path d="M4 6h16M4 12h16M4 18h16" />
      </svg>
      <span>Supplier</span>
    </span>
    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
      <path
        fill-rule="evenodd"
        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
        clip-rule="evenodd"
      />
    </svg>
  </button>

  <transition name="fade">
    <ul
      v-if="isSupplierMenuOpen"
      class="p-2 mt-2 space-y-2 overflow-hidden text-sm font-medium text-gray-500 rounded-md shadow-inner bg-gray-50 dark:text-gray-400 dark:bg-blue-950"
      aria-label="submenu"
    >
      <li class="px-2 py-1 hover:text-gray-800 dark:hover:text-gray-200">
        <a href="/supplier/create" class="block w-full">Add Supplier</a>
      </li>
      <li class="px-2 py-1 hover:text-gray-800 dark:hover:text-gray-200">
        <a href="/supplier/index" class="block w-full">All Supplier</a>
      </li>
    </ul>
  </transition>
</li>

<!-- Customer Dropdown -->
<li class="relative px-6 py-3">
  <button
    class="inline-flex items-center justify-between w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
    @click="toggleCustomerMenu"
  >
    <span class="inline-flex items-center">
      <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
        <path d="M4 6h16M4 12h16M4 18h16" />
      </svg>
      <span>Customer</span>
    </span>
    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
      <path
        fill-rule="evenodd"
        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
        clip-rule="evenodd"
      />
    </svg>
  </button>

  <transition name="fade">
    <ul
      v-if="isCustomerMenuOpen"
      class="p-2 mt-2 space-y-2 overflow-hidden text-sm font-medium text-gray-500 rounded-md shadow-inner bg-gray-50 dark:text-gray-400 dark:bg-blue-950"
      aria-label="submenu"
    >
      <li class="px-2 py-1 hover:text-gray-800 dark:hover:text-gray-200">
        <a dashboard-url= "'{{ route('employee.create') }}'" class="block w-full">Add Customer</a>
      </li>
      <li class="px-2 py-1 hover:text-gray-800 dark:hover:text-gray-200">
        <a href="admin/supplier/index" class="block w-full">All Customer</a>
      </li>
    </ul>
  </transition>
</li>

<!-- Products Dropdown -->
<li class="relative px-6 py-3">
  <button
    class="inline-flex items-center justify-between w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
    @click="toggleProductsMenu"
  >
    <span class="inline-flex items-center">
      <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
        <path d="M4 6h16M4 12h16M4 18h16" />
      </svg>
      <span>Products</span>
    </span>
    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
      <path
        fill-rule="evenodd"
        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
        clip-rule="evenodd"
      />
    </svg>
  </button>

  <transition name="fade">
    <ul
      v-if="isProductsMenuOpen"
      class="p-2 mt-2 space-y-2 overflow-hidden text-sm font-medium text-gray-500 rounded-md shadow-inner bg-gray-50 dark:text-gray-400 dark:bg-blue-950"
      aria-label="submenu"
    >
      <li class="px-2 py-1 hover:text-gray-800 dark:hover:text-gray-200">
        <a dashboard-url= "'{{ route('employee.create') }}'" class="block w-full">Add Products</a>
      </li>
      <li class="px-2 py-1 hover:text-gray-800 dark:hover:text-gray-200">
        <a href="admin/supplier/index" class="block w-full">All Products</a>
      </li>
    </ul>
  </transition>
</li>

<!-- Orders Dropdown -->
<li class="relative px-6 py-3">
  <button
    class="inline-flex items-center justify-between w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
    @click="toggleOrdersMenu"
  >
    <span class="inline-flex items-center">
      <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
        <path d="M4 6h16M4 12h16M4 18h16" />
      </svg>
      <span>Orders</span>
    </span>
    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
      <path
        fill-rule="evenodd"
        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
        clip-rule="evenodd"
      />
    </svg>
  </button>

  <transition name="fade">
    <ul
      v-if="isOrdersMenuOpen"
      class="p-2 mt-2 space-y-2 overflow-hidden text-sm font-medium text-gray-500 rounded-md shadow-inner bg-gray-50 dark:text-gray-400 dark:bg-blue-950"
      aria-label="submenu"
    >
      <li class="px-2 py-1 hover:text-gray-800 dark:hover:text-gray-200">
        <a dashboard-url= "'{{ route('employee.create') }}'" class="block w-full">Add Orders</a>
      </li>
      <li class="px-2 py-1 hover:text-gray-800 dark:hover:text-gray-200">
        <a href="admin/supplier/index" class="block w-full">All Orders</a>
      </li>
    </ul>
  </transition>
</li>

<!-- Salary Dropdown -->
<li class="relative px-6 py-3">
  <button
    class="inline-flex items-center justify-between w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
    @click="toggleSalaryMenu"
  >
    <span class="inline-flex items-center">
      <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
        <path d="M4 6h16M4 12h16M4 18h16" />
      </svg>
      <span>Salary</span>
    </span>
    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
      <path
        fill-rule="evenodd"
        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
        clip-rule="evenodd"
      />
    </svg>
  </button>

  <transition name="fade">
    <ul
      v-if="isSalaryMenuOpen"
      class="p-2 mt-2 space-y-2 overflow-hidden text-sm font-medium text-gray-500 rounded-md shadow-inner bg-gray-50 dark:text-gray-400 dark:bg-blue-950"
      aria-label="submenu"
    >
      <li class="px-2 py-1 hover:text-gray-800 dark:hover:text-gray-200">
        <a dashboard-url= "'{{ route('employee.create') }}'" class="block w-full">Add Salary</a>
      </li>
      <li class="px-2 py-1 hover:text-gray-800 dark:hover:text-gray-200">
        <a href="admin/supplier/index" class="block w-full">All Salary</a>
      </li>
    </ul>
  </transition>
</li>

<!-- Expense Dropdown -->
<li class="relative px-6 py-3">
  <button
    class="inline-flex items-center justify-between w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
    @click="toggleExpenseMenu"
  >
    <span class="inline-flex items-center">
      <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
        <path d="M4 6h16M4 12h16M4 18h16" />
      </svg>
      <span>Expense</span>
    </span>
    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
      <path
        fill-rule="evenodd"
        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
        clip-rule="evenodd"
      />
    </svg>
  </button>

  <transition name="fade">
    <ul
      v-if="isExpenseMenuOpen"
      class="p-2 mt-2 space-y-2 overflow-hidden text-sm font-medium text-gray-500 rounded-md shadow-inner bg-gray-50 dark:text-gray-400 dark:bg-blue-950"
      aria-label="submenu"
    >
      <li class="px-2 py-1 hover:text-gray-800 dark:hover:text-gray-200">
        <a dashboard-url= "'{{ route('employee.create') }}'" class="block w-full">Add Expense</a>
      </li>
      <li class="px-2 py-1 hover:text-gray-800 dark:hover:text-gray-200">
        <a href="admin/supplier/index" class="block w-full">All Expense</a>
      </li>
    </ul>
  </transition>
</li>

<!-- Stock Dropdown -->
<li class="relative px-6 py-3">
  <button
    class="inline-flex items-center justify-between w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
    @click="toggleStockMenu"
  >
    <span class="inline-flex items-center">
      <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
        <path d="M4 6h16M4 12h16M4 18h16" />
      </svg>
      <span>Stock</span>
    </span>
    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
      <path
        fill-rule="evenodd"
        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
        clip-rule="evenodd"
      />
    </svg>
  </button>

  <transition name="fade">
    <ul
      v-if="isStockMenuOpen"
      class="p-2 mt-2 space-y-2 overflow-hidden text-sm font-medium text-gray-500 rounded-md shadow-inner bg-gray-50 dark:text-gray-400 dark:bg-blue-950"
      aria-label="submenu"
    >
      <li class="px-2 py-1 hover:text-gray-800 dark:hover:text-gray-200">
        <a dashboard-url= "'{{ route('employee.create') }}'" class="block w-full">Add Stock</a>
      </li>
      <li class="px-2 py-1 hover:text-gray-800 dark:hover:text-gray-200">
        <a href="admin/supplier/index" class="block w-full">All Stock</a>
      </li>
    </ul>
  </transition>
</li>

<!-- Reports Dropdown -->
<li class="relative px-6 py-3">
  <button
    class="inline-flex items-center justify-between w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
    @click="toggleReportsMenu"
  >
    <span class="inline-flex items-center">
      <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
        <path d="M4 6h16M4 12h16M4 18h16" />
      </svg>
      <span>Reports</span>
    </span>
    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
      <path
        fill-rule="evenodd"
        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
        clip-rule="evenodd"
      />
    </svg>
  </button>

  <transition name="fade">
    <ul
      v-if="isReportsMenuOpen"
      class="p-2 mt-2 space-y-2 overflow-hidden text-sm font-medium text-gray-500 rounded-md shadow-inner bg-gray-50 dark:text-gray-400 dark:bg-blue-950"
      aria-label="submenu"
    >
      <li class="px-2 py-1 hover:text-gray-800 dark:hover:text-gray-200">
        <a dashboard-url= "'{{ route('employee.create') }}'" class="block w-full">Add Reports</a>
      </li>
      <li class="px-2 py-1 hover:text-gray-800 dark:hover:text-gray-200">
        <a href="admin/supplier/index" class="block w-full">All Reports</a>
      </li>
    </ul>
  </transition>
</li>
            <!-- ............................... -->
            
            <li>
              <a href="#" class="relative flex flex-row items-center h-11 focus:outline-none hover:bg-blue-800 dark:hover:bg-blue-950 text-white-600 hover:text-white-800 border-l-4 border-transparent hover:border-blue-500 dark:hover:border-gray-800 pr-6">
                <span class="inline-flex justify-center items-center ml-4">
                  <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"></path></svg>
                </span>
                <span class="ml-2 text-md text-white font-medium tracking-wide truncate">Board</span>
                <span class="hidden md:block px-2 py-0.5 ml-auto text-xs font-medium tracking-wide text-blue-500 bg-indigo-50 rounded-full">New</span>
              </a>
            </li>

            <li>
              <a href="#" class="relative flex flex-row items-center h-11 focus:outline-none hover:bg-blue-800 dark:hover:bg-blue-950 text-white-600 hover:text-white-800 border-l-4 border-transparent hover:border-blue-500 dark:hover:border-gray-800 pr-6">
                <span class="inline-flex justify-center items-center ml-4">
                  <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z"></path></svg>
                </span>
                <span class="ml-2 text-md text-white font-medium tracking-wide truncate">Messages</span>
              </a>
            </li>

            <li>
              <a href="#" class="relative flex flex-row items-center h-11 focus:outline-none hover:bg-blue-800 dark:hover:bg-blue-950 text-white-600 hover:text-white-800 border-l-4 border-transparent hover:border-blue-500 dark:hover:border-gray-800 pr-6">
                <span class="inline-flex justify-center items-center ml-4">
                  <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"></path></svg>
                </span>
                <span class="ml-2 text-md text-white font-medium tracking-wide truncate">Notifications</span>
                <span class="hidden md:block px-2 py-0.5 ml-auto text-xs font-medium tracking-wide text-red-500 bg-red-50 rounded-full">1.2k</span>
              </a>
            </li>

            <li class="hidden md:block ">
              <div class="flex  flex-row items-center bg-blue-950 mt-5 h-8 ">
                <div class="text-xl md:pl-3 sm:pl-1 font-medium tracking-wide  text-gray-400 uppercase">Settings</div>
              </div>
            </li>

            <li>
              <a href="#" class="relative flex flex-row items-center h-11 focus:outline-none hover:bg-blue-800 dark:hover:bg-blue-950 text-white-600 hover:text-white-800 border-l-4 border-transparent hover:border-blue-500 dark:hover:border-gray-800 pr-6">
                <span class="inline-flex justify-center items-center ml-4">
                  <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                </span>
                <span class="ml-2 text-md text-white font-medium tracking-wide truncate">Profile</span>
              </a>
            </li>

            <li>
              <a href="#" class="relative flex flex-row items-center h-11 focus:outline-none hover:bg-blue-800 dark:hover:bg-blue-950 text-white-600 hover:text-white-800 border-l-4 border-transparent hover:border-blue-500 dark:hover:border-gray-800 pr-6">
                <span class="inline-flex justify-center items-center ml-4">
                  <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path>
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                  </svg>
                </span>
                <span class="ml-2 text-md text-white font-medium tracking-wide truncate">Settings</span>
              </a>
            </li>

            <!-- More menu items here -->
            <li class="relative px-6 py-3">
            <button
              class="inline-flex items-center justify-between w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
              @click="togglePagesMenu"
            >
              <span class="inline-flex items-center">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                  <path
                    d="M4 5h16M4 13h6v6H4v-6zm12 0h4v6h-4v-6zM4 9h16v2H4V9z"
                  />
                </svg>
                <span class="ml-4">Pages</span>
              </span>
              <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                <path
                  fill-rule="evenodd"
                  d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 011.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                  clip-rule="evenodd"
                />
              </svg>
            </button>

            <!-- Submenu -->
            <transition name="fade">
              <ul
                v-if="isPagesMenuOpen"
                class="p-2 mt-2 space-y-2 overflow-hidden text-sm font-medium text-gray-500 rounded-md shadow-inner bg-gray-50 dark:text-gray-400 dark:bg-gray-900"
                aria-label="submenu"
              >
                <li class="px-2 py-1 hover:text-gray-800 dark:hover:text-gray-200">
                  <a href="pages/login.html" class="w-full block">Login</a>
                </li>
                <li class="px-2 py-1 hover:text-gray-800 dark:hover:text-gray-200">
                  <a href="pages/create-account.html" class="w-full block">Create account</a>
                </li>
                <li class="px-2 py-1 hover:text-gray-800 dark:hover:text-gray-200">
                  <a href="pages/forgot-password.html" class="w-full block">Forgot password</a>
                </li>
                <li class="px-2 py-1 hover:text-gray-800 dark:hover:text-gray-200">
                  <a href="pages/404.html" class="w-full block">404</a>
                </li>
                <li class="px-2 py-1 hover:text-gray-800 dark:hover:text-gray-200">
                  <a href="pages/blank.html" class="w-full block">Blank</a>
                </li>
              </ul>
            </transition>
          </li>

          </ul>


          <p class="mb-14 px-5 py-3 hidden md:block text-center text-xs">Copyright @2025</p>
        </div>
      </div>
      <!-- ./Sidebar -->
</template>



<script>
export default {
  data() {
    return {
      isSideMenuOpen: false, // মোবাইল সাইডবার ওপেন/ক্লোজ কন্ট্রোল করে
      isNotificationsMenuOpen: false, // notification dropdown কন্ট্রোল করে
      isPagesMenuOpen: false, // Pages সাবমেনু টগল করে
       isEmployMenuOpen: false,     // 👈 new
      isSupplierMenuOpen: false,    // 👈 new
      isCustomerMenuOpen: false,    // 👈 new
      isProductsMenuOpen: false,    // 👈 new
      isOrdersMenuOpen: false,    // 👈 new
      isSalaryMenuOpen: false,    // 👈 new
      isExpenseMenuOpen: false,    // 👈 new
      isStockMenuOpen: false,    // 👈 new
      isReportsMenuOpen: false,    // 👈 new

    };
  },
  methods: {
    closeSideMenu() {
      this.isSideMenuOpen = false;
    },
    closeNotificationsMenu() {
      this.isNotificationsMenuOpen = false;
    },
    togglePagesMenu() {
      this.isPagesMenuOpen = !this.isPagesMenuOpen;
    },
    toggleEmployMenu() {
      this.isEmployMenuOpen = !this.isEmployMenuOpen;
    },
    toggleSupplierMenu() {
      this.isSupplierMenuOpen = !this.isSupplierMenuOpen;
    }, 
    toggleCustomerMenu() {
      this.isCustomerMenuOpen = !this.isCustomerMenuOpen;
    },
     toggleProductsMenu() {
      this.isProductsMenuOpen = !this.isProductsMenuOpen;
    },
     toggleOrdersMenu() {
      this.isOrdersMenuOpen = !this.isOrdersMenuOpen;
    },
     toggleSalaryMenu() {
      this.isSalaryMenuOpen = !this.isSalaryMenuOpen;
    },
     toggleExpenseMenu() {
      this.isExpenseMenuOpen = !this.isExpenseMenuOpen;
    },
     toggleStockMenu() {
      this.isStockMenuOpen = !this.isStockMenuOpen;
    },
     toggleReportsMenu() {
      this.isReportsMenuOpen = !this.isReportsMenuOpen;
    }
  }
}
</script>

<style scoped>
.fade-enter-active, .fade-leave-active {
  transition: all 0.3s ease;
}
.fade-enter-from, .fade-leave-to {
  opacity: 0;
  max-height: 0;
}
.fade-enter-to, .fade-leave-from {
  opacity: 1;
  max-height: 300px;
}

.slide-enter-active, .slide-leave-active {
  transition: all 0.3s ease;
}
.slide-enter-from {
  transform: translateX(-100%);
  opacity: 0;
}
.slide-enter-to {
  transform: translateX(0);
  opacity: 1;
}
.slide-leave-to {
  transform: translateX(-100%);
  opacity: 0;
}
</style>
