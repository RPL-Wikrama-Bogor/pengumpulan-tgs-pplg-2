import './assets/style.css';
import {createRouter, createWebHistory} from 'vue-router';

import { createApp } from 'vue';

import Home from "@/components/pages/Home.vue";

import App from "./App.vue";
const routes = [
    {
        path: "/",
        name:"home",
        component: Home,
    },
];
const router = createRouter({
    history: createWebHistory(),
    routes,
});

createApp(App).use(router).mount('#app')
