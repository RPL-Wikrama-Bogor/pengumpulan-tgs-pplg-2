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
    <title>Soal 12</title>
    <style>
        body{
            margin-bottom: 33%;
            background-image: linear-gradient(45deg, orange, yellow);
        }
        .content{
            border-radius: 50px;
            justify-content: center;
            border-style: double;
            margin: 0px 25% 0px;
            padding: 10px 0px 20px 0px;
        }
    </style>
</head>

<body>
    <h1><center>Data Waktu Setelah Ditambahkan 1 detik<center></h1>

    <form action="" method="post">
        <div class="content"><center>
            <label for="h" style="display: flex; justify-content: center;">Input Hours : </label>
            <input type="number" name="h" id="h" >

            <label for="m" style="display: flex; justify-content: center;">Input Minute : </label>
            <input type="number" name="m" id="m">

            <label for="s" style="display: flex; justify-content: center;">Input Second : </label>
            <input type="number" name="s" id="s">        
            
            <button type="submit" name="submit" style="display: flex;">Kirim!</button></center>
        </div>

    </form>

    <div style="font-weight: bold;">
    <?php

    if (isset($_POST['submit'])) {
        $hh = $_POST['h'];
        $mm = $_POST['m'];
        $ss = $_POST['s'];
        echo "<center> Sebelum ditambahkan : ".$hh.":".$mm.":".$ss."</center> <br>";

        $ss += 1;

        if ($ss >= 60) {
            $mm += 1;
            $ss = 00;
        }

        if ($mm >= 60) {
            $hh += 1;
            $mm = 00;
            $ss = 00;
        }

        if ($hh >= 24) {
            $hh = 00;
            $mm = 00;
            $ss = 00;
        }

        echo "<center>sesudah ditambahkan : ". $hh . ":" . $mm . ":" . $ss."</center>";
    }

    ?></div>

</body>

</html>