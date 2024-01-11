<template>
    <div class="wrap">
        <div class="card">
            <div class="img-wrap">
                <img :src="'/src/assets/img/'+image" alt="">
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
    export default{
        props: ['image', 'title', 'text']
    }
</script>

<style scoped>
    .wrap{
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        margin-bottom: 3rem;
    }

    .card{
        width: 600px;
        height: auto;
        padding: 10px;
        border-radius: 10px;
        border: 1px solid black;
        box-shadow: 5px 5px 15px 10px gray;
        display: flex;
    }
    .img-wrap{
        width: 35%;
        height: 100%;
        position: relative;
    }
    .text-wrap{
        width: 65%;
        height: 100%;
    }
    .img-wrap img{
        width: 100%;
        width: 100%;
    }

    .text-wrap h3{
        padding-left: 25px;
    }
</style>