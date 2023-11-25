<template>
 <Navbar></Navbar>
 <!-- <div class="container">
 <Beranda></Beranda>
 <Service></Service>
 <Portofolio></Portofolio>
 <Blog></Blog>
</div> -->
<div class="container">
<RouterView></RouterView>
</div>
</template>
<script>
import Navbar from '@/components/layouts/Navbar.vue';
// import Beranda from '@/components/Beranda/Beranda.vue';
// import Service from '@/components/Beranda/Service.vue';
// import Portofolio from '@/components/Beranda/Portofolio.vue';
// import Blog from '@/components/Beranda/Blog.vue';
export default {
  components: {
    Navbar,
    // Beranda,
    // Service,
    // Portofolio,
    // Blog
  }
}
</script>














<!-- <script setup>
import HelloWorld from './components/HelloWorld.vue'
import TheWelcome from './components/TheWelcome.vue'
</script>

<template>
  <header>
    <img alt="Vue logo" class="logo" src="./assets/logo.svg" width="125" height="125" />

    <div class="wrapper">
      <HelloWorld msg="You did it!" />
    </div>
  </header>

  <main>
    <TheWelcome />
  </main>
</template>

<style scoped>
header {
  line-height: 1.5;
}

.logo {
  display: block;
  margin: 0 auto 2rem;
}

@media (min-width: 1024px) {
  header {
    display: flex;
    place-items: center;
    padding-right: calc(var(--section-gap) / 2);
  }

  .logo {
    margin: 0 2rem 0 0;
  }

  header .wrapper {
    display: flex;
    place-items: flex-start;
    flex-wrap: wrap;
  }
}
</style> -->
