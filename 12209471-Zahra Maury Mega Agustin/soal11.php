<?php
$no_pegawai;
$no_golongan;
$tanggal;
$bulan;
$tahun;
$no_urutan;
$tanggal_lahir;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>mencetak nomor</title>
    <style>
        .text{
            background-color: #DFCCFB;
            border-radius: 5px;
            padding: 20px;
            box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.1);
            max-width: 100%;
            width: 550px;
            margin: 0 auto;
            margin-top: 150px;
        }
        .input{
            text-align: center;
        }
        </style>
</head>
<body>
<form action="" method="post">
        <div class="text">
        <h3>Form pegawai</h3>
        <label for="bilangan">Masukan nomor pegawai</label>
        <input type="number" name="no_pegawai" id="no_pegawai">

        <button type="submit" name="submit">Kirim</button>
    </div>
     </form>

   </body>
    </html>

    <?php
if(isset($_POST['submit'])){
    $no_pegawai = $_POST['no_pegawai'];

    $no_pegawai = strval($no_pegawai);

    if($no_pegawai < 11){
        echo "no pegawai tidak sesuai";
    }
    $no_golongan = substr($no_pegawai,0,1);
    $tanggal = substr($no_pegawai,1,2);
    $bulan = substr($no_pegawai,3,1);
    $tahun = substr($no_pegawai,5,4);
    $no_urutan = substr($no_pegawai,9,2);

    if($bulan == "01"){
        echo $bulan = "januari <br>";
    } else if($bulan == "02"){
        echo $bulan = "Februari <br>";
    } else if($bulan == "03"){
        echo $bulan = "Maret <br>";
    } else if($bulan == "04"){
        echo $bulan = "April <br>";
    } else if($bulan == "05"){
        echo $bulan = "Mei <br>";
    } else if($bulan == "06"){
        echo $bulan = "Juni <br>";
    } else if($bulan == "07"){
        echo $bulan = "Juli br>";
    } else if($bulan == "08"){
        echo $bulan = "Agustus <br>";
    } else if($bulan == "09"){
        echo $bulan = "September <br>";
    } else if($bulan == "10"){
        echo $bulan = "Oktober <br>";
    } else if($bulan == "11"){
        echo $bulan = "November <br>";
    } else {
        echo "Desember <br>";
    }

    $tanggal_lahir = $tanggal . " " . $bulan . " " . $tahun;

    echo "No Pegawai :" . $no_pegawai . "<br>";
    echo "Nomor Golongan :" . $no_golongan . "<br>";
    echo "Tanggal lahir :" . $tanggal_lahir . "<br>";
    echo "Nomor Urutan :" . $no_urutan . "<br>";
}