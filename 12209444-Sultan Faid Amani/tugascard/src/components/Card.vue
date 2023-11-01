<template>
  <div class="wrap">
    <div class="card">
    <div class="img-wrap">
        <img :src="'/src/assets/img/'+image" alt="">
    </div>
    <div class="text-wrap">
        <h3>{{ judul }}</h3>
        <div v-html="text"></div>
    </div>
    </div>
  </div>
</template>

<script>
    export default {
        //mengambil data dari luar atau file lain
        //nama props == nama bind attribute di componentnya tempat data dikirm
        props: ['judul', 'text', 'image'],
    }
</script>

<style scoped>
.wrap{
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
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
    height: auto;
    position: relative;
}
.text-wrap{
    width: 56%;
    height: 100%;
    padding: 10px;
}
.img-wrap img {
    width: 100%;
    height: 100%;
    
}
</style>