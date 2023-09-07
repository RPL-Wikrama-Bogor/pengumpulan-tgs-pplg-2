<?php

    $nama;
    $tunj;
    $pjk;
    $gaji_bersih;
    $gaji_pokok;

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Soal 4</title>
</head>
<body>

    <form action="" method="post">
        <div style="display : flex">
            <label for="nama">Masukan Nama </label>
            <input type="text" name="nama" id="nama"> 
        </div>

        <div style="display : flex">
            <label for="gaji">Masukan Gaji Pokok </label>
            <input type="number" name="gaji" id="gaji"> 
        </div>

        <button type="submit" name="submit">Kirim!</button>
    </form>

    <?php

    if(isset($_POST['submit'])){
        $nama = $_POST['nama'];
        $gaji_pokok = $_POST['gaji'];

        $tunj = (20 * $gaji_pokok) / 100;
        $pjk = (15 * ($gaji_pokok + $tunj)) / 100;
        $gaji_bersih = $gaji_pokok + $tunj - $pjk;

        echo "Nama : ".$nama . "</br>";
        echo "Tunjagan : Rp. ".$tunj."</br>";
        echo "Pajak : Rp. ".$pjk."</br>";
        echo "Gaji Bersih : Rp. ".$gaji_bersih."</br>";
    }
    ?>

</body>
</html>