<template>
  <Card v-for="(item, index) in cardContents" :key="index" :judul="item.title" :text="item.text" :image="item.image">
  <small>created by: Sultan</small>
  </Card>
</template>

<script>
import Card from '@/components/Card.vue';
  export default{
    //component apa saja yg akan di tampilkan
    components: {
      // definisi component agar bisa digunakan di template
      Card,
    },
    //penyimpanan variable
    data(){
      return {
      cardContents: [
        {
          title: 'Cara Menjadi Miskin No root',
          text: `<ul>
                  <li>Gak Kerja</li>
                  <li>Gak Kerja</li>
                  <li>Gak Kerja</li>
                 </ul>`,  
          image: 'malas.jpg'
        },
        {
          title: 'Cara Menjadi Kaya No root',
          text: `<ul>
                  <li>Kerja</li>
                  <li>Kerja</li>
                  <li>Kerja</li>
                 </ul>`,
          image: 'paleojavanicus.jpeg'
        },
      ]
    }
  }
}
</script>