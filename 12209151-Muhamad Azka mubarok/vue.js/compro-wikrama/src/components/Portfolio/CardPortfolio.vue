<template>
    <div class="card-portofolio">
        <img :src="portfolio.file" :alt="portfolio.title" style="width: 100%;">
        <div class="card-portofolio-description">
            <h4>
                {{ portfolio.title }}
            </h4>
            <p><span>Client :</span> {{ portfolio.name }}</p>
        </div>
    </div>
</template>
<script>
export default {
    props: ['portfolio']
}
</script>
<style scoped >
    .card-portofolio{

        text-align: start;
        min-height: 306px;
        box-shadow: 0px 10px 30px rgba(0,0,0,0.2);
        border-radius: 60px 0 0 0 ;
        background: white;
        transition: all 0.5s ease;
        margin: 10px 10px;
        width: 426px;
    }


    .card-portofolio img{

        max-width: 100%;
        height: auto;

    }


    .card-portofolio-description{

        padding: 0 20px 20px 20px;

    }


    .card-portofolio h4 {

        margin-top: 10px;
        font-weight: 900;
        font-size: 30px;
        line-height: 35px;
        margin-bottom: 0;
        color: #042182;

    }
</style>