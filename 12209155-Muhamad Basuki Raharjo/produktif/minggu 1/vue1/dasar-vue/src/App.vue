<template>
<p>-------templating--------------</p>
<p>{{ nama }}</p>
<p>{{ number }}</p>
<div v-html="kelas"></div>
<p>--------data binding-------------</p>
<button :disable="nonaktif">button</button>
<h1 v-bind="property">zae</h1>
<input :type="type">
<p>--------------------</p>
{{ count == 0 ? count + 1 : count + 2 }}
<p>----------------</p>
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
<p>---------------------------</p>
<input :type="typeInput">
<button @click="showPassword">show password</button>

<button @click="counterNumber">{{ countButton }}</button>
<button @click="countComputed">Computed {{ numberComputed }}</button>
<p>-------------------------------</p>
<ul>
  <li :class="{active:isActive, fs40px:isActive}">
    test
  </li>
</ul>
<button @click="ubahWarna">ubah warna</button>
<p>-----------------------------------</p>
<ul>
  <li v-for="(item, index) in daftarKelas">{{ index+1 }}{{ item }}</li>
</ul>
<p>-------------------------</p>
<input type="text" v-model="InputKelas">
{{ InputKelas }}
</template>
<script>
export default{
  data() {
    return {
      InputKelas: '',
      daftarKelas:['RPL 1', 'RPL 2', 'RPL 3'],
      typeInput: 'password',
      countButton: 0,
      numberComputed: 0,
      show: true,
      count: 1,
      nama:'basuki',
      Number: 1,
      kelas: '<h1>kelas</h1>',
      nonaktif: true,
      property: {
        id:1,
        class: 'color'
      },
      type:'password',
      isActive:true
    }
  },
  methods: {
   counterNumber(){
    this.countButton += 1;
   },
    showPassword(){
    if(this.typeInput == 'password'){
      this.typeInput = 'text';
    } else {
      this.typeInput = 'password';
    }
  },
    ubahWarna(){
      if(this.isActive){
        this.isActive = false;
      } else {
        this.isActive = true;
      }
    }
  },
  computed: {
    countComputed(){
      this.numberComputed += 1;
    }
  }
}
</script>

<style>
.color{
  color: aqua;
}
.fs40px{
  list-style: none;
  font-size: 16px;
}

.active{
  color: blue;
  list-style: none;
}
</style>