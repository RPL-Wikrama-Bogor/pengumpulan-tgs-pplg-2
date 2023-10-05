<?php

    $total;
    $sebelum;
    $diskon;
    $setelah;

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Soal 7</title>
</head>
<body>

<form action="" method="post">
        <div style="display: flex;">
            <label for="garam">Masukan Total Garam : </label>
            <input type="number" name="garam" id="garam">
        </div>
            <button type="submit" name="submit">Kirim!</button>

    </form>

    <?php
    if(isset($_POST['submit'])){
        $total = $_POST['garam'];
        $sebelum = 5 * $total;
        $diskon = 5 * $sebelum / 100;
        $setelah = $sebelum - $diskon;

        echo "Harga sebelum diskon : Rp. ".$sebelum."</br>";
        echo "Diskon : ".$diskon."</br>";
        echo "Harga setelah diskon : Rp. ".$setelah."</br>";
    }
    
    ?>

</body>
</html>