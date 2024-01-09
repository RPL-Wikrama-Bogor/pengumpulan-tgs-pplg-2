<template>
    <div class="card-portofolio">
        <img src="@/assets/img/portfolio-1.jpg" alt="">
        <div class="card-portofolio-description">
            <h4>
                Lorem ipsum     
            </h4>
        </div>
    </div>
</template>

<script>
</script>

<style>
    .card-portofolio {
        text-align: start;
        min-height: 306px;
        box-shadow: 0px 10px 30px rgba(165, 159, 159, 0.5);
        border-radius: 25px ;
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
        color: #06346f;
    }

</style>