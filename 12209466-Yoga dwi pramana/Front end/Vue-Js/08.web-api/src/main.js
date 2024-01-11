// impor style csst
import '@/assets/style.css'

// import route
import {createRouter, createWebHistory} from 'vue-router';
// import vue
import { createApp } from 'vue'
// base file vue
import App from './App.vue'
// import components pages
import Home from '@/Pages/Home.vue';
import Portofolio from '@/Pages/Portofolio.vue';
import Blog from '@/Pages/Blog.vue';
import Contact from '@/Pages/Contact.vue';


//routing
const routes = [
    {
        path: '/',
        name: "home",
        component: Home,
    },
    {
        path: '/portofolio',
        component: Portofolio,
    },
    {
        path: '/blog',
        component: Blog,
    },
    {
        path: '/contact',
        component: Contact
    }
]

const router = createRouter({
    history: createWebHistory(),
    routes,
});

createApp(App).use(router).mount('#app')
