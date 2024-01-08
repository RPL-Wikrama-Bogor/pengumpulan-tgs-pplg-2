<template>
    <div class="card-service">
        <h4>
            {{ title }}
        </h4>
        <p>{{ description }}</p>

        <slot></slot>
        <button class="btn-service">Detail</button>
        <MyBtn></MyBtn>
    </div>
    
</template>

<script>
export default {
    props: ['title', 'description']
}
</script>

<style scoped>
.btn-service{
    margin-top: 10px;
    font-size: 16px;
    font-weight: 400;
    color: white;
    background-color: blue;
    padding: 15px 20px;
    border: none;
    border-radius: 5px;
}
.btn-service:hover{
    background-color: #343b4e;
    border-radius: 50px;
    cursor: pointer;
    transition: 0.6s;
}
.card-service{
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
    line-height: 30px;
    color: black;
}

.card-service p {
    font-weight: 400;
    color: rgb(0, 53, 197);
    margin: 0 0 10px 0;
}
</style>