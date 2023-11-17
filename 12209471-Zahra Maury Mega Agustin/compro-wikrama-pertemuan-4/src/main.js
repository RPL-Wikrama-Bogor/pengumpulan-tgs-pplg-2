import "@/assets/style.css";
import { createApp } from "vue";
import App from "./App.vue";
import { createRouter, createWebHistory } from "vue-router";
import Home from "@/pages/Home.vue";
import portofolio from "@/pages/portofolio.vue";

const routes = [
  {
    path: "/",
    component: Home,
  },
  {
  path: "/portofolio",
  component: portofolio,
  }
];
const router = createRouter({
  history: createWebHistory(),
  routes,
});

createApp(App).use(router).mount("#app");
