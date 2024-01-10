<?php 

$jam;
$menit;
$detik;
$total;

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <!-- input -->
    <form method="post" action="">
        <div style="display: flex;">
        <label for="jam">Jam </label>
        <input type="number" name="jam">
        </div>
        <div style="display: flex;">
        <label for="menit">Menit </label>
        <input type="number" name="menit">
        </div>
        <div style="display: flex;">
        <label for="detik">Detik </label>
        <input type="number" name="detik">
        </div>
        <button type="submit" name="submit">selebew</button>
    </form>
</body>
</html>

<?php

if (isset($_POST['submit'])) {
    $jam = $_POST['jam'];
    $menit = $_POST['menit'];
    $detik = $_POST['detik'];

    $jam =$jam*3600;
    $menit =$menit*60;
    $total = $jam + $menit + $detik;

    echo "$total detik <br>";

}

?>
