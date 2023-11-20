<template>
    <div class="container">
    <Beranda :data="DataHome"></Beranda>
    <Service :data="DataLayanan"></Service>
    <Portofolio></Portofolio>
    <Blog></Blog>
</div>
</template>
<script>

import Beranda from '@/components/Beranda/Beranda.vue';
import Service from '@/components/Beranda/Service.vue';
import Portofolio from '@/components/Beranda/Portofolio.vue';
import Blog from '@/components/Beranda/Blog.vue';

import { Get } from '@/Api/index.js';
export default {
    components: {
        Beranda,
        Service,
        Portofolio,
        Blog

    },
    data() {
        return {
            DataHome: []
        }
    },
    async mounted() {
        const response = await Get('http://127.0.0.1:9000/api/home')
        this.DataHome = response.data;
        // console.log(this.DataHome);
        this.DataLayanan = responseLayanan.data.data;
    },
}

</script>