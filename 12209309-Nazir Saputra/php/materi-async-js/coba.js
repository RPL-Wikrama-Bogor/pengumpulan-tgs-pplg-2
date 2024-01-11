const http = require('http');

const tugas = [
    { nama: "A", hasil: true, waktu: 3000 },
    { nama: "B", hasil: false, waktu: 1000 },
    { nama: "C", hasil: false, waktu: 2000 },
    { nama: "D", hasil: true, waktu: 4000 },
];

function jalankanTugas(tugasItem) {
    return new Promise((resolve, reject) => {
        setTimeout(() => {
            if (tugasItem.hasil) {
                resolve(`${tugasItem.nama}: Selesai`);
            } else {
                reject(`${tugasItem.nama}: Gagal`);
            }
        }, tugasItem.waktu);
    });
}

const server = http.createServer(async (req, res) => {
    res.writeHead(200, { 'Content-Type': 'text/plain' });

    for (const tugasItem of tugas) {
        try {
            const hasil = await jalankanTugas(tugasItem);
            res.write(`${hasil}\n`);
        } catch (error) {
            res.write(`${error}\n`);
        }
    }

    res.end();
});

server.listen(7000, 'localhost', () => {
    console.log('Server berjalan di http://localhost:7000/');
});