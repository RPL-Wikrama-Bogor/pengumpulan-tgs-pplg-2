<template>
  <!-- jumlah card sama dengan jumlah cardContents -->
  <Card v-for="(item,index) in cardContents" :key="index" :judul="item.title" :text="item.text" :image="item.image"> 
  <small>Created by : Azqi</small>
  </Card>
</template>

<script>
// panggil file
//import "Ca/rd" dari nama file nya
import Card from '@/components/Card.vue'
  export default{
    // components apa saja yang ingin diambil
    components: {
      // definisi component agar bisa digunakan di template
      Card,
    },
    data(){
      return{
      cardContents:[
        {
          title : 'Cara Hidup ',
          text : `<ul>
                <li>Nggak ada 1</li>
                <li>Nggak ada 2</li>
                <li>Nggak ada 3</li>
            </ul>`,
            image : 'wallpaper-1.jpg',
        },
        {
          title : 'Cara minum',
          text : `<ul>
                <li>ada 1</li>
                <li>ada meureun 2</li>
                <li>Nggak ada 3</li>
            </ul>`,
            image : 'wallpaper-2.jpg',
        }
      ]
    }
  }
  }
</script>

<style>

</style>
