import './bootstrap';

import { createApp } from 'vue';

const app = createApp({});

import Register from './components/auth/Registration.vue';
app.component('register-component', Register);

import Login from './components/auth/Login.vue';
app.component('login-component', Login);

import Forgot from './components/auth/ForgotPassword.vue';
app.component('forgot-component', Forgot);

import ResetPassword from './components/auth/ResetPassword.vue';
app.component('reset-component', ResetPassword);



app.mount('#app');