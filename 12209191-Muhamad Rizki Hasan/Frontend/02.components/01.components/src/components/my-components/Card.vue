<template>
    <div class="card-service">
        <img src="@/assets/img/lahyanan.png" alt="service" width="675">
        <h4>{{ title }}</h4>
        <p>{{ description }}</p>
        <slot></slot>
        <button class="btn-service">Detail</button>
        <MyBtn></MyBtn>
    </div>
</template>

<script>
    export default {
        // Mengambil data dari luar / file lain
        // Nama props == nama bind attribute di componentnya tempat data dikirim
        props: ['title', 'description']
    }
</script>

<style scoped>
    .card-service {
        text-align: start;
        min-height: 306px;
        padding: 30px 30px 0 30px;
        box-shadow: 0px 10px 30px rgba(0, 0, 0, 0.05);
        border-radius: 60px 0px 0px 0px;
        background: white;
        transition: all 0.5s ease;
        margin: 10px 10px;
    }

    .card-service h4 {
        font-size: 18px;
        line-height: 10px;
        color: #343b4e;
    }

    .card-service p {
        font-size: 18px;
        color: #827f8d;
        margin: 0 0 10px 0;
    }

    .btn-service {
        margin-top: 10px;
        font-size: 16px;
        font-weight: 400;
        color: white;
        background-color: #4c55c5;
        padding: 15px 20px;
        border: none;
        border-radius: 5px;
    }
    
</style>