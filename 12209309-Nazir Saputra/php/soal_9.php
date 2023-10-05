<?php
$suhu_fahrenheit;
$suhu_celsius;
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
            <label for="suhu_fahrenheit">Masukkan suhu_fahrenheit :</label>
            <input type="number" id="suhu_fahrenheit" name="suhu_fahrenheit">
        </div>
        <button type="submit" name="submit">Kirim</button>
    </form>
</body>
</html>

<?php

if (isset($_POST['submit'])) {
    $suhu_fahrenheit = $_POST['suhu_fahrenheit'];
    
    $suhu_celsius = $suhu_fahrenheit/33.8;
    
    if($suhu_celsius > 300){
        echo "suhu panas";
    }

    else if($suhu_celsius < 250){
        echo "suhu dingin";
    }
    
    else{
        echo "suhu normal";
    }
} 

?>