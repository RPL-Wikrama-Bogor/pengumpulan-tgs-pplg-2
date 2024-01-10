<?php
$tunj;
$pjk;
$gaji_bersih;
$gaji_pokok;
$nama="";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menentukan Gaji Karyawan</title>
</head>
<body>
<form action="" method="post">
<div style="display:flex;">
            <label for="nama">masukan nama :</label>
            <input type="text" id="nama" name="nama">
        </div>
        <div style="display:flex;">
            <label for="gaji_pokok">masukan gaji_pokok :</label>
            <input type="number" id="gaji_pokok" name="gaji_pokok">
        </div>
        <button type="submit" name="submit">Kirim</button>
    </form>
</body>
</html>
<?php
    if (isset($_POST['submit'])) {

        $nama = $_POST['nama'];
        $gaji_pokok = $_POST['gaji_pokok'];

        $tunj =(20 * $gaji_pokok)/100;
        $pjk =(15 * ($gaji_pokok+ $tunj))/100;
        $gaji_bersih = $gaji_pokok + $tunj - $pjk;

        echo "nama: ".$nama . "<br>tunjangan:" .$tunj . "<br>pajak:" .$pjk ."<br>gaji_bersih:" . $gaji_bersih;

    }
?>