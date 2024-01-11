<?php
    // Preparation
    $waktu;
    $jam;
    $menit;
    $detik;
    // = " untuk mendefiniskijan bahwa variable ini tipe datanya string
    $hasil = "";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Soal-6</title>
</head>
<body>
    <!-- Siapkan Input -->
    <h1>mengkonversi total detik ke bentuk jam-menit-detik</h1>
    <form action="" method="post">
        <div style="display: flex;">
            <label for="waktu">Waktu (Dalam satuan detik!) : </label>
            <input type="text" name="waktu" id="waktu">
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
        $waktu = $_POST['waktu'];

        $jam = floor($waktu / 3600);

        $awal = $waktu % 3600;
        $menit = floor($awal / 60);

        $detik = $awal % 60;

        echo $jam . " jam " . $menit . " menit " . $detik . " detik ";

        
        // if ($waktu >= 3600) {
        //     $jam = floor($waktu/3600);
        //     $waktu -= ($jam * 3600);
        //     $hasil .= $jam . " jam ";
        // } 
        
        // if ($waktu >= 60) {
        //     $menit = floor($waktu/60);
        //     $waktu -= ($menit * 60);
        //     $hasil .= $menit . " menit ";
        // } 

        // $detik = $waktu;
        // $hasil .= $detik . " detik ";

        // echo $hasil;
    }
?>