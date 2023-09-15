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
<form action="" method="post">
<div style="display:flex;">
            <label for="nilai_pabp">masukan nilai_pabp :</label>
            <input type="number" id="nilai_pabp" name="nilai_pabp">
        </div>
        <div style="display:flex;">
            <label for="nilai_mtk">masukan nilai_mtk :</label>
            <input type="number" id="nilai_mtk" name="nilai_mtk">
        </div>
        <div style="display:flex;">
            <label for="nilai_dpk">masukan nilai_dpk :</label>
            <input type="number" id="nilai_dpk" name="nilai_dpk">
        </div>
        <button type="submit" name="submit">Kirim</button>
    </form>
</body>
</html>
<?php
    if (isset($_POST['submit'])) {

       $nilai_pabp = $_POST['nilai_pabp'];
       $nilai_mtk = $_POST['nilai_mtk'];
       $nilai_dpk = $_POST['nilai_dpk'];

       $rata_rata=($nilai_pabp + $nilai_mtk + $nilai_dpk)/3;

       if($rata_rata<=100 && $rata_rata>=80){
        echo "A";
       }

       else if($rata_rata <=80 && $rata_rata >=75){
        echo "B";
       }

       else if($rata_rata <=75 && $rata_rata >=65){
        echo "D";
       }

       else if($rata_rata <=65 && $rata_rata >=45){
        echo "D";
       }

       else if($rata_rata <=45 && $rata_rata >=0){
        echo "E";
       }
       else{
      echo "angka tidak memenuhi persyaratan";
       }

    }
?>