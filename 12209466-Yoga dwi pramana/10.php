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
    <title>Rata-rata</title>
</head>
<body>
<form action="" method="post">
    <h1>Rata-Rata</h1>
        <div style="display: flex;">
        <label for="pabp">Input Nilai PABP</label>
        <br>
        <input type="number" name="pabp">
        </div>
        <div style="display: flex;">
        <label for="matematika">Input Nilai MTK</label>
        <br>
        <input type="number" name="matematika">
        </div>
        <div style="display: flex;">
        <label for="dpk">Input Nilai DPK</label>
        <br>
        <input type="number" name="dpk">
        </div>
        <button type="submit" name="submit">Kirim</button>       
    </form>
</body>
</html>

<?php
     if(isset($_POST['submit'])) {
    $nilai_pabp = $_POST['pabp'];
    $nilai_mtk = $_POST['matematika'];
    $nilai_dpk = $_POST['dpk'];
    $rata_rata = ($nilai_pabp + $nilai_mtk + $nilai_dpk ) / 3;

    if ($rata_rata <= 100 && $rata_rata >= 80) {
        echo "Nilai A";
    } elseif ($rata_rata <= 80 && $rata_rata >= 75) {
        echo "Nilai B";
    } elseif ($rata_rata <= 75 && $rata_rata >= 65) {
        echo "Nilai C";
    } elseif ($rata_rata <= 65 && $rata_rata >= 45) {
        echo "Nilai D";
    } elseif ($rata_rata <= 45 && $rata_rata >= 0) {
        echo "Nilai E";
    } else 
        echo  "Angka Tidak Memenuhi Persyaratan";
     }
?>