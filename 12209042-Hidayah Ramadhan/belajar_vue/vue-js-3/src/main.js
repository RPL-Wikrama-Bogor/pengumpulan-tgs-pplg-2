// import './assets/main.css'
import "@/assets/style.css"

import {createRouter, createWebHistory} from "vue-router";

import { createApp } from 'vue'
import App from './App.vue'
import Home from '@/pages/Home.vue'
import Portofolio from '@/pages/Portofolio.vue'
import Blog from '@/pages/Blog.vue'
import Contact from '@/pages/Contact.vue'

const routes = [
    {
        path: '/',
        name: "Home",
        component: Home,
    },
    {
        path: '/portofolio',
        name: "Portofolio",
        component: Portofolio,
    },
    {
        path: '/blog',
        name: "Blog",
        component: Blog,
    },
    {
        path: '/',
        name: "Contact",
        component: Contact,
    },
]

const router = createRouter({
    history: createWebHistory(),
    routes,
});
createApp(App).use(router).mount('#app')
