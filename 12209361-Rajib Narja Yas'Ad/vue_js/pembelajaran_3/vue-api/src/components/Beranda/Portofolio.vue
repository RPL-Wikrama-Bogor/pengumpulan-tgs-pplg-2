<template>
    <div class="portofolio">
        <h3>Portofolio kami</h3>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quia sit, atque quam saepe laudantium perspiciatis?</p>
        <div class="row-portofolio">
            <!-- <CardPortofolio v-for="item in data" :portofolio="item  "></CardPortofolio> -->
            <CardPortofolio></CardPortofolio>
            <CardPortofolio></CardPortofolio>
            <CardPortofolio></CardPortofolio>
            <CardPortofolio></CardPortofolio>
        </div>
    </div>
</template>

<script>
import CardPortofolio from '@/components/Portofolio/CardPortofolio.vue';
export default {
    components: {
        CardPortofolio,
    }
}
</script>

<style>
    .portofolio {
        margin-top: 80px;
    }

    .portofolio h3 {
        margin: auto;
        font-family: 'Raleway',sans-serif;
        font-weight: 900;
        font-size: 48px;
        line-height: 70px;
        color: #024181;
        margin-bottom: 15px;
        text-align: center;
    }

    .portofolio p {
        font-weight: 900;
    }

    .portofolio p span {
        color: gray;
    }

    .row-portofolio {
        display: grid;
        grid-template-columns: repeat(3,1fr);
        grid-gap: 10px;
    }

    @media screen and (max-width: 600px) {
        .row-portofolio {
            display: grid;
            grid-template-columns: repeat(1,1fr);
            grid-gap: 10px;
        }
    }
</style>

