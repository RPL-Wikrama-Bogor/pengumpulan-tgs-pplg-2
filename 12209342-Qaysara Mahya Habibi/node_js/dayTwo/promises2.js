const { resolve } = require("path");

let tugas = true

function runningTask(nameTask, time) {
    return new Promise((resolve, reject) => {
        setTimeout(() => {
            if (tugas) {
                resolve(`Tugas ${nameTask} selesai`);
            } else {
                reject(`Tugas ${nameTask} Belum selesai`);
            }
        }, time)
    });
}

runningTask('A', true, 2000)
    .then((result) => {
        console.log(result)
    })
    .catch((error) => {
        console.log(error)
    });

runningTask("B", false, 1000)
    .then((result) => {
        console.log(result)
    })
    .catch((error) => {
        console.log(error)
    });

runningTask("C", true, 500)
    .then((result) => {
        console.log(result)
    })
    .catch((error) => {
        console.log(error)
    });