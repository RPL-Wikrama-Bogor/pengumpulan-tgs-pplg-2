// // CommonJS / ESM - Ecmascript
// const http = require('http');
// const {testFunction, newFunction} = require('./function');
// const { error } = require('console');

// // Promise
// const printAgakTelat = () => {
//     return new Promise((resolve, reject) => {
//         setTimeout(() => {
//             resolve('Sudah Sampai');
//             // reject('Saya Kena Tilang');
//         }, 1000 * 5);
//     });
// }

// var server = http.createServer(async(req, res) => {
//     switch (req.url) {
//         case '/about':
//             // testFunction();
//             // newFunction('Ini berasal dari parameter');
//             console.log('Saya OTW');
//             const value = await printAgakTelat();
//             console.log(value);
//             console.log('Ngopi');
//                 // .then((value) => {
//                 //     console.log(value);
//                 //     console.log('Ngopi');
//                 // })
//                 // .catch((error) => console.log(error));
//             res.write('Ini about');
//             res.end();
//             break;
//         case '/contact':
//             res.write('Ini contact');
//             res.end();
//             break;
//         default:
//             res.write('404 Not Found');
//             res.end();
//             break;
//     }

//     // if (req.url == '/about') {
//     //     res.write('Ini about');
//     //     res.end();
//     // } else if (req.url == '/contact') {
//     //     res.write('Ini contact');
//     //     res.end();
//     // } else {
//     //     res.write('404 Not Found');
//     //     res.end();
//     // }
// });

// const port = 3000;
// server.listen(port, () => {
//     console.log(`Server berjalan di http://localhost:${port}`);
// });

const tugas = [
    { nama: "A", hasil: true, waktu: 3000 },
    { nama: "B", hasil: true, waktu: 1000 },
    { nama: "C", hasil: true, waktu: 2000 },
    { nama: "D", hasil: true, waktu: 4000 },
];

const http = require('http');

function jalankanTugas(data) {
  return new Promise((resolve, reject) => {
    const tasks = data.map((task) => {
      return new Promise((resolveTask, rejectTask) => {
        setTimeout(() => {
          if (task.hasil) {
            resolveTask(`Tugas ${task.nama} berhasil diselesaikan dalam ${task.waktu} ms`);
          } else {
            rejectTask(`Tugas ${task.nama} gagal diselesaikan dalam ${task.waktu} ms`);
          }
        }, task.waktu);
      });
    });

    Promise.all(tasks)
      .then((results) => resolve(results))
      .catch((error) => reject(error));
  });
}

var server = http.createServer(async(req, res) => {
    jalankanTugas(tugas)
      .then((results) => {
        results.forEach((result) => console.log(result));
      })
      .catch((error) => {
        console.error('Error:', error);
      });
});

const port = 7000;
server.listen(port, () => {
    console.log(`Server berjalan di http://localhost:${port}`);
});