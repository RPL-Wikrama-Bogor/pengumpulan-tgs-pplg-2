// 1 buatkan fungsi dengan menggunakan promise untuk mwnjalankan tugas derdasarkan data d bawah lalu jalankan pada http://localhost:7000

// const tugas = [
//     {
//         nama: "A", hasil: true, waktu: 3000
//     },
//     {
//         nama: "B", hasil: false, waktu: 1000
//     },
//     {
//         nama: "C", hasil: false, waktu: 2000
//     },
//     {
//         nama: "D", hasil: true, waktu: 4000
//     }
// ]

// const express = require('express');
// const app = express();

// const tugas = [
//     { nama: "A", hasil: true, waktu: 3000 },
//     { nama: "B", hasil: false, waktu: 1000 },
//     { nama: "C", hasil: false, waktu: 2000 },
//     { nama: "D", hasil: true, waktu: 4000 },
// ];

// const PORT = 7000;

// function lakukanTugas(tugas) {
//     return new Promise((resolve, reject) => {
//         const hasilTugas = [];
//         tugas.reduce((promise, item) => {
//             return promise.then(() => {
//                 return new Promise((resolveTask) => {
//                     setTimeout(() => {
//                         hasilTugas.push({ nama: item.nama, status: item.hasil });
//                         console.log(`Tugas ${item.nama} selesai.`);
//                         resolveTask();
//                     }, item.waktu);
//                 });
//             });
//         }, Promise.resolve())
//         .then(() => {
//             resolve(hasilTugas);
//         })
//         .catch((error) => {
//             reject(error);
//         });
//     });
// }

// app.get('/', async (req, res) => {
//     try {
//         const hasil = await lakukanTugas(tugas);
//         res.json({ hasil });
//     } catch (error) {
//         res.status(500).send('Terjadi kesalahan saat melakukan tugas.');
//     }
// });

// app.listen(PORT, () =>
//     console.log(`Server ini berjalan di http://localhost:${PORT}`)
// );

const tugas = [
    {
        nama: "A",
        hasil: true,
        waktu: 3000,
    },
    {
        nama: "B",
        hasil: false,
        waktu: 1000,
    },
    {
        nama: "C",
        hasil: false,
        waktu: 2000,
    },
    {
        nama: "D",
        hasil: true,
        waktu: 4000,
    },
];


async function runningTask(nama, hasil, waktu) {
    return new Promise((resolve, reject) => {
        setTimeout(() => {
            if (hasil) {
                resolve(`Tugas ${nama} selesai`);
            } else {
                reject(`Tugas ${nama} belum selesai`);
            }
        }, waktu);
    });
}

for (const tugasItem of tugas) {
    runningTask(tugasItem.nama, tugasItem.hasil, tugasItem.waktu)
        .then((result) => {
            console.log(result);
        })
        .catch((error) => {
            console.log(error);
        });
}