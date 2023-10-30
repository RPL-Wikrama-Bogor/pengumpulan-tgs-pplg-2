<template>
  <p>--------------------templating-------------</p>
{{ nama }}
{{ number }}
<div v-html="kelas"></div>
<p>--------------------data binding-------------</p>
<button :disabled="nonaktif">Submit</button>
<h1 v-bind="property">Tururum</h1>
<input :type="typeInput">
<p>--------------------data binding-------------</p>
{{count == 0 ? count + 1 : count + 2}}
<p>--------------------v-if-------------</p>
<button v-if="show">Submit</button>
<div v-if="count==1">
Number 1
</div>
<div v-else-if="count==2">
Number 2
</div>
<div v-else>
Lebih dari 2
</div>
<p>--------------------v-show-------------</p>
<button v-show="show">Submit</button>
<p>--------------------computed-and-method-------------</p>
<!-- @click jika button di klik -->
<input :type="typeInput">
<button @click="showPassword">Show Password</button>
<hr>
<button @click="counterNumber">{{ counterButton }}</button>
<hr>
<button @click="countComputed">Computed {{ numberComputed }}</button>
<p>--------------------class-dan-style-------------</p>
<ul>
  <li class="fs" :class="{active:isActive ,fs40px : isActive}">
    test
  </li>
</ul>
<button @click="ubahWarna">Ubah Warna</button>
<p>--------------------class-dan-style-------------</p>
<ul>
  <li v-for="(item,index) in daftarKelas">{{ index+1 }}
    {{item}}</li>
</ul>
<p>--------------------V-model-------------</p>
<input type="text" v-model="Inputkelas">
{{ Inputkelas }}
<!-- titik dua diawaal menandakan bahwa suatu properti membutuhkan data -->
<!-- data binding untuk mengikat attribut html yang akan menuju data properti di js -->
</template>
<script>
export default{
  data(){
    return{
      Inputkelas:'',
      daftarKelas:['RPL 1','RPL 2','RPL 3'],
      typeInput : 'password',
      counterButton : 0,
      numberComputed : 0,
      show : true,
      count : 2,
      nama : 'Azqi',
      number : 1,
      kelas:'<h1>PPLG XI-2</h1>',
      nonaktif: true,
      property:{
        id:1,
        class : 'color'
      },
      typeInput:'password',
      isActive:true
    }
  },
  methods:{
    counterNumber(){
      // alert(this.counterButton)
      this.counterButton += 1;
    },
    showPassword(){
      if(this.typeInput == 'password'){
        this.typeInput = 'text';
      }
      else{
        this.typeInput = 'password'
      }
    },    
    ubahWarna(){
      if(this.isActive){
        this.isActive = false;
      }
      else{
        this.isActive = true;
      }
    }
  },
  computed:{
    countComputed(){
      this.numberComputed += -1;
    }
  }
}
</script>
<style>
.color{
  color: red;
}
.fs{
  font-size: 20px;
}
.fs40px{
  font-size: 40px;
}
.active{
  color: blue;
}
</style>
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
