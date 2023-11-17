<template>
  <!-- jumlah card sama dengan jumlah data cardContents -->
  <Card v-for="(item, index) in cardContents" :key="index" :title="item.title" :text="item.text" :image="item.image">
  <!-- kodingan yang ada di tengah component bakal masuk ke slot -->
  <small>created by: Masashi Kishimoto</small>
  </Card>
</template>

<script>
  //panggilan file
  import Card from '@/components/Card.vue';
  export default {
  // component apa saja yang akan ditampilkan
  components: {
    //definisi components agar bisa digunakan di template
    Card,
  },
  // penyimpanan variabel
  data() {
    return {
    cardContents: [
      {
        title: 'Naruto Uzumaki',
        text: `            
            <ul>
                <li>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quam commodi incidunt accusamus porro, excepturi sit asperiores nihil reiciendis praesentium qui cum! Recusandae culpa ipsum deleniti autem id voluptas ratione quisquam!</li>
            </ul>`,
        image: 'naruto-gif-pfp-1.gif'
      }, 
      {
        title: 'Sasuke Uchiha',
        text: `            
            <ul>
                <li>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quam commodi incidunt accusamus porro, excepturi sit asperiores nihil reiciendis praesentium qui cum! Recusandae culpa ipsum deleniti autem id voluptas ratione quisquam!</li>
            </ul>`,
        image: 'sasuke.jpg'
      }, 
    ]
    }
  }
}
</script>

<style>

</style>