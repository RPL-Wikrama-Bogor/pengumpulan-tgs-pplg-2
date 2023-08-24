<?php

$no_pegawai;$no_gol;$tanggal;$bulan;$tahun;$no_urut;
$tanggal_lahir;

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="post">
        <div class="one" style="display: flex;">
        <label for="no_pegawai">Masukkan No_pegawai:
        </label>
        <input type="number" name="no_pegawai" id="no_pegawai">
        </div>
        <button type="submit" name="submit">Kirim</button>
    </form>
</body>
</html>

<?php
if(isset($_POST['submit'])){

// $post disamakan dengan atribut name
$no_pegawai=$_POST['no_pegawai'];

//decision
//substrval
$no_pegawai =strval($no_pegawai);


if($no_pegawai < 100000000000){
    echo "no pegawai tidak sesuai";
}
else{
$no_gol =substr($no_pegawai,0,1);
$tanggal =substr($no_pegawai,1,2);
$bulan =substr($no_pegawai,3,2);
$tahun =substr($no_pegawai,5,4);
$no_urut =substr($no_pegawai,9,2);

if($bulan == "01"){
    $bulan ="Januari";
}

else if($bulan == "02"){
    $bulan ="Februari";
}
else if($bulan == "02"){
    $bulan ="Februari";
}
else if($bulan == "03"){
    $bulan ="Maret";
}
else if($bulan == "04"){
    $bulan ="April";
}
else if($bulan == "05"){
    $bulan ="Mei";
}
else if($bulan == "06"){
    $bulan ="Juni";
}
else if($bulan == "07"){
    $bulan ="Juli";
}
else if($bulan == "08"){
    $bulan ="Agustus";
}
else if($bulan == "09"){
    $bulan ="September";
}
else if($bulan == "10"){
    $bulan ="Oktober";
}
else if($bulan == "11"){
    $bulan ="November";
}
else{
    $bulan="Desember";
}


$tanggal_lahir = $tanggal."-".$bulan."-".$tahun;

echo "No Golongan :".$no_gol."<br>Tanggal Lahir :".$tanggal_lahir."<br> No Urut : ".$no_urut;
}

}
?>