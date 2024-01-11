<template>
  <!--jumlah card sama dengan jumlah data cardcontents-->
  <Card v-for="(item, index) in cardContents" :key="index" :judul="item.title" :text="item.text" :image="item.image" :profile="item.profile">
  </Card>
</template>

<script>
//panggilan file
import  Card from '@/components/Card.vue';
export default {
  // component apa saja yang akan ditampilkan
  components: {
    //definisi component agar bisa digunakan di template
    Card,
  },
  data(){
    return{
    cardContents: [
      {
      title: 'Zahra Maury ',
      image: 'kuromi2.png',
      text: `<ul>
        <li>03 Agustus 2008</li>
        </ul>`,
        profile: 'zahra.jpg'
    },
  {
    title: 'helllo guysss!!!',
    image: 'images.jpeg',
      text: `<ul>
        <h3>03 Agustus 2008</h3>
        </ul>`,
        profile: 'zahra.jpg'
        }
      ]
    }
  }
}
</script>

<style></style>