<template>
  <div class="row-service">
    
  <Card v-for="item in data" :title="item.title" :description="item.description">
    <p>{{ item.date }}</p> 
  </Card>
 
  <!-- <card-service title="title 2" description="kaizokuni orewa naru"></card-service> -->
</div>
<button class="btn-service">Detail</button>
<MyBtn id="btn1" name="btn1"></MyBtn>
<MyBtn id="btn2" name="btn2"></MyBtn>
</template>
<script>
import Card from '@/components/my-components/Card.vue';
export default {
  components: {
    Card,
    'card-service': Card
  },
  data(){
  return {
    data: [
      {
        title: 'title 1',
        description: 'description 2',
        date:'31 oktober'
      }, {
        title: 'title 1',
        description: 'description 2',
        date: '1 november'
      }
    ]
  }
}
}
</script>
<style>
.row-service{
  display: grid;
  grid-template-columns: repeat(3, 1fr);
  grid-gap: 10px;
}
.btn-service-global{
    margin-top: 10px;
    font-size: 16px;
    font-weight: 400;
    color: white;
    background-color: #4cc480;
    padding: 15px 20px;
    border: none;
    border-radius: 5px;
}
</style>