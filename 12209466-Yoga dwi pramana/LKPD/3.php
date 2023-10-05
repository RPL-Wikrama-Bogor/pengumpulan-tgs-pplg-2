<?php

$bilangan_satu;
$bilangan_dua;
$bilangan_tiga;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menentukan Nilai Terbesar</title>
</head>
<body>
    <form action="" method="post">
        <div class="display: flex;">
        <label for="angka_pertama">Masukkan Angka Pertama</label>
        <input type="number" name="angka_pertama" id="angka_pertama">
        </div>
        <div class="display: flex;">
        <label for="angka_kedua">Masukkan Angka Kedua</label>
        <input type="number" name="angka_kedua" id="angka_kedua">
        </div>
        <div class="display: flex;">
        <label for="angka_pertama">Masukkan Angka angka ketiga</label>
        <input type="number" name="angka_ketiga" id="angka_ketiga">
     </div>
     <button type="submit" name="submit">kirim</button>
    </form>

</body>
</html>

    <!-- Proses -->
    <?php if (isset($_POST['submit'])) {
        $bilangan_satu = $_POST['angka_pertama'];
        $bilangan_dua = $_POST['angka_kedua'];
        $bilangan_tiga = $_POST['angka_ketiga'];
    // decision
    if ($bilangan_satu > $bilangan_dua OR $bilangan_satu > $bilangan_tiga) {
        echo "Bilangan Pertama : " . $bilangan_satu . " || Bilangan kedua " .       
        $bilangan_dua . " || Bilangan ketiga : " . $bilangan_tiga . ". Yang terbesar :
        <br>" . $bilangan_satu . "</br>";

    // bisa memakai OR atau >=
    // tanda . titik untuk menyambungkan Concep
    } else if ($bilangan_dua > $bilangan_satu OR $bilangan_dua > $bilangan_tiga) {
        echo "Bilangan Pertama : " . $bilangan_satu . " || Bilangan kedua " .       
        $bilangan_dua . " || Bilangan ketiga : " . $bilangan_tiga . ". Yang terbesar :
        <br>" . $bilangan_tiga . "</br>";
    } else if ($bilangan_tiga > $bilangan_satu OR $bilangan_tiga > $bilangan_dua) {
        echo "Bilangan Pertama : " . $bilangan_satu . " || Bilangan kedua " .       
        $bilangan_dua . " || Bilangan ketiga : " . $bilangan_tiga . ". Yang terbesar :
        <br>" . $bilangan_tiga . "</br>";
    } else {
        echo "Bilangan Pertama : " . $bilangan_satu . " || Bilangan kedua " .       
        $bilangan_dua . " || Bilangan ketiga : " . $bilangan_tiga . " <b>BILANGAN SAMA 
        BESAR</b>";
    } 
    
    }
?>