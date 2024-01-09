const http = require('http');

const tugas = [
    { nama: "A", hasil: true, waktu: 3000},
    { nama: "B", hasil: false, waktu: 1000},
    { nama: "C", hasil: false, waktu: 2000},
    { nama: "D", hasil: true, waktu: 4000},
];

// Fungsi untuk menjalankan tugas
function jalankanTugas(tugas) {
    return new Promise((resolve, reject) => {
        setTimeout(() => {
            if (tugas.hasil) {
                resolve(`Selesai : ${tugas.nama} selesai.`);
            } else {
                reject(`Gagal : ${tugas.nama} gagal.`);
            }
        }, tugas.waktu);
    });
}

// Membuat server HTTP
const server = http.createServer((req, res) => {
    res.writeHead(200, { 'Content-Type': 'text/plain' });

    // Array untuk menyimpan semua promise
    const promises = [];

    tugas.forEach(tugasItem => {
        const promise = jalankanTugas(tugasItem)
            .then(result => {
                res.write(`${result}\n`);
            })
            .catch(error => {
                res.write(`${error}\n`);
            });
        promises.push(promise);
    });

    // Menunggu semua promise selesai sebelum mengakhiri respons
    Promise.all(promises)
        .then(() => {
            res.end();
        })
        .catch(err => {
            console.error(err);
            res.end();
        });
});

const port = 7000;
server.listen(port, () => {
    console.log(`Server berjalan di http://localhost:${port}/`);
});