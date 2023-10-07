<?php

    $pabp;
    $mtk;
    $dpk;
    $rata2;

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Soal 10</title>
</head>
<body>

    <form action="" method="post">
        <div style="display: flex">
            <label for="pabp">Masukan Nilai PABP : </label>
            <input type="number" name="pabp" id="pabp">
        </div>
        
        <div style="display: flex">
            <label for="mtk">Masukan Nilai MTK : </label>
            <input type="number" name="mtk" id="mtk">
        </div>

        <div style="display: flex">
            <label for="dpk">Masukan Nilai DPK : </label>
            <input type="number" name="dpk" id="dpk">
        </div>

        <button type="submit" name="submit">Kirim Nilai</button>

    </form>

    <?php

    if(isset($_POST['submit'])){
        $pabp = $_POST['pabp'];
        $mtk = $_POST['mtk'];
        $dpk = $_POST['dpk'];

        $rata2 = ($pabp + $mtk + $dpk) / 3;

        if($rata2 <= 100 && $rata2 >= 80){
            echo "Nilai A";
        }

        else if($rata2 < 80 && $rata2 >= 75){
            echo "Nilai B";
        }

        else if($rata2 < 75 && $rata2 >= 65){
            echo "Nilai C";
        }

        else if($rata2 < 65 && $rata2 >= 45){
            echo "Nilai D";
        }

        else if($rata2 < 45 && $rata2 >= 0){
            echo "Nilai E   ";
        }

        else{
            echo "Angka tidak memenuhi persyaratan";
        }

    }

    ?>
    
</body>
</html>