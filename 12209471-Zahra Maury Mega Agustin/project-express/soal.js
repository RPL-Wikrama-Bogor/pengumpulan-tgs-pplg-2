// buatkan fungsi dengan menggunakan promise untuk menjalankan tugas berdasarkan data dibawah lalu jalankan pada http://localhost:7000
const tugas = [
    { nama: "A", hasil: true, waktu: 3000 },
    { nama: "B", hasil: false, waktu: 1000 },
    { nama: "C", hasil: false, waktu: 2000 },
    { nama: "D", hasil: true, waktu: 4000 },
  ];
  
  function tugasBaru(nama, success, waktu) {
    return new Promise((resolve, reject) => {
      setTimeout(() => {
        if (success) {
          resolve(`Tugas ${nama} Berhasil`);
        } else {
          reject(`Tugas ${nama} Gagal`);
        }
      }, waktu);
    });
  }
  
      for ( const tugasItem of tugas) {
          tugasBaru(tugasItem.nama, tugasItem.hasil, tugasItem.waktu)
          .then((result) => {
              console.log(result);
          })
          .catch((error) => {
              console.log(error)
          })
      }