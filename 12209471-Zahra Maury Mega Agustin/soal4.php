<?php
$tunjangan;
$pajak;
$gaji_pokok;
// = "" untuk mendefinisikan bahwa variable ini tipe datanya string
$gaji_bersih;
$nama = "";
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, intial-scale=1.0">
        <title>Menentukan gaji karyawan</title>
</head>
<body>
    <form action="" method="post">
        <div style="display: flex;">
        <label for="nama">Masukan nama : </label>
        <input type="text" name="nama" id="nama">
</div>
        <div style="display: flex;">
        <label for="gaji-pokok">Masukan gaji pokok : </label>
        <input type="number" name="gaji-pokok" id="gaji-pokok">
</div>
        <button type="submit" name="submit">kirim</button>
</form>
</body>
</html>

<?php
if (isset($_POST['submit'])) {
    $nama = $_POST['nama'];
    $gaji_pokok = $_POST['gaji-pokok'] ;

    $tunjangan = (20 * $gaji_pokok) / 100;
    $pajak = (15 * ($gaji_pokok + $tunjangan) / 100);
    $gaji_bersih = $gaji_pokok + $tunjangan - $pajak;
    // output

    echo "Nama Karyawan: $nama<br>";
    echo "Tunjangan: $tunjangan<br>";
    echo "Pajak: $pajak<br>";
    echo "Gaji Bersih: $gaji_bersih<br>";
  }
  ?>

