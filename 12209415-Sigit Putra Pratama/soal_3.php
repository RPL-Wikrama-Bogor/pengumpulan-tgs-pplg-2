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
    <title>Menentukan Nilai terbesar</title>
</head>
<body>
    <form action="" method="post">
        <div style="display: flex;">
            <label for="angka_pertama">Masukkan Angka Pertama</label>
            <input type="number" name="angka_pertama" id="angka_pertama">
        </div>
        <div style="display: flex;">
            <label for="angka_kedua">Masukkan Angka Kedua</label>
            <input type="number" name="angka_kedua" id="angka_kedua">
        </div>
        <div style="display: flex;">
            <label for="angka_ketiga">Masukkan angka Ketiga</label>
            <input type="number" name="angka_ketiga" id="angka_ketiga">
        </div>
        <button type="submit" name="submit">Kirim</button>
    </form>
</body>
</html>

<!-- Proses -->
<?php
    // cek apakah button dgn name submit di klik
    if(isset($_POST["submit"])) {
        // pengisian input ke variabel
        // $_POST disamakan dengan attr name
        $bilangan_satu = $_POST["angka_pertama"];
        $bilangan_dua = $_POST["angka_kedua"];
        $bilangan_tiga = $_POST["angka_ketiga"];
        // decision
        if ($bilangan_satu >= $bilangan_dua OR $bilangan_satu >= $bilangan_tiga) {
            echo "Bilangan Pertama : ". $bilangan_satu . "|| Bilangan Kedua : " .
            $bilangan_dua . " || Bilangan Ketiga : " . $bilangan_tiga . " Yang Terbesar : 
            <b>" . $bilangan_satu . "</b>";
        } else if ($bilangan_dua >= $bilangan_satu OR $bilangan_dua >= $bilangan_tiga){
            echo "Bilangan Pertama : ". $bilangan_satu . "|| Bilangan Kedua : " .
            $bilangan_dua . " || Bilangan Ketiga : " . $bilangan_tiga . " Yang Terbesar : 
            <b>" . $bilangan_dua . "</b>";
        } else if ($bilangan_tiga >= $bilangan_satu OR $bilangan_tiga >= $bilangan_dua){
            echo "Bilangan Pertama : ". $bilangan_satu . "|| Bilangan Kedua : " .
            $bilangan_dua . " || Bilangan Ketiga : " . $bilangan_tiga . " Yang Terbesar : 
            <b>" . $bilangan_tiga . "</b>";
        } else {
            echo "Bilangan Pertama : ". $bilangan_satu . "|| Bilangan Kedua : " .
                $bilangan_dua . " || Bilangan Ketiga : " . $bilangan_tiga .  "<b>BILANGAN SAMA BESAR</b>";
        }
    }
?>