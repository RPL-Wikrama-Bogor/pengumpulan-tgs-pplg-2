<template>
  <div>
      <!-- tambah siswa -->
      <input type="text" placeholder="Masukan nama" v-model="formDataKelas.nama">
      <br>
      <input type="text" placeholder="Masukan kelas" v-model="formDataKelas.kelas">
      <br>
      <button @click="tambahKelas">Add Students</button>
      <!-- table -->
      <table>
          <tr>
              <th> ID</th>
              <th> Nama</th>
              <th> Kelas</th>
          </tr>
          <tr v-for="(murid, index) in dataKelas" :key="index">
              <td>{{ index + 1 }}</td>
              <td>{{ murid.nama }}</td>
              <td>{{ murid.kelas }}</td>
              <td><button @click="hapusData(murid.id)">Delete Students</button></td>
          </tr>
      </table>
  </div>
</template>

<script>
export default {
  data() {
      return {
          // tambah siswa
          dataKelas: [{
              nama: 'Eiar',
              kelas: '10'
          }],
          formDataKelas: {
              nama: '',
              kelas: ''
          }
      }
  },
  method: {
      tambahKelas() {
          // hapus siswa
          this.formDataKelas.id = Date.now();

          // tambah siswa
          this.dataKelas.push(this.formDataKelas);
          this.formDataKelas = {
              nama: '',
              kelas: ''
          }
      },
      hapusData(id) {
          this.dataKelas = this.dataKelas.filter(item => item.id != id);
      }
  }
}
</script>