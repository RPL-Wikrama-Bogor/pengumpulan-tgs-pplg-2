<template>
    <div class="wrap">
      <div class="card bg-secondary">
        <div class="img-wrap">
            <img :src="'/src/assets/img/'+image" alt="" scrcset="">
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
        props: ['title', 'text', 'image'],
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
    display: flex;
    width: 650px;
    height: auto;
    padding: 15px;
    border-radius: 10px;
    border: 2px solid black;
    margin-top: 20px;
}

.img-wrap {
    width: 100%;
    height: 100%;
    position: relative;
}

.text-wrap {
    padding: 10px 10px 0 10px;
    width: 65%;
    height: 100px;
}

.img-wrap img {
    width: 100%;
    height: 100%;
    /* position: absolute; */
}

</style>