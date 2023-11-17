<template>
  <p>--------------templating---------------</p>
  {{ nama }}
  {{ number }}<br>
  <div v-html="rombel"></div>
  <button  :disabled="nonaktif">button</button>
  <h1 v-bind="property">maury</h1>
  <input :type="typeInput">

  <p>-------------data binding-------------</p>
  {{ count == 0 ? count + 1 :count + 2 }}

  <p>-------------v-if-------------</p>
  <button v-if="show">submit</button>
  <button v-show="show">submit</button>

  <div v-if="count == 1">
  number 1
  </div>

   <div v-else-if="count == 2">
    number 2
  </div>

   <div v-else>
   lebih dari 2
  </div>

  <p>----------computed dan method------------</p>
<input :type="typeInput">
<button @click="showPassword">Show Password</button>
  <!-- <button @click="counterNumber">method {{ counterButton }}</button>
  <button @click="countComputed">Computed {{ numberComputed }}</button> -->
  <p>------------class dan style----------------</p>
  <ul>
    <li class="fs" :class="{active:isActive}">
        test
    </li>
  </ul>
  <button @click="ubahWarna">ubah warna</button>
<p>--------------list rendering-----------------</p>
<ul>
  <li v-for="(item, index) in daftarKelas">{{index+1}} {{item}}</li>
</ul>
<p>--------------v-model---------------</p>
<input type="text" v-model="inputKelas">
{{ inputKelas }}
</template>

<script>
export default{
  data(){
    return {
      inputKelas: '',
      daftarKelas:['RPL 1', 'RPL 2', 'RPL 3'],
      typeInput: 'password',
      counterButton: 0,
      numberComputed: 1,
      count: 1,
      show: false,
      nama : 'zahra',
      number : 1,
      rombel : '<h1>PPLG XI-2</h1>',
      nonaktif: true,
      property: {
        id: 1,
        class : 'color'
      },
      typeInput: 'password',
      isActive: false,
    }
  },
  methods: {
    counterNumber(){

    this.counterButton += 1;
    },
    showPassword(){
    if(this.typeInput=='password'){
      this.typeInput = 'text';
    } else {
      this.typeInput = 'password';
    }
  },
  ubahWarna(){
    if(this.isActive){
      this.isActive = false;
    }else {
      this.isActive = true;
    }
  },
},
  computed : {
    countComputed (){
      this.numberComputed += 1;
    }
  }
}
</script>

<style>
.color{
  color: pink;
}
.fs{
  font-size: 20px;
}
.active {
    color: plum;
}
</style>