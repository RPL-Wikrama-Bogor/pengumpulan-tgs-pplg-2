<?php

    $bil;
    $satuan;
    $puluh;
    $ratus;

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Soal 8</title>
</head>
<body>
    
    <form action="" method="post">
        <div style="display: flex;">
            <label for="bilangan">Masukan angka : </label>
            <input type="number" name="bilangan" id="bilangan">
        </div>
        <button type="submit" name="submit">Kirim!</button>
    </form>

    <?php

    if(isset($_POST['submit'])){
        $bil = $_POST['bilangan'];

        $satuan = $bil % 10;
        $puluh = ($bil / 10) % 10;
        $ratus = floor($bil / 100);
        $ribu = floor($bil/1000);
        if($ratus >= 10){
            $ratus = floor( $ratus %= 10);
        }

        echo "Satuan : ".$satuan." || Puluhan : ".$puluh." || Ratusan : ".$ratus." || Ribuan : ".$ribu;
    }

    ?>

</body>
</html>