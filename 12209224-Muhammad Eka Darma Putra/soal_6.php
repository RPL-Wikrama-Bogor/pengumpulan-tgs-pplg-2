<?php
$waktu;
$jam;
$menit;
$detik;
// = "" untuk mendifinisikan bahwa variable uni tipe datanya string
$hasil = "";
?>
<!-- siapkan input -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Konversi Waktu</title>
</head>
<body>
    <form action="" method="post">
        <div style="display: flex;">
            <label for="waktu">Masukan Waktu Awal (detik) : </label>
            <input type="number" id="waktu" name="waktu">
        </div>
        <button type="submit" name="submit">Kirim</button>
    </form>
</body>
</html>
<!-- proses -->
<?php
// Cek apakah button dgn name submit di klik
    if (isset ($_POST['submit'])) {
        // Pengisian input ke variable
        // $_POST disamakan dengan attribute name
        $waktu = $_POST['waktu'];
        // decision
        if ($waktu >= 3600) {
            // floor : membulatkan kebawah
            // ceil : membulatkan keatas
            // round : membulatkan keatas dan kebawah
            $jam = floor ($waktu/3600);
            $waktu -= ($jam*3600);
            $hasil .= $jam . " jam ";
        }
        if ($waktu >= 60) {
            $menit = floor($waktu/60);
            $waktu -= ($menit*60);
            $hasil.= $menit . " menit ";
        }
        $detik = $waktu;
        $hasil .= $detik . " detik ";
        echo $hasil;
    }
?>