<template>
    <div class="container">
    <Beranda :data="DataHome"></Beranda>

  </div>
</template>
<script>
import Beranda from '@/components/Beranda/Beranda.vue';
import {Get} from '@/Api/index.js';
export default {
  components: {
    Beranda
  },
  data(){
    return{
      DataHome:[]
    }
  },
  async mounted(){
    const response = await Get('http://127.0.0.1:8000/api/home');
    this.DataHome = response.data;  
    console.log(this.DataHome);
  }

}
</script>