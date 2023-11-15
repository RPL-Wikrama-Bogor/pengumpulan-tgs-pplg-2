const http = require('http');
const port = 7000;

const tugas = [
    { nama: "A", hasil: true, waktu: 3000 },
    { nama: "B", hasil: false, waktu: 1000 },
    { nama: "C", hasil: false, waktu: 2000 },
    { nama: "D", hasil: true, waktu: 4000 },
];

function runningTugas(nameTask, success, time) {
    return new Promise((resolve, reject) => {
        setTimeout(() => {
            if (success) {
                resolve(`Tugas ${nameTask} Sudah Selesai`);
            } else {
                reject(`Tugas ${nameTask} Belum Selesai`);
            }
        }, time);
    });
}

const Server = http.createServer(async (req, res) => {
    
    for (const Tugas of tugas) {
        try {
            const result = await runningTugas(Tugas.nama, Tugas.hasil, Tugas.waktu);
            res.write(`<p>${result}</p>`);
        } catch (error) { 
            res.write(`<p>${error}</p>`);
        }
    }

    res.end();
});

Server.listen(port, () => {
    console.log(`Server Berjalan Di http://localhost:${port}`);
});
