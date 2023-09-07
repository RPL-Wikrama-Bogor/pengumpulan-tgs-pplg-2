<?php

$jam;
$menit;
$detik;
$jam_J;
$menit_M;
$total;

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Input jam</title>
</head>
<body>
    <form action=""method="post">
        <div style="display: flex;">
    <label for="jam">Masukkan jam:</label>
    <input type="Number" id="jam" name="jam">
</div>      

<div style="display: flex;">
    <label for="jam">Masukkan menit:</label>
    <input type="Number" id="menit" name="menit">
</div>

<div style="display: flex;">
    <label for="jam">Masukkan detik:</label>
    <input type="Number" id="detik" name="detik">
</div>
<button type="submit" name="submit">Kirim</button>

</form>
</body>
</html>

<?php
if (isset($_POST['submit'])) {
    $jam = $_POST['jam'];
    $menit = $_POST['menit'];
    $detik = $_POST['detik'];

    $jam_J = $jam * 3600;
    $menit_M = $menit * 60;
    $total = $jam + $menit + $detik;
    echo $total . " detik ";
}

?>