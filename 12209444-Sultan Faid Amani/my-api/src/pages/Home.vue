<template>

    <Beranda :data="DataHome"></Beranda>
    <Service :data="DataLayanan"></Service>
    <Portofolio :data="DataPortofolio"></Portofolio>
    <Blog :data="DataBlog"></Blog>

</template>

<script>
import Beranda from "@/components/Beranda/Beranda.vue";
import Service from "@/components/Beranda/Service.vue";
import Portofolio from "@/components/Beranda/Portofolio.vue";
import Blog from "@/components/Beranda/Blog.vue";

import { Get } from "@/Api/index.js";
export default {
  components: {
    Beranda,
    Service,
    Portofolio,
    Blog,
  },
  data() {
    return {
      DataHome: [],
      DataLayanan: [],
      DataPortofolio: [],
      DataBlog: [],
    }
  },

  async created() {

    // api untuk halaman
    const response = await Get("http://localhost:9000/api/home");
    this.DataHome = response.data;

    // api untuk layanan
    const responseLayanan = await Get("http://localhost:9000/api/services");
    this.DataLayanan = responseLayanan.data.data;

    // api untuk portofolio
    const responsePortofolio = await Get("http://localhost:9000/api/portfolio");
    this.DataPortofolio = responsePortofolio.data.data;

    // api untuk Blog
    const responseBlog = await Get("http://localhost:9000/api/blog");
    this.DataBlog = responseBlog.data.data;


  },
}
</script>
