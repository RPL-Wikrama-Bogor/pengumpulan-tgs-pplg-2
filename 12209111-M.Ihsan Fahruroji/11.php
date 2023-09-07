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
    <title>Document</title>
    <link rel="stylesheet" href="materi.css">
</head>
<body>
    <form action="" method="post">
        <div style="display: flex;">
            <label for="no_pegawai">masukan no_pegawai :</label>
            <input type="number" id="no_pegawai" name="no_pegawai">
        </div>
        <button type="submit" name="submit">Submit</button>
    </form>
</body>
</html>

<?php 

if (isset($_POST['submit'])) {
    $no_pegawai = $_POST['no_pegawai'];

if($no_pegawai<11){
    echo "no pegawai tidak sesuai";}
    else{
        $no_golongan = substr($no_pegawai,0,1);
        $tanggal = substr($no_pegawai,1,2);
        $bulan = substr($no_pegawai,3,2);
        $tahun = substr($no_pegawai,5,4);
        $no_urutan = substr($no_pegawai,9,2);
    

    if ($bulan=="01"){
        $bulan=="januari";
    }
    else if ($bulan=="02"){
        $bulan=="februari";
    }
    else if ($bulan=="03"){
        $bulan=="maret";
    }
    else if ($bulan=="04"){
        $bulan=="mei";
    }
    else if ($bulan=="05"){
        $bulan=="juni";
    }
    else if ($bulan=="06"){
        $bulan=="juli";
    }
    else if ($bulan=="07"){
        $bulan=="august";
    }
    else if ($bulan=="08"){
        $bulan=="september";
    }
    else if ($bulan=="09"){
        $bulan=="oktober";
    }
    else if ($bulan=="10"){
        $bulan=="november";
    }
    else if ($bulan=="11"){
        $bulan=="december";
    }
    else {
        $tanggal_lahir = $tanggal . $bulan . $tahun;
    }
    echo "$no_golongan, $tanggal_lahir, $no_urutan";
    
}}

?>