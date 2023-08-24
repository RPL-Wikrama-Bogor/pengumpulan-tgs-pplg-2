<?php
$jam;
$menit;
$detik;
$jam2;
$menit2;
$hasil;
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
        <div class="one" style="display: flex;">
        <label for="jam">Masukkan jam
        </label>
        <input type="number" name="jam" id="jam">
        </div>

        <div class="two" style="display: flex;">
        <label for="menit">Masukkan menit
        </label>
        <input type="number" name="menit" id="menit">
        </div>

        <div class="three" style="display: flex;">
        <label for="detik">Masukkan detik
        </label>
        <input type="number" name="detik" id="detik">
        </div>
        
        <button type="submit" name="submit">Kirim</button>
    </form>
</body>
</html>

<?php
    if(isset($_POST['submit'])){
        $jam = $_POST['jam'];
        $menit = $_POST['menit'];
        $detik = $_POST['detik'];

        $jam2 = $jam *3600;
        $menit2 = $menit *60;
        $hasil = $jam2 + $menit2 + $detik;
        echo $hasil . " detik";
    }
?>