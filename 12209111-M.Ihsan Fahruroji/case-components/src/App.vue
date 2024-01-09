<template>
  <Card v-for="(item, index) in cardContents" :key="index" :judul="item.title" :text="item.text" :image="item.image"><small>Created by: Ihsan</small></Card>
  <!-- kodingan yg ada di tengah component bakal masuk ke slot -->
</template>

<script>
// panggil file
import Card from '@/components/Card.vue';
export default {
  // components apa saja yg akan ditampilkan
  components: {
    // defini components agar bisa digunakan di template
    Card,
  },
  data() {
    return {
      cardContents: [
        {
          title: 'Cara Makan :',
          text: `<ul>
                      <li>Lorem ipsum dolor sit amet consectetur adipisicing elit.</li>
                      <li>Lorem, ipsum dolor sit amet consectetur adipisicing elit. </li>
                      <li>Lorem ipsum dolor sit amet consectetur adipisicing elit.</li>
                  </ul>`,
          image: 'pemandangan.jpg'
        },
        {
          title: 'Cara Makan :',
          text: `<ul>
                      <li>Lorem ipsum dolor sit amet consectetur adipisicing elit.</li>
                      <li>Lorem, ipsum dolor sit amet consectetur adipisicing elit. </li>
                      <li>Lorem ipsum dolor sit amet consectetur adipisicing elit.</li>
                  </ul>`,
          image: 'serigala.jpg'
        }
      ]
    }
  }
}
</script>

<style></style>