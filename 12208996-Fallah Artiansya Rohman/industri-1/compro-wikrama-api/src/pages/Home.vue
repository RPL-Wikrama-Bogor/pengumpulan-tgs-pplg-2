<template>
    <div class="container">
        <Beranda :data="DataHome"></Beranda>
        <Portofolio :data="DataPortofolio"></Portofolio>
        <Service :data="DataLayanan"></Service>
        <Blog :data="DataBlog"></Blog>
    </div>
</template>

<script>
import Beranda from '@/components/Beranda/Beranda.vue';
import Blog from '@/components/Beranda/Blog.vue';
import Portofolio from '@/components/Beranda/Portofolio.vue';
import Service from '@/components/Beranda/Service.vue';
import { Get } from '@/Api/index.js';
export default {
    components: {
        Beranda, 
        Blog, 
        Portofolio, 
        Service,

    },

    data() {
        return {
            DataHome: [],
            DataLayanan: [],
            DataPortofolio :[],
            DataBlog: []
        }
    },
    async created() {
        //api untuk home
    const response = await Get('http://localhost:9000/api/home');
    console.log(response);
    //api untuk layanan
    const responseLayanan = await Get('http://localhost:9000/api/service');
    this.DataLayanan = responseLayanan.data.data;

    const responsePortofolio = await Get('http://localhost:9000/api/portofolio');
    this.DataPortofolio = responsePortofolio.data.data;

    const responseBlog = await Get('http://localhost:9000/api/blog');
    this.DataBlog = responseBlog.data.data;
    },

}
</script>