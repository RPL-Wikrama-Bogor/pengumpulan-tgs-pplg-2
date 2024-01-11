// import './assets/main.css'
import '@/assets/style.css'

//import route
import {createRouter, createWebHistory} from "vue-router";

//import vue
import { createApp } from 'vue'

//base file vue
import App from './App.vue'

//import components pages
import Home from '@/pages/Home.vue'

const routes = [
    {
        path:'/',
        component: Home,
        name: "Home"
    },
    {
        path:'Portofolio',
        component: Portofolio,
        name: "Portofolio"
    },
    {
        path:'Blog',
        component: Blog,
        name: "Blog"
    },
    {
        path:'Contact',
        component: Contact,
        name: "Contact"
    },

]
const router = createRouter({
    history: createWebHistory(),
    routes,
});

createApp(App).use(router).mount('#app');