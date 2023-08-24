<?php
$berat;
$harga_asli;
$harga_diskon;
$harga_total;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>buah</title>
</head>
<body>
<form action="" method="post">
        <div style="display :flex;">
            <label for="berat">berat gram : </label>
            <input type="number" id="berat" name="berat">    
        </div>
        <button type="submit" name="submit">kirim</button>
</form>
</body>
</html>

<?php

if (isset($_POST['submit'])) {
    $berat = $_POST['berat'];

    $harga_asli = (5 * $berat);
    $harga_diskon = 5 * $harga_asli / 100;
    $harga_total = $harga_asli - $harga_diskon;

    echo " harga asli : Rp " . $harga_asli;
    echo " diskon: Rp" . $harga_diskon ;
    echo " harga total : Rp " . $harga_total;
}

?>