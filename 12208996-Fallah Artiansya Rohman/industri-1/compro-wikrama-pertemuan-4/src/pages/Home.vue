<template>

<div class="container">
    <Beranda :data="DataHome"></Beranda>
    <Service :data="DataLayanan"></Service>
    <Portfolio :data="DataPortfolio"></Portfolio>
    <Blog :data="DataBlog"></Blog>
  </div>
</template>
<script>
import Navbar from '@/components/Layouts/Navbar.vue';
import Beranda from '@/components/Beranda/Beranda.vue';
import Service from '@/components/Beranda/Service.vue'
import Portfolio from '@/components/Beranda/Portfolio.vue';
import Blog from '@/components/Beranda/Blog.vue';
import { Get } from '@/Api/index.js';

export default {
  components: {
    Navbar,
    Beranda,
    Service,
    Portfolio,
    Blog
  }
}
</script>

<!-- <template>
  <div class="container">
  <Card :data="DataHome"></Card>

</div>
</template>
<script>
import Card from '@/components/Beranda/Beranda.vue';
import {Get} from '@/Api/index.js';
export default {
components: {
  Card
},
data(){
  return{
    DataHome:[]
  }
},
async created(){
  const response = await Get('http://127.0.0.1:9000/api/home');
  this.DataHome = response.data;  
  console.log(this.DataHome);
}

}
</script> -->