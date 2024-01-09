<template>

<Card v-for="(item,index) in cardContents" :key="index" :title="item.title" :text="item.text" :image="item.image">
  created by: farhan
</Card>

</template>

<script>
  //panggil file
  //@ mewakili src
  import Card from '@/components/Card.vue'

export default {
  //components apa saja yg akan ditampilkan
  components: {
    //definisi component agar bisa digunakan di template
    Card,
  },
    //untuk menampung variable
  data() {
    return {
    cardContents: [
      {
        title: 'Benedetta ',
        text: `<ul>
                <li>A</li>
                <li>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Recusandae, in!</li>
            </ul>`,
            image: 'benedetta.jpg',
      },
      {
        title: 'Ling',
        text: `<ul>
                <li>B</li>
                <li>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Recusandae, in!</li>
            </ul>`,
            image: 'ling.jpg',
      },
    ]
  }
 }
}
</script>

<style>

</style>