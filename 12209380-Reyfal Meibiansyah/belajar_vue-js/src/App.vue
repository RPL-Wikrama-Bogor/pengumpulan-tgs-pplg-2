<template>
  <p>----------------templating---------------</p>
  {{ nama }}
  {{ number }}
  <div v-html="kelas"></div>
  <p>----------------data-Binding---------------</p>
  <button :disabled="nonaktif">button</button>
  <h1 v-bind="property">Rezyy</h1>
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

  <p>----------------complated and method---------------</p>
  <button @click="counterNumber">methods {{ counterButton }}</button>
  <button @click="countComputed">Computed {{ numberComputed }}</button>

  <input :type="typeInput">
  <button @click="showPassword">show password</button>
  <!-- <button @click="counterNumber">{{ counterButton }}</button>
  <button @click="countComputed">Computed {{ numberComputed }}</button> -->
  <p>----------------class and style---------------</p>
  <ul>
    <li class="" :class="{active:isActive, fs40px:isActive}">
      test
    </li>
  </ul>
  <button @click="ubahWarna">ubah warna</button>
  <p>----------------list rendering---------------</p>
  <ul>
    <li v-for="(item,index) in daftarKelas">{{ index+1 }} {{ item }}</li>
  </ul>
  <p>----------------V-model---------------</p>
  <input type="text" v-model="inputKelas">
  {{ inputKelas }}
 </template>

 <script>
 export default{
   data(){
     return{
      inputKelas:'',
      daftarKelas:['PPLG 1','PPLG 2','PPLG 3'],
      isActive: true,
      typeInput:'password',
      counterButton: 0,
      numberComputed: 0,
      show: true,
      count: 0, 
       nama:'Reyfal',
       number: 8,
       kelas: '<h1>PPLG XI-2</h1>',
       nonaktif:false,
       property: {
        id: 1,
        class:'color'
       },

       type:'password'
     }
   },
   methods: {
    counterNumber(){
      this.counterButton += 1
    },
    showPassword(){
      if(this.typeInput=='password'){
        this.typeInput = 'text';
      }else {
        this.typeInput = 'password';
      }
    },
    ubahWarna(){
    if(this.isActive){
      this.isActive = false;
    }else {
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
    font-size: 40px;
  }
  .active{
    color: blue;
  }
</style>