<template>
    <div class="wrap d-flex mt-3">
        <div class="card bg-secondary d-flex flex-row">
            <div class="img-wrap">
                <img :src="'/src/assets/img/' +image" alt="" srcset=""/>
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
    //mengambil data dari luar atau file lain
    //nama props == nama bind attibute di componentnya tempat data dikirim
    props: ['judul', 'text', 'image'],
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
        width: 600px;
        height: auto;
        border-radius: 5px;
        border: 1px solid rgb(0, 0, 0);
        display: flex;
        /* position: relative; */
    }

    .img-warp {
        width: 35%;
        height: 100%;
        position: relative;
        
    }

    .text-warp {
        width: 65%;
        height: 100%;
        padding: 10px;
        
    }

    .img-warp img {
        width: 100%;
        height: 100%;
        position: absolute;
    }
</style>