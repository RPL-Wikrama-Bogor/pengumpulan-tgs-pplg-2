const express = require('express');
const app = express();

const tugas = [
    { name: 'A', hasil: true, waktu: 3000 },
    { name: 'B', hasil: false, waktu: 1000 },
    { name: 'C', hasil: false, waktu: 2000 },
    { name: 'D', hasil: true, waktu: 4000 }
];

function runningTask(nameTask, success, time) {
    return new Promise((resolve, reject) => {
        setTimeout(() => {
            if (success) {
                resolve(`Tugas ${nameTask} Selesai`);
            } else {
                reject(`Tugas ${nameTask} Belum Selesai`);
            }
        }, time);
    });
}

async function main() {
    for (let i = 0; i < tugas.length; i++) {
        try {
            const result = await runningTask(tugas[i].name, tugas[i].hasil, tugas[i].waktu);
            console.log(result);
        } catch (error) {
            console.error(error);
        }
    }
}

const PORT = 7000;
app.get('/', (req, res) => res.send('Hello Maman!'))
app.listen(PORT, () =>
    console.log(`Server ini berjalan di http://localhost:${PORT}`)
);

main();
