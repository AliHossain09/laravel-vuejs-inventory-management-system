import './bootstrap';

import { createApp } from 'vue';

const app = createApp({});

import Topbar from './components/backendDashboard/Topbar.vue';
app.component('back-topbar-component', Topbar);

import Sidebar from './components/backendDashboard/Sidebar.vue';
app.component('back-sidebar-component', Sidebar);




app.mount('#backend');