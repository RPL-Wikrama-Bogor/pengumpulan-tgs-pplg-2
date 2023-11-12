<template>
    <div class="card-service">
        <!-- <img src="@/assets/img/svt.jpeg" alt="service"> -->
        <slot></slot>
        <h4>
            {{ title }}
            <!-- Seventeen Right Here! -->
        </h4>
        <p> {{ description }}
            <!-- Seungcheol, jeonghan, jisoo, junhui, soonyoung, wonwoo, jihoon, minghao, mingyu, seokmin, seungkwan, hansol, chan -->
            </p> 
        <button class="btn-service">Detail</button>
        
    </div>
</template>

<script>
export default {
    props: ['title', 'description']
}
</script>
<style scoped>
.btn-service {
    margin-top: 10px;
    font-size: 16px;
    font-weight: 400;
    color: white;
    background-color: deepskyblue;
    padding: 15px 20px;
    border: none;
    border-radius: 5px;
}

.card-service {
        text-align: start;
        min-height: 306px;
        padding: 30px 30px 0 30px;
        box-shadow: 0px 10px 30px rgba(0, 0, 0, 0.10    );
        border-radius: 60px 0px 0px 0px;
        background-color:azure;
        transition: all 0.5s ease;
        margin: 10px 10px;
    }

.card-service h4 {
        font-size: 20px;
        line-height: 30px;
        color: cornflowerblue;
    }

    .card-service p {
        font-weight: 400;
        color: #827f8d;
        margin: 0 0 10px 0;
    }

</style>