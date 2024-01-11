<template>
<div class="wrap" >
    <div class="card">
        <div class="img-wrap">
            <img :src="'/src/assets/img/' + image" alt="">
        </div>
        <div class="text-wrap">
            <h3>{{ title }}</h3>
            <slot></slot>
            <div v-html="text"></div>
        </div>
    </div>
</div>
</template>

<script>
    export default {
        //mengambil data dari luar atau file lain
        //nama props == nama bind attribute di componentnya tempat data dikirim
        props: ['title', 'text', 'image']
    }
</script>

<style scooped>
    .wrap {
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        margin-bottom: 15px;
    }

    .card {
        display: flex;
        width: 600px;
        height: auto;
        border-radius: 5px 100px 5px 5px;
        background-image: linear-gradient(pink , purple);
    }

    .img-wrap {
        width: 35%;
        height: auto;
        position: relative;
    }

    .text-wrap {
        width: 65%;
        height: 100%;
        padding: 10px 10px 0 10px;
    }

    .img-wrap img {
        width: 100%;
        height: 100%;
        border-radius: 5px 0px 0px 5px;
    }
</style>