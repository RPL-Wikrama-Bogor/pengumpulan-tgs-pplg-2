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
    <title>Document</title>
</head>
<body>
<form action="" method="post">
<div style="display:flex;">
            <label for="total_gram">masukan total_gram :</label>
            <input type="number" id="total_gram" name="total_gram">
        </div>
        <button type="submit" name="submit">Kirim</button>
    </form>
</body>
</html>
<?php
    if (isset($_POST['submit'])) {

        $total_gram = $_POST['total_gram'];

        $harga_sebelum = 500 * $total_gram;
        $diskon = 5 * $harga_sebelum/100;
        $harga_setelah = $harga_sebelum - $diskon;

        echo "<br> harga sebelum:" .$harga_sebelum ."<br> diskon:". $diskon ."<br> harga setelah:". $harga_setelah;
    }
?>