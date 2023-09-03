<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>


<style>
    label {
        display: block;
        margin-bottom: 5px;
    }

    input {
        display: block;
        margin-bottom: 10px
    }
</style>


<body>

    <form action="" method="post">

        <div>
            <label for="nama"> Input nama </label>
            <input type="text" name="nama" id="nama" required>

            <label for="kehadiran"> Input kehadiran </label>
            <input type="number" name="kehadiran" id="kehadiran" required>

            <label for="mtk"> Input nilai mtk </label>
            <input type="number" name="mtk" id="mtk" required>

            <label for="indo"> Input nilai indo </label>
            <input type="number" name="indo" id="indo" required>

            <label for="ing"> Input nilai ing </label>
            <input type="number" name="ing" id="ing" required>

            <label for="dpk"> Input nilai dpk </label>
            <input type="number" name="dpk" id="dpk" required>

            <label for="agama"> Input nilai agama </label>
            <input type="number" name="agama" id="agama" required>




            <label for="submit"></label>
            <input type="submit" name="submit" id="submit">

        </div>

    </form>

</body>

</html>


<?php


$mtk;
$indo;
$ing;
$dpk;
$agama;
$nama;
$kehadiran;
$total;
$i = 0;



if (isset($_POST['submit'])) {

    $mtk[$i] = $_POST['mtk'];
    $indo[$i] = $_POST['indo'];
    $ing[$i] = $_POST['ing'];
    $dpk[$i] = $_POST['dpk'];
    $agama[$i] = $_POST['agama'];
    $nama[$i] = $_POST['nama'];
    $kehadiran[$i] = $_POST['kehadiran'];


    for ($i = 0; $i < 15; $i++) {

        $mtk[$i] = $_POST['mtk'];
        $mtk[$i];


        $indo[$i] = $_POST['indo'];
        $indo[$i];

        $ing[$i] = $_POST['ing'];
        $ing[$i];

        $dpk[$i] = $_POST['dpk'];
        $dpk[$i];

        $agama[$i] = $_POST['agama'];
        $agama[$i];

        $nama[$i] = $_POST['nama'];
        $nama[$i];

        $kehadiran[$i] = $_POST['kehadiran'];
        $kehadiran[$i];
    }

    for ($i = 0; $i < 1; $i++) {
        $total[$i] = $mtk[$i] +  $indo[$i] +  $ing[$i] +  $dpk[$i] +  $agama[$i];
        echo "Jumlah total nilai nya &nbsp" . $total[$i];
        echo "</br>";

        echo "Kehadiran : &nbsp" . $kehadiran[$i] . "%";

        echo "</br>";

        if ($total[$i] >= 475 && $kehadiran[$i] == 100) {
            echo "siswa &nbsp" . $nama[$i] . " &nbsp menjadi juara";
        }else {
            echo "siswa &nbsp" . $nama[$i] . "&nbsp tidak menjadi juara";
        }
    }
}




?>