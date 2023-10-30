<template>
  <p>------------templating-------------</p>
  {{ nama }} <!--memanggil variable nama dari function data-->
  {{ number }} <!--memanggil variable nama dari function data-->
  <div v-html="kelas"></div> <!-- v-html(directive) untuk merubah isi dari variable kelas menjadi sebuah elemen bukan data string -->
  <p>------------data binding-------------</p>
  <button v-if="show">Submit</button> <!--v-if untuk menghapus atau merender dengan kondisi tertentu-->

  <div v-if="count == 1">
    number 1
  </div>
  <div v-else-if="count == 2">
    number 2
  </div>
  <div v-else>
    lebih dari 2
  </div>
  {{ count == 0 ? count + 1 : count + 2 }}
  <p>------------computed dan methods-------------</p>

  <input :type="typeInput">
  <button @click="showPassword"> {{ kondisi }} password</button>
  <!-- <button @click="counterNumber">methods{{ counterButton }}</button> -->
  <!--ketika button di click akan menjalan kan fucntion counterNumber-->
  <!-- <button @click="countComputed">Computed{{ numberComputed }}</button> -->
  <!--ketika button di click akan menjalan kan fucntion counterNumber-->
  
  <!-- {{ count + 1 }} -->
  <p>------------v-if-------------</p>
  <h1 v-bind="property">Ryuu25</h1> <!--v-bind digunakan untuk data binding atau update nilai dari atirubut.-->
  <input :type="typeInput">
  <button :disabled="nonaktif">Button</button> <!---->


  <p>------------class dan style-------------</p>
  <ul>
    <li :class="{active:isActive, fs40px:isActive}">
      test
    </li>
  </ul>
  <button @click="ubahWarna">ubah warna</button>

  <p>------------list rendering-------------</p>
  <ul>
    <li v-for="(item,index) in daftarKelas">
      {{ index+1 }}{{ item }}</li>
  </ul>

  <p>------------v-model-------------</p>
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
      kondisi: 'show',
      counterButton: 0,
      numberComputed: 0,
      show: true,
      count: 3,
      nama:'Yoga',
      number: 1,
      kelas:'<h1>kelas 11</h1>',
      nonaktif:true, //jika nilai dalam valriable bernilai true maka tombol akan disable
      property: {
        id: 1,
        class:'color'
      },
      typeInput: 'password',
      isActive:true
    }
  },
  methods: {
    counterNumber(){
      // alert(this.counterButton)
      this.counterButton += 1; //akan bertambah jika button di click-
    },
    showPassword() {
      if(this.typeInput == 'password') {
        this.typeInput = 'text';
        this.kondisi= 'hide';
      } else {
        this.typeInput = 'password';
        this.kondisi= 'show';
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
      this.numberComputed += 6;
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