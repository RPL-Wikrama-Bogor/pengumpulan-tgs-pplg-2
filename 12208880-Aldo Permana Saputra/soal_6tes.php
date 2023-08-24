<?php

$waktu;
$jam;
$menit;
$detik;

// "" untuk mendefinisakan bahwa variabel ini tipe datanya string
$hasil = "";

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

            <label for="waktu"> Masukan waktu awal (detik) </label>
            <input type="number" name="waktu" id="waktu" required>

        </div>


        <div style="display: flex;">

            <label for="submit"></label>
            <input type="submit" name="submit" id="submit">

        </div>

    </form>

</body>

</html>



<?php

if (isset($_POST['submit'])) {
    $waktu = $_POST['waktu'];


// floor untuk membulatkan bilangan ke bawah
// ceil : untuk membulatkan ke atas
// round : untuk membulatkan ke atas dan kebawah ( Flexibel )

// decission


    if ($waktu >= 3600) {
        $jam = floor($waktu / 3600);
        $waktu -= ($jam * 3600);
        // $hasil .= $jam . " jam ";
    } else {
        $jam = 0;
    }

    if ($waktu >= 60) {
        $menit = floor($waktu / 60);
        $waktu -= ($menit * 60);
        // $hasil .= $menit . " menit ";
    } else {
        $menit = 0;
    }


    $detik = $waktu;
    $hasil .= $jam. "  jam &nbsp" . $menit ." menit &nbsp" . $detik . " detik &nbsp";


    echo $hasil;



















































    // if ($waktu > 3600) {
    //     $jam = floor($waktu / 3600);
    //     $waktu = $waktu - ($jam * 3600);
    // } else {
    //     $jam = 0;
    // }

    // if ($waktu >= 60) {
    //     $menit = floor($waktu / 60);
    //     $waktu = $waktu - ($menit * 60);
    // } else {
    //     $menit = 0;
    // }


    // $detik = $waktu;
    // echo " <============================================> ";
    // echo "</br>";
    // echo " &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp Diubah menjadi Jam Menit & Detik : ";
    // echo "</br>";
    // echo " <============================================> ";
    // echo "</br>";
    // echo "&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; \/";

    // $hasil =    " &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp" . 
    //             $jam . "&nbsp; :  " . $menit . "&nbsp; : " . $detik . "&nbsp; ; ";

    // echo "</br>";
    // echo $hasil;
    // echo "</br>";
    // echo " <============================================> ";

}

?>