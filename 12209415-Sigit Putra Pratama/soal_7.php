<?php
// Deklarasi
$total_gram;
$harga_sebelum;
$diskon;
$harga_setelah;
?>

<!-- INPUT -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Diskon harga</title>
</head>
<body>
  <!-- kenapa pakai post?  metode pengiriman data yang Datanya tidak disimpan pada URL. -->
<form action="" method="post">
      <div class="display: flex;" >
        <label for="gram">Masukkan Gram</label>
        <br>
        <input type="number" name="gram" id="gram">
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
    $total_gram = $_POST['gram'];
    $harga_sebelum = 500 * $total_gram;
    $diskon = 5 * $harga_sebelum / 100;
    $harga_setelah = $harga_sebelum - $diskon;

    echo "<hr></hr>";
    echo " Harga Sebelum : Rp. " . $harga_sebelum;
    echo "<br>";
    echo " Diskon : Rp. " . $diskon;
    echo "<br>";
    echo " Harga Setelah : Rp. " . $harga_setelah;
}
?>