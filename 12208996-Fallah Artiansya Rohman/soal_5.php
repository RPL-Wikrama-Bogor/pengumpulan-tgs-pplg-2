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
<form action="" method="post">
<div style="display:flex;">
            <label for="jam">masukan jam :</label>
            <input type="number" id="jam" name="jam">
        </div>
        <div style="display:flex;">
            <label for="menit">masukan menit :</label>
            <input type="number" id="menit" name="menit">
        </div>
        <div style="display:flex;">
            <label for="detik">masukan detik :</label>
            <input type="number" id="detik" name="detik">
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

        $jam = $jam * 3600;
        $menit = $menit * 60;
        $total = $jam + $menit + $detik;

        echo $total . "detik";
    }
?>