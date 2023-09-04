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
    <title>Pegawai</title>
    <style>
        body{
            background-color: #CEDEBD;
        }
        .card{
        background-color:#FAF1E4 ;
        box-sizing: border-box;
		padding: 20px;
        display: flex;
        justify-content: center;
        width: 290px;
        height: 80px;
        margin: 10px;
        box-sizing: border-box;
        }
    </style>
</head>
<body>
    <div class="card">
<form action="" method="post">
        <div style="display: flex;">
        <label for="no_pegawai"> no pegawai : </label>
        <input type="number" name="no_pegawai" id="no_pegawai">
        </div>
        <button type="submit" name="submit">Kirim</button>
    </form>
    </div>
</body>
</html>


<?php
    // Cek apakah button dgn name submit di klik
    if (isset($_POST['submit'])) {
        $no_pegawai = $_POST['no_pegawai'];
        
        $no_pegawai = strval($no_pegawai);

        if ($no_pegawai > 99999999999) {
            echo "No Pegawai Tidak Sesuai";
        } else {
            $no_golongan = substr($no_pegawai, 0, 1);
            $tanggal = substr($no_pegawai, 1, 2);
            $bulan = substr($no_pegawai, 3, 1);
            $tahun = substr($no_pegawai, 5, 4);
            $no_urutan = substr($no_pegawai, 9, 2);

            if($bulan == "01") {
                $bulan = "Januari";
            } else if($bulan == "02") {
                $bulan = "Februari";
            } else if($bulan == "03") {
                $bulan = "Maret";
            } else if($bulan == "04") {
                $bulan = "April";
            } else if($bulan == "05") {
                $bulan = "Mei";
            } else if($bulan == "06") {
                $bulan = "Juni";
            } else if($bulan == "07") {
                $bulan = "Juli";
            } else if($bulan == "08") {
                $bulan = "Agustus";
            } else if($bulan == "09") {
                $bulan = "September";
            } else if($bulan == "10") {
                $bulan = "Oktober";
            } else if($bulan == "11") {
                $bulan = "November";
            } else {
                $bulan = "Desember";
            } 

            $tanggal_lahir = $tanggal . " " . $bulan . " " . $tahun;
            echo "<center>Kode Pegawai : " . $no_pegawai . "<br>No Golongan : " . $no_golongan . "<br>Tanggal Lahir : " . $tanggal_lahir . "<br>No Urutan : " . $no_urutan . "</center>";
        }
         
    }
?>