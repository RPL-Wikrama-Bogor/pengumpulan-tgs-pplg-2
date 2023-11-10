<template>
    <div class="container">
        <Blog :data="DataBlog">
            <div class="search">
                <input type="text" class="searchTerm" placeholder="Cari Judul">
            </div>
        </Blog>
    </div>
</template>

<script>

import Blog from '@/components/Beranda/Blog.vue';
import {Get} from '@/Api/index.js'
export default{
    components:{
        Blog
    },
    data(){
    return{
        DataBlog: [],
        search:'',
      }
  },
    async created(){
        const responseBlog = await 
        Get('blog');
        console.log(responseBlog);
        console.log(responseBlog.status);
        this.DataBlog = responseBlog.data.data;
    },
    methods:{
        async submit(){
            const response = await Post('contact', this.form);
            console.log(response);
            if(response.status == 200){
                this.form ={
                    name: '',
                email: '',
                phone: '',
                message: ''
                }
                alert('data berhasil di tambahkan Sir!')
            }
        }
    }

}
</script>
