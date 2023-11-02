<template>
  <Card v-for="(item, index) in cardContents" :key="index" :judul="item.title" :text="item.text" :image="item.image" :name="item.name" :date="item.date">
    <small>created by: saya</small>
  </Card>
</template>

<script>
import Card from '@/components/Card.vue';
export default {
  components: {
    Card,
  },
  data() {
    return {
      cardContents: [
        {
          title: 'cara makan :',
          text: `<li>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet voluptas vel quod qui ipsa rem laborum, consequatur ex iusto aperiam minima, delectus eveniet in? Laborum saepe porro repellendus praesentium! Quis?</li>
                 <li>Lorem ipsum dolor</li>`,
          image: 'waduh.jpeg',
          name: 'Sufyan',
          date: '8 januari 2024',
        },
        {
          title: 'cara makan :',
          text: `<li>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet voluptas vel quod qui ipsa rem laborum, consequatur ex iusto aperiam minima, delectus eveniet in? Laborum saepe porro repellendus praesentium! Quis?</li>
                 <li>Lorem ipsum dolor</li>`,
          image: 'mamah.jpeg',  
          name: 'Sufyan',
          date: '8 januari 2024',        
        },
      ]
    }
  }
}
</script>

<style></style>