<template>
    <div class="wrap">
        <div class="card">
        <div class="img-wrap">
            <img :src="'/src/assets/img/'+image" alt="" srcset="">
        </div>
        <div class="text-wrap">
            <h2>{{judul}}</h2>
            <slot></slot>
            <div v-html="text"></div>
        </div>
    </div>
 </div>
</template>

<script>
    export default {
        props: ['judul','text','image'],
    }
</script>

<style scoped>
    .wrap{
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        margin-bottom: 5px;
    }
    .card{
        display: flex;
        width: 600px;
        height: auto;
        border-radius: 5px;
        border: 1px solid black;
    }
    .img-wrap{
        width: 35%;
        height: 100%;
        position: relative;
    }
    .text-wrap{
        width: 65%;
        height: 100%;
        padding: 10px;
    }
    .img-wrap img {
        width: 100%;
        height: 100%;
        /* position: absolute; */
    }

</style>