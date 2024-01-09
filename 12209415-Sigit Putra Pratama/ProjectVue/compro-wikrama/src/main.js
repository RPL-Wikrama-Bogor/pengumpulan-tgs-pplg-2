import "@/assets/style.css";
import { createRouter, createWebHistory } from "vue-router";
import { createApp } from "vue";
import Portofolio from "@/pages/Portofolio.vue";
import Home from "@/pages/Home.vue";
import Contact from "@/pages/Contact.vue";

import App from "./App.vue";
import Blog from "@/pages/Blog.vue";
const routes = [
  {
    path: "/",
    component: Home,
  },

  {
    path: "/Portofolio",
    component: Portofolio,
  },

  {
    path: "/Blog",
    component: Blog,
  },
  {
    path: "/Contact",
    name: "Contact",
    component: Contact,
  },
];
const router = createRouter({
  history: createWebHistory(),
  routes,
});
createApp(App).use(router).mount("#app");
