<?php
//preparation
$bilangan;
$satuan;
$puluhan;
$ratusan
?>
<!-- input -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Input Bilangan</title>
</head>
<body>
    <form action="" method="post">
    <div class="display: flex;">
        <label for="bilangan">Input Bilangan</label>
        <br>
        <input type="number" name="bilangan" id="bilangan">
        </div>
        <button type="submit" name="submit">kirim</button>
    </form>
    </form>
</body>
</html>
<!-- proses -->
<?php
if(isset($_POST['submit'])){
    $bilangan= $_POST['bilangan'];

    $ratusan = floor(($bilangan%1000)/100);
    $puluhan = floor($bilangan/10) %10;
    $satuan = floor($bilangan %10);

    echo "Ratusan" .$ratusan;
    echo "<br>";
    echo "Puluhan" .$puluhan;
    echo "<br>";
    echo "Satuan" .$satuan;
    
    
}
?>