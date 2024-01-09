<!-- <script setup>
import HelloWorld from './components/HelloWorld.vue'
import TheWelcome from './components/TheWelcome.vue'
</script>

<template>
  <header>
    <img alt="Vue logo" class="logo" src="./assets/logo.svg" width="125" height="125" />

    <div class="wrapper">
      <HelloWorld msg="You did it!" />
    </div>
  </header>

  <main>
    <TheWelcome />
  </main>
</template>

<style scoped>
header {
  line-height: 1.5;
}

.logo {
  display: block;
  margin: 0 auto 2rem;
}

@media (min-width: 1024px) {
  header {
    display: flex;
    place-items: center;
    padding-right: calc(var(--section-gap) / 2);
  }

  .logo {
    margin: 0 2rem 0 0;
  }

  header .wrapper {
    display: flex;
    place-items: flex-start;
    flex-wrap: wrap;
  }
}
</style> -->

<template>
  <p>----------------templating---------------</p>
  {{ nama }}
  {{ number }}
  <div v-html="kelas"></div>
  <p>----------------data-Binding---------------</p>
  <button :disabled="nonaktif">button</button>
  <h1 v-bind="property">zold</h1>
  <input :type="type">
  <p>----------------data-Binding---------------</p>
  {{ count + 1  }}
  {{ count == 0 ? count + 1 : count + 2}} 
  <p>----------------v-if---------------</p>
  <button v-if="show">Submit</button>
  <!-- <button v-show="show">Submit</button> -->

  <div v-if="count == 1">
    number 1
  </div>

  <div v-else-if="count == 2">
    number 2
  </div>

  <div v-else>
    lebih dari 2
  </div>

  <!-- <p>----------------complated and method---------------</p>
  <button @click="counterNumber">methods {{ counterButton }}</button>
  <button @click="countComputed">Computed {{ numberComputed }}</button> -->

  <p>----------------complated and method---------------</p>
  <input :type="typeInput">
  <button @click="showPassword">show password</button>

  <p>----------------class and style---------------</p>
  <ul>
    <li :class="{
      active:isActive,
      fs40px: isActive
  }">
      test
    </li>
  </ul>
  <button @click="ubahWarna">ubah warna</button>

  <p>----------------List rendering---------------</p>
  <ul>
  <li v-for="(item,index) in daftarkelas">
    {{ index+1 }}{{ item }}</li>
  </ul>
  <p>----------------V Model---------------</p>

  <input type="" v-model="Inputkelas">
  {{ Inputkelas }}
  
 </template>

 <script>
 export default{
   data(){
     return{
      Inputkelas: '',
      daftarkelas:['PPLG 1','PPLG 2','PPLG 3','PPLG 4'],
      isActive: true,
      typeInput: 'password',
      counterButton: 0,
      numberComputed: 0,
      show: true,
      count: 0, 
       nama:'fathur',
       number: 8,
       kelas: '<h1>PPLG XI-2</h1>',
       nonaktif:false,
       property: {
        id: 1,
        class:'color'
       },

       typeInput:'password'
     }
   },
   methods: {
    counterNumber(){
      this.counterButton += 1
    },
    showPassword(){
      if(this.typeInput=='password'){
        this.typeInput = 'text';
      }
      else{
        this.typeInput = 'password';
      }
    },
    ubahWarna() {
        if(this.isActive) {
          this.isActive = false;
        } else {
          this.isActive = true;
      }
    }
   },
   computed: {
      countComputed(){
        this.numberComputed += 6;
      }
   }
 }
 </script>
 <style>
  .color{
    color:rebeccapurple;
  }

  .fs40px{
    font-size:40px;
  }

  .active{
    color: blue;
  }
</style>