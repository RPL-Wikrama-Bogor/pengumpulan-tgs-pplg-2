<template>
  <!-- Jumlah card sama dengan jumlah data dari cardComponents -->
  <Card v-for="(item, kelas) in cardContents" :key="index" :judul="item.title" :text="item.text" :image="item.image">
  <!-- Kodingan yang ada di tengah component bakal masuk ke slot -->
    <small>Created By : Yoga</small>
  </Card>
</template>

<script>
//panggilan file
import Card from '@/components/Card.vue';
export default {
  // compoenents apa saja yang akan ditampilkan 
  components: {
    //definisi components agar bisa digunakan di template
    Card,
  },
  data() {
    return {
      cardContents: [
        {
          title: 'Cara Makan :',
          text: `<ul>
                    <li>Lorem ipsum dolor sit amet consectetur adipisicing elit. Similique, assumenda.</li>
                    <li>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Voluptatibus similique praesentium tempore pariatur quisquam dolorum.</li>
                    <li>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolor, sapiente.</li>
                </ul>`,
            image:'2.png',
        },
        {
          title: 'Cara Hidup :',
          text: `<ul>
                    <li>Lorem ipsum dolor sit amet consectetur adipisicing elit. Similique, assumenda.</li>
                    <li>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Voluptatibus similique praesentium tempore pariatur quisquam dolorum.</li>
                    <li>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolor, sapiente.</li>
                </ul>`,
            image:'logo.jpg',
        }
      ]
    }
  }
}
</script>

<style></style>