<template>
    <div>
        <!-- <Beranda :data="DataHome"></Beranda>
        <Blog :data="DataBlog"></Blog> -->
        <Portofolio :data="DataPortfolio"></Portofolio>
        <!-- <Service :data="DataLayanan"></Service> -->
    </div>
</template>

<script>
// import Beranda from '@/components/Beranda/Beranda.vue';
// import Blog from '@/components/Beranda/Blog.vue';
import Portofolio from '@/components/Beranda/Portofolio.vue';
// import Service from '@/components/Beranda/Service.vue';
import { Get } from '@/Api/index.js';

export default {
    components: {
         Portofolio,
    },
    data() {
        return {
            // DataHome: [],
            // DataBlog: [],
            DataPortfolio: [],
            // DataLayanan: [],
        }
    },
    async created() {
        // const response = await Get('http://127.0.0.1:9000/api/home');
        // this.DataHome = response.data;


        // const responseBlog = await Get('http://localhost:9000/api/blog');
        // this.DataBlog = responseBlog.data.data;


        const responsePortofolio = await Get('http://localhost:9000/api/portfolio');
        this.DataPortfolio = responsePortofolio.data.data;


        // const responseLayanan = await Get('http://localhost:9000/api/services');
        // this.DataLayanan = responseLayanan.data.data;
    },
}
</script>