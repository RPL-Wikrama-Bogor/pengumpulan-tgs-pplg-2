<template>
  <div>
    <input type="text" placeholder="masukan nama" v-model="FormDataKelas.nama">
    <br>
    <input type="text" placeholder="masukan kelas" v-model="FormDataKelas.kelas">
    <br>
    <button @click="tambahKelas">tambah siswa</button>

    <table>
      <tr>
        <th> Id</th>
        <th> Nama</th>
        <th> Kelas</th>
        <th> Aksi</th>
      </tr>
      <tr v-for="(murid, index) in dataKelas" :key="index">
          <td>{{ index + 1 }}</td>
          <td>{{ murid.nama }}</td>
          <td>{{ murid.kelas }}</td>
          <td><button @click="hapusDataKelas(murid.id)">Hapus</button></td>
      </tr>
    </table>
  </div>
</template>
<script>
export default {
  data() {
    return {
      dataKelas: [{
        id: Date.now(),
        nama: 'Yoga',
        kelas: '11'
      }],
      FormDataKelas: {
        nama: '',
        kelas: ''
      }
    }
  },
  methods: {
    tambahSiswa(){
      this.dataKelas.id = Date.now();

      this.dataKelas.push(this.formDataKelas);
      this.FormDataKelas = {
        nama: '',
        kelas: ''
      }
    },
    hapusDataKelas(id) {
      this.dataKelas = this.dataKelas.filter(item => item.id != id);
    }
  }
}
</script>