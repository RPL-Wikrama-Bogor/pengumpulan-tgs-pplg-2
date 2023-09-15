<?php
$No_pegawai;
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
</head>
<body>
<form action="" method="post">
        <div style="display: flex;">
        <label for="No_Pegawai"> No Pegawai : </label>
        <input type="Number" name="No_pegawai" id="No_pegawai">
        </div>
        <button type="submit" name="submit">Kirim</button>
</form>
</body>
</html>
<?php
    if (isset($_POST['submit'])){
        $No_pegawai = $_POST['No_pegawai'];

        $No_pegawai = strval($No_pegawai);

        if ($No_pegawai < 11) {
            echo "No Pegawai Tidak Sesuai";
        } else {
            $no_golongan = substr($No_pegawai, 0, 1);
            $tanggal = substr($No_pegawai, 1, 2);
            $bulan = substr($No_pegawai, 3, 1);
            $tahun = substr($No_pegawai, 5, 4);
            $no_urutan = substr($No_pegawai, 9, 2);

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

            $tanggal_lahir = $tanggal . 
            " " . $bulan . 
            " " . $tahun;
            echo "<center>Kode Pegawai : " 
            . $No_pegawai . "<br>No Golongan : " 
            . $no_golongan . "<br>Tanggal Lahir : " 
            . $tanggal_lahir . "<br>No Urutan : " 
            . $no_urutan . "</center>";
        }



    }
?>