<template>
    <div class="container">
    <Blog></Blog>
</div>
</template>

<script>
    import Blog from '@/components/Beranda/Blog.vue';
    import { Get } from '@/Api/index.js';
    export default{
    components: {
        Blog, 
    },
    data(){
        return{
            DataBlog:[],
        }
    },
    async created() {
    
        // api untuk Blog
        const responseBlog = await Get('http://127.0.0.1:9000/api/blog');
        this.DataBlog = responseBlog.data.data;        
    },
}
</script>