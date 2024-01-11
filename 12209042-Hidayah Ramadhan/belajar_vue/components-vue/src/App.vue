<template>
  <div class="row-service">
    <Card v-for="item in data" :title="item.title" :description="item.description">
    <p>{{ item.date }}</p></Card>
  </div>
  <MyBtn id="btn1" name="btn"></MyBtn>
  <MyBtn id="btn2" name="btn2"></MyBtn>
</template>
<script>
import Card from '@/components/my-components/Card.vue';
export default{
  components:{
    Card,
    'card-service': Card
  },
  data(){
    return {
      data: [
        {
          title: 'title 1',
          description: 'description 2',
          date:'24 april'
        }, {
          title: 'title 2',
          description: 'description 2',
          date: '24 april'
        }
      ]
    }
  }
}
</script>
<style>
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
    background-color: green;
    padding: 15px 20px;
    border: none;
    border-radius: 5px;
} 
</style>