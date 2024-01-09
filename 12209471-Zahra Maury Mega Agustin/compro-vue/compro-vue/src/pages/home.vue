<template>
  <div class="container">
    <Home :data="DataHome"></Home>
    <Service :data="DataService"></Service>
    <Portfolio :data="DataPortfolio"></Portfolio>
    <Blog :data="DataBlog"></Blog>
  </div>
</template>

<script>
import Home from "@/components/home/home.vue";
import Service from "@/components/home/service.vue";
import Portfolio from '@/components/home/portofolio.vue';
import Blog from '@/components/home/blog.vue';
import { Get } from '@/Api/index.js';
export default {
  components: {
    Home,
    Service,
    Portfolio,
    Blog
  },
  data(){
    return {
      DataHome: [],
      DataService: [],
      DataPortfolio: [],
      DataBlog: []
    }
  },
  async mounter(){
    const response = await Get('https://127.0.0.1:9000/api/home');
    this.DataHome = response.data;
    const responseService = await Get('https/127.0.0.1:9000/api/service')
    this.DataService = responseService.data.data
    const responsePortfolio = await Get('https/127.0.0.1:9000/api/portfolio')
    this.DataPortfolio= responsePortfolio.data.data
    const responseBlog = await Get('https/127.0.0.1:9000/api/blog')
    this.DataBlog= responseBlog.data.data
  }
};
</script>