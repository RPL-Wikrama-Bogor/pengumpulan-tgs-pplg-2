<<<<<<< HEAD
<?php
// Preparation
$angka_pertama;
$angka_kedua;
$angka_ketiga;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menentukan Nilai Terbesar</title>
</head>

<body>
    <!-- Siapkan Input -->
    <form action="" method="post">
        <div style="display: flex;">
            <label for="angka-pertama">Masukan Angka Pertama :</label>
            <input type="number" name="angka-pertama" id="angka-pertama">
        </div>
        <div style="display: flex;">
            <label for="angka-kedua">Masukan Angka Kedua :</label>
            <input type="number" name="angka-kedua" id="angka-kedua">
        </div>
        <div style="display: flex;">
            <label for="angka-ketiga">Masukan Angka Ketiga :</label>
            <input type="number" name="angka-ketiga" id="angka-ketiga">
        </div>
        <button type="submit" name="submit">Kirim!</button>
    </form>
</body>

</html>

<?php
// Cek apakah button dgn name submit di klik
if (isset($_POST['submit'])) {
    // Pengisian input ke variable
    // $_POST disamakan dengan attribute name
    $bilangan_satu = $_POST['angka-pertama'];
    $bilangan_dua = $_POST['angka-kedua'];
    $bilangan_tiga = $_POST['angka-ketiga'];

    // decision
    if ($bilangan_satu >= $bilangan_dua && $bilangan_satu >= $bilangan_tiga) {
        echo "Bilangan pertama : " . $bilangan_satu . " || Bilangan Kedua : " . $bilangan_dua . " || Bilangan Ketiga " . $bilangan_tiga . " Bilangan terbesar :" . "<b>" .  $bilangan_satu . "</b>";
    } else if ($bilangan_dua >= $bilangan_satu && $bilangan_dua >= $bilangan_tiga) {
        echo "Bilangan pertama : " . $bilangan_satu . " || Bilangan Kedua : " . $bilangan_dua . " || Bilangan Ketiga " . $bilangan_tiga . " Bilangan terbesar :". "<b>"  . $bilangan_dua . "</b>";
    } else if ($bilangan_tiga >= $bilangan_satu && $bilangan_tiga >= $bilangan_dua) {
        echo "Bilangan pertama : " . $bilangan_satu . " || Bilangan Kedua : " . $bilangan_dua . " || Bilangan Ketiga " . $bilangan_tiga . " Bilangan terbesar : <b>" . $bilangan_tiga . "</b>";
    } else {
        echo "Bilangan pertama : " . $bilangan_satu . " || Bilangan Kedua : " . $bilangan_dua . " || Bilangan Ketiga " . $bilangan_tiga . " Bilangan terbesar : <b>  Bilangan sama besar </b>";
    }
}
=======
<?php
// Preparation
$angka_pertama;
$angka_kedua;
$angka_ketiga;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menentukan Nilai Terbesar</title>
</head>

<body>
    <!-- Siapkan Input -->
    <form action="" method="post">
        <div style="display: flex;">
            <label for="angka-pertama">Masukan Angka Pertama :</label>
            <input type="number" name="angka-pertama" id="angka-pertama">
        </div>
        <div style="display: flex;">
            <label for="angka-kedua">Masukan Angka Kedua :</label>
            <input type="number" name="angka-kedua" id="angka-kedua">
        </div>
        <div style="display: flex;">
            <label for="angka-ketiga">Masukan Angka Ketiga :</label>
            <input type="number" name="angka-ketiga" id="angka-ketiga">
        </div>
        <button type="submit" name="submit">Kirim!</button>
    </form>
</body>

</html>

<?php
// Cek apakah button dgn name submit di klik
if (isset($_POST['submit'])) {
    // Pengisian input ke variable
    // $_POST disamakan dengan attribute name
    $bilangan_satu = $_POST['angka-pertama'];
    $bilangan_dua = $_POST['angka-kedua'];
    $bilangan_tiga = $_POST['angka-ketiga'];

    // decision
    if ($bilangan_satu >= $bilangan_dua && $bilangan_satu >= $bilangan_tiga) {
        echo "Bilangan pertama : " . $bilangan_satu . " || Bilangan Kedua : " . $bilangan_dua . " || Bilangan Ketiga " . $bilangan_tiga . " Bilangan terbesar :" . "<b>" .  $bilangan_satu . "</b>";
    } else if ($bilangan_dua >= $bilangan_satu && $bilangan_dua >= $bilangan_tiga) {
        echo "Bilangan pertama : " . $bilangan_satu . " || Bilangan Kedua : " . $bilangan_dua . " || Bilangan Ketiga " . $bilangan_tiga . " Bilangan terbesar :". "<b>"  . $bilangan_dua . "</b>";
    } else if ($bilangan_tiga >= $bilangan_satu && $bilangan_tiga >= $bilangan_dua) {
        echo "Bilangan pertama : " . $bilangan_satu . " || Bilangan Kedua : " . $bilangan_dua . " || Bilangan Ketiga " . $bilangan_tiga . " Bilangan terbesar : <b>" . $bilangan_tiga . "</b>";
    } else {
        echo "Bilangan pertama : " . $bilangan_satu . " || Bilangan Kedua : " . $bilangan_dua . " || Bilangan Ketiga " . $bilangan_tiga . " Bilangan terbesar : <b>  Bilangan sama besar </b>";
    }
}
>>>>>>> 8ea81f78c3b089b87a85e1ca4c2c0162912ea2fa
?>