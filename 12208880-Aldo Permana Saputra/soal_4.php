<?php

$tunj;
$pjk;
$gaji_bersih;
$gaji_pokok;
$nama;

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

            <label for="nama"> Masukan nama anda </label>
            <input type="text" name="nama" id="nama" required>

        </div>

        <div style="display: flex;">

            <label for="gaji_pokok"> Masukan gaji anda </label>
            <input type="number" name="gaji_pokok" id="gaji_pokok" required>

        </div>


        <div style="display: flex;">

            <label for="submit"></label>
            <input type="submit" name="submit" id="submit">

        </div>

    </form>

</body>

</html>


<?php

if (isset($_POST['submit'])) {
    $nama = $_POST['nama'];
    $gaji_pokok = $_POST['gaji_pokok'];


    $tunj = (20 * $gaji_pokok) / 100;
    $pjk  = (15 * $gaji_pokok + $tunj) / 100;
    $gaji_bersih = $gaji_pokok + $tunj - $pjk;


    echo " Nama anda adalah " . $nama;
    echo "</br>";
    echo "<============================================================>";
    echo "</br>";
    echo " Anda mendapatkan tunjangan sebesar Rp." . number_format($tunj);
    echo "</br>";
    echo "<============================================================>";
    echo "</br>";
    echo " Pajak anda sebesar Rp." . number_format($pjk);
    echo "</br>";
    echo "<============================================================>";
    echo "</br>";
    echo " Gaji bersih yang anda dapatkan = Rp." . number_format($gaji_bersih);
}













?>