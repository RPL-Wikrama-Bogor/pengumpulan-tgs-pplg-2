<template>
  <!-- jumlah card sama dengan jumlah data CardContents -->
  <Card v-for="(item, index) in CardContents" :key="index" :judul="item.title" :text="item.text" :image="item.image" :date="item.date">
  <!-- kodingan yang ada di tengah component bakal masuk ke slot -->
  <small>Created by: Me!</small>
  </Card>
</template>

<script> 
// panggil file
import Card from '@/components/Card.vue';
export default {
  // components apa saja yanf akan ditampilkan
  components: {
    // definisi componen agar bisa digunakan di template
    Card, 
  },
  // penyimpanan variable
  data() {
    return {
    CardContents: [{
      title: 'Hikmatunnisa Rangkuti :',
      text: `<ul>
                <li>hikmatunnisa</li>
                <li>mang ea bg</li>
                
            </ul>`,
      image: 'atun.jpg',
      date:'30-10-2023'
    },
    {
      title: 'Atun :',
      text: ` <ul>
                <li>04 Oktober 1995</li>
                <li>gbjf h hj </li>
                
            </ul>`,
            image: 'atun.jpg'
    }
  ]
  }
} 
}
</script>

<style>

</style>