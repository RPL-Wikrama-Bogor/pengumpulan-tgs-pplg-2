<template>

  <p>-----------templating------------</p>
  {{ nama }}
  {{ absen }}
  <div v-html="kelas"></div>

  <p>-----------data binding------------</p>
  <button :disabled="nonaktif">button</button>
  <h1 v-bind="property">razzah</h1>
  <input :type="typeInput" v-model="nama">

  <p>-----------data binding------------</p>
  {{ count == 0 ? count + 1 : count + 2 }}

  <p>-----------v-if------------</p>
  <button v-if="show">submit</button>
  <button v-show="show">submit</button>

  <div v-if="count">
    number 1
  </div>
  <div v-else-if="count">
    number 2
  </div>
  <div v-else>
    lebih dari 2
  </div>
  <p>-----------computed dan method------------</p>


  <input :type="typeInput">
  <button @click="showPassword">show password</button>

  <!-- <button @click="counterNumber">methods {{ counterButton }}</button>
  <button @click="countComputed">computed {{ numberComputed }}</button> -->

  <p>-----------class dan style------------</p>

  <ul>
    <li :class="{active:isActive,fs30px: isActive}">
      test
    </li>
  </ul>
  <button @click="ubahWarna">ubah warna</button>
  <p>-----------list rendering-----------</p>
  <ul>
    <li v-for="(item, index) in daftarKelas">{{ index+1 }}{{ item }}</li>
  </ul>
  <p>-----------v-model------------</p>
  <input type="text" v-model="kelas">
  {{ InputKelas }}
</template>

<script>
export default{
  data(){
    return {
      daftarKelas:['PPLG 1', 'PPLG 2', 'PPLG 3'],
      typeInput: 'password',
      counterButton: 0,
      numberComputed: 0,
      show: false,
      count: 1,
      nama: 'razzah',
      absen: 1,
      kelas: '<h1>kelas 11</h1>',
      nonaktif: true,
      property: {
        id: 1,
        class: 'color'
      },
      typeInput: 'password',
      isActive: true
    }
  },
  methods:{
    counterNumber() {
      this.counterButton += 1;
    },
    showPassword() {
      if (this.typeInput == 'password') {
        this.typeInput = 'text';
      }else {
        this.typeInput = 'password';
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
  color:red;
}
.fs30px{
  font-size: 30px;
}
.active{
  color: blue;
}
</style>