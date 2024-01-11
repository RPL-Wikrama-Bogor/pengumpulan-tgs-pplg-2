<template>
    <div class="container">
        <Beranda :data="DataHome"></Beranda>
        </div>
</template>


<script>
    import Beranda from '@/components/beranda/Beranda.vue' 
    import { Get } from '@/Api/index.js' 
    export default {
        components: {
            Beranda,
        },
        data() {
            return {
                DataHome: [],
            }
        },
        async created() {
            const response = await Get('http://127.0.0.1:9000/api/home')
            this.DataHome = response.data;
        }
    }
</script>