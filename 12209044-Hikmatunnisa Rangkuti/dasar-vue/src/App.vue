<template>
    <p>-----------------templating-----------</p>
  {{ nama }}
  {{ number }}
  <div v-html="kelas"></div>
  <button :disabled="nonaktif">button</button>
  <h1 v-bind="property">atun</h1>
  <input :type="type">
  <p>------------------data binding-----------</p>
  {{ count== 0 ? count + 1 : count + 2}}
  <p>------------------v-if -----------</p>
<button v-if="show">submit</button>
<button v-show="show">submit</button>

<div v-if="count ==1">
number 1
</div>
<div v-else-if="count==2">
number 2</div>
<div v-else>
  lebih dari 2
</div>
<p>--------------dan---computed  methods -----------</p>
<input :type="typeInput">
<button @click="showPassword">show password</button>
<!-- <button @click="counterNumber">methods{{ counterButton }}</button>
<button @click="countComputed">Computed{{ numberComputed }}</button> -->

<p>-----------------class dan style -----------</p>
<ul>
  <!-- <li class="fs" :class="{active:isActive}"> //mengubah warna-->
    <li :class="{active:isActive,fs40px: isActive}">
    <!-- class="fs"  -->
    test
  </li>
</ul>

<button @click="ubahWarna">ubah warna</button>
<p>-----------------list rendering -----------</p>
<ul>
  <li v-for="(item,index) in daftarKelas">{{ index }} {{ item }}</li>
</ul>

<p>-----------------v-model -----------</p>
<input type="text" v-model="inputkelas">
{{ inputkelas }}



</template>

<script>
export default{
  data(){
    return {
      inputkelas:'',
      daftarKelas:['RPL 1','RPL 2','RPL 3'],
      typeInput: 'password',
      numberComputed: 0,
      counterButton:0,
      nama: 'atun',
      number: 1,
      kelas: '<h1>kelas 11</h1>',
      nonaktif:true,
      property: {
        id: 1,
        class: 'color'
      },
      type: 'password',
      count:1,
      show: true,
      isActive:true
    }
  },
  methods:{
    counterNumber(){
      this.counterButton +=1;
    },
    showPassword(){
      if(this.typeInput == 'password') {
        this.typeInput = 'text';
      } else {
        this.typeInput = 'password';
      }
    },
    ubahWarna(){
      if(this.isActive){
        this.isActive=false;
      } else {
        this.isActive =true;
      }
    }
  },
  computed:{
    countComputed(){
      this.numberComputed +=1;
    }
  }
}
</script>

<style>
.color{
  color: blue;
}

.fs40px {
  font-size: 40px;
}

.fs{
  font-size: 20px;
}

.active{
  color: blue;
}
</style>