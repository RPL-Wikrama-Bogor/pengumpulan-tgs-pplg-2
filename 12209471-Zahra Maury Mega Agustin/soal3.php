<?php
// preparation
$bilangan_satu;
$bilangan_dua;
$bilangan_tiga;
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>menentukan nilai terbesar</title>
</head>
<body>
    <form action=""method="post">
        <div style="display: flex;">
        <label for="angka_pertama">masukan angka pertama</label>
        <input type="number" name="angka_pertama" id="angka_pertama"></>
        </div>
    <div style="display: flex">
    <label for="angka_kedua">masukan angka kedua</label>
    <input type="number" name="angka_kedua" id="angka_kedua">
        </div>
    <div style="display: flex">
    <label for="angka_kedua">masukan angka ketiga</label>
    <input type="number" name="angka_ketiga" id="angka_ketiga">
        </div>
    <button type="submit" name="submit">kirim</button>
    </form>
</body>
</html>

<!-- proses -->
<?php
// ek apakah button dengan name submit di klik 
if (isset($_POST['submit'])){
    // pengisian input ke variabel //
    $bilangan_satu = $_POST['angka_pertama'];
    $bilangan_dua = $_POST['angka_kedua'];
    $bilangan_tiga = $_POST['angka_ketiga'];
    // decision
    if ($bilangan_satu >= $bilangan_dua && $bilangan_satu >= $bilangan_tiga) {
        // . namanya concat menghubungkan string dan variable
        echo "bilangan pertama : " . $bilangan_satu . "|| bilangan kedua :" .
        $bilangan_dua . "|| bilangan ketiga : " . $bilangan_tiga . ". yang terbesar : 
        <br>" . $bilangan_satu . "</br>";
    } else if ($bilangan_dua >= $bilangan_satu && $bilangan_dua >= $bilangan_tiga) {
        echo "bilangan pertama : " . $bilangan_satu . "|| bilangan kedua :" .
        $bilangan_dua . "|| bilangan ketiga : " . $bilangan_tiga . ". yang terbesar :
        <br>" . $bilangan_dua . "</br>";
    } else if ($bilangan_tiga>= $bilangan_satu && $bilangan_tiga >= $bilangan_dua) {
        echo "bilangan pertama : " . $bilangan_satu . "|| bilangan kedua :" .
        $bilangan_dua . "|| bilangan ketiga : " . $bilangan_tiga . ". yang terbesar :
        <br>" . $bilangan_tiga . "</br>";
    } else {
        echo "bilagan pertama : " . $bilangan_satu . "|| bilangan kedua : " .
        $bilangan_dua . "|| bilangan ketiga : " . $bilangan_tiga . "<b>BILANGAN SAMA BESAR<b/>";
      }
}
?>