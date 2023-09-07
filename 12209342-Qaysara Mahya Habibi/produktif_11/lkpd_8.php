<?php
$bilangan; $satuan; $puluhan; $ratusan;
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
            <label for="num">Masukan Bilangan</label>
            <input type="string" name="num" id="num" required>
        </div>
        <button type="submit" name="submit">Kirim</button>
    </form>
</body>

<?php
if(isset($_POST['submit'])){
    $bilangan = $_POST['num'];

$satuan = $bilangan % 10;
$puluhan = ($bilangan / 10) % 10;
$ratusan = floor($bilangan / 100);

echo $satuan . " satuan " . $puluhan . " puluhan " . $ratusan . " ratusan ";
}

?>

</html>