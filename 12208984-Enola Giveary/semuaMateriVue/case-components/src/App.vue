<template>
  <!-- jumlah card sama dengan jumlah data CardContents -->
  <Card v-for="(item, index) in CardContents" :key="index" :judul="item.title" :text="item.text" :image="item.image" :name="item.name" :profile="item.profile">
  <!-- kodingan yang ada di tengah component bakal masuk ke slot -->
  </Card>
</template>

<script> 
// panggil file
import Card from '@/components/Card.vue';
export default {
  // components apa saja yang akan ditampilkan
  components: {
    // definisi componen agar bisa digunakan di template
    Card, 
    // 
  },
  // penyimpanan variable
  data() {
    return {
    CardContents: [{
      title: 'Nama Member :',
      image: 'jeonghan.jpeg',
      text: `<ul>
                <li>Yoon Jeonghan</li>
                <li>The Angel but also devil member too</li>
                
            </ul>`,
      name: 'Created by Enola Giveary!',
     profile: 'me.jpg' ,
    },
    {
      title: 'Tanggal Lahir :',
      image: 'jeonghan2.jpeg',
      text: ` <ul>
                <li>04 Oktober 1995</li>
                <li>The Libra boy</li>
                
            </ul>`,
      name: 'Created By Enola Giveary',
      profile: 'me.jpg',
    }
  ]
  }
} 
}
</script>

<style>

</style>