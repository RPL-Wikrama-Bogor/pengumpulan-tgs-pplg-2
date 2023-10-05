<?php
$angka;
$satuan;
$puluhan;
$ratusan;
$ribuan;
$jutaan;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>angka</title>
</head>
<body>
<form action="" method="post">
        <div style="display :flex;">
            <label for="angka">masukan angka : </label>
            <input type="number" id="angka" name="angka">    
        </div>
        <button type="submit" name="submit">kirim</button>
</form>
</body>
</html>

<?php
    if (isset($_POST['submit'])) {
        $angka = $_POST['angka'];

        $satuan = floor($angka % 10);
        $puluhan = floor($angka /10 )%10;
        $ratusan = floor(($angka % 1000)/100);  
   
    echo "angka satuan : " . $satuan;
    echo "<br>";
    echo "angka puluhan : " . $puluhan;
    echo "<br>";
    echo "angka ratusan : " . $ratusan;
    echo "<br>";
    }
?>