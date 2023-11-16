// import './assets/main.css'

import { createApp } from 'vue'
import App from './App.vue'

import Btn from '@/components/my_components/button.vue';

const app = createApp(App);
app.component('MyBtn', Btn)
createApp(App).mount('#app')
