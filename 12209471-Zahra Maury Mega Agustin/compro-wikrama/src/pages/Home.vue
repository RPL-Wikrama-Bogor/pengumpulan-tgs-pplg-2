<template>
    <div>
    <Beranda :data="DataHome"></Beranda>
    <Service :data="DataLayanan"></Service>
    </div>
</template>

<script>
import Beranda from '@/components/Beranda/Beranda.vue';
import Service from '@/components/Beranda/Service.vue';

import {Get} from '@/api/index.js';
export default{
    components: {
        Beranda, Service,
    },
    data(){
        return{
            DataHome:[],
            DataLayanan:[],
        }
    },
    async created() {
        // api untuk home
        const response = await Get('http://127.0.0.1:9000/api/home');
        this.DataHome = response.data;
        // api untuk layanan
        const responseLayanan = await Get('http://127.0.0.1:9000/api/services');
        this.DataLayanan = responseLayanan.data.data;
    },
}
</script>