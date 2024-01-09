import '@/assets/style.css'
import { createRouter, createWebHistory } from 'vue-router';

import {createApp} from "vue";

import Home from "@/pages/Home.vue";
import Service from "@/pages/Service.vue";
import Portofolio from "@/pages/Portofolio.vue";
import Blog from "@/pages/Blog.vue";

import App from "./App.vue";
const routes =[
    {
        path: "/",
        name: "home",
        component: Home,
    },
    {
        path: "/Service", 
        component: Service,
    },
    {
        path: "/Portofolio", 
        component: Portofolio,
    },
    {
        path: "/Blog", 
        component: Blog,
    },
    
];
const router = createRouter({
    history:createWebHistory(),
    routes,
});
createApp(App).use(router).mount("#app");
