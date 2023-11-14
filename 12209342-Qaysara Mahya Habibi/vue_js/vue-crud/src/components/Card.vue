<template>
    <!-- jumlah card sama dengan jumlah data cardContents -->
    <Card v-for="(item, index) in cardContents" :key="index" :judul="item.title" :text="item.text" :image="item.image">
      <!-- kodingan yg ada di tengah component bakal masuk ke slot -->
      <small>created by: saya</small>
    </Card> 
  </template>
  
  <script>
  // panggil file
  import Card from '@/components/Card.vue';
  export default {
    // component apa saja yg akan ditampilkan
    components: {
      // definisi component agar bisa digunakan di template
      Card,
    },
    // penyimpanan variable
    data() {
      return {
        cardContents: [
          {
            title: 'Cara Makan :',
            text: `<ul>
                      <li>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quae, obcaecati!</li>
                      <li>Lorem ipsum dolor sit amet.</li>
                      <li>Lorem ipsum dolor sit amet consectetur adipisicing.</li>
                  </ul>`,
            image: 'ss.png',
          },
          {
            title: 'Cara Hidup :',
            text: `<ul>
                      <li>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quae, obcaecati!</li>
                      <li>Lorem ipsum dolor sit amet.</li>
                      <li>Lorem ipsum dolor sit amet consectetur adipisicing.</li>
                  </ul>`,
            image: 'ss2.png',
          }
        ]
      }
    }
  }
  </script>
  
  <style></style>