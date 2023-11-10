<template>

<div class="container">
  <Beranda :data="DataHome"></Beranda>
  <Portfolio :data="DataPortfolio"></Portfolio>
  <Service :data="DataLayanan"></Service>
  <Blog :data="DataBlog"></Blog>
  test
  </div>
</template>
<script>
import Beranda from '@/components/Beranda/Beranda.vue';
import Service from '@/components/Beranda/Service.vue'
import Portfolio from '@/components/Beranda/Portfolio.vue';
import Blog from '@/components/Beranda/Blog.vue';
import { Get } from '@/Api/index.js';

export default {
  components: {
    Beranda,
    Service,
    Portfolio,
    Blog
  },
  data(){
    return{
        DataHome: [],
        DataLayanan: [],
        DataPortfolio: [],
        DataBlog: []
      }
  },
  async created(){
      // jagajga
      // api untuk home
      const response = await Get('home');
      this.DataHome = response.data;
      console.log(response)
      // this.DataHome = response.data;
      // console.log(response);
      // api untuk layanan
      const responseLayanan = await Get('services');
      this.DataLayanan = responseLayanan.data.data;

      const responsePortfolio = await Get('portfolio');
      this.DataPortfolio = responsePortfolio.data.data;
      
      // const responseContact = await Get('http://127.0.0.1:9000/api/contact');
      // this.DataContact = responseContact.data.data;

      const responseBlog = await Get('blog');
      this.DataBlog = responseBlog.data.data;

    },
}
</script>