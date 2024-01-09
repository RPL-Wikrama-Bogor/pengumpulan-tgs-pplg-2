<template>
    <div class="wrap">
      <div class="card bg-info">
        <div class="img-wrap">
          <img :src="'/src/assets/img/' + image" alt="" srcset="">
        </div>
        <div class="text-wrap">
          <h2>{{ judul }}</h2>
          <slot></slot>
          <div v-html="text"></div>
        </div>
      </div>
    </div>
  </template>
  
  <script>
  export default {
    // mengambil data
    props: ['judul', 'text', 'image'],
  }
  </script>
  
  <style scoped>
  .wrap {
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    margin-top: 3rem;
  }
  
  .card {
    display: flex;
    width: 600px;
    height: auto;
    border-radius: 10px;
    border: 1px solid black;
    box-shadow: 5px  5px  15px 10px gray;
    display: flex;
    flex-direction: row;

  }
  
  .img-wrap {
    width: 50%;
    height: 12 0%;
    position: relative;
  }
  
  .img-wrap img {
    width: 100%;
    height: 100%;
    /* position: absolute; */
  }
  
  .text-wrap {
    width: 60%;
    height: 100%;
    padding: 10px;
  }
  </style>