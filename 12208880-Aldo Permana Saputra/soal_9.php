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

            <label for="suhu_fahrenheit"> Input suhu (Fahrenheit) </label>
            <input type="number" name="suhu_fahrenheit" id="suhu_fahrenheit">

        </div>


        <div style="display: flex;">

            <label for="submit">  </label>
            <input type="submit" name="submit" id="submit">

        </div>

    </form>


</body>

</html>



<?php


$suhu_fahrenheit;
$suhu_celcius;



if (isset($_POST['submit'])) {
    $suhu_fahrenheit = $_POST['suhu_fahrenheit'];

    $suhu_celcius = $suhu_fahrenheit - 32 / 1.8;

    if ($suhu_celcius > 300) {
        echo "Panas";
    }elseif ($suhu_celcius >= 250 && $suhu_celcius <= 300 ) {
        echo "Dingin";
    } else {
        echo "normal";
    }
}



?>