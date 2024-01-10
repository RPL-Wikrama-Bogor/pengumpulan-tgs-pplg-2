<!--setiap kode v-bind/v-html disebut dengan direktif vue js-->
<template>
  
  <p>-----------------Templating------------------</p>

  <p>{{ nama }}</p><!--memanggil variabel nama dari function data untuk ditampilkan-->
     {{ number }}
     <div v-html="kelas"></div><!--v-html digunakan untuk merubah kelas menjadi sebuah elemen bukan data string(digunakan untuk menampilkan data dalam sintaks html, biasanya disebut dengan raw html)-->

 <p>------------Data Binding---------------</p>

 <button :disabled="nonaktif">button</button> <!--attribut disabled hanya akan aktif saat nilai dalam variabel data bersifat true-->
 <h1 v-bind="property">Kizadhtia</h1>
 <input :type="type">
 {{ count  + 1}}

 <p>----------------V-If-----------------</p><!--contoh penggunaan v-if-->

 <button v-if="show">submit</button>

 <p>---------computed dan method----------</p><!--Contoh perbedaan antara computed dan method-->

 <button @click="counterNumber">method{{ counterButton }}</button><!--ketika buttond di klik ia akan menjalankan method yang bernama counterNumber-->
 <button @click="countComputed">computed{{ NumberComputed }}</button><!--ketika buttond di klik ia akan menjalankan method yang bernama counterNumber-->

 <p>------------class dan style-------------</p>
  <ul>
    <li :class="{active:isActive, fs40px:isActive}">
      test
    </li>
  </ul>
  <button @click="ubahWarna">ubahwarna</button>


  <p>-----------------Rendering------------------</p>
  <ul>
    <li v-for="item in daftarKelas">{{ item }}</li>
  </ul>

</template>


<script>
export default{
  data(){
    return { 
      daftarKelas:['RPL 1','RPL 2','RPL 3'],
      counterButton:0,
      NumberComputed:0,
      nama: 'Zaki',
      count:0,
      number: 1,
      kelas: '<h1>Kelas</h1>',
      nonaktif: true, //jika nilai dalam variabel bernilai true maka tombol akan disabled
      property:{ // digunakan untuk memberikan value ke dalam attribut html 
        id: 1,
        class:'color'
      },
      type:'password',
      show:true,
      isActive:true,
    }
  },
  methods:{
    counterNumber(){
      this.counterButton += 1;
    },
    computed:{
      countComputed(){
        this.NumberComputed += 6;
      }
    },
    ubahWarna() {
        if(this.isActive) {
          this.isActive = false;
        } else {
          this.isActive = true;
        }
      }
  }
}
</script>

<style>
.fs40px{
  font-size:40px;
}
.color{
  color: red;
}
.active{
  color: blue;
}
</style>

