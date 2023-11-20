import '@/assets/style.css'
//impor route
import { createRouter, createWebHistory} from"vue-router"
//impor vue
import { createApp } from 'vue'
//base file vue
import App from './App.vue'
//import components pages
import Home from '@/pages/Home.vue'
import Portofolio from '@/pages/Portofolio.vue'
import Blog from '@/pages/Blog.vue'
import Contact from '@/pages/Contact.vue'

//bootstrap
import 'bootstrap/dist/css/bootstrap.css';
//routes
const routes = [
    {
        path:'/',
        name: "home",
        component: Home,              
    },
    {
        path:'/portofolio',
        component: Portofolio,   
    },
    {
        path:'/blog',
        component: Blog,   
    },
    {
        path:'/contact',
        component: Contact,   
    },
];

const router = createRouter({
    history: createWebHistory(),
    routes,
});

createApp(App).use(router).mount('#app')
