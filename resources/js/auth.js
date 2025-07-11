import './bootstrap';

import { createApp } from 'vue';

const app = createApp({});

import Register from './components/auth/Registration.vue';
app.component('register-component', Register);

import Login from './components/auth/Login.vue';
app.component('login-component', Login);




app.mount('#app');