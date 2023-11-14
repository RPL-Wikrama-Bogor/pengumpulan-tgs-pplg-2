<template>
  <div class="container">
    <Blog :data="DataBlog"></Blog>
  </div>
</template>
<script>
import Blog from "@/components/Beranda/Blog.vue";
import { Get } from "@/Api/index.js";
export default {
  components: {
    Blog,
  },
  data() {
    return {
      DataBlog: [],
    };
  },
  async created() {
    const responseBlog = await Get("http://127.0.0.1:9000/api/blog");
    this.DataBlog = responseBlog.data.data;
  },
};
</script>
<style>
.row-portofolio {
  display: grid;
  grid-template-columns: repeat(3, 1fr);
  grid-gap: 10px;
}

.portofolio {
  margin-top: 10px;
}

.portofolio h4 {
  margin-top: 10px;
  font-weight: 900;
  font-size: 30px;
  line-height: 35;
  margin-bottom: 0;
  color: #042181;
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
  text-align: center;
}

.portofolio p span {
  color: gray;
}

@media screen and (max-width: 600px) {
  .row-portofolio {
    display: grid;
    grid-template-columns: repeat(1, 1fr);
    grid-gap: 10px;
  }

  .portofolio h4 {
    font-size: 20px;
  }
}
</style>
