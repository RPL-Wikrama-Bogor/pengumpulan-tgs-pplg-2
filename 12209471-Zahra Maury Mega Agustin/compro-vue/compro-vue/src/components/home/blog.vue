<template>
  <div class="blog">
    <h3>Blog</h3>
    <div class="row-blog">
      <Card v-for="item in data" :blog="item"></Card>
    </div>
  </div>
</template>
<script>
import Card from "@/components/blog/Card.vue";
export default {
  components: {
    Card,
  },
  props: ['data']
};
</script>
<style scope>
.blog {
  margin-top: 80px;
}
.blog h3 {
  font-weight: 900;
  font-size: 48px;
  line-height: 35px;
  color: #042181;
  margin-bottom: 30px;
  text-align: center;
}
.row-blog {
  display: grid;
  grid-template-columns: repeat(2, 1fr);
  grid-gap: 10px;
}
@media screen and (max-width: 600px) {
  .row-blog {
    display: grid;
    grid-template-columns: repeat(1, 1fr);
    grid-gap: 10px;
  }
}
</style>
