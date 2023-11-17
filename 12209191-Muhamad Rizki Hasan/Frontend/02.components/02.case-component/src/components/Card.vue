<template>
    <div class="wrap d-flex mt-3">
        <div class="card bg-secondary d-flex flex-row">
            <div class="img-wrap">
                <img :src="'/src/assets/img/' + image" alt="No Copyright Sound">
            </div>
            <div class="text-wrap">
                <h1>{{ judul }}</h1>
                <slot></slot>
                <div v-html="text"></div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        // Mengambil data dari luar / file lain
        // Nama props == nama bind attribute di componentnya tempat data dikirim
        props: ['judul', 'text', 'image']
    }
</script>

<style scoped>
    .wrap {
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        margin-bottom: 20px;
    }
    
    .card {
        display: flex;
        width: 600px;
        height: auto;
        padding: 10px;
        border-radius: 10px;
        border: 3px black solid;
    }
    .img-wrap {
        width: 35%;
        height: 100%;
        position: relative;
    }
    .img-wrap img {
        width: 100%;
        height: 100%;
        /* position: absolute; */
    }

    .text-wrap {
        width: 65%;
        height: 100%;
        padding: 10px;
    }
</style>