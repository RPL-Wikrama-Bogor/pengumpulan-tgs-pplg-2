<template>
  <div class="row-service">
    <Card v-for="item in data" :title="item.title" :description="item.description"><p>{{ item.date }}</p></Card>
  </div>

  <button class="btn-service">Detail</button>
  <MyBtn id="btn1" name="btn"></MyBtn>
  <MyBtn id="btn2" name="btn2"></MyBtn>
</template>

<script>
  import Card from '@/components/my-components/Card.vue';

  export default {
    components: {
      Card,
      'card-service': Card,
    },

    data(){
      return {
        data: [
          {
            title: 'ChinBoys567',
            description: 'The Leader',
            date: '05 Juni 2023'
          },
          {
            title: 'Relfago',
            description: 'The Moderator',
            date: '31 Oktober 2023'
          },
          {
            title: 'Ilhamsendy',
            description: 'Member',
            date: '31 Oktober 2023'
          }
        ]
      }
    }
  }

</script>

<style>
  body {
    background-color: bisque;
  }
  .row-service {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    grid-gap: 10px;
  }

  .btn-service-global {
    margin-top: 10px;
    font-size: 16px;
    font-weight: 400;
    color: white;
    background-color: blue;
    padding: 15px 20px;
    border: none;
    border-radius: 5px;
  }
</style>