
<template>
    <div class="card-service">
        <slot></slot>
        <h4>
            {{ title }}
        </h4>
        <p>{{ description }}</p>
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
.card-service {
    text-align: start;
    min-height: 306px;
    padding: 30px 30px 0 30px;
    box-shadow: 0px 10px 30px rgba(52, 50, 105, 0.285);
    border-radius: 20px;
    background: white;
    transition: all 0.5s ease;
    margin: 10px 10px;
}

.card-service h4 {
    font-size: 20px;
    line-height: 30px;
    color: #343b4e;
}

.card-service p {
    font-weight: 400;
    color: #827f8d;
    margin: 0 0 10px 0;
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
</style>