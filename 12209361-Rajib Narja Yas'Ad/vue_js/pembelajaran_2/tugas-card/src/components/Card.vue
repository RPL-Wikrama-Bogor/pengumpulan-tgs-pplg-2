<template>
        <div class="wrap">
            <div class="card">
                <div class="img-wrap">
                    <img :src="'/src/assets/img/' + image" alt="" srcset="">
                </div>
                <div class="text-wrap">
                    <h3> {{ title }}</h3>
                    <slot></slot>
                    <div v-html="text"></div>
                </div>
            </div>
        </div>
</template>


<script>
    export default {
        props: ['title','text', 'image']
    }
</script>

<style scoped>
    .wrap {
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        margin-bottom: 10px;
    }

    .card {
        width: 600px;
        height: auto;
        border: 10rem ;
        border: 1px solid black;
        border-radius: 10px;
        display: flex;
    }

    .img-wrap {
        width: 35%;
        height: 100%;
        position: relative;
    }

    .text-wrap {
        margin-left: 5px;
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