<template>
  <div class="row-service">
    <Card
      v-for="item in data"
      :title="item.title"
      :description="item.description"
      ><p>{{ item.date }}</p></Card>
  </div>
  <button class="btn-service">Detail</button>
  <button id="bin" name="bin">Detail</button>
  <button id="bin2" name="bin2">Detail</button>
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
      data: [
        {
          title: 'title 1',
          description: 'description 1',
          date: '31 Oktober 2023'
        },
        {
          title: 'title 1',
          description: 'description 2',
          date: '32 Oktober 2023'
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
  font-size: 10px;
  font-weight: 400;
  color: white;
  background-color: #008000;
  padding: 15px 20px;
  border: none;
  border-radius: 5px;
}
</style>
