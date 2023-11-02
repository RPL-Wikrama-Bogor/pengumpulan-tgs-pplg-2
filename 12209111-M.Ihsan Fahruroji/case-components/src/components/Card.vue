<template>
    <div class="wrap">
        <div class="card bg-secondary">
            <div class="img-wrap">
                <img :src="'/src/assets/img/'+image" alt="" srcset="">
            </div>
            <div class="text-wrap">
                <h3>{{ judul }}</h3>
                <slot></slot>
                <div v-html="text"></div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    // mengambil data dari luar atau file lain
    props: ['judul', 'text', 'image'],
}
</script>

<style scoped>

.wrap{
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    margin-bottom: 15px;
}
.card{
    width: 600px;
    height: auto;
    border-radius: 5px;
    border: 1px solid red;
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
    padding: 10px 10px 0 10px;
    padding-bottom: 0 !important;
}

.img-wrap img{
    width: 100%;
    height: 100%;
    /* position: relative; */
}
</style>