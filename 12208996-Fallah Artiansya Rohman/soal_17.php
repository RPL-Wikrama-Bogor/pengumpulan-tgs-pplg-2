<!--prepation>
<?php
$arrAngka=[];
$nilaiTerbesar;
$nilaiTerkecil;
$rataRata;
?>
<--input-->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Array Max,Min,Ave</title>
</head>
<body>
    <form action="" method="post">
        <div id="wrap">
            <div style="displey:flex;">
        <label for="angka">Masukan Angka : </label>
        <!-- nama dengan tanda [] berarti bahwa semua input dengan nama yang sama,
        valuenya akan diambil semua dan disimpan dalam bentuk arrat-->
        <input type="number" name="angka[]" id = "angka">
        </div>
        </div>
        <!-- div atribut yang memiliki kata depan "on"disebut dengan event yang valuenya berisi script(baris code js) -->
        <p style="cursor:pointer;color:blue" onclick="tambahInput()">Tambah input Form</p>
        <button type ="submit" name="submit" >Kirim</button></br><hr/>
</form>
 <script>
    let jumlahInput = 1;
    function tambahInput(){
        //untuk mendefinisikan variable nya pada js menggunakan let/const:let untuk variable yang bisa diubah valuenya,const
        //variable yang tak bisa diubah variablenya

        let inputElement = `
        <div style="display:flex;">
        <label for="angka">masukan angka : </label>
        <input type="number" name="angka[]"" id="angka">
        </div>
        `;
        //jalan input di increment untuk mengetahui sekarang jumlah inputnya uda ada berapa
        jumlahInput += 1;
        //documen:pengambil alih baris code html
        //
        //inner html menambahkan tag html baru
        if(jumlahInput < 10){
        document.getElementById("wrap").innerHTML += inputElement;
        }

    }
 </script>
 <!--proses-->
 <?php
 if(isset($_POST['submit'])){
    // mengisi arrangka dengan seluruh value dari input yang memiliki name angka
    $arrAngka=$_POST['angka'];
    $nilaiTerbesar= max($arrAngka);
    $nilaiTerkecil= min($arrAngka);
    $rataRata = array_sum($arrAngka)/count($arrAngka);
    echo "Nilai Terbesar:" . $nilaiTerbesar . "<br> Nilai Terkecil :" . $nilaiTerkecil . "<br> Rata-rata :" . $rataRata;
    //array_sum:seluruh item arr dijalankan,count:menghitung jumlah item yang terdapat pada array
 }
   ?>
 </body>
</html>