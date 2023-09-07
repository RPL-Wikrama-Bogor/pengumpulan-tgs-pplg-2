<?php
//preparation
$total_gram;
$harga_sebelum;
$diskon;
$harga_setelah;
?>
<!-- input -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Harga diskon</title>
</head>
<body>
    <form action="" method="post">
    <div class="display: flex;">
        <label for="gram">Masukkan Berat jeruk yang dibeli </label>
        <br>
        <input type="number" name="gram" id="gram">
        </div>
        <button type="submit" name="submit">kirim</button>
    </form>
</body>
</html>
<!-- proses -->
<?php
if(isset($_POST['submit'])){
    $total_gram =$_POST['gram'];
    $harga_sebelum = 5 * $total_gram;
    $diskon = 5 * $harga_sebelum / 100;
    $harga_setelah = $harga_sebelum - $diskon;
    echo "Total yang dibeli: " . $total_gram;
    echo"<br>";
    echo "Harga Sebelum Diskon: " . $harga_sebelum;
    echo "<br>";
    echo "Total Diskon:" . $diskon;
    echo "<br>";
    echo "Harga Setelah Diskon: " . $harga_setelah;
}
?>

