// Soal
// 1. Buatkan fungsi dengan menggunakan promise untuk menjalankan tugas berdasarkan data dibawah
// Lalu jalankan pada http://localhost:7000
const http = require('http');
const tugas = [
    { nama: "A", hasil: true, waktu: 3000 },
    { nama: "B", hasil: false, waktu: 1000 },
    { nama: "C", hasil: false, waktu: 2000 },
    { nama: "D", hasil: true, waktu: 4000 },
];

function jalankanTugas(data) {
    return new Promise((resolve, reject) => {
        data.forEach((tugas) => {
            setTimeout(() => {
                if (tugas.hasil) {
                    console.log(`Tugas ${tugas.nama} Sudah Diselesaikan`);
                } else {
                    console.log(`Tugas ${tugas.nama} Belum Diselesaikan`);
                }
            }, tugas.waktu);
        });
    });
}
const server = http.createServer((req, res) => {
    jalankanTugas(tugas)
        .then((pesan) => {
            console.log(pesan);
            res.end(pesan);
        })
        .catch((err) => {
            console.error(err);
            res.end('Terjadi kesalahan saat menjalankan tugas');
        });
});

server.listen(7000, () => {
    console.log('Server berjalan pada http://localhost:7000/');
});