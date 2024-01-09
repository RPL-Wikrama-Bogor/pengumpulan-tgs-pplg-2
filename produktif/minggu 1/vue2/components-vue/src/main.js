import { createApp } from 'vue'
import App from './App.vue'

import Btn from "@/components/my-components/Buton.vue";

const app = createApp(App);
app.component("MyBtn", Btn);
app.mount("#app");
