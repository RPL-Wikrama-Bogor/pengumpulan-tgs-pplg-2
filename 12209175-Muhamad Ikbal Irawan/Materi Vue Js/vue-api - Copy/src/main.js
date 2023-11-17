import '@/assets/style.css'

//import routes
import { createRouter, createWebHistory } from "vue-router"
//import vue
import { createApp } from 'vue'
//import file vue
import App from '@/App.vue'
//import component pages
import Home from '@/pages/Home.vue'

//routing
const routes = [
    {
        path: '/',
        name: "home",
        component: Home
    },
];

const router = createRouter({
    history: createWebHistory(),
    routes
});

createApp(App).use(router).mount('#app')
