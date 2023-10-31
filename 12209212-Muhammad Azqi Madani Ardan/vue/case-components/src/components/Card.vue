<template>
<div class="wrap">
    <div class="card">
        <div class="img-wrap">
            <img :src="'/src/assets/img/'+image">    
        </div>
        <div class="text-wrap">
            <h3>{{ judul}}</h3>
            <slot></slot>
            <div v-html="text"></div>
            
        </div>
    </div>
</div>
</template>

<script>
export default {
    // mengambil data dari luar
    props:['judul','text','image']
}

</script>

<style scoped>

.wrap{
    display: flex;
    justify-content: center;
    flex-direction: column;
    align-items: center;
    margin-bottom: 25px;
    margin-right: 20px;
}
.card{
    width: 600px;
    height: auto;
    padding: 10px;
    border-radius: 5px;
    border: 1px solid;
    display: flex;
    padding: 10px;
}

.img-wrap{
    width: 35%;
    height: 100%;
    position: relative;
}

.img-wrap img{
    width: 100%;
    height: 100%;
    position: absolute ;
}


.text-wrap{
    width: 65%;
    height: 100%;
    padding: 7px;
}
</style>