<template>
  <Card v-for="(item, index) in cardContents" :key="index" :heading="item.title" :text1="item.text1" :text2="item.text2"
    :image="item.image" :profile="item.profile" :date="item.date" :name="item.name">
  </Card>
</template>
<script>
//panggil file
//component apa sj yg akn d tampilkan
import Card from '@/components/Card.vue';
export default {
  components: {
    //definisi component agr bs d gunakan d template
    Card,
  },
  data() {
    return {
      cardContents: [
        {
          title: 'MarcellKu',
          image: 'berlian1.jpg',
          profile: 'berlian2.jpg',
          name: 'Berlian Fadlilla',
          date: '27 Sept 2023',
          text1: 'i love marcell',
          text2: 'marcell cintaku sayangku dewaku belahan jiwaku',
        },
      ]
    }
  }
}
</script>

<style></style>