<?php
$jam; 
$menit;
$detik;
$jam_d; 
$menit_d;
$total;

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Konversi waktu ke total detik</title>
</head>
<body>
    <form action="" method="post">
        <div style="display: flex;">
            <label for="jam">Masukkan Jam: </label>
            <input type="number" id="jam" name="jam">
        </div>

        <div style="display: flex;">
            <label for="menit">Masukkan Menit: </label>
            <input type="number" id="menit" name="menit">
        </div>

        <div style="display: flex;">
            <label for="detik">Masukkan Jam: </label>
            <input type="number" id="detik" name="detik">
        </div>
        <button type="submit" name="submit">Kirim!</button>
    </form>
</body>
</html>

<?php 
if (isset($_POST['submit'])) {
    $jam = $_POST['jam'];
    $menit = $_POST['menit'];
    $detik = $_POST['detik'];

    $jam_d = $jam * 3600;
    $menit_d= $menit *60;
    $total = $jam_d + $menit_d + $detik;
    echo $total . " detik";


}





?>