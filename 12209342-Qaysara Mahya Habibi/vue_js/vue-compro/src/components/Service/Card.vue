<template>
    <div class="card-service">
        <img :src="layanan.file" alt="service">
        <h4>{{ layanan.title }}</h4>
        <p>{{ layanan.description }}</p>
    </div>
</template>

<script>
export default {
    props: ['layanan']
}
</script>

<style scoped>
.card-service{
    text-align: start;
    min-height: 306px;
    padding: 30px 30px 0 30px;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05);
    border-radius: 60px 0px 0px 0px;
    background: white;
    transition: all 0.5s ease;
    margin: 10px 10px;
}
.card-service img{
    width: 100px;
}

.card-service h4{
    font-style: 18px;
    line-height: 30px;
}
.card-service p{
    font-weight: 400;
    color: #827f8d;
    margin: 0 0 10px 0;
}
</style>