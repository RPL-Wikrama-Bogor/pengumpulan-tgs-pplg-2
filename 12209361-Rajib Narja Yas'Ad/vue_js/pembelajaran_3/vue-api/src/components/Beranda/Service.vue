<template>
    <div class="section_2">
        <h3>layanan kami</h3>
        <div class="row_service">
            <!-- <Card v-for="item in data" :layanan="item"></Card> -->
            <Card></Card>
            <Card></Card>
            <Card></Card>
            <Card></Card>
        </div>
    </div>
</template>

<script>
    import Card from '@/components/Service/Card.vue';
    export default {
        components: {
            Card,
        },
        // props: ['data']
    }
</script>

<style>
.service {
    margin-top: 80px;
}
.service h3 {
    font-weight: 900;
    font-size: 48px;
    line-height: 35px;
    color: #042181;
    margin-bottom: 30px;
    text-align: center;
}
.row-service {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    grid-gap: 10px;
}

@media screen and (max-width: 600px) {
    .row-service {
        display: grid;
        grid-template-columns: repeat(1, 1fr);
        grid-gap: 10px;
    }
}




    .card-service {
        text-align: start;
        min-height: 306px;
        padding: 30px 30px 0 30px;
        box-shadow: 0 10px 30px rgb(0, 0, 0, 0.5) ;
        border-radius: 60px 0 0 0;
        background: white;
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
        font-weight: 400 ;
        color: #827f8d;
        margin: 0 0 10px 0;
    }

</style>
