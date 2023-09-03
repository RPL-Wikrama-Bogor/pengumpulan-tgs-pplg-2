<?

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

        <div style="display: flex;">

            <label for="jam"> Inputkan jam </label>
            <input type="number" name="jam" id="jam" required >

        </div>


        <div style="display: flex;">

            <label for="menit"> Inputkan menit </label>
            <input type="number" name="menit" id="menit" required >

        </div>


        <div style="display: flex;">

            <label for="detik"> Inputkan detik </label>
            <input type="number" name="detik" id="detik" required >

        </div>

        <div style="display: flex;">

            <label for="submit">  </label>
            <input type="submit" name="submit" id="submit" required >

        </div>

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
    // $detik = $detik * 1;
    $total = $jam + $menit + $detik;

    echo " Total waktu dalam detik adalah : " . number_format($total);

}

?>