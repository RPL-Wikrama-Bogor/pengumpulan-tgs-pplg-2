<template>
  <div class="row-service">
    <Card v-for="item in data" :title="item.title" :description="item.description">{{ item.date }}</Card>
  </div>
  <button class="btn-service">Detail</button>
        <MyBtn id="btn1" name="btn1"></MyBtn>
        <MyBtn id="btn2" name="btn2"></MyBtn>
</template>

<script>
import Card from '@/components/my-components/Card.vue'
export default {
  components: {
    Card,
    'card-service': Card
  },
  data() {
  return {
    data: [
      {
        title: 'District 1',
        description: 'The Sea of Siblings Blood',
        date: '27 Oktober 1967'
      },
      {
        title: 'District 12',
        description: 'The Irony of Child Marriage',
        date: '23 Maret 1967'
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
  background-color: #ec6d97;
  padding: 15px 20px;
  border: none;
  border-radius: 5px;
}
</style>