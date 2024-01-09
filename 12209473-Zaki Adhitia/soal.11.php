<!-- deklarasi -->
<?php
$no_pegawai;
$no_golongan;
$tanggal;
$bulan;
$tahun;
$no_urutan;
$tanggal_lahir;
?>

<!-- Input -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hitung Bulan</title>

    <style>
        body {
            font-family: "Nunito Sans";
            margin-left: 37rem;
            margin-top: 15rem;
            
            background-repeat: no-repeat;
            background-size:contain;
            background-color: #F4EEEE;
            
        }
       .container{
        background-color: #96C291;
        padding: 20px;
        width: 300px;
        border-radius: 20px;
       }
       h1{
        text-align: center;
       }
    </style>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:opsz,wght@6..12,200&display=swap" rel="stylesheet">

</head>
<body>
<form action="" method="post">
    <div class="container">
    <h1>Data Pegawai</h1>
    <div style="display: flex;">
        <label for="no_pegawai">No pegawai</label>
        <br>
        <input type="text" name="no_pegawai" id="no_pegawai">
        </div>
        <br>
        <button type="submit" name="submit">Kirim</button>       
    </form>
</body>
</html>

<?php
if (isset($_POST["submit"])) {
    $no_pegawai = $_POST['no_pegawai'];

    $no_pegawai = strval($no_pegawai);

    if ( $no_pegawai < 11) {
        echo "No Pegawai tidak sesuai";
    }  
    
    $no_golongan = substr($no_pegawai, 0, 1);
    // ambil angka pertama dari no_pegawai
    $tanggal = substr($no_pegawai, 1, 2);
    // ambil kedua angka dari no_pegawai
    $bulan = substr($no_pegawai, 3, 1);
    // ambil tiga angka dari no_pegawai
    $tahun = substr($no_pegawai, 5, 4 );
    // ambil empat angka dari no_pegawai
    $no_urutan = substr($no_pegawai, 9, 2 ) ;

    if ( $bulan == "01") {
         $bulan = "Januari";
    } else if ( $bulan == "02") {
         $bulan = "Fenruari";
    } else if ( $bulan == "03") {
         $bulan = "maret";
    } else if ( $bulan == "04") {
         $bulan = "April";
    } else if ( $bulan == "05") {
          $bulan = "Mei";
    } else if ( $bulan == "06") {
          $bulan = "Juni";
    } else if ( $bulan == "07") {
         $bulan = "Juli";
    } else if ( $bulan == "08") {
         $bulan = "Agustus";
    } else if ( $bulan == "09") {
         $bulan = "September";
    } else if ( $bulan == "10") {
         $bulan = "Oktober";
    } else if ( $bulan == "11") {
         $bulan = "November";
    } else {
         $bulan = "Desember";
    }

    $tanggal_lahir = $tanggal . " " . $bulan . " " . $tahun;

    echo "No Pegawai " .  $no_pegawai;
    echo "<br>";
    echo " No Golonngan " . $no_golongan;
    echo "<br>";
    echo " Tanggal Lahir " . $tanggal_lahir;
    echo "<br>";
    echo " No Urutan " . $no_urutan;
}
?>