<template>
    <div class="card-service">
        <img :src="Layanan.file" :alt="Layanan.title">
        <h4>{{ Layanan.title }}</h4>
        <p>{{ Layanan.description }}</p>
    </div>
</template>

<script>
    export default {
        props: ['Layanan']
    }
</script>

<style>
.card-service {
    text-align: start;
    min-height: 306px;
    padding: 30px 30px 0 30px;
    box-shadow: 0px 10px 30px black;
    border-radius: 60px 0px 0px 0px;
    background: bisque;
    transition: all 0.5s ease;
    margin: 10px 10px;
}

.card-service img {
    width: 100px;
}

.card-service h4 {
    font-size: 18px;
    line-height: 30px;
    color: #343b4e;
}

.card-service p {
    font-weight: 400;
    color: #827f8d;
    margin: 0 0 10px 0;
}</style>