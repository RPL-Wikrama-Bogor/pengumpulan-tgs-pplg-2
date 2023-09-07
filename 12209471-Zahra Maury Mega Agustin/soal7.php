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
        <meta name="viewport" content="width=device-width, intial-scale=1.0">
        <title>menghitung jumah uang</title>
</head>
<body>
<form action="" method="post">
        <div style="display : flex;">
        <label for="total_gram">masukan total gram</label>
        <input type="number" name="total_gram" id="total_gram">
</div>
<button type="submit" name="submit">kirim</button>
</form>
</body>
</html>

<?php
if(isset($_POST['submit'])){
    $total_gram = $_POST['total_gram'];

    $total_sebelum = 500 * $total_gram;
    $diskon = 5 * $harga_sebelum / 100;
    $setelah_diskon = $harga_sebelum - $diskon;

    echo "harga_sebelum : " . $harga_sebelum;
    echo "diskon : " . $diskon;
    echo "harga_setelah : " . $harga_setelah;

}
?>