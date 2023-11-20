<template>
  <p>-----------------templating-----------</p>
{{ nama }}
{{ number }}
<div v-html="kelas"></div>
<button :disabled="nonaktif">button</button>
<h1 v-bind="property">bey</h1>
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
<p>------------------computed dan methods -----------</p>
<input :type="typeInput">
<button @click="showPassword">show password</button>

<!-- <button @click="counterNumber">methods {{ counterButton }}</button>
<button @click="countComputed">Computed {{ numberComputed }}</button> -->
<p>------------------class and style binding-----------</p>
<ul>
  <li :class="{active: isActive, fs40px: isActive}">
    test
  </li>
</ul>
<button @click="ubahWarna">ubah warna</button>
<p>------------------conditional rendering-----------</p>
<ul>
  <li v-for="(item,index) in daftarKelas">{{ index }} {{ item }}</li>
</ul>
<p>------------------v model-----------</p>
<input type="text" v-model="InputKelas"> {{ Inputkelas }}

</template>

<script>
export default{
data(){
  return {
    daftarKelas: ['RPL 1', 'RPL 2', 'RPL 3'],
    typeInput: 'password',
    numberComputed: 1,
    counterButton: 0,
    nama: 'berlian',
    number: 1,
    kelas: '<h1>kelas 11</h1>',
    nonaktif:true,
    property: {
      id: 1,
      class: 'color'
    },
    type: 'password',
    count:1,
    show: true
  }
},
methods:{
  counterNumber(){
   this.counterButton += 1;
  },
  showPassword(){
    if(this.typeInput=='password'){
      this.typeInput= 'text';
    }else{
      this.typeInput = 'password';
    }
  }
},
ubahWarna(){
  if(this.isActive){
    this.isActive = false;
  } else {
    this.isActive = true;
  }
},
computed:{
  countCompeted(){
    this.numberComputed += 1;
  }
}
}
</script>

<style>
.color{
color: pink;
}
.fs40px{
  font-size: 20px;
}

.active{ 
  color: black;
}
</style>