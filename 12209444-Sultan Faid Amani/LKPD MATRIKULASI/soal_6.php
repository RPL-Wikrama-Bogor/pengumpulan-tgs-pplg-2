<?php

$waktu;
$jam;
$menit;
$detik;
$hasil = "";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jam menit detik </title>
</head>
<body>
    <form action="" method="post">
        <div style="display: flex;">
            <label for="waktu">Masukkan waktu awal (detik) : </label>
            <input type="number" id="waktu" name="waktu">
        </div>
        <button type="submit"  name="submit">Kirim</button>
    </form>
</body>
</html>

<?php
if (isset($_POST['submit'])) {
$waktu = $_POST['waktu'];

if ($waktu >= 3600) {
    $jam = floor($waktu/3600);
    $waktu -= ($jam*3600);
    $hasil .= $jam . " jam ";
}
else {
    echo "0 Jam";
}

if ($waktu >= 60) {
    $menit = floor($waktu/60);
    $waktu -= ($menit*60);
    $hasil .= $menit . " menit ";

}

else {
    echo "0 Menit";
}

$detik = $waktu;
$hasil .= $detik . " detik ";
echo $hasil;



}



?>