<template>
  <div>
    <p>----------------templating---------------</p>
    {{ nama }}
    {{ number }}
    <div v-html="kelas"></div>
    <p>----------------data-Binding---------------</p>
    <button :disabled="nonaktif">button</button>
    <h1 :class="property.class">Sultan</h1>
    <input :type="type">
    <p>----------------data-Binding---------------</p>
    {{ count + 1 }}
    {{ count === 0 ? count + 1 : count + 2 }}
    <p>----------------v-if---------------</p>
    <button v-if="show">Submit</button>

    <div v-if="count === 1">
      number 1
    </div>

    <div v-else-if="count === 2">
      number 2
    </div>

    <div v-else>
      lebih dari 2
    </div>

    <p>----------------completed and method---------------</p>
    <button @click="counterNumber">methods {{ counterButton }}</button>
    <button @click="countComputed">Computed {{ numberComputed }}</button>
    <input :type="typeInput">
    <button @click="showPassword">show password</button>
    <p>----------------class and style---------------</p>
    <ul>
      <li :class="{ active: isActive, fs40px: isActive }">
        test
      </li>
    </ul>
    <button @click="ubahWarna">Ubah Warna</button>
    <p>----------------List Rendering---------------</p>
    <ul>
      <li v-for="(item, index) in daftarKelas" :key="index">
        ({{ index + 1 }}) {{ item }}
      </li>
    </ul>
  </div>
</template>

<script>
export default {
  data() {
    return {
      daftarKelas: ['RPL 1', 'RPL 2', 'RPL 3'],
      isActive: true,
      typeInput: 'password',
      counterButton: 0,
      numberComputed: 0,
      show: true,
      count: 0,
      nama: 'Sultan',
      number: 30,
      kelas: '<h1>PPLG XI-2</h1>',
      nonaktif: false,
      property: {
        id: 1,
        class: 'color',
      },
      type: 'password',
    };
  },
  methods: {
    counterNumber() {
      this.counterButton += 1;
    },
    showPassword() {
      this.typeInput = this.typeInput === 'password' ? 'text' : 'password';
    },
    ubahWarna() {
      this.isActive = !this.isActive;
    },
  },
  computed: {
    countComputed() {
     this.numberComputed += 6;
    },
  },
};
</script>

<style>
.color {
  color: rebeccapurple;
}
.fs40px {
  font-size: 40px;
}
.active {
  color: forestgreen;
}
</style>
