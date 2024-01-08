<template>
  <p>=-=-= | Templating | =-=-=</p>
  {{ nama }}
  {{ nis }}
  <div v-html="kelas"></div>
  <button :disabled="nonaktif">Button</button>
  <h1 v-bind="property">nyo</h1>
  <p>=-=-= | Data binding | =-=-=</p>
  <input :type="typeInput">
  {{ count == 0 ? count +1 : count + 2 }}
  <p>=-=-= | V-if | =-=-=</p>
  <button v-if="show">submit!</button>
  <button v-show="show">submit!</button>
  
  <div v-if="count == 1">
    Number one
  </div>

  <div v-else-if="count == 2">
    Number two
  </div>
  
  <div v-else>
    LAH!!!?
  </div>

  <p>=-=-= | Computeds dan Methods | =-=-=</p>
  <input :type="typeInput">
  <button @click="showPassword">Show Password</button>

  <!-- <button @click="counterNumber">{{ counterButton }}</button>
  <button @click="countComputed">Computed {{ numberComputed }}</button> -->
  
  <p>=-=-= | Class dan Style | =-=-=</p>
  <ul style="list-style: none;">
    <li :class="{active:isActive,fs45px:isActive}">
      IKBAL
    </li>
  </ul>

  <button @click="ubahWarna">Tambah Background</button>

  <p>=-=-= | List Rendering | =-=-=</p>
  <ul style="list-style: none;">
    <li v-for="(item,index) in daftarKelas">{{ index+1 }}. {{ item }}</li>
  </ul>

  <p>=-=-= | v-model | =-=-=</p>
  <input type="text" v-model="Inputkelas">
  {{ Inputkelas }}

</template>

<script>
export default {
  data(){
    return {
      daftarKelas : ["PPLG XI-1", "PPLG XI-2", "PPLG XI-3", "PPLG XI-4", "PPLG XI-5", "PPLG XI-6", "PPLG XI-7", "PPLG XI-8", "PPLG XI-9"],
      typeInput : "password",
      counterButton: 0,
      numberComputed: 0,
      show : false,
      count : 1,
      nama : "Ikbal | ",
      nis : 12209175,
      kelas : "<h1>Kelas 11</h1>",
      nonaktif : false,
      property : {
        id : 1,
        class : 'color'
      },
      typeInput : "password",
      isActive : false,
    }
  },
  methods : {
    counterNumber() {
      this.counterButton += 1;
    },
    showPassword() {
      if(this.typeInput == 'password'){
        this.typeInput = 'text';
      }else{
        this.typeInput = 'password';
      }
    },
    ubahWarna() {
      if (this.isActive) {
        this.isActive = false;
      } else {
        this.isActive = true;
      }
    }
  },
  computed : {
    countComputed() {
      this.numberComputed += 6;
    }
  }
}
</script>

<style>
  h1{
    Background-color: salmon;
    border-radius: 10px; 
    padding: 1%; 
    width: 10%; 
    cursor: pointer;
  }
  .color {
    color: purple;
  } 
  .fs45px {
    font-size: 45px;
  }
  .active {
    color : white;
    background-image: linear-gradient(red, blue);
    padding: 10px;
    width : 11%;
    border-radius: 10px;
  }
</style>