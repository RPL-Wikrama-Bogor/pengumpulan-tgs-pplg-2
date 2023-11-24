<template>
    <div class="container">
        <Portofolio :data="DataPortofolio"></Portofolio>
    </div>
</template>

<script>
    import Portofolio from '@/components/beranda/Portofolio.vue'
    import { Get } from '@/Api/index.js'
    export default {
        components: {
            Portofolio
        },
        data() {
            return {
                DataPortofolio: [],
                DataCategories: [],
            }
        },
        async created() {
            const responsePortofolio = await Get('http://127.0.0.1:9000/api/portfolio');
            this.DataPortofolio = responsePortofolio.data.data;
            const responseCategories = await Get('http://127.0.0.1:9000/api/categories');
            this.DataCategories = responseCategories.data.data;
        },
    }
</script>