<template>
  <div class="row-service">
  <Card v-for=" item in data " :title="item.title" :description="item.description">
  <p>{{ item.date }}</p>
  </Card>
  </div>
  <button class="btn-service">detail</button>
  <MyBtn id="btn1" name="btn"></MyBtn>
  <MyBtn id="btn2" name="btn2"></MyBtn>
</template>
<script>
import Card from '@/components/my-components/Card.vue';
export default{
  components: {
    Card,
    'card-service':Card
  },
  data(){
    return {
      data: [
        {
          title: 'title 1',
          description: 'atun 2',
          date: '31 oktober 2023'
        }, {
          title: 'title 2',
          description: 'hikma 1',
          date: '1 januari 2023'
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
  grid-gap: 1-px;
}

.btn-service-global{
    margin-top: 10px;
    font-size: 16px;
    font-weight: 400;
    color: white;
    background-color: #49c06d;
    padding: 15px 20px;
    border: none;
    border-radius: 5px;
}
</style>