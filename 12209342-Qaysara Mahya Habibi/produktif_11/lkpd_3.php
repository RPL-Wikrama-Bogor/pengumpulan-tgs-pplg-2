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
    <title>Document</title>
</head>
<body>
    <form action="" method="post">
        <div style="display: flex;">
            <label for="angka_satu">Masukan Angka Pertama</label>
            <input type="number" name="angka_satu" id="angka_satu">
        </div>
        <div style="display: flex;">
            <label for="angka_dua">Masukan Angka Kedua</label>
            <input type="number" name="angka_dua" id="angka_dua">
        </div>
        <div style="display: flex;">
            <label for="angka_tiga">Masukan Angka Ketiga</label>
            <input type="number" name="angka_tiga" id="angka_tiga">
        </div>
        <button type="submit" name="submit">Kirim</button>
    </form>
</body>
</html>

<?php
if(isset($_POST['submit'])){
    //pengisian input ke variable
    $bilangan_satu = $_POST['angka_satu'];
    $bilangan_dua = $_POST['angka_dua'];
    $bilangan_tiga = $_POST['angka_tiga'];
//decision
// . namanya concat = menghubungkan string dan variable
if($bilangan_satu >= $bilangan_dua && $bilangan_satu >= $bilangan_tiga){
    echo "Bilangan Pertama : " . $bilangan_satu . "|| Bilangan Kedua : " . $bilangan_dua . " || Bilangan ketiga : " . $bilangan_tiga . "|| Yang terbesar : <b>" . $bilangan_satu . " </b>";
}
else if($bilangan_dua >= $bilangan_satu && $bilangan_dua >= $bilangan_tiga){
    echo "Bilangan Pertama : " . $bilangan_satu . "|| Bilangan Kedua : " . $bilangan_dua . " || Bilangan ketiga : " . $bilangan_tiga . "|| Yang terbesar : <b>" . $bilangan_dua . " </b>";
}
else if($bilangan_tiga >= $bilangan_dua && $bilangan_tiga >= $bilangan_satu){
    echo "Bilangan Pertama : " . $bilangan_satu . "|| Bilangan Kedua : " . $bilangan_dua . " || Bilangan ketiga : " . $bilangan_tiga . "|| Yang terbesar : <b>" . $bilangan_tiga . " </b>";
}
else{
    echo "Bilangan Pertama : " . $bilangan_satu . "|| Bilangan Kedua : " . $bilangan_dua . " || Bilangan ketiga : " . $bilangan_tiga . "|| BILANGAN SAMA BESAR <b>" ." </b>";
}
}
?>