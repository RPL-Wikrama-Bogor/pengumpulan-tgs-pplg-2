<?php
// Deklarasi
$bilangan;
$satuan;
$puluhan;
$ratusan;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bilangan Bulat</title>
</head>
<body>
  <!-- kenapa pakai post?  metode pengiriman data yang Datanya tidak disimpan pada URL. -->
<form action="" method="post">
      <div class="display: flex;" >
        <label for="bilangan">Masukkan Bilangan</label>
        <br>
        <input type="number" name="bilangan" id="bilangan">
        <br>
      </div>
      <br>
      <button type="submit" name="submit">Kirim</button>
     </form>
</body>
</html>

<!-- PROSES -->
<?php
//  mengapa post? berfungsi untuk memanggil data yang telah diinputkan agar bisa ditampilkan di file action.
if (isset($_POST['submit'])) {
    $bilangan = $_POST['bilangan'];
    $ratusan = floor($bilangan/100);
    $puluhan = floor($bilangan / 10) % 10;
    $satuan = floor($bilangan % 10);
 
    echo "ratusan : " . $ratusan;
    echo "<br>";
    echo "puluhan : " . $puluhan;
    echo "<br>";
    echo "satuan : " . $satuan;
}
?>