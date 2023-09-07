<?php
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
    <title>Bilangan</title>
</head>
<body>
    <form action="" method="post">
        <div class="display: flex;">
            <label for="bilangan">Masukkan Bilangan</label>
            <br>
            <input type="number" name="bilangan" id="bilangan">
        <br>
        <button type="submit" name="submit">Kirim</button>
    </form>
</body>
</html>

<!-- Proses -->

<?php
   if(isset($_POST['submit'])) {
   $bilangan = $_POST ['bilangan'];
   $ratusan = floor($bilangan / 100);
   $puluhan = floor($bilangan / 10) %10;
   $satuan = floor($bilangan % 10);

   echo "<br>";
   echo " Ratusan : " . $ratusan;
   echo "<br>";
   echo " Puluhan : " . $puluhan;
   echo "<br>";
   echo " satuan : " . $satuan;
   }
?>