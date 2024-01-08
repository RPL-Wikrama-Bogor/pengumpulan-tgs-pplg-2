<?php 
$bilangan;
$satuan;
$puluhan;
$ratusan
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="post">
        <div style="display: flex;">
        <label for="bilangan">Masukkan Bilangan: </label>
        <input type="number" id="bilangan" name="bilangan">
        </div>
        <button type="submit" name="submit">Kirim!</button>
    </form>
</body>
</html>

<?php

if (isset($_POST['submit'])) {
    $bilangan = $_POST['bilangan'];

    $satuan = floor($bilangan % 10) ;
    $puluhan = floor($bilangan / 10 ) % 10;
    $ratusan = floor(($bilangan % 1000) / 100);

    echo "Ratusan: " . $ratusan ;
    echo "<br>";
    echo "Puluhan: " . $puluhan ;
    echo "<br>";
    echo "Satuan: " . $satuan;
}

?>