<template>
    <div class="wrap">
        <div class="card bg-secondary">
            <div class="img-wrap">
                <img :src="'src/assets/img/' + image" alt="">
            </div>
            <div class="text-wrap">
                <h3>{{ judul }}</h3>
                <slot></slot>
               <div v-html="text">

               </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props: ['judul', 'text','image'],
}
</script>

<style scoped>
.wrap {
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
}
.card {
    width: 600px;
    height: auto;
    border-radius: 5px;
    border: 1px solid;
    display: flex;
    margin: 5px;
}
.img-wrap {
    width: 35%;
    position: relative;
}
.text-wrap {
    width: 65%;
    height: 100%;
    margin-left: 10px;
}
.img-wrap img{
    width: 100%;
    height: auto;
    /* position: absolute; */
}
</style>