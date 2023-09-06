<?php

$total_gram;
$harga_sebelum;
$diskon;
$harga_setelah;

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SupraMarket</title>
</head>
<body>
    <form action=""method="post">
        <div style="display: flex;">
        <label for="total">Masukkan Total gram :</label>
        <input type="Number" id="total" name="total">
    </div>
    <button type="submit" name="submit">Kirim</button>
    </form>
</body>
</html>
<?php
if (isset($_POST['submit'])) {
    $total_gram = $_POST['total'];

    $harga_sebelum=5  * $total_gram;
    $diskon = 5 * $harga_sebelum /100;
    $harga_setelah = $harga_sebelum - $diskon;

    echo " Harga sebelum: Rp ". $harga_sebelum;
    echo "<br>";
    echo " Diskon: Rp " . $diskon;
    echo "<br>";
    echo "  Harga setelah: Rp ". $harga_setelah;
}
?>