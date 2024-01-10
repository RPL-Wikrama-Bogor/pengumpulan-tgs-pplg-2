var tugas = false

function runningTask(nameTask, succes, time){
    return new Promise((resolve, reject) => {
        setTimeout(() => {
            // kode ketik diisini
            if(succes) {
                resolve(`Tugas ${nameTask} selesai`)
            } else {
                reject(`Tugas ${nameTask} belum selesai`)
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
runningTask('B', false, 1000)
    .then((result) => {
        console.log(result)
    })
    .catch((error) => {
        console.log(error)
    });
runningTask('C', true, 500)
    .then((result) => {
        console.log(result)
    })
    .catch((error) => {
        console.log(error)
    });

    