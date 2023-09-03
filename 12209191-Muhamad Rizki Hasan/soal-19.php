<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Soal-19</title>
</head>
<body>
  <h1>Tiket</h1>
  <form action="" method="post">
    <label for="vip">Masukan Tiket VIP : </label>
    <input type="number" name="vip" id="vip" required><br>

    <label for="eksekutif">Masukan Tiket Eksekutif : </label>
    <input type="number" name="eksekutif" id="eksekutif" required><br>

    <label for="ekonomi">Masukan Tiket Ekonomi : </label>
    <input type="number" name="ekonomi" id="ekonomi" required><br>

    <button name="submit" id="submit">Kirim</button>
  </form>
</body>
</html>

<?php
  if (isset($_POST['submit'])) {
    $vip = $_POST['vip'];
    $eksekutif = $_POST['eksekutif'];
    $ekonomi = $_POST['ekonomi'];

    if ($vip >= 35) {
      $keuntungan_vip = 25;
    } elseif ($vip >= 20 && $vip < 35) {
      $keuntungan_vip = 15;
    } else {
      $keuntungan_vip = 5;
    }

    if ($eksekutif >= 45) {
      $keuntungan_eksekutif = 20;
    } elseif ($eksekutif >= 20 && $eksekutif < 45) {
      $keuntungan_eksekutif = 10;
    } else {
      $keuntungan_eksekutif = 2;
    }

    $keuntungan_ekonomi = 7;

    $Keseluruhan_keuntungan = $keuntungan_vip + $keuntungan_eksekutif + $keuntungan_ekonomi;
    $Keseluruhan_tiket = $vip + $eksekutif + $ekonomi;

    echo "<br>Keuntungan Dari Tiket VIP : " . $keuntungan_vip . "%<br>";
    echo "Keuntungan Dari Tiket Eksekutif : " . $keuntungan_eksekutif . "%<br>";
    echo "Keuntungan Dari Tiket Ekonomi : " . $keuntungan_ekonomi . "%<br>";
    echo "Jumlah Keseluruhan Keuntungan : " . $Keseluruhan_keuntungan . "%<br>";

    echo "<br>=============================<br><br>";

    echo "Jumlah Tiket VIP : " . $vip . "<br>";
    echo "Jumlah Tiket Eksekutif : " . $eksekutif . "<br>";
    echo "Jumlah Tiket Ekonomi : " . $ekonomi . "<br>";
    echo "Jumlah Keseluruhan Tiket : " . $Keseluruhan_tiket . "<br>";
  }
?>