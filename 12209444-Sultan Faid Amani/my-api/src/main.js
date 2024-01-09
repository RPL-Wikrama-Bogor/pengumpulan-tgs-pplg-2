// import './assets/main.css'


import "./assets/style.css"
// import route
import { createRouter, createWebHistory } from 'vue-router'

// import vue
import { createApp } from 'vue'
//import component pages 
import Home from '@/pages/Home.vue'
// base file vue
import App from './App.vue'


import Portofolio from "@/pages/Portofolio.vue"
import Blog from "@/pages/Blog.vue"


// routing
const routes = [

    {
        path: '/',
        component: Home,
        name: 'home',
    },

    {
        path: '/Portofolio',
        component: Portofolio,
        name: 'portofolio',
    },
    {
        path: '/Blog',
        component: Blog,
        name: 'Blog',
    },

];


const router = createRouter({

    history : createWebHistory(),
    routes,

});

createApp(App).use(router).mount('#app')
