<?php

$a;
$b;
$c;

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
        <table>
            <tr>
                <td>Bilangan pertama</td>
                <td>;</td>
                <td><input type="number" name="bil_a"></td>
            </tr>
            <tr>
                <td>Bilangan kedua</td>
                <td>;</td>
                <td><input type="number" name="bil_b"></td>
            </tr>
            <tr>
                <td>Bilangan ketiga</td>
                <td>;</td>
                <td><input type="number" name="bil_c"></td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td><input type="submit" value="cari" name="submit"></td>
            </tr>
        </table>
    </form>
</body>
</html>

<?php
if(isset($_POST['submit'])){
    $a = $_POST['bil_a'];
    $b = $_POST['bil_b'];
    $c = $_POST['bil_c'];

    if($a > $b && $a > $c){
        echo $a;
    } else if ($b > $a && $b > $c){
        echo $b;
    } else if ($c > $a && $c > $b){
        echo $c;
    }else echo "sama besar";
}