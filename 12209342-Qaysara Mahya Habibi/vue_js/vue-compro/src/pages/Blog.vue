

<template>
    <div class="container">
        <div class="blog">
            <h4>Blog</h4>
        <div class="row-blog"></div>
        <blog :data="DataBlog"></blog>
    </div>
</div>
</template>

<script>
import Blog from '@/components/Beranda/Blog.vue';
import { Get } from '@/Api/index.js';

export default {
    components: {
        Blog
    },
    data() {
        return {
            DataBlog: [],
        }
    },
    async created() {
        const responseBlog = await Get('http://localhost:9000/api/blog');
        this.DataBlog = responseBlog.data.data;
    }
}
</script>

<style>

.row-Blog {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    grid-gap: 10px;
}

.Blog {
    margin-top: 10px;
}

.Blog h4 {
    text-align: center;
    margin-top: 10px;
    font-weight: 900;
    font-size: 30px;
    line-height: 35px;
    margin-bottom: 0;
    color: #042181;

}

@media screen and (max-width: 600px) {
    .row-Blog {
        display: grid;
        grid-template-columns: repeat(1, 1fr);
        grid-gap: 10px;
    }

    .Blog h4 {
        font-size: 20px;
    }
}</style>