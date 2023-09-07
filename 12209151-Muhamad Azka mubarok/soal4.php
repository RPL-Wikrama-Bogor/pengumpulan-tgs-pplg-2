<?php
//preparation
$tunj;
$pjk;
$gaji_bersih;
$gaji_pokok;
$nama;
?>
<!-- input -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gaji karyawan</title>
</head>
<body>
    <form action="" method="post">
        <h1>Gaji karyawan</h1>
    <div class="display: flex;">
        <label for="nama">Masukkan nama anda</label>
        <br>
        <input type="text" name="nama" id="nama">
    </div>
    <div class="display: flex;">
        <label for="gaji">Masukkan gaji pokok anda</label>
        <br>
        <input type="number" name="gaji" id="gaji">
    </div>
    <br>
    <button type="submit" name="submit">kirim</button>
    </form>
</body>
</html>
<!-- procces -->
<?php
if (isset($_POST['submit'])) {
    $nama = $_POST['nama'];
    $gaji_pokok = $_POST['gaji'];
    $tunj = 0.2 * $gaji_pokok;
    $pjk = 0.15 * ($gaji_pokok + $tunj);
    $gaji_bersih= $gaji_pokok + $tunj - $pjk;
    echo "nama karyawan: " .$nama;
    echo "<br>";
    echo "Gaji Pokok: " .$gaji_pokok;
    echo "<br>";
    echo "tunjangan anda: " .$tunj;
    echo "<br>";
    echo "pajak anda: " .$pjk;
    echo "<br>";
    echo "Total gaji bersih: " .$gaji_bersih;

}

