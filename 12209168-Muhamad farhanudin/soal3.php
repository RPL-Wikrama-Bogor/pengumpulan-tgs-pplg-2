<?php
//preparation
$bilangan_satu;
$bilangan_dua;
$bilangan_tiga;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menentukan nilai terbesar</title>
</head>
<body>
    <!-- siapkan input -->
   <form action = "" method = "post">
    <div style = "display: flex;">
        <label for = "angka_pertama">masukan angka pertama </label>
        <input type = "number" name = "angka_pertama" id = "angka_pertama">
    </div>
    <form action = "" method = "post">
    <div style = "display: flex;">
        <label for = "angka_kedua">masukan angka kedua </label>
        <input type = "number" name = "angka_kedua" id = "angka_kedua">
    </div>
    <form action = "" method = "post">
    <div style = "display: flex;">
        <label for = "angka_ketiga">masukan angka ketiga </label>
        <input type = "number" name = "angka_ketiga" id = "angka_ketiga" br>
    </div>
    <button type = "submit" name = "submit">kirim</button>
   </form>

   <!-- proses -->
   <?php
    //cek apakah button dengan name submit di klik?
    if (isset($_POST['submit'])) {
        //pengisian input ke variable
        //$_POST disamakan dengan attr name
        $bilangan_satu = $_POST['angka_pertama'];
        $bilangan_dua = $_POST['angka_kedua'];
        $bilangan_tiga = $_POST['angka_ketiga'];
        //decision
        if ($bilangan_satu >= $bilangan_dua && $bilangan_satu >= $bilangan_tiga){
            //. namanya concat : menghubungkan string dan variable
            echo "Bilangan_pertama : " . $bilangan_satu . " || Bilangan kedua : " .
            $bilangan_dua . " || Bilangan ketiga : " . $bilangan_tiga . ". Yang terbesar :
            <b>" . $bilangan_satu . "</b>";
        }else if ($bilangan_dua >= $bilangan_satu && $bilangan_dua >= $bilangan_tiga){
            echo "Bilangan_pertama : " . $bilangan_satu . " || Bilangan kedua : " .
            $bilangan_dua . " || Bilangan ketiga : " . $bilangan_tiga . ". Yang terbesar :
            <b>" . $bilangan_dua . "</b>";
        }else if ($bilangan_tiga >= $bilangan_satu && $bilangan_tiga >= $bilangan_dua){
            echo "Bilangan_pertama : " . $bilangan_satu . " || Bilangan kedua : " .
            $bilangan_dua . " || Bilangan ketiga : " . $bilangan_tiga . ". Yang terbesar :
            <b>" . $bilangan_dua . "</b>";
        }else {
            echo "Bilangan_pertama : " . $bilangan_satu . " || Bilangan kedua : " .
            $bilangan_dua . " || Bilangan ketiga : " . $bilangan_tiga . "<b> . $bilangan_dua . </b>";
        }}
    ?>
</body>
</html>