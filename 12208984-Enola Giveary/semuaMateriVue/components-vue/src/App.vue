<template>
  <div class="row-service">
    <Card v-for="item in data" :title="item.title" :description="item.description">
      <p>{{ item.date }}</p>
    </Card>
    <!-- <card-service v-for="item in data" title="title 2" description="kedua"></card-service> -->
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
    'card-service': Card
  },
  data() {
    return {
      data: [{
        title: 'title 1',
        description: 'description ke 2',
        date: '24 february'
      }, 
      {
        title: 'title 99999',
        description: 'description ke 100000000000',
        date: '04 oktober'
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
  background-color: teal;
  padding: 15px 20px;
  border: none;
  border-radius: 5px;
}
</style>