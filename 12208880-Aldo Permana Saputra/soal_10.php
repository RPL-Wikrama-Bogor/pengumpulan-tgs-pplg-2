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
            <label for="nilai_pabp"> Input nilai PABP </label>
            <input type="number" name="nilai_pabp" id="nilai_pabp">
        </div>

        
        <div style="display: flex;">
            <label for="nilai_mtk"> Input Nilai MTK </label>
            <input type="number" name="nilai_mtk" id="nilai_mtk">
        </div>

        <div style="display: flex;">
            <label for="nilai_dpk"> Input Nilai DPK </label>
            <input type="number" name="nilai_dpk" id="nilai_dpk">
        </div>


        <div style="display: flex;">
            <label for="submit"> </label>
            <input type="submit" name="submit" id="submit">
        </div>

    </form>

</body>

</html>


<?php

$nilai_pabp;
$nilai_mtk;
$nilai_dpk;
$rata_rata;


if (isset($_POST['submit'])) {
    $nilai_pabp = $_POST['nilai_pabp'];
    $nilai_dpk = $_POST['nilai_dpk'];
    $nilai_mtk = $_POST['nilai_mtk'];


    $rata_rata = ($nilai_pabp + $nilai_mtk + $nilai_dpk) / 3;

    if ( $rata_rata <= 100 && $rata_rata >= 80) {
        echo "Akreditasi A";
    }elseif ($rata_rata < 80 && $rata_rata >= 75) {
        echo "Akreditasi B";
    }elseif ($rata_rata < 75 && $rata_rata >= 65) {
        echo "Akreditasi C";
    }elseif ($rata_rata < 65 && $rata_rata >=45) {
        echo "Akreditasi D";
    }elseif ($rata_rata < 45 && $rata_rata >= 0) {
        echo "Akreditasi E";
    }else {
        echo "</br>";
        echo "Angka tidak memenuhi persyaratan";
    }

}


?>