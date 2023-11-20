var tugas = false;

function runningTask(nameTask, succes, time){
    return new Promise((resolve, reject) => {
        setTimeout(() => {
        //kode isi disini
        if(succes) {
            resolve(`Tugas ${nameTask} Selesai`);
        }else {
            reject(`Tugas ${nameTask}Belum Selesai`);
        }
    }, time);
    });
}


runningTask('A',true,2000)
.then((result) => {
    console.log(result);
})
.catch((error) => {
    console.log(error);
});

runningTask('B',false,1000)
.then((result) => {
    console.log(result);
})
.catch((error) => {
    console.log(error);
});