<template>
    <div class="container">
        <Blog :data="filterDataBlog">
            <div class="search">
                <input type="text" class="searchTerm" placeholder="Cari Judul" v-model="searchTeam">
            </div>
        </Blog>
    </div>
</template>

<script>
    import { Get } from '@/Api/index.js';
    import Blog from '@/components/Beranda/Blog.vue';
    export default {
        components: {
            Blog
        },
        data() {
            return {
                DataBlog: []
            }
        },
        compoted: {
            filterDataBlog() {
                const searchTeam = this.searchTeam.toLowerCase();
                return this.DataBlog.filter(Blog => Blog.title.toLowerCase().includes(searchTeam));
            }
        },
        async mounted() {
            const response = await Get('http://127.0.0.1:9000/api/blog');
            this.DataBlog = response.data.data;
        }
    }
</script>