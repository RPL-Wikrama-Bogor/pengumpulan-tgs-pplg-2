<?php 

$total_gram;
$harga_before;
$harga_after;
$diskon;

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopee</title>
</head>
<body>
    <form action="" method="post">
        <div style="display: flex;">
        <label for="total">Masukkan Total gram: </label>
        <input type="number" id="total" name="total">
        </div>
        <button type="submit" name="submit">Kirim!</button>
    </form>
</body>
</html>

<?php

if (isset($_POST['submit'])) {
    $total_gram = $_POST['total'];

    $harga_before = 5 * $total_gram;
    $diskon = 5 * $harga_before / 100 ;
    $harga_after = $harga_before - $diskon;

    echo "Harga Sebelum: Rp " . $harga_before ;
    echo "<br>";
    echo "Diskon : Rp " . $diskon;
    echo "<br>";
    echo "Harga Setelah: Rp " . $harga_after;
}


?>
