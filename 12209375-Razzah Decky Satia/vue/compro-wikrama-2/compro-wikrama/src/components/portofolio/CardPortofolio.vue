<template>
    <div class="card-portofolio">
        <img :src="portofolio.file" :alt="portofolio-title">
        <div class="card-portofolio-description">
            <h4>{{ portofolio.title }}</h4>
            <p><span>Clients: </span>{{ portofolio.name }}</p>
        </div>
        <a href="">lihat lebih banyak</a>
     </div>
</template>

<script>
    export default{
        props: ['portofolio']
    }
</script>

<style scoped>

    .card-portofolio {
    text-align: start;
    min-height: 306px;
    box-shadow: 0px 10px 30px rgba(0, 0, 0, 0.1);
    border-radius: 60px 0px 0px 0px;
    background: white;
    transition: all 0.5s ease;
    margin: 10px 10px;
    }
    .card-portofolio img {
    max-width: 100%;
    height: auto;
    }
    .card-portofolio-description {
    padding: 0 20px 20px 20px;
    }
    .card-portofolio h4 {
    margin-top: 10px;
    font-weight: 900;
    font-size: 30px;
    line-height: 35px;
    margin-bottom: 0;
    color: #042181;
    }
    .card-portofolio a {
    font-weight: 900;
    font-size: 15px;
    line-height: 18px;
    text-transform: capitalize;
    color: #042181;
    cursor: pointer;
    text-decoration: none;
    }
</style>