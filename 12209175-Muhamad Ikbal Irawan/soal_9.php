<?php

    $fahrenheit;
    $celcius;

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Soal 9</title>
</head>
<body>
    
<form action="" method="post">
        <div style="display: flex;">
            <label for="fahren">Masukan suhu Fahrenheit : </label>
            <input type="number" name="fahren" id="fahren">
        </div>
        <button type="submit" name="submit">Kirim!</button>
    </form>

    <?php

    if(isset($_POST['submit'])){
        $fahrenheit = $_POST['fahren'];
        $celcius = ($fahrenheit - 32) / 1.8;

        if($celcius > 300){
            echo "Panas </br>";
        }
        else if($celcius < 250){ 
            echo "Dingin </br>";
        }
        else{
            echo "Normal </br>";
        }
        $celcius = floor($celcius);
         echo "Diubah jadi celcius : ".$celcius ;
    }

    ?>
</body>
</html>