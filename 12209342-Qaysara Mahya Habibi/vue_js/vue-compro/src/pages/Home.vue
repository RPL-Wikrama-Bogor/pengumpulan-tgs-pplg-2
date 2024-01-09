<template>
    <div>
        <Beranda :data="DataHome"></Beranda>
        <Service :data="DataLayanan"></Service>
        <Portfolio :data="DataPortfolio"></Portfolio>
        <Blog :data="DataBlog"></Blog>
    </div>
</template>

<script>
import Beranda from '@/components/Beranda/Beranda.vue';
import Service from '@/components/Beranda/Service.vue';
import Portfolio from '@/components/Beranda/Portfolio.vue';
import Blog from '@/components/Beranda/Blog.vue';

import { Get } from '@/Api/index.js';

export default{
    components: {
        Beranda, Blog, Portfolio, Service,
    }, 
    data(){
        return {
            DataHome: [],
            DataLayanan: [],
            DataPortfolio: [],
            DataBlog: []
        }
    },
    async created() {
        // api beranda
        const response = await Get('http://localhost:9000/api/home');
        this.DataHome = response.data;
        // api service
        const responseLayanan = await Get('http://localhost:9000/api/services');
        this.DataLayanan = responseLayanan.data.data;
        //api portfolio
        const responsePortfolio = await Get('http://localhost:9000/api/portfolio');
        this.DataPortfolio = responsePortfolio.data.data;
        //api Blog
        const responseBlog = await Get('http://localhost:9000/api/blog');
        this.DataBlog = responseBlog.data.data;
    },
}
</script>