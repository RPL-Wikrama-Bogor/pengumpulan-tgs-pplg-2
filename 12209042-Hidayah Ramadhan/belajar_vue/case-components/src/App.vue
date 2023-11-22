<template>
  <Card v-for="(item, index) in cardContents" :key="index" :judul="item.title"
  :text="item.text" :image="item.image">
  <small>created by: saya</small>
  </Card>
</template>

<script>
//memanggil file
import Card from '@/components/Card.vue';
export default {
  //components apa saja yang akan ditampilkan
  components: {
      //definisi component agar bisa digunakan template
      Card,
  },
  data(){
    return{
      cardContents: [
      {
        title: 'Cara Makan :',
        text: ` <ul>
                    <li>Pertama Kalian Join PP(Pemuda Pancasila)</li>
                    <li>Pertama Kalian Join PP(Pemuda Pancasila)</li>
                </ul>`,
        image: 'download.png',
      },
      {
        title: 'Cara Makan :',
        text: ` <ul>
                    <li>Pertama Kalian Join PP(Pemuda Pancasila)</li>
                    <li>Pertama Kalian Join PP(Pemuda Pancasila)</li>
                </ul>`,
        image: 'lbwk.jpg',
      }
    ]
  }
 }
}
</script>

<style></style>