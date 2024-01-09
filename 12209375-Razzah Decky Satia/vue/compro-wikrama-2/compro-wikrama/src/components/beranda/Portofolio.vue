<template>
  <div class="portofolio">
    <h3>Portofolio Kami</h3>
    <p>
      Lorem ipsum dolor sit amet consectetur adipisicing elit. Quod odit veniam
      voluptates quae ullam autem a, aspernatur eos perspiciatis accusamus?
    </p>
    <div class="category">
      <span v-for="category in dataCategories" @click="filter(item.id)">{{ category.title }}</span>
    </div>

    <div class="row-portofolio">
      <CardPortofolio v-for="item in data" :portofolio="item"></CardPortofolio>
    </div>
  </div>
</template>
<script>
import CardPortofolio from "@/components/portofolio/CardPortofolio.vue";
export default {
  components: {
    CardPortofolio,
  },
  methods: {
    filter(id) {
        alert(id)
    }
  },
  props: ["data"],
};
</script>

<style>
.category {
  margin: 10px 0 35px 0;
  display: flex;
  flex-wrap: wrap;
}

.category span {
  background-color: #bdcdff;
  padding: 10px 15px;
  font-weight: 500;
  border-radius: 20px;
  margin: 5px;
  cursor: pointer;
}

.portofolio {
  margin-top: 80px;
}
.portofolio h3 {
  margin: auto;
  font-family: "Raleway", sans-serif;
  font-weight: 900;
  font-size: 48px;
  line-height: 70px;
  color: #042181;
  margin-bottom: 15px;
  text-align: center;
}
.portofolio p {
  font-weight: 900;
  font-size: 14px;
  line-height: 20px;
  color: #4f556a;
  max-width: 680px;
  margin: auto;
  margin-top: 14px;
  margin-bottom: 25px;
}
.portofolio p span {
  color: gray;
}
.row-portofolio {
  display: grid;
  grid-template-columns: repeat(3, 1fr);
  grid-gap: 10px;
}
@media screen and (max-width: 600px) {
  .row-portofolio {
    display: grid;
    grid-template-columns: repeat(1, 1fr);
    grid-gap: 10px;
  }
}
</style>
