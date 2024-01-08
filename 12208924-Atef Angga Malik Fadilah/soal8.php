<?php 

    $bilangan;
    $satuan;
    $puluhan;
    $ratusan;

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>bilangan bulat</title>
</head>
<body>
    <form action="" method="post">
        <div style="display: flex;">
            <label for="bilangan">Input Bilangan : </label>
            <input type="number" name="bilangan" id="bilangan">
        </div>
        <button type="submit" name="submit">Kirim</button>
    </form>
</body>
</html>

<?php 

    if(isset($_POST["submit"])){
        $bilangan = $_POST["bilangan"];

        // prosess
        $ratusan = floor( $bilangan / 100 ) ;
        $puluhan = floor( $bilangan / 10 ) % 10;
        $satuan = $bilangan % 10;

        echo " $bilangan <br> $ratusan Ratusan $puluhan Puluhan $satuan Satuan";
    }

?>