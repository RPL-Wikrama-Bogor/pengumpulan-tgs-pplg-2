<template>
    <div class="portofolio">
        <h3>Portfolio Kami</h3>
        <p>Lorem ipsum dolor sit amet</p>
        <div class="row-portfolio">
            <h4>
            {{ portofolio.title }}
        </h4>
        <p><span>Clients: </span> {{ portofolio.name }}</p>
        </div>
    </div>
</template>
<script>
// import Card from '@/components/Service/Card.vue';
export default {
    props: ['portofolio']
}
</script>
<style>
.card-portfolio{
    text-align: start;
    min-height: 306px;
    box-shadow: 0px 10px 30px rgba(0, 0, 0, 0.05);
    border-radius: 60px 0px 0px 0px;
    background: white;
    transition: all 0.5s ease;
    margin: 10px 10px;
}

.card-portfolio img {
    max-width: 100%;
    height: auto;
}

.card-portfolio-description {
    padding: 0 20px 20px 20px;
}

.card-portfolio h4 {
    margin-top: 10px;
    font-weight: 900;
    font-size: 30px;
    line-height: 30px;
    margin-bottom: 0;
    color: #042181;
}
</style>