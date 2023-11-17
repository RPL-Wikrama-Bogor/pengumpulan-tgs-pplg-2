<template>
  <div class="row-service">
    <Card
      v-for="item in data"
      :title="item.title"
      :description="item.description"
    ><p>{{ item.date }}</p></Card>
    <!-- <card-service title="ini title 2" description="ini description 2"></card-service> -->
  </div>
  <button class="btn-service">Detail</button>
  <MyBtn id="btn1" name="btn1">Submit</MyBtn>
  <MyBtn id="btn2" name="btn2">Submit</MyBtn>

</template>
<script>
import Card from "@/components/my_components/card.vue";
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
          description: "description 1",
          date: "31 Oktober 2023"
        },
        {
          title: "title 2",
          description: "description 2",
          date: "32 Oktober 2023"
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
