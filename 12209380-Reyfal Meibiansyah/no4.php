<?php 
$nama="";
$tunj;
$pjk;
$gaji_bersih;
$gaji_pokok;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gaji</title>
</head>
<body>
    <form action="" method="post">
        <div style="display: flex;">
        <label for="nama"> Masukkan Nama anda: </label>
        <input type="text" name="nama" id="nama">
        </div>

        <div style="display: flex;">
        <label for="gaji_pokok"> Masukkan Gaji Pokok anda: </label>
        <input type="number" name="gaji_pokok" id="gaji_pokok">
        </div>
        <button type="submit" name="submit">Kirim</button>
    </form>
</body>
</html>

<?php

if (isset($_POST['submit'])) {
    $nama = $_POST['nama'];
    $gaji_pokok = $_POST['gaji_pokok'];

    $tunj = (20 * $gaji_pokok) / 100;
    $pjk = (15 * ($gaji_pokok + $tunj)) / 100;
    $gaji_bersih = $gaji_pokok + $tunj - $pjk;

    echo "Nama: ". $nama ;
    echo " Tunjangan :Rp " . $tunj ;
    echo " Pajak : Rp " . $pjk;
    echo " Gaji Bersih : Rp " . $gaji_bersih;
}

?>
