<template>

<p>----------------templating-----------------</p>

  {{ nama }}
  {{ number }}

  <div v-html="kelas" ></div>

<button :disabled="nonaktif" > button </button>

<h1 v-bind="property" > zii </h1>

<input :type="type">

<p>----------------data binding-----------------</p>


{{ count + 1 }} 

{{ count == 0 ? count + 1 : count + 2 }}


<p>----------------V-IF-----------------</p>


<button v-if="show"> submit </button>

<div v-if="count == 1" > Number satu </div>

<div v-else-if="count == 2" > Number dua </div>

<div v-else > Bukan satu atau dua </div>



<p>----------------Computed dan method-----------------</p>

<input :type="typeInput">
<button @click="showPassword">show password</button>

<!-- <button @click="counterNumber" > {{ counterButton }} </button>
<button @click="countComputed"> computer {{ numberComputed }} </button> -->





<p>----------------Class dan Style----------------</p>

<ul>
  <li :class="{
    active:isActive,
    fs:isActive
  }"> tesss</li>
</ul>

<button @click="ubahWarna">Ubah warna</button>


<p>----------------List rendering----------------</p>


  <ul>
  <li v-for=" (item, index) in daftarKelas" > {{ index + 1 }} {{ item }} </li>
  </ul>



<p>----------------V-Model----------------</p>

<input type="text" v-model="Inputkelas">
{{ Inputkelas }}



</template>


<script>

export default{

   data(){  //data adalah tempat penyimpanan property//
    return {
      Inputkelas: '',
      daftarKelas: ['RPL1', 'RPL2', 'RPL3', 'RPL4'],
      typeInput: 'password',
      counterButton: 0,
      numberComputed: 0,
      show: true,
      count : 0,
      nama: 'Aldo',
      number : 100,
      kelas : '<h1>XI</h1>',
      nonaktif : false,
      property:{
        id : 1,
        class: 'color',
      },
      type: 'password',
      isActive: false,

    }
  }, 
  methods: { //method adalah tempat penyimpanan function
    counterNumber(){
      this.counterButton += 1;
    },
    showPassword(){
      if (this.typeInput == 'password') {
        this.typeInput = 'text';
      } else{
        this.typeInput = 'password';
      }
    },

    ubahWarna(){  
    if(this.isActive == true){
      this.isActive = false;
    }
      else {
        this.isActive = true;
      }
    }

  },
  computed: { //menjalankan function hanya sekali
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


  .fs{

    color: blue;
    font-size: 20px;

  }

  .active{
    color: blue;
  }

</style>