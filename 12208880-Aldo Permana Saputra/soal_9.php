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

            <label for="submit"> </label>
            <input type="submit" name="submit" id="submit">

        </div>

    </form>


    <?php


    $suhu_fahrenheit;
    $suhu_celcius;


    if (isset($_POST['submit'])) {
        $suhu_fahrenheit = $_POST['suhu_fahrenheit'];

        $suhu_celcius = $suhu_fahrenheit - 32 / 1.8;

        if ($suhu_celcius > 300) {
            echo "Suhu saat ini : Panas";
        } elseif ($suhu_celcius >= 250 && $suhu_celcius <= 300) {
            echo "Suhu saat ini : Normal";
        } else {
            echo "Suhu saat ini : Dingin";
        }


        echo "</br>";
        echo " Suhu Celcius " . $suhu_celcius;
    }



    ?>

    <br>
    <br>
    <br>
    <br>

    <h3>Informasi :
        <ul>
            <li>Suhu dikatakan panas apabila suhu lebih dari 300 celcius</li>
            <li>Suhu dikatakan normal apabila suhu lebih dari 249 celcius dan kurang dari 300 celcius</li>
            <li>Suhu dikatakan dingin apabila suhu kurang dari 250 celcius</li>
        </ul>
    </h3>

</body>

</html>