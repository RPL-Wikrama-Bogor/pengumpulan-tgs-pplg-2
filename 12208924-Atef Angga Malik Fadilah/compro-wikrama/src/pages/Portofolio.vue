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
            }
        },
        async created() {
            const responsePortofolio = await Get('http://127.0.0.1:9000/api/portfolio')
            this.DataPortofolio = responsePortofolio.data.data;
        },

        // beforeCreate() {
        //     console.log(document.querySelector('.portofolio'));

        //     console.log(this.DataPortofolio);
        //     console.log('beforeCreate');
        // },
        // created() {
        //     console.log(document.querySelector('.portofolio'));
        //     console.log(this.DataPortofolio);
        //     console.log('created');
        // },
        // beforeMount() {
        //     console.log(document.querySelector('.portofolio'));
        //     console.log('beforeMount');
        // },
        // mounted() {
        //     console.log('mounted');
        // },
    }
</script>