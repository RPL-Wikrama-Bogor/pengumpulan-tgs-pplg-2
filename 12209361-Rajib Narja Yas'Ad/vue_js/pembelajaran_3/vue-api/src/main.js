// import './assets/main.css'

import '@/assets/style.css' 
import { createRouter, createWebHistory } from "vue-router"

import Home from '@/pages/Home.vue'

import { createApp } from 'vue'
import App from './App.vue'

const routes = [
    {
        path: '/',
        component: Home,
    }
];  

const router = createRouter ({
    history: createWebHistory(),
    routes
});

createApp(App).use(router).mount('#app')