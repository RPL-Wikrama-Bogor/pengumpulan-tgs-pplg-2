var tugas = true;
const myPromises = new Promise((resolve, reject) => {
  setTimeout(() => {
    if (tugas) {
      resolve("tugas selesai");
    } else {
      reject("tugas belu selesai");
    }
  }, 1000);
});
//kode di isi di sini

myPromises
  .then((result) => {
    console.log(result);
  })
  .catch((eror) => {
    console.log(eror);
  });
