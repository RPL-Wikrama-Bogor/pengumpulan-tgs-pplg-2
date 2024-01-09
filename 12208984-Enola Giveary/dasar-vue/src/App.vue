

<template>
  <p>----------------templating-------------------</p>
{{ nama }} <br> 
<div v-html="kelas"></div> <br>

<button :disabled="nonaktif">Button</button>
<h1 v-bind="property">Hann</h1>
<input :type="typeInput">
<p>----------- data-binding ----------------------</p>
{{ count == 0 ? count + 1 : count + 2 }}

<p>-----------v-lif----------------------</p>
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

  
  <p>----------- computed dan method ----------------------</p>
  <input :type="typeInput">
  <button @click="showPassword">Show Password</button>
  <!-- <button @click="counterNumber">Method {{ counterButton }}</button> <br>
  <button @click="countComputed">Computed {{ numberComputed }}</button> -->

  <p>----------- class and style ----------------------</p>
  <ul>
    <li :class="{active:isActive, fs40px: isActive}">
      test
    </li>
  </ul>
  <button @click="ubahWarna">Ubah Warna</button>

  <p>----------- list rendering ----------------------</p>
  <ul>
    <li v-for="(item, index) in daftarKelas">{{index+1}} {{ item }}</li>
  </ul>

  <p>----------- v-model ----------------------</p>
  <input type="text" v-model="inputKelas">
  {{ inputKelas }}
  
</template>

<script>
export default{
  data() {
    return {
      inputKelas: '',
      daftarKelas: ['RPL 1', 'RPL 2', 'RPL 3'],
      typeInput: 'password',
      counterButton : 0,
      numberComputed : 0,
      show : false,
      count : 3,
      nama:'jeonghan', 
      kelas : 'kelas XIIIII',
      nonaktif : true,
      property: {
        id : 1,
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
    if(this.typeInput == 'password'){
      this.typeInput = 'text';
    } else{
      this.typeInput = 'password';
    }
  },
  ubahWarna(){
    if(this.isActive){
      this.isActive = false;
    } else{
      this.isActive = true;
    }
  },
  },
  computed : {
    countComputed(){
      this.numberComputed += 6;
    }
  }
}

</script>

<style>
.color {
  color: aqua ;
}
.fs40px {
  font-size: 20px;
}
.active {
  color:aquamarine ;
}
</style>