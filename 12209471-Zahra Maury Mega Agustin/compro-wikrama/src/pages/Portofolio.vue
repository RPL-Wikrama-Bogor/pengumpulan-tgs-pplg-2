<template>
    <div class="container">
    <Portofolio></Portofolio>
</div>
</template>

<script>
    import Portfolio from '@/components/Beranda/Portofolio.vue';

    export default{
    components: {
        Portfolio, 
    },
    data(){
        return{
            DataPortfolio:[],
        }
    },
    async created() {
    
        // api untuk Blog
        const responsePortfolio = await Get('http://.0.0.1:9000/api/portofolio');
        this.DataPortofolio = responsePortfolio.data.data;        
    },
}
</script>