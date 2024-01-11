<template>
    <div class="card-service">
        <h4>
            {{  title }}
        </h4>
        <p> {{ description }} </p>
        <slot></slot>
        <button class="btn-service">detail</button>
        <MyBtn></MyBtn>
    </div>
</template>

<script>
    export default {
        props: ['title' , 'description']
    }
</script>

<style scoped>
  .btn-service {
    margin-top: 10px;
    font-size: 16px;
    font-weight: 400;
    color: white;
    background-color: #190482;
    padding: 15px 20px;
    border: none;
    border-radius: 5px;
  }

  .btn-service-global {
    margin-top: 10px;
    font-size: 16px;
    font-weight: 400;
    color: white;
    background-color: #A0E9FF;
    padding: 15px 20px;
    border: none;
    border-radius: 5px;
  }

  .card-service {
    text-align: start;
    min-height: 360px;
    padding: 30px 30px 0 30px;
    box-shadow: 0px 10px 30px rgba(194, 198, 202, 0.5);
    border-radius: 5px 5px 5px 5px;
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
