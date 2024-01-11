<template>
  <div class="row-service">
  <Card v-for="item in data" :title="item.title" :description="item.description"><p>{{ item.date }}</p></Card>
  </div>
  <button class="btn-service">Detail</button>
  <MyBtn id="btn1" name="btn"></MyBtn>
  <MyBtn id="btn2" name="btn2"></MyBtn> 
</template>
<script>
  import Card from '@/components/my-components/Card.vue';
  export default {
    components: {
      Card,
      'card-service': Card
    },
    data(){
      return {
        data: [
          {
            title: 'Anastasia',

            description: "Anastasia (アナスタシア Anasutashia) is an idol available in THE iDOLM@STER Cinderella Girls and THE iDOLM@STER Cinderella Girls Starlight Stage. She's voiced by Sumire Uesaka (上坂すみれ Uesaka Sumire).",
            
            date: '31 Oktober 2023'
          },
          {
            title: 'Athanasia De Alger Obelia',
            description: "Athanasia de Alger Obelia is the main protagonist in Who Made Me a Princess, and the current Crown Princess of the Obelian Empire. After reading a romance fantasy novel named The Lovely Princess, the protagonist goes to sleep and finds herself reincarnated into the infant body of Athanasia,[5] a side character in the fictional novel who was executed by her father, Claude de Alger Obelia, for poisoning the beloved Princess Jennette Margarita.[6] In her new life, Athanasia is determined to avoid her fated execution and survive past the age of 18.[7]",
            date: '31 Oktober 2023'
            

          }
        ]
      }
    }
  }
</script>
<style>
.row-service{
  display: grid;
  grid-template-columns: repeat(3, 1fr);
  grid-gap: 10px ;
}

.btn-service-global{
    margin-top: 10px;
    font-size: 16px;
    font-weight: 400;
    color: white;
    background-color: blue;
    padding: 15px 20px;
    border: none;
    border-radius: 5px;
}
.btn-service-global:hover{
    background-color: #343b4e;
    border-radius: 50px;
    cursor: pointer;
    transition: 0.6s;
}

</style>