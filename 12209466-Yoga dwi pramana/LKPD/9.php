<?php
 
$suhu_fahreinheit;
$suhu_celcius; 

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cek Suhu</title>
</head>
<body>
      <!-- input -->
      <form action="" method="post">
        <div style="display: flex;">
        <label for="Suhu">Input Suhu Fahreinheit</label>
        <input type="number" name="Suhu">
        </div>
        <button type="submit" name="submit">Kirim</button>       
    </form>
</body>
</html>
</body>
</html>

<?php
//process
if (isset($_POST["submit"])) {
    $suhu_fahreinheit = $_POST["Suhu"];
    $suhu_celcius = $suhu_fahreinheit - 32/ 1.8;
    //decision
    if ($suhu_celcius > 300) {
        echo "panas";
    }
    elseif ($suhu_celcius <= 250) {
        echo "dingin";
    }
    else {
        echo "normal";
    }
}
 

?>