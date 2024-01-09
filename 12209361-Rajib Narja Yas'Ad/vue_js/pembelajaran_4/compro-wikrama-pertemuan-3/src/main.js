import '@/assets/style.css'
import { createApp } from 'vue'
import App from './App.vue'
import { createRouter, createWebHistory } from "vue-router"
import Home from '@/components/pages/Home.vue'
import Portfolio from '@/components/pages/Portfolio.vue'
import Blog from '@/components/pages/Blog.vue'
import Contact from '@/components/pages/Contact.vue'

const routes = [
    {
        path: '/',
        component: Home,
    },
    {
        path: '/portfolio',
        component: Portfolio,
    },
    {
        path: '/blog',
        component: Blog,
    },
    {
        path: '/contact',
        component: Contact,
    },
];  

const router = createRouter ({
    history: createWebHistory(),
    routes
});

createApp(App).use(router).mount('#app')
