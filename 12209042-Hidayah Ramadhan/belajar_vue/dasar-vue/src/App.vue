<template>
<p>----------templating----------</p>
{{ nama }}
{{ number }}
<div v-html="kelas"></div>
<p>----------data binding----------</p>
<button :disabled="nonaktif">Submit</button>
<h1 v-bind="property">Hidara</h1>
<input :type="type">
<p>----------data binding----------</p>
{{ count == 0 ? count + 1 : count + 2 }}
<p>----------v-if----------</p>

<button v-if="show">Submit</button>
<button v-show="show">Submit</button>

<div v-if="count == 1">
  number 1
</div>
<div v-else-if="count == 2">
  number 2
</div>
<div v-else>
  lebih dari 2
</div>
<p>----------computed dan methodes----------</p>
<input :type="typeInput">
<button @click="showPassword">show password</button>
<br><br>
<button @click="conterNumber">methods {{ counterButton }}</button>
<button @click="countComputed">computed {{ numberComputed }}</button>

<p>----------class dan style----------</p>
<ul>
  <li :class="{active:isActive, fs:isActive}">
    test
  </li>
</ul>
<button @click="ubahWarna">Ubah Warna</button>

<p>----------list rendering----------</p>

<ul>
  <li v-for="(item, index) in daftarKelas">{{ index+1 }}{{ item }}</li>
</ul>

<p>----------v-model----------</p>
<input type="text" v-model="Inputkelas">
{{ Inputkelas }}
</template>

<script>
export default{
  data(){
    return {
      Inputkelas: '',
      daftarKelas:['RPL 1', 'RPL 2', 'RPL 3'],
      typeInput: 'password',
      counterButton: 0,
      numberComputed: 0,
      show: true,
      count: 2,
      nama:'Hidara',
      number: '1',
      kelas: '<h1>kelas 11</h1>',
      nonaktif: false,
      property: {
        id: 1,
        class: 'color'
      },
      type: 'password',
      isActive:true
    }
  },
  methods: {
    conterNumber(){
      this.counterButton += 1;
    },
    showPassword() {
    if(this.typeInput=='password'){
      this.typeInput = 'text';
    } else {
      this.typeInput = 'password';
    }
    },
    ubahWarna(){
    if (this.isActive) {
      this.isActive = false;
    } else {
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
  color: red;
}
.fs {
  font-size: 20px;
}
.active {
  color: blue;
}
</style>