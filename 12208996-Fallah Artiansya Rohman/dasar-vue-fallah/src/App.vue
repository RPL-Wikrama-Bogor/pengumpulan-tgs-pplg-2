<template>
  <p>---------data biding---------</p>
{{ nama }}
{{ number }}
<div v-html="kelas"></div>
<button :disabled="nonaktif">button</button>
<h1 v-bind="property">dudand</h1>
<input :type="typeInput"  v-model="nama">
<p>---------data binding---------</p>
{{ count == 0 ? count + 1 : count + 2 }}
<p>---------v-if---------</p>

<button v-if="show">submit</button>
<button v-show="show">submit</button>

<div v-if="count">
 number 1
</div>
<div v-else-if="count == 2">
  number 2
</div>
<div v-else>
  lebih dari 2
</div>
<P>----------computed dan methods----------</P>
<input :type="typeInput">
<button @click="showPassword"> {{ kondisi }} Password</button>

<!--<button @click="counterNumber">Methods {{ counterButton }}</button>
<button @click="countComputed">Computed {{ numberComputed }}</button>-->
<P>----------class dan style-----------</P>
<ul>
  <li :class="{active: isActive,
    fs40px: isActive}">
    test
  </li>
</ul>
<button @click="ubahWarna">ubahWarna</button>
<p>----------list endering----------</p>
<ul>
  <li v-for="(item, index) in daftarKelas"> {{ index + 1 }}{{ item }} </li>
</ul>
<p>----------v-model--------</p>
<input type="text" v-model="inputKelas">
{{ inputKelas }}
</template>

<script>
export default {
  data(){
    return{
      inputKelas: '',
      daftarKelas: ['PPLG 1','PPLG 2','PPLG 3'],
      kondisi:'show',
      counterButton: 0,
      numberComputed: 0,
      show: false,
      count : 1,
      nama: 'NAZIR',
      number: 'ANAK DUDAN',
      kelas: '<h1>kelas 11</h1>',
      nonaktif: false,
      property: {
        id: 1,
        class: 'color'
      },
      typeInput: 'password',
      isActive:true
    }
  },
  methods: {
  counterNumber(){
    this.counterButton += 1;
  },
  showPassword() {
    if(this.typeInput == 'password') {
      this.typeInput = 'text';
      this.kondisi = 'hide';
    }else{
      this.typeInput = 'password';
    }
  },
  ubahWarna(){
    if(this.isActive) {
      this.isActive = false;
    } else {
      this.isActive = true;
    }
  }
  },
  computed:{
    numberComputed (){
      this.numberComputed += 1;
    }
  }
}
</script>

<style >
.color{
color: red;
}
.fs40px {
  font-size: 40px;
}
.active {
  color: blue;
}
</style>