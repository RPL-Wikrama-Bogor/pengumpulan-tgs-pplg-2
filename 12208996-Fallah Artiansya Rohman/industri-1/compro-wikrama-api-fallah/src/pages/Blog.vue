<template>
    <Blog :data="DataBlog"></Blog>
</template>

<script>
import Blog from '@/components/Beranda/Blog.vue';
import {Get} from '@/Api/index.js';
export default{
components:{
    Blog
},
data(){
        return{
            DataBlog:[]
        }
    },
    async mounted(){
    const response = await Get('http://127.0.0.1:8000/api/blog');
    this.DataBlog = response.data;  
    console.log(this.DataBlog);
  }

}
</script>