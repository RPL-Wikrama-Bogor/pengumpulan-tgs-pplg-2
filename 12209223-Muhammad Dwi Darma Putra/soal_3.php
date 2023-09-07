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
    <title>Menentukan Nilai Terbesar</title>
</head>
<body>
    <form action="" method= "post">
        <div style="display: flex;">
            <label for="angka_pertama">Masukan Angka Pertama</label>
            <input type="number" name="angka_pertama" id="angka_pertama">
        </div>
        <div style="display: flex;">
            <label for="angka_kedua">Masukan Angka Kedua</label>
            <input type="number" name="angka_kedua" id="angka_kedua">
        </div>
        <div style="display: flex;">
            <label for="angka_ketiga">Masukan Angka Ketiga</label>
            <input type="number" name="angka_ketiga" id="angka_ketiga">
        </div>
        <button type="submit" name="submit">Kirim</button>
    </form>
</body>
</html>

<!-- proses -->
<?php
    //cek apakah button dgn name submit di klik
    if (isset($_POST['submit'])) {
        //pengisian form input
        $bilangan_satu= $_POST['angka_pertama'];
        $bilangan_dua= $_POST['angka_kedua'];
        $bilangan_tiga= $_POST['angka_ketiga'];
        //decision
        if ($bilangan_satu > $bilangan_dua or $bilangan_satu > $bilangan_tiga ){
            // . namanya concat untuk menghubungkan string dengan variable
            echo "Bilangan Pertama : " . $bilangan_satu . " || Bilangan Kedua : . " . $bilangan_dua . " || Bilangan Tiga : " . $bilangan_tiga . ". Yang Terbesar  : 
            <b>" . $bilangan_satu . "</b>" ;
        }
        else if ($bilangan_dua > $bilangan_satu or $bilangan_dua > $bilangan_tiga ){
            echo "Bilangan Pertama : " . $bilangan_satu . " || Bilangan Kedua : . " . $bilangan_dua . " || Bilangan Tiga : " . $bilangan_tiga . ". Yang Terbesar : 
            <b>" . $bilangan_dua . "</b>" ;
        }
        else if ($bilangan_tiga > $bilangan_satu or $bilangan_tiga > $bilangan_dua) {
            echo "Bilangan pertama : " . $bilangan_satu . " || Bilangan Kedua : " . $bilangan_dua . " || Bilangan Ketiga " . $bilangan_tiga . " Bilangan terbesar : <b>" . $bilangan_tiga . "</b>";
        } else {
            echo "Bilangan pertama : " . $bilangan_satu . " || Bilangan Kedua : " . $bilangan_dua . " || Bilangan Ketiga " . $bilangan_tiga . " Bilangan terbesar : <b>  Bilangan sama besar </b>";
        }
    }