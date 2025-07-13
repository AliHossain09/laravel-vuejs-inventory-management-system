import './bootstrap';

import { createApp } from 'vue';

const app = createApp({});

import Topbar from './components/frontendDashboard/Topbar.vue';
app.component('front-topbar-component', Topbar);

import Sidebar from './components/frontendDashboard/Sidebar.vue';
app.component('front-sidebar-component', Sidebar);




app.mount('#frontend');