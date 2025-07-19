import './bootstrap';

import { createApp } from 'vue';

const app = createApp({});

import Topbar from './components/authorDashboard/Topbar.vue';
app.component('front-topbar-component', Topbar);
import Sidebar from './components/authorDashboard/Sidebar.vue';
app.component('front-sidebar-component', Sidebar);



app.mount('#author');