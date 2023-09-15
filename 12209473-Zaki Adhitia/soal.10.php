<?php
 
$nilai_pabp;
$nilai_mtk;
$nilai_dpk;
$rata_rata;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

      <!-- imput -->
      <form action="" method="post">
        <div style="display: flex;">
        <label for="nilai">Input nilai PABP</label>
        <input type="number" name="nilai" required>
        </div>
        <div style="display: flex;">
        <label for="nilai">Input nilai MTK</label>
        <input type="number" name="nilai" required>
        </div>  1
        <div style="display: flex;">
        <label for="nilai">Input nilai DPK</label>
        <input type="number" name="nilai" required>
        </div>
        <button type="submit" name="submit">selebew</button>       
    </form>

</body>
</html>

<?php

if (isset($_POST['submit'])) {
    $nilai_pabp = $_POST['nilai'];
    $nilai_mtk = $_POST['nilai'];
    $nilai_dpk = $_POST['nilai'];

    $rata_rata = ($nilai_pabp + $nilai_mtk + $nilai_dpk) / 3;

    if ($rata_rata <= 100 && $rata_rata >= 80) {
        echo " $rata_rata = A <br>";
    }
    elseif ($rata_rata <= 80 && $rata_rata >= 75) {

        echo "$rata_rata = B <br>";
    }
    elseif ($rata_rata <= 75 && $rata_rata >= 65) {
        echo "$rata_rata = C <br>";
    }
    elseif ($rata_rata <= 65 && $rata_rata >= 45) {
        echo "$rata_rata = D <br>";
    }
    elseif ($rata_rata <= 45 && $rata_rata >= 0) {
        echo "$rata_rata = E <br>";
    }
    else {
        echo "Andi Tidak Memenuhi Persyaratan";
    }
}

?>