<template>
  <h1 class="h1">Belajar VueJS</h1>
  <p>-------Templating-------</p>
  {{ nama }}
  {{ number }}
  <div v-html="kelas"></div>
  
  <p>-------Data Binding-------</p>
  <button :disabled="nonaktif">Kirim</button>
  <h1 v-bind="property">Bolu Ubi</h1>
  <input :type="type" v-model="nama"/>

  <p>-------Data Binding-------</p>
  {{ count == 0 ? count + 1 : count + 2 }}

  <p>-------v-if-------</p>
  <button v-if="show">Submit</button>
  <button v-show="show">Submit</button>
  
  <div v-if="count == 1">
    Number 1
  </div>
  <div v-else-if="count == 2">
    Number 2
  </div>
  <div v-else>
    Lebih dari 3
  </div>
  
  <p>-------Computed & Method-------</p>
  <button @click="counterComputed">Computed : {{ numberComputed }}</button>
  <button @click="counterNumber">Method : {{ counterButton }}</button>

  <br><br>

  <input :type="typeInput">
  <button @click="showPassword">{{ kondisi }} Password</button>

  <p>-------Class & Style-------</p>
  <ul>
    <li :class="{
      active: isActive, 
      fs40px: isActive
    }">
      test
    </li>
  </ul>
  <button @click="ubahWarna">Ubah Warna</button>
  <p>-------List Rendering-------</p>
  <ul>
    <li v-for="(item, index) in daftarKelas">{{ index + 1 }} {{ item }}</li>
  </ul>
  <p>-------v-model-------</p>
  <input type="text" v-model="inputKelas">
  {{ inputKelas }}
</template>

<script>
  export default {
    data() {
      return {
        inputKelas: '',
        daftarKelas: ['RPL 1', 'RPL 2', 'RPL 3'],
        typeInput: 'password',
        kondisi: 'show',
        numberComputed: 0,
        counterButton: 0,
        show: false,
        count: 1,
        nama: 'Ikyy',
        number: 196,
        kelas: '<h1>Kelas 11</h1>',
        nonaktif: true,
        property: {
          id: 1,
          class: 'color'
        },
        type: 'password',
        isActive: true,
      }
    },
    methods: {
      counterNumber() {
        this.counterButton += 1;
      },
      showPassword() {
        if(this.typeInput == 'password') {
          this.typeInput = 'text';
          this.kondisi = 'hide';
        } else {
          this.typeInput = 'password';
          this.kondisi = 'show';
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
    computed: {
      counterComputed() {
        this.numberComputed += 6;
      }
    }
  }
</script>

<style>
  .h1 {
    text-align: center;
  }
  .color {
    color: red;
  }
  .fs40px {
    font-size: 40px;
  }
  .active {
    color: blue;
  }
</style>

