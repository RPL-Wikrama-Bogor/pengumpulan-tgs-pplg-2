<template>
  <p>----------------Templating----------------</p>
  {{ nama }}
  {{ number }}
  <p>----------------Raw HTML----------------</p>
  <div v-html="kelas"></div>
  <p>----------------Data Binding----------------</p>
  <button :disabled="nonaktif">button</button>
  <h1 v-bind="property">Ryo</h1>
  <input :type="type">
  <p>----------------Data Binding (JS Expression)----------------</p>
  {{ count == 0 ? count + 1 : count + 2 }}
  <!-- melibatkan element -->
  <p>----------------v-if----------------</p>
  <button v-if="show">submit</button>
  <button v-show="show">submit</button>
  <div v-if="count == 1">
    number 1
  </div>
  <div v-else-if="count == 2">
    number 2
  </div>
  <div v-else="count == 3">
    lebih dari 2
  </div>
  <p>----------------Computed and Method----------------</p>
  <input :type="typeInput">
  <button @click="showPassword">show password</button>
  <br>
  <button @click="countComputed"> computed {{ numberComputed }}</button>
  <button @click="counterNumber">method {{ counterButton }}</button>
  <p>----------------Class and Style Binding----------------</p>
  <ul>
    <li :class="{ active: isActive, fs40px: isActive }">
      test
    </li>
  </ul>
  <button @click="ubahWarna">change color</button>
  <p>----------------List Rendering----------------</p>
  <ul>
    <li v-for="(item, index) in daftarSiswa">{{ index + 1 }}{{ item }}</li>
  </ul>
  <p>----------------v-model----------------</p>
  <input type="text" v-model="inputClass">
  {{ inputClass }}
</template>

<script>
export default {
  data() {
    return {
      nama: 'Eiar',
      number: 27,
      // raw html
      kelas: '<h1>Kelas 11</h1>',
      // data binding
      nonaktif: true,
      property: {
        id: 1,
        class: 'color'
      },
      type: 'password',
      // data binding (js ex)
      count: 0,
      // v-if
      show: true,
      // computed and method
      counterButton: 0,
      numberComputed: 0,
      typeInput: 'password',
      // // class and style binding 
      isActive: true,
      // list rendering
      daftarSiswa: ['Eiar', 'Ryo', 'Massendra'],
      // v-model
      inputClass: ''
    }
  },
  methods: {
    counterNumber() {
      this.counterButton += 1;
    },
    showPassword() {
      if (this.typeInput == 'password') {
        this.typeInput = 'text'
      } else {
        this.typeInput = 'password'
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
  computed: {
    countComputed() {
      this.numberComputed += 6;
    }
  }

}
</script>

<style>
.color {
  color: blue;
}

.fs {
  font-size: 20px;
}

.fs40px {
  font-size: 40px;
}

.active {
  color: blueviolet;
}
</style>
