<template>
  <div class="row-service">
    <Card v-for="item in data" :title="item.title" :description="item.description"
      ><p>{{ item.date }}</p></Card
    >
    <!-- <card-service title="ini title 2" description="ini description 2"></card-service> -->
  </div>
  <button class="btn-service">Detail</button>
  <MyBtn id="btn1" name="btn1"></MyBtn>
  <MyBtn id="btn2" name="btn2"></MyBtn>
</template>
<script>
import Card from "@/components/mycomponents/Card.vue";
export default {
  components: {
    Card,
    "card-service": Card,
  },
  data() {
    return {
      data: [
        {
          title: "title 1",
          description: "description 2",
          date: "31 Oktober",
        },
        {
          title: "title 3",
          description: "description 4",
          date: "1 November",
        },
      ],
    };
  },
};
</script>

<style>
.row-service {
  display: grid;
  grid-template-columns: repeat(3, 1fr);
  grid-gap: 10px;
}
</style>
