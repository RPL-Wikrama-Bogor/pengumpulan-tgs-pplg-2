<?php

    $waktu;
    $jam;
    $menit;
    $detik;
    $sisa;
    $hasil = ""; //""untuk mendefinisikan bahwa variabel ini bertipe string

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Soal 6</title>
</head>
<body>

<form action="" method="post">
        <div style="display: flex;">
            <label for="waktu">Masukan Waktu Dalam Bentuk Detik : </label>
            <input type="number" name="waktu" id="waktu">
        </div>
            <button type="submit" name="submit">Kirim!</button>

    </form>

    <?php
        // floor = membulatkan kebawah
        // ceil = membulatkan keatas
        // round = membulatkan keatas dan kebawah
    if(isset($_POST['submit'])){
        $waktu = $_POST['waktu'];
        $jam = floor($waktu / 3600);

        $sisa = $waktu % 3600;
        $menit = floor($sisa / 60 );

        $detik = $sisa % 60;
    echo $jam." jam ".$menit." menit ".$detik." detik.";
    

    // if($waktu >= 3600){
    //     $jam = floor($waktu/3600);
    //     $waktu -= ($jam * 3600);
    //     $hasil .= $jam . " jam ";
    // }

    // if($waktu >= 60){
    //     $menit = floor($waktu/60);
    //     $waktu -= ($menit * 60);
    //     $hasil .= $menit . " menit ";
    // }

    // $detik = $waktu;
    // $hasil .= $detik . " detik";

    // echo $hasil;
}
    ?>
    

</body>
</html>