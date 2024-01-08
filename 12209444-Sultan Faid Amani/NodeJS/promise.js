var tugas = true
function runningTask(nameTask, success, time){
return new  Promise((resolve, reject) => {
    setTimeout(() => {
        if(tugas){
        console.log("Tugas Selesai")
    }
    else{
        console.log("Tugas Belum Selesai")
    }
    }, time);
    
})
};

runningTask('A', true, 2000)
    .then((result) => {
        console.log(result)
    })
    .catch((error) => {
        console.log(error)
    })
runningTask('B', false, 1000)
    .then((result) => {
        console.log(result)
    })
    .catch((error) => {
        console.log(error)
    })
runningTask('C', true, 500)
    .then((result) => {
        console.log(result)
    })
    .catch((error) => {
        console.log(error)
    })