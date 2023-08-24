<?php

$hh;
$mm;
$ss;

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
            <label for="jam">Masukkan jam:
            </label>
            <input type="number" name="jam" id="jam">
        </div>

        <div class="two" style="display: flex;">
            <label for="menit">Masukkan Menit:
            </label>
            <input type="number" name="menit" id="menit">
        </div>

        <div class="three" style="display: flex;">
            <label for="detik">Masukkan detik:
            </label>
            <input type="number" name="detik" id="detik">
        </div>

        <button type="submit" name="submit">Kirim</button>
    </form>
</body>

</html>

<?php
if (isset($_POST['submit'])) {

    // $post disamakan dengan atribut name
    $hh = $_POST['jam'];
    $mm = $_POST['menit'];
    $ss = $_POST['detik'];

    //decision
    $ss = $ss + 1;

    if ($ss >= 60) {
        $mm = $mm + 1;
        $ss = "00";
    }

    if ($mm >= 60) {
        $hh = $hh + 1;
        $mm = "00";
        $ss = "00";
    }
    if ($hh >= 24) {
        $hh = "00";
        $mm = "00";
        $ss = "00";
    }
    echo $hh . ":" . $mm . ":" . $ss;
}

?>