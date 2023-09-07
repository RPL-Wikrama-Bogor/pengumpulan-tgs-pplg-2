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
    <title>menghitung gaji</title>
</head>
<body>
    <form action="" method="post">
        <div style="display: flex;">
            <label for="nama">Nama </label>
            <input type="text" name="nama" id="nama">
        </div>
        <div style="display: flex;">
            <label for="gajipokok">Gaji Pokok </label>
            <input type="number" name="gajipokok" id="gajipokok">
        </div>
        <button type="submit" name="submit">Kirim</button>
    </form>
    
</body>
</html>

<?php 

    if(isset($_POST["submit"])) {
        $nama = $_POST["nama"];
        $gaji_pokok = $_POST["gajipokok"];

        // menghitung tunjangan
        $tunj = ( 20 * $gaji_pokok) / 100 ;

        // menghitung pajak
        $pjk = ( 15 * ($gaji_pokok + $tunj) ) / 100;

        // menghitung gaji bersih
        $gaji_bersih = $gaji_pokok + $tunj - $pjk;

        echo "Nama : $nama <br>";
        echo "Tunjangan : $tunj <br>";
        echo "Pajak : $pjk <br>";
        echo "Gaji Bersih : $gaji_bersih <br>";
    }

?>

