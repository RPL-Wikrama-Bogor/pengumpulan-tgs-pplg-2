<?php

$bilangan_satu;
$bilangan_dua;
$bilangan_tiga;

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Soal 2</title>
</head>
<body>
    <form action="" method="post">
        <div style="display: flex;">
        <label for="angka_pertama">Masukkan Angka Pertama:</label>
        <input type="number" name="angka_pertama" id="angka_pertama">
        </div>

        <div style="display: flex;">
        <label for="angka_kedua">Masukkan Angka Kedua:</label>
        <input type="number" name="angka_kedua" id="angka_kedua">
        </div>

        <div style="display: flex;">
        <label for="angka_ketiga">Masukkan Angka Ketiga:</label>
        <input type="number" name="angka_ketiga" id="angka_ketiga">
        </div>
        <button type="submit" name="submit">Kirim!</button>
    </form>
</body>
</html>

<?php

if (isset($_POST['submit'])) {
    $bilangan_satu = $_POST['angka_pertama'];
    $bilangan_dua = $_POST['angka_kedua'];
    $bilangan_tiga = $_POST['angka_ketiga'];

    if ($bilangan_satu >= $bilangan_dua AND $bilangan_satu >= $bilangan_tiga) {
        echo "Bilangan Pertama : " . $bilangan_satu . "|| Bilangan Kedua : " . $bilangan_dua . "|| Bilangan Ketiga :" . $bilangan_tiga . "Yang terbesar : <b>". $bilangan_satu . "</b>";
    }
   else if ($bilangan_dua >= $bilangan_satu AND $bilangan_dua >= $bilangan_tiga) {
        echo "Bilangan Pertama : " . $bilangan_satu . "|| Bilangan Kedua : " . $bilangan_dua . "|| Bilangan Ketiga :" . $bilangan_tiga . "Yang terbesar : <b>". $bilangan_dua . "</b>";
    }
   else if ($bilangan_tiga >= $bilangan_satu AND $bilangan_tiga >= $bilangan_dua) {
        echo "Bilangan Pertama : " . $bilangan_satu . "|| Bilangan Kedua : " . $bilangan_dua . "|| Bilangan Ketiga :" . $bilangan_tiga . "Yang terbesar : <b>". $bilangan_tiga . "</b>";
    }
    else{
         echo "Bilangan Pertama : " . $bilangan_satu . "|| Bilangan Kedua : " . $bilangan_dua . "|| Bilangan Ketiga :" . $bilangan_tiga . " Yang terbesar : <b>Sama Besar</b>";
    }
}

?>