<?php
//preparation
$suhu_farhenheit =0;
$suhu_celcius =0;
?>
<!-- input -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cek suhu</title>
</head>
<body>
    <form action="" method="post">
    <div class="display: flex;">
        <label for="suhu">Input Suhu farhenheit</label>
        <br>
        <input type="number" name="suhu" id="suhu">
        </div>
        <button type="submit" name="submit">kirim</button>
    </form>
</body>
</html>
<!-- proses -->
<?php
if(isset($_POST['submit'])){
$suhu_fahrenheit = $_POST['suhu'];
$suhu_celcius = $suhu_fahrenheit - 32 /1.8;

if ($suhu_celcius > 300) {
    echo "Panas";
} elseif ($suhu_celcius <= 250) {
    echo "Dingin";
} else {
    echo "Normal";
}

}
?>

