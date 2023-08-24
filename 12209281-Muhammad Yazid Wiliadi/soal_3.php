<?php
//preparation
$a ="";
$b ="";
$c ="";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>A B C Terbesar</title>
</head>
<body>
        <form action="" method= "post">
            <div>
                <label for="a">Input A</label>
                <input type="number" name="a" id="a">
            </div>
        </form>
        <form action="" method= "post">
            <div>
                <label for="b">Input B</label>
                <input type="number" name="b" id="b">
            </div>
        </form>
        <form action="" method= "post">
            <div>
                <label for="c">Input C</label>
                <input type="number" name="=c" id="=c">
            </div>
        </form>
        <button name= "submit" id= "submit">Kirim</button>
</body>
</html>
<!-- Input -->
<?php
if (isset($_POST['submit'])) {
    $a= $_POST ['a'];
    $b= $_POST ['b'];
    $c= $_POST ['c'];
    // decision
    if ($a> $b or $c) {
        echo "a : " . $a . " || b : . " . $b . " || c : " . $c . ". Yang Terbesar : 
        <b>" . $a . "</b>" ;
    }
    else if ($b > $a or $b > $c ){
        echo "a : " . $a . " || b : . " . $b . " || c : " . $c . ". Yang Terbesar : 
        <b>" . $b . "</b>" ;
    }
    else if ($c > $a or $c > $b) {
        echo "a : " . $a . " || b : " . $b . " || c " . $c . " Yang terbesar : <b>" . $c . "</b>";
    } else {
        echo "a : " . $a . " || b : " . $b . " || c " . $c . " Bilangan terbesar : <b>  Bilangan sama besar </b>";
    }
}