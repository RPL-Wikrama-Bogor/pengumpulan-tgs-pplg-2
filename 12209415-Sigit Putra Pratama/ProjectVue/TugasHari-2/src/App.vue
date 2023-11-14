<template>
  <Card v-for="(item, index) in cardContents" :key="index" :title="item.title" :text="item.text" :image="item.image">
    <small>created by: saya</small>
  </Card>
</template>

<script>
//panggilan file
import Card from "@/components/Card.vue";
export default {
  //components apa saja yang akan ditampilkan
  components: {
    // definisi components agar bisa digunakan di template
    Card,
  },
  data() {
    return {
      cardContents: [
        {
          title: "Cara Jadi GOAT : ",
          text: `<ul>
                <li>Lorem ipsum dolor sit amet consectetur adipisicing elit. 
                    Magnam esse ducimus porro facere in eligendi fugiat.</li>
                <li>Lorem ipsum dolor sit amet </li>
                <li>Lorem ipsum dolor sit amet </li>
            </ul>`,
          image: "messi.jpg",
        },
        {
          title: "Cara Jadi Monyet : ",
          text: `<ul>
                <li>Lorem ipsum dolor sit amet consectetur adipisicing elit. 
                    Magnam esse ducimus porro facere in eligendi fugiat.</li>
                <li>Lorem ipsum dolor sit amet </li>
                <li>Lorem ipsum dolor sit amet </li>
            </ul>`,
          image: "monyet.jpg",
        },
      ],
    };
  },
};
</script>

 
<style></style>
