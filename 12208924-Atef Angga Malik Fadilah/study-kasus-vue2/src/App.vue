<template>
  <small>created by: saya</small>
  <Card v-for="(item, index) in cardContents" :key="index" :image="item.image" :title="item.title" :text="item.text">
  </Card>
</template>

<script>
// panggilan file
import Card from '@/components/Card.vue'

export default {
  // componen apa saja yang akan ditampilkan
  components: {
    // definisi component agar bisa digunakan di template
    Card,
  },
  data()  {
    return {
    cardContents :  [
      {
        title: 'Evos Esports ',
        text: `<ul>
          <li>Juara M1 : Tahun 2019 Lorem ipsum dolor sit amet consectetur adipisicing.</li>
          <li>Juara IESF  : Tahun 2022 Lorem, ipsum dolor sit amet consectetur adipisicing.</li>
          <li>Juara WCG : Tahun 2023 Lorem ipsum dolor sit amet consectetur adipisicing.</li>
          </ul>`,
        image: 'evos.png'
      },
      {
        title: 'Onic Esports ',
        text: `<ul>
          <li>Juara MSC : Tahun 2019 Lorem ipsum dolor sit amet consectetur adipisicing.</li>
          <li>Juara MPL  : Tahun 2022 Lorem, ipsum dolor sit amet consectetur adipisicing.</li>
          <li>Juara SEA GAMES : Tahun 2023 Lorem ipsum dolor sit amet consectetur adipisicing.</li>
          </ul>`,
        image: 'onic.png'
      }
    ]
    }
  }
}
</script>