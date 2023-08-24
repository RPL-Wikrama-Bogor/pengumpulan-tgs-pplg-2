<?php

$bilangan1;
$bilangan2;
$bilangan3;

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    <form action="" method="post" >
       
        <div style = "display: flex;">
            <label for = "angka_pertama"> masukan angka pertama </label>
            <input type = "number" name = "angka_pertama" id = "angka_pertama" required>
        </div>

        <div style = "display: flex;">
            <label for = "angka_kedua"> masukan angka kedua </label>
            <input type = "number" name = "angka_kedua" id = "angka_kedua" required>
        </div>


        <div style = "display: flex;">
            <label for = "angka_ketiga"> masukan angka kedua </label>
            <input type = "number" name = "angka_ketiga" id = "angka_kedua" required >
        </div>


        <div style = "display: flex;">
            <label for = "submit"></label>
            <input type = "submit" name = "submit" id = "submit" required >
        </div>
        
    </form>

</body>
</html>




<?php


if (isset($_POST ['submit'])) {
    $bilangan1 = $_POST ['angka_pertama'];   
    $bilangan2 = $_POST ['angka_kedua'];   
    $bilangan3 = $_POST ['angka_ketiga'];   


    if ($bilangan1> $bilangan2 && $bilangan1> $bilangan3) {
        
        echo "Bilangan Pertama : " . $bilangan1 . "|| Bilangan kedua : " . $bilangan2 . "Bilangan ketiga : " . $bilangan3 . " . yang terbesar :  <b> " . $bilangan1 . "</b>";   

    } elseif ($bilangan2> $bilangan1 && $bilangan2> $bilangan3) {
        echo "Bilangan Pertama : " . $bilangan1 . "|| Bilangan kedua : " . $bilangan2 . "Bilangan ketiga : " . $bilangan3 . " . yang terbesar :  <b> " . $bilangan2 . "</b>";   

    } elseif ($bilangan3> $bilangan1 && $bilangan3> $bilangan2) {
        echo "Bilangan Pertama : " . $bilangan1 . "|| Bilangan kedua : " . $bilangan2 . "Bilangan ketiga : " . $bilangan3 . " . yang terbesar :  <b> " . $bilangan3 . "</b>";   

    } elseif ( $bilangan1 == $bilangan2 && $bilangan1 == $bilangan3 ) {
        echo "Bilangan Pertama : " . $bilangan1 . "|| Bilangan kedua : " . $bilangan2 . "Bilangan ketiga : " . $bilangan3 . " <b> Bilangan sama besar </b>";   

    } elseif ($bilangan1 == $bilangan2 ) {
        echo "Bilangan Pertama : " . $bilangan1 . "|| Bilangan kedua : " . $bilangan2 . "Bilangan ketiga : " . $bilangan3 . " <b> Bilangan pertama dan kedua adalah yang terbesar </b>";   

    } elseif ($bilangan1 == $bilangan3 ) {
        echo "Bilangan Pertama : " . $bilangan1 . "|| Bilangan kedua : " . $bilangan2 . "Bilangan ketiga : " . $bilangan3 . " <b> Bilangan pertama dan ketiga adalah yang terbesar </b>";

    } elseif ($bilangan2 == $bilangan3 ) {
        echo "Bilangan Pertama : " . $bilangan1 . "|| Bilangan kedua : " . $bilangan2 . "Bilangan ketiga : " . $bilangan3 . " <b> Bilangan kedua dan ketiga adalah yang terbesar </b>";   

    } else {
        echo "Semua bilangan sama besar";
    }
}


?>