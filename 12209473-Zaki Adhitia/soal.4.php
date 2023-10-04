<?php
$nama;
$tunjangan;
$pajak;
$gaji_bersih;
$gaji_pokok;

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <!-- input -->
    <!--method post berfungsi untuk mengirimkan data yang tidak tersimpan di url -->        
    <form action="" method="post"> 
        <div style = "display: flex;">
        <label for="nama">Masukan Nama</label>
        <input type="text" name="nama" id="nama">
    </div>
        <div style = "display: flex;">
        <label for="">Gaji Pokok</label>
        <input type="number" name="gaji_pokok" id="gaji_pokok"> 
        </div>
        <button type="submit" name="submit">Kirim</button>
    </form>
</body>
</html>

<?php

    if (isset($_POST["submit"])) {
        //isset-post-submit berfungsi untuk mengkonfirmasi tombol submit saat di tekan yang akan menjalankan semua kode dibawahnya
        $nama =  $_POST["nama"];
        // $nama =  $_POST["nama"]; berfungsi untuk mengambil data yang di input user di tabel "nama" dan disimoan di dalam variabel $nama
        $gaji_pokok = $_POST["gaji_pokok"];

        $tunjangan = (20 *$gaji_pokok)/100;
        //$tunjangan = (20 *$gaji_pokok)/100; = 20 dikali data didalam variabel gajipokok dan disimpan di dalam variabel tunjangan
        $pajak = (15*($gaji_pokok + $tunjangan))/100;
        $gaji_bersih  = $gaji_pokok + $tunjangan  - $pajak;
        
        echo "Nama: $nama <br>";
        echo "Tunjangan: $tunjangan <br>";
        echo "Pajak: $pajak <br>";
        echo "Gaji Bersih: $gaji_bersih <br>";
    }

?>