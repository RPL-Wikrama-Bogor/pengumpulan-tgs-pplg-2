<?php

$satuan;
$puluhan;
$ratusan;
$bilangan;

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
     <!-- imput -->
     <form action="" method="post">
        <div style="display: flex;">
        <label for="bilangan">Input Bilangan</label>
        <input type="number" name="bilangan">
        </div>
        <button type="submit" name="submit">selebew</button>       
    </form>
</body>
</html>

<?php


    if (isset($_POST["submit"])) {

        $bilangan = $_POST["bilangan"];

        $ratusan = floor($bilangan / 100);
        $puluhan = floor($bilangan / 10 ) % 10;
        $satuan = $bilangan % 10;

        echo "Ratusan: $ratusan <br>";
        echo "Puluhan: $puluhan <br>";
        echo "Satuan: $satuan <br>";
    }

?>

