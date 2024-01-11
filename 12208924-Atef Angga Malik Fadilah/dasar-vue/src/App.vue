<template>
  <p>----------templating----------</p>
  {{ nama }} <!--memanggil variable nama dari function data-->
  {{ number }} 
  <div v-html="kelas"></div> <!-- v-html untuk merubah isi dari variable kelas menjadi sebuah elemen -->
  <p>----------data binding----------</p>
  <!-- {{ count + 1 }} -->
  {{ count == 0 ? count + 1 : count + 2 }}
  <button :disabled="nonaktif">button</button>``
  <p>----------v-if----------</p>
  <h1 v-bind="property">Fetzz</h1> <!-- v-bind digunakan untuk data binding atau update nilai dari attribut -->
  <input :type="typeInput">
  <button v-if="show">Submit</button>

  <div v-if="count == 1">
    number 1
  </div>

  <div v-else-if="count == 2">
    number 2
  </div>

  <div v-else>
    lebih dari 2
  </div>
  <p>----------computed dan methods----------</p>
  <input :type="typeInput">
  <button @click="showPassword">{{ kondisi  }} password</button><br>
  <!-- <button @click="counterNumber">{{ counterButton }}</button>
  <button @click="countComputed">Computed {{ counterComputed }}</button> -->
  <p>----------class dan style----------</p>
  <ul>
    <li :class="{active:isActive, fs40px:isActive}">
      test
    </li>
  </ul>
  <button @click="ubahWarna">ubah warna</button>
  <p>----------list rendering----------</p>
  <ul>
    <li v-for="item, index in daftarKelas">{{ index+1 }} {{ item }}</li>
  </ul>
  <p>----------v-model----------</p>
  <input type="text" v-model="inputKelas">
  {{ inputKelas }}
</template>

<script>
  export default{
    data() {
      return {
        inputKelas: '',
        daftarKelas:['RPL 1', 'RPL 2', 'RPL 3 '],
        kondisi: "show",
        counterComputed:0,
        counterButton: 0,
        show: true,
        count: 0,
        nama:"Angga",
        number: 7,
        kelas:'<h1>kelas 11</h1>',
        nonaktif:false, // jika nilai dalam variable bernilai true maka tombol akan disable
        property: {
          id: 1,
          class: 'color'
        },
        typeInput: "password",  
        isActive: true
      }
    },
    methods: {
      counterNumber(){
        this.counterButton+=1
      },
      showPassword(){
        if(this.typeInput == "password"){
          this.typeInput = "text";
          this.kondisi="hide";
      } else{
          this.typeInput = "password";
          this.kondisi="show";
        }
    },
    ubahWarna() {
        if(this.isActive) {
          this.isActive = false;
        } else {
          this.isActive = true;
        }
      }
    },
    computed:{
      countComputed(){
        this.counterComputed+=6
      }
    }
  }


</script>

<style>
  .color{
    color: red;
  }
  .fs40px{
    font-size: 40px;
  }
  .active{
    color: blue;
  }
</style>