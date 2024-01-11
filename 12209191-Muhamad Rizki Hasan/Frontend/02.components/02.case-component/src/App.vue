<template>
    <!-- Jumlah card sama dengan jumlah data dari cardContents -->
    <Card v-for="(item, index) in cardContents" :key="index" :judul="item.title" :text="item.text" :image="item.image">
        <!-- Kodingan yang ada di tengah component bakal masuk ke slot -->
        <small>created by: saya</small>
    </Card>
</template>

<script>
// Panggil file
import Card from '@/components/Card.vue';
export default {
    // Component apa saja yang akan ditampilkan 
    components: {
        // Definisi component agar bisa digunakan di template
        Card
    },
    data() {
        return {
            cardContents: [
                {
                    title: 'Cara Bernafas : ',
                    text: `<ul>
                            <li>Lorem ipsum dolor sit amet consectetur adipisicing elit. Natus, recusandae?</li>
                            <li>Lorem ipsum dolor sit amet consectetur adipisicing.</li>
                        </ul>`,
                    image: 'ncs.jpg',
                }, {
                    title: 'Cara Makan : ',
                    text: `<ul>
                        <li>Lorem ipsum dolor sit amet consectetur adipisicing elit. Natus, recusandae?</li>
                        <li>Lorem ipsum dolor sit amet consectetur adipisicing.</li>
                        </ul>`,
                    image: 'ncs.jpg',
                },
            ]
        }
    }
}
</script>

<style></style>