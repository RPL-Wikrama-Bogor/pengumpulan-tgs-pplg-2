<template>
    <div class="container">
        <Section1 :data="DataHome"></Section1>
        <Service :data="DataLayanan"></Service>
        <Portfolio :data="DataPortfolio"></Portfolio>
        <Blog :data="DataBlog"></Blog>
        <!-- <section1></Section1> -->
        <!-- <Service></Service> -->
        <!-- <Portfolio ></Portfolio> -->
    </div>
</template>


<script>
import Section1 from '@/components/Beranda/Section1.vue';
import Service from '@/components/Beranda/Service.vue';
import Portfolio from '@/components/Beranda/Portfolio.vue';
import Blog from '@/components/Beranda/Blog.vue';
import { Get } from '@/Api/index.js';

export default {
    components: {
        Section1,
        Service,
        Portfolio,
        Blog,
    },
    data() {
        return {
           DataHome: [],
           DataLayanan: [],
           DataPortfolio: [],
           DataBlog: [],

        }
    },
    // async mounted() {
    //     const response = await Get ('http://localhost:9000/api/home');
    //     console.log (response);
    // },

    // async mounted() {
    //     const response = await Get('http://localhost:9000/api/home');
    //     this.DataHome = response.data;  
    //     console.log (this.DataHome);
    // },

    async created() {
        console.log ('home');   
        // api untuk home
        const response = await Get('http://localhost:9000/api/home');
        this.DataHome = response.data;

        // api untuk layanan
        const responseLayanan = await Get('http://localhost:9000/api/services');
        this.DataLayanan = responseLayanan.data.data;
        
        // api untuk portofolio
        const responsePortfolio = await Get('http://localhost:9000/api/portfolio');
        this.DataPortfolio = responsePortfolio.data.data;

        // api untuk blog
        const responseBlog = await Get('http://localhost:9000/api/blog');
        this.DataBlog = responseBlog.data.data;
    },
}
</script>