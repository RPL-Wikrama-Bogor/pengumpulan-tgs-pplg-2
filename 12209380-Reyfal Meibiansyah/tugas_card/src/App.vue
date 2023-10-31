<template>
  <card v-for="(item,index) in cardContents" :key="index" :judul="item.title" :text="item.text" :image="item.image">
  <small>created by: Reyfal</small>
  </card>
</template>

<script>
  import Card from '@/components/Card.vue';
  export default {
    components: {
      Card,
    },
    data() {
      return {
      cardContents: [
        {
          title: 'cobaaaaaaaaaaaaaa',
          text: '<p>aoiwjoidoawhodhwhaihdoiiiiiiwhioahoishdihsahdhwalksdjw</p>',
          image: 'dogman.jpeg',
        },
        {
          title:'biarinnnnnnnnnnnnnnnnn',
          text: '<p>awkdaowdibbhdhhhhhhhhhhhhhhhkscugygahvscwgfcastcevc</p>',
          image: 'lil nus nus.jpeg',
        }
      ]
    }
  }
}
</script>

<style></style>