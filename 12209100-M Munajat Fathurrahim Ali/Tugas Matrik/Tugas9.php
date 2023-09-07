<?php
$fahrenheit;
$celcius;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Suuuuuuuuuuuuuuuuuuuhu</title>
</head>
<body>
     <form action="" method="post">
        <div style="display: flex;">
        <label for="waktu">Masukkan Suhu: </label>
        <input type="Number" id="fahrenheit" name="fahrenheit">
     </div>
     <button type="submit" name="submit">Kirim</button>
   </form>
</body>
</html>
<?php
if (isset($_POST['submit'])) {
    $fahrenheit = $_POST['fahrenheit'];

    $celcius = $fahrenheit -32 /1.8;

    if ($celcius > 300) {
        echo "Suhu Panas";
    }
    else if ($fahrenheit < 250) {
        echo "Suhu Dingin";
    }

    else{
        echo "Suhu Normal";
    }
}
?>