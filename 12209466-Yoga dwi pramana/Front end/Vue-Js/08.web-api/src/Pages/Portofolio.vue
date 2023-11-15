<template>
    <div>
        <Portofolio :data="DataPortofolio"></Portofolio>
    </div>
</template>

<script>
    import Portofolio from '@/components/Beranda/Portofolio.vue';
    import { Get } from '@/api/index.js';

    export default {
        components: {
            Portofolio,
        },
        data() {
            return {
                DataPortofolio: [],
            }
        },
        async created() {
        const responsePortofolio = await Get('http://127.0.0.1:9000/api/portfolio');
        this.DataPortofolio = responsePortofolio.data.data;
        }
    }
</script>