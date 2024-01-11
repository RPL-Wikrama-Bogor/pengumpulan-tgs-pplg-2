<template>
    <div class="wrap">
        <div class="card">
            <div class="img-wrap">
                <img :src="'/src/assets/img/' + image" alt="" srcset="">
            </div>
            <div class="text-wrap">
                <h3>{{ judul }}</h3>
                <div v-html="text"></div>
                <br>
                <slot></slot>
            <div class="about">
                <img :src="'/src/assets/img/' + image" alt="" srcset="">
                <div class="container">
                    <p>{{ name }}</p>
                    <p class="color">{{ date }}</p>
                </div>
            </div>
        </div>
    </div>
    </div>
</template>
<script>
export default{
    props: ['judul', 'text', 'image', 'name', 'date'],
}
</script>
<style scoped>
.wrap{
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    margin-bottom: 30px;
}
.card{
    display: flex;
    width: 600px;
    height: auto;
    /* padding: 10px; */
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
.img-wrap img{
    width: 100%;
    height: 100%;
    /* position: absolute; */
}
.about{
    display: flex;
    align-items: center;
    padding: 5px;
}
.about img{
    width: 15%;
    height: auto;
    margin-right: 10px;
    border-radius: 50%;
}
p{
    padding: 3px;
    margin: 0;
}
.color{
    color: grey;
    font-size: 12px;
}

</style>