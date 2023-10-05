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
    <title>Mencetak nomor</title>
    <style>
        .kerja{
            background-color: #96B6C5; 
            width: 15%;
            padding-left: 20px;
            padding-top: 2px;
            padding-bottom: 20px;
            font-size: 20px;
            margin: 3%;
            margin-left: 40%;
           
        }
        .input{
            text-align: left;
    
        }
    </style>
</head>
<body>
    <form action="" method="post">
        <div class="kerja">
        <h3>Form Pegawai</h3>
    <label for="no_pegawai">Masukan nomor pegawai :</label>
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
        echo $bulan = "<div class='input'> " . "januari";
    } else if($bulan == "02"){
        echo $bulan = "<div class='input'> " . "Februari";
    } else if($bulan == "03"){
        echo $bulan = "<div class='input'> " . "Maret";
    } else if($bulan == "04"){
        echo $bulan = "<div class='input'> " . "April";
    } else if($bulan == "05"){
        echo $bulan = "<div class='input'> " . "Mei";
    } else if($bulan == "06"){
        echo $bulan = "<div class='input'> " . "Juni";
    } else if($bulan == "07"){
        echo $bulan = "<div class='input'> " . "Juli";
    } else if($bulan == "08"){
        echo $bulan = "<div class='input'> " . "Agustus";
    } else if($bulan == "09"){
        echo $bulan = "<div class='input'> " . "September";
    } else if($bulan == "10"){
        echo $bulan = "<div class='input'> " ."Oktober";
    } else if($bulan == "11"){
        echo $bulan = "<div class='input'> " . "November";
    } else {
        echo "<div class='input'> " . "Desember";
    }

    $tanggal_lahir = $tanggal . " " . $bulan . " " . $tahun;

    echo "<div class='input'> " . "No Pegawai :" . $no_pegawai . "</div>";
    echo "<div class='input'> " . "Nomor Golongan :" . $no_golongan . "</div> ";
    echo "<div class='input'> " . "Tanggal lahir :" . $tanggal_lahir . "</div> ";
    echo "<div class='input'> " . "Nomor Urutan :" . $no_urutan . "</div>";
}