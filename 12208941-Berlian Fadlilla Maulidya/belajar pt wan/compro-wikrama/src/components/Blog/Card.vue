<template>
    <div class="card-blog">
        <img src="@/assets/img/portfolio-1.jpg" alt="">
        <div class="card-blog-description">
            <div class="time">
                Dec 1 st 2022
            </div>
            <h4>Lorem ipsum dolor sit amet.</h4>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
        </div>
    </div>
</template>
<style>
.card-blog img{
    text-align: start;
    box-shadow: 0px 10px 30px rgb(0,0,0,0.05);
    background: white;
    transition: all 0.5s ease;
    margin: 10px 10px;
    display: flex;
    align-items: center;
}
.card-blog img{
    width: 200px;
    height: 200px;
    object-fit: contain;
    padding: 0 0 20px 20px;
}

.card-blog-description{
    padding: 0 20px 0 20px;
}
.card-blog-description .time{
    font-weight: 500;
    font-size: 12px;
    line-height: 12px;
    color: #4f556A;

}
.card-blog-description a{
    font-weight: 900;
    font-size: 15px;
    line-height: 18px;
    text-transform: capitalize;
    color: #042181;
    margin-bottom: 0px;
    margin-bottom: 5px;
}
.card-blog h4{
    font-weight: 900;
    font-size: 24px;
    line-height: 22px;
    color: #4f556A;
    margin-top: 10px;
    margin-bottom: 5px;
}

@media screen and (max-width: 600px){
    .row-blog{
        display: grid;
        grid-template-columns: repeat(1,1fr);
        grid-gap: 10px;
    }
    .card-blog{
        flex-direction: column;
        align-items: start;
    }

    .card-blog img{
        width: 100%;
        height: 260px;
        object-fit: contain;
    }
}
</style>