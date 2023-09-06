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
    <title>int bilangan</title>
</head>
<body>
<form action="" method="post">
        <div style="display: flex;">
        <label for="nama"> Masukkan Billangan : </label>
        <input type="Number" name="bilangan" id="bilangan">
        </div>
        <button type="submit" name="submit">Kirim</button>
</form>
</body>
</html>
<?php
if (isset($_POST['submit'])) {
    $bilangan = $_POST['bilangan'];

    $satuan =floor ($bilangan % 10);
    $puluhan =floor ($bilangan /10) % 10;
    $ratusan =floor ($bilangan % 1000) %100;

    echo "Satuan: ". $satuan;
    echo "<br>";
    echo "Puluhan: ". $puluhan;
    echo "<br>";
    echo "Ratusan: ". $ratusan;

}
?>