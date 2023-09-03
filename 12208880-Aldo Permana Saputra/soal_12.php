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
            <label for="jam"> Input jam </label>
            <input type="number" name="jam" id="jam">
        </div>


        <div style="display: flex;">
            <label for="menit"> Input menit </label>
            <input type="number" name="menit" id="menit">
        </div>

        <div style="display: flex;">
            <label for="detik"> Input detik </label>
            <input type="number" name="detik" id="detik">
        </div>


        <div style="display: flex;">
            <label for="submit"> </label>
            <input type="submit" name="submit" id="submit">
        </div>

    </form>

</body>

</html>


<?php


$hh = 0;
$mm = 0;
$ss = 0;

if (isset($_POST['submit'])) {
    $hh = $_POST['jam'];
    $mm = $_POST['menit'];
    $ss = $_POST['detik'];

    $ss = $ss + 1;

    if ($ss >= 60) {
        $mm = $mm + 1;
        $ss = 00;

        if ($mm >= 60) {
            $hh = $hh + 1;
            $mm = 00;
            $ss = 00;

            if ($hh >= 24) {
                $hh = $hh + 1;


                echo $hh = 0;
                echo ":" . $mm = 0;
                echo ":" . $ss = 0;
            } else {
                echo $hh;
                echo ":" . $mm;
                echo ":" . $ss;
            }
        } else {
            echo  $hh;
            echo ":" . $mm;
            echo ":" . $ss;
        }
    } elseif ($ss >= 60) {
        echo $ss;
    } else {
        echo       $hh;
        echo ":" . $mm;
        echo ":" . $ss;
    }
}



?>