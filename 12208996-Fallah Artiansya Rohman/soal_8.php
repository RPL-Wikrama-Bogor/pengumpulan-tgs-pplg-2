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
    <title>Document</title>
</head>
<body>
<form action="" method="post">
<div style="display:flex;">
            <label for="bilangan">masukan bilangan :</label>
            <input type="number" id="bilangan" name="bilangan">
        </div>
        <button type="submit" name="submit">Kirim</button>
    </form>
</body>
</html>
<?php
    if (isset($_POST['submit'])) {

        $bilangan = $_POST['bilangan'];

        $satuan= $bilangan % 10;
        $puluhan =floor ($bilangan / 10) % 10;
        $ratusan = floor ($bilangan / 100);

        echo "<br> satuan:" . $satuan . "<br> puluhan:" . $puluhan . "<br> ratusan:" . $ratusan;
    }
?>