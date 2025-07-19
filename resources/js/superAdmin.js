import './bootstrap';

import { createApp } from 'vue';

const app = createApp({});

import Topbar from './components/superAdminDashboard/Topbar.vue';
app.component('super-admin-topbar-component', Topbar);

import Sidebar from './components/superAdminDashboard/Sidebar.vue';
app.component('super-admin-sidebar-component', Sidebar);




app.mount('#superAdmin');