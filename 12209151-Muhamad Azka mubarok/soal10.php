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
    <title>Nilai</title>
</head>
<body>
  <!-- input -->
  <form action="" method="post">
        <div style="display: flex;">
        <label for="nilai_pabp">Input Nilai PABP</label>
        <input type="number" name="nilai_pabp">
        </div>      
        <div style="display: flex;">
        <label for="nilai_mtk">Input Nilai MTK</label>
        <input type="number" name="nilai_mtk">
        </div>     
        <div style="display: flex;">
        <label for="nilai_dpk">Input Nilai PABP</label>
        <input type="number" name="nilai_dpk">
        </div>
        <button type="submit" name="submit">Kirim</button>       
    </form>  
</body>
</html>

<?php
//process
if (isset($_POST["submit"])) {
    $nilai_pabp = $_POST["nilai_pabp"];
    $nilai_mtk = $_POST["nilai_mtk"];
    $nilai_dpk = $_POST["nilai_dpk"];
    $rata_rata = ($nilai_pabp + $nilai_mtk + $nilai_dpk) / 3;
    //decision
    if ($rata_rata <= 100 && $rata_rata >= 80) {
        echo "Grade A";
    }
    elseif ($rata_rata <= 80 && $rata_rata >= 75) {
        echo "Grade B";
    }
    elseif ($rata_rata <= 75 && $rata_rata >= 65) {
        echo "Grade C";
    }
    elseif ($rata_rata <= 65 && $rata_rata >= 45) {
        echo "Grade D";
    }
    elseif ($rata_rata <= 45 && $rata_rata >= 0) {
        echo "Grade E";
    }
    else {
        echo "Angka Tidak Memenuhi Persyaratan";
    }
}
 

?>