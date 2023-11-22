const tugas = [
    {nama: "A", hasil: true, waktu: 3000},
    {nama: "B", hasil: false, waktu: 1000},
    {nama: "C", hasil: false, waktu: 2000},
    {nama: "D", hasil: true, waktu: 4000}
]

function tugasFunction(task, success, time){
    return new Promise((resolve, reject) => {
        setTimeout(() =>{
            if(success){  
                resolve(`tugas ${task} selesai`)
            }else{
                reject(`tugas ${task} belum selesai`)
            }
        }, time)
    });
}

tugas.forEach((tugas) => {
    tugasFunction(tugas.nama, tugas.hasil, tugas.waktu)
      .then((result) => {console.log(result);})
      .catch((error) => {console.log(error);});
  });

