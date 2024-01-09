<!-- wajib jika tidak ada maka tidak jalan programnya -->
<template>
  <div>
    <p>----------------templating----------------</p>
  {{ nama }}
  {{ number }}
  <div v-html="kelas"></div>
  <p>----------------data binding----------------</p>
  <button :disabled="nonaktif">button</button>
  <p>----------------javaScript Ekspresion----------------</p>
  {{ count }}
  {{ count == 0 ? count = 1 : count + 2}}
  <h1 v-bind="property">Vlykz</h1>
  <input :type="type">
  </div>
  <p>----------------v-if----------------</p>

  <button v-if="show">button if</button>
  <button v-show="show">button show</button>

  <div v-if="count == 1">
  number 1
  </div>
  <div v-else-if="count == 2">
  number 2
  </div>

<div v-else>
  lebih dari 2
</div>
<p>---------------computed and method----------------</p>
<input :type="typeInput">
<button @click="showPassword">show password</button>
<br><br>
<button @click="counterNumber">methods {{ counterButton }}</button>
<button @click="countComputed">computed {{ numberComputed }}</button>

<p>----------------Class and Style----------------</p>
<ul>
  <li  :class="{ active: isActive, fs:isActive }">
    test
  </li>
</ul>

<button @click="ubahWarna">Ubah Warna</button>
<p>----------------List Rendering----------------</p>
<ol>
  <li v-for="item in daftarKelas">{{ item }}</li>
</ol>
<p>----------------Form Binding----------------</p>
<input type="text" v-model="Inputkelas">
{{ Inputkelas }}
</template>

<script>
export default {
  data(){
    return {
      Inputkelas: '',
      daftarKelas: ['PPLG XI 1', 'PPLG XI 2', 'PPLG XI 3'],
      typeInput: 'password',
      counterButton: 0,
      numberComputed: 0,
      show: true,
      count: 1,
      nama: 'Vlykz',
      number: 1,
      kelas: '<h1> Kelas 11</h1>',
      nonaktif:true,
      property:{
        id: 1,
        class: 'color'
      },
      type: 'password',
      isActive: true
    } 
  },
  methods: {
    counterNumber(){
      this.counterButton += 1;
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
    if(this.isActive){
      this.isActive = false;
    }
    else {
      this.isActive = true;
    }
  }
  },
  computed:{
    countComputed(){
      this.numberComputed += 1;
    }
  }
 
}
</script>

<style>
.color {
  color: green; 
}
.active {
  color: aqua;
}
.fs {
  font-size: 35px;
}
</style>