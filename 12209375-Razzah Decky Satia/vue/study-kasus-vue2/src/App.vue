<template>
  <Card v-for="(item, index) in cardContents" :key="index" :judul="item.title" :text="item.text" :image="item.image">
    <!-- kodingan yg ada di tengah component bakal masuk ke slot -->
    <small>created by : zah</small>
  </Card>
</template>
<script>
// panggil file
// tanda @ fungsinya untuk = mewakilkan src
import Card from '@/components/Card.vue'
export default {
  // component apa saja yg akan ditampilkan
  components: {
    Card,
  },
  // fungsi data untuk menampung variable
  data() {
    return {
      cardContents: [
        {
          title: 'Cara Bernafas Manual',
          text: `<ul>
          <li>Lorem ipsum dolor sit, amet consectetur adipisicing elit.</li>
          <li>Lorem ipsum dolor sit, amet consectetur adipisicing.</li>
          </ul>`,
          image: 'Untitled.jpeg',
        }, {
          title: 'Cara Menjadi Manusia',
          text: `<ul>
          <li>Lorem ipsum dolor sit amet consectetur adipisicing elit. Magni.</li>
          <li>Lorem ipsum dolor sit amet consectetur adipisicing elit. Unde, cumque?</li>
          </ul>`,
          image: 'download.jpeg',
        }
      ]
    }
  }
}

</script>
<style></style>