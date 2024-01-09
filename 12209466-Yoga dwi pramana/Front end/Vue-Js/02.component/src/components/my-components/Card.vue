<template>
    <div class="card-service">
        <!-- <img src="@/assets/img/e.jpg" alt=""> -->
        <h4>
            {{ title }}
        </h4>
        <p>{{ description }}</p>
        <slot></slot>
        <div class="flex">
        <button class="btn-service">Detail</button>
        <!-- <button class="btn-service-global">Button</button> -->
        <MyBtn></MyBtn>
    </div>
    </div>
</template>

<script>
    export default {
        props: ['title', 'description']
    }
</script>

<style scoped>

.flex {
    display: flex;
    grid-gap: 10px;
}

.btn-service {
    margin-top: 10px;
    font-size: 16px;
    font-weight: 400;
    color: white;
    background-color: #4c55c4;
    padding: 15px 20px;
    border: none;
    border-radius: 5px;
}
/* .btn-service-global {
    margin-top: 10px;
    font-size: 16px;
    font-weight: 400;
    color: white;
    background-color: #159d22;
    padding: 15px 20px;
    border: none;
    border-radius: 5px;
} */
.card-service {
    text-align: start;
    min-height: 306px;
    padding: 30px 30px 0 30px;
    box-shadow: 0px 10px 30px rgb(0, 0, 0, 0.05);
    border-radius: 60px 0px 0px 0px;
    background: white;
    transition: all 0.5s ease;
    margin: 10px 10px;
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
}


</style>