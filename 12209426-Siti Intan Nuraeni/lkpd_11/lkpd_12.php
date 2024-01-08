<?php
$jam;
$menit;
$detik;
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
        <div style="display: flex;">
        <label for="hours">Masukan Jam</label>
        <input type="number" name="hours" id="hours" required>
        </div>
        <div style="display: flex;">
        <label for="minutes">Masukan Menit</label>
        <input type="number" name="minutes" id="minutes" required>
        </div>
        <div style="display: flex;">
        <label for="seconds">Masukan Detik</label>
        <input type="number" name="seconds" id="secounds" required>
        </div>
        <button type="submit" name="submit">Kirim</button>
    </form>
</body>
</html>

<?php
if(isset($_POST['submit'])){
    $jam = $_POST ['hours'];
    $menit= $_POST ['minutes'];
    $detik = $_POST ['seconds'];

    $detik += 1;

    if ($detik >= 60){
        $menit += 1;
        $detik = 00;
    }

    else if ($menit >= 60){
       $jam += 1;
       $menit = 00;
       $detik = 00;
    }

    else if ($detik >= 24){
        $jam = 00;
        $menit = 00;
        $detik = 00;
    }

    echo $jam. "jam||" .$menit. "menit||" .$detik. "detik||";
}
?>