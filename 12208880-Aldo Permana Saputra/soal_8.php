
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
            <label for="bilangan"> Input angka </label>
            <input type="number" name="bilangan" id="bilangan" required>
        </div>


        <div style="display: flex;">
            <label for="submit"> </label>
            <input type="submit" name="submit" id="submit">
        </div>

    </form>

</body>

</html>


<?php

// floor : untuk membulatkan bilangan ke bawah
// ceil : untuk membulatkan ke atas
// round : untuk membulatkan ke atas dan kebawah ( Flexibel )

$bilangan;
$satuan = 0;
$puluhan = 0;
$ratusan = 0;


if (isset($_POST['submit'])) {
    
    $bilangan = $_POST['bilangan'];

    $satuan = $bilangan % 10;
    $puluhan =  floor ($bilangan / 10) % 10;
    $ratusan = floor(($bilangan % 1000) / 100);


    echo "</br>";
    echo "Angka satuan dari &nbsp; ".number_format($bilangan) . " &nbsp; adalah : ";
    echo "</br>";
    echo "<========================================>";
    echo "</br>";
    echo "Ratusan = " . $ratusan;
    echo "</br>";
    echo " Puluhan = " . $puluhan;
    echo "</br>";
    echo "Satuan = " . $satuan;
    
}



?>