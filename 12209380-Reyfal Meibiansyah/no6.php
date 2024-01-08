<?php
$waktu;
$jam;
$menit;
$detik;
// = "" untuk mendefinisikan bahwa variable ini tipe datanya string
$hasil = "";
?>
<!-- siapkan input -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="post">
        <div style="display :flex;">
            <label for="waktu">masukan waktu awal (detik) : </label>
            <input type="number" id="waktu" name="waktu">    
        </div>
        <button type="submit" name="submit">kirim</button>
    </form>
</body>
</html>
<!-- proses -->
<?php
    if (isset($_POST['submit'])) {
        $waktu = $_POST['waktu'];
        // decision
        if ($waktu >= 3600) {
            // floor : membulatkan ke bawah
            // ceil : membualatkan ke atas
            // round : membulatkan keatas dan kebawah
            $jam = floor($waktu/3600);
            $waktu -= ($jam*3600);
            $hasil .= $jam . " jam ";
        }
        else {
            echo"0 jam ";
        }
        if ($waktu >= 60) {
            $menit = floor($waktu/60);
            $waktu -= ($menit*60);
            $hasil .= $menit . " menit ";
        }
        else {
            echo "0 menit ";
        }
        $detik = $waktu;
        $hasil .= $detik . " detik ";
        echo $hasil;
    }
?>