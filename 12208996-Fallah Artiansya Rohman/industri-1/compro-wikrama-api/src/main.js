import'@/assets/style.css';
//base file vue
import { createApp } from 'vue';
//import route
import { createRouter, createWebHistory } from "vue-router";
//import components pages
import Home from '@/pages/Home.vue';
//routing
import App from './App.vue';
const routes = [
    {
        path: '/',
        name : Home,
        component: Home,
    }
]

const router = createRouter({
    history: createWebHistory(),
    routes,
});

createApp(App).use(router).mount('#app');
