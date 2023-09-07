<?php

$total_garam;
$harga_sebelum;
$diskon;
$harga_setelah;

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <!-- imput -->
    <form action="" method="post">
        <div style="display: flex;">
        <label for="total_garam">Total Garam</label>
        <input type="number" name="total_garam">
        </div>
        <button type="submit" name="submit">selebew</button>       
    </form>
</body>
</html>


<!-- proses -->
<?php

    if (isset($_POST["submit"])) {
        
        $total_garam = $_POST["total_garam"];
        $harga_sebelum = 500*$total_garam;
        $diskon = 5*$harga_sebelum /100;
        $harga_setelah = $harga_sebelum - $diskon;

        echo "Harga Sebelum : $harga_sebelum <br>";
        echo "Diskon : $diskon <br>";
        echo "Harga Setelah : $harga_setelah <br>";
        
    }
    

?>