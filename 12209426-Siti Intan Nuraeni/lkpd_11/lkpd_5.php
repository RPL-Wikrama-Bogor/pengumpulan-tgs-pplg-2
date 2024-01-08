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
            <label for="hours">Masukan jam</label>
            <input type="number" name="hours" id="hours" required>
        </div>
        <div style= "display:flex;">
            <label for="minutes">Masukan menit</label>
            <input type="number" name="minutes" id="minutes" required>
        </div>
        <div style= "display:flex;">
            <label for="seconds">Masukan detik</label>
            <input type="number" name="seconds" id="seconds" required>
        </div>
        <button type="submit" name="submit">Kirim</button>
    </form>
</body>
</html>

<?php
if(isset($_POST['submit'])){
   $jam = $_POST ['hours'];
   $menit = $_POST ['minutes'];
   $detik = $_POST ['seconds'];

$jam *= 3600;
$menit *= 60;
$total = $jam + $menit + $detik;

echo "Total detik :" . $total;

}
