const tugas = [
    { nama: "A", hasil: true, waktu: 3000},
    { nama: "B", hasil: false, waktu: 1000},
    { nama: "C", hasil: false, waktu: 2000},
    { nama: "D", hasil: true, waktu: 4000}
]

function dataTugas(task, success, time) {
    return new Promise((resolve, reject) => {
        setTimeout(() => {
            if(success){
                resolve(`Tugas ${task} selesai`)
            } else{
                reject(`Tugas ${task} gagal`)
            }
        },time)
    });    
}

dataTugas('A', true, 3000)
    .then((result) => {
       console.log(result) 
    })
    .catch((error) => {
        console.log(error)
    });
dataTugas('B', false, 1000)
    .then((result) => {
       console.log(result) 
    })
    .catch((error) => {
        console.log(error)
    });
dataTugas('C', false, 2000)
    .then((result) => {
       console.log(result) 
    })
    .catch((error) => {
        console.log(error)
    });
dataTugas('D', true, 4000)
    .then((result) => {
       console.log(result) 
    })
    .catch((error) => {
        console.log(error)
    });