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
    <title>Soal 5</title>
</head>
<body>

    <form action="" method="post">
        <div style="display: flex;">
            <label for="jam">Input jam : </label>
            <input type="number" name="jam" id="jam">
        </div>

        <div style="display: flex;">
            <label for="menit">Input Menit : </label>
            <input type="number" name="menit" id="menit">
        </div>

        <div style="display: flex;">
            <label for="detik">Input Detik : </label>
            <input type="number" name="detik" id="detik">
        </div>
            <button type="submit" name="submit">Kirim!</button>

    </form>

    <?php

    if(isset($_POST['submit'])){
        $jam = $_POST['jam'] * 3600;
        $menit = $_POST['menit'] * 60;
        $detik = $_POST['detik'];
        $total = $jam + $menit + $detik;

        echo "jadi total detik dari ".$_POST['jam']." jam ".$_POST['menit']." menit ".$_POST['detik']." detik adalah ".$total." detik";
    }

    ?>
    
</body>
</html>