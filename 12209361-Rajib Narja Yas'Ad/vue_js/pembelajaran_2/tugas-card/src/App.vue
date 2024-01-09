<template>
  <Card v-for="(item,index) in cardContents" :key="index" :title="item.title" :text="item.text" :image="item.image">
    <!-- kodingan yang ada di tengah komponen bakal masuk ke slot -->
  </Card>
</template>

<script>
  // panggil file
  import Card from '@/components/Card.vue';
  export default {
    //component - component apa saja yang akan di tampilkan
    components: {
      // definisi komponen agar bisa digunakan di template
      Card, 
    },
    data() {
      return{
        cardContents: [ {
        title: 'ingfokan maadang',
        text: '<ul><li>basuri</li></ul>',
        image: 'Kiyotaka Ayanokouji.jpg',
     },
     {
      title: 'ingfokan mdang',
        text: '<ul><li>basuriihihihiihihhiihih</li></ul>',
        image: 'akuguardiantales.jpg',
     }
     
     ]
      }

    }
  }
</script>

<style>
</style>