<template>
    <div class="card-portofolio">
        <img src="@/assets/img/portfolio-1.jpg" alt="portofolio">
        <div class="card-portofolio-description">
            <h4>
                Lorem ipsum dolor sit amet.
            </h4>
            <p><span>Klient :</span> atun</p>
        </div>
    </div>
</template>
<style scope>
.card-portofolio {
    text-align: start;
    min-height: 360px;
    padding: 30px 30px 0 30px;
    box-shadow: 0pc 10px 30px rgb(0,0,0,0.05);
    border-radius: 60px 0px 0px 0px;
    background: white;
    transition: all 0.5s ease;
    margin: 10px 10px;
}

.card-portofolio img{
    max-width: 100%;
    height: auto;
}

.card-portofolio-description{
    padding: 0 20px 20px 20px;
}

.card-portofolio h4{
    margin-top: 10px;
    font-weight: 900;
    font-size: 30px;
    line-height: 35px;
    margin-bottom: 0;
    color: #042181;
}


</style>