<template>
  <!-- jumlah card sama dengan jumlah data cardContents -->
  <!-- item.title (.) digunakan ketika ingin memanggil data yang tipe datanya objek -->
  <!-- [] memanggil data yang tipe datanya array -->
  <Card v-for="(item, index) in cardContents" :key="index" :judul="item.title" :text="item.text"
  :image="item.image">
    <!-- kodingan yang ada ditengah component bakal masuk ke slot -->
    <small>created by: orang pinggiran</small>
  </Card>
</template>
<script>
//panggil file
// tanda @ fungsinya untuk = mewakilkan src
import Card from '@/components/Card.vue';

export default{
  //component apa saja yang akan ditampilkan
  components: {
    //definisi component agar bisa digunakan di template
    Card,
  },
  //penyimpanan variable
  data() {
    return{
    cardContents: [
      {
        title: 'Cara menyusahkan orang tua :',
        text: `<ul>
                    <li>Main ml sampe subuh</li>
                    <li>minta kuota buat main ml</li>
                    <li>keluar kamar hanya untuk makan</li>
                </ul>`,
                image: "img.png",
      },
      {
        title: 'Cara Menjadi Pengangguran :',
        text: `<ul>
                    <li>bangun tidur langsung tidur lagi</li>
                    <li>main ml 24 jam,mandi cukup sekali saja</li>
                    <li>Perbanyak melamun,bangun siang,begadang</li>
                </ul>`,
                image:"img1.png",
      }
    ]
    }
  }
}
</script>

<style>

</style>