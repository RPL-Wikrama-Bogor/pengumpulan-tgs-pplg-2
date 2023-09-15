<?php
$suhu_f;
$suhu_c;
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
        <div style="display:flex;">
        <label for="fahrenheit">Masukan Suhu Fahrenheit</label>
        <input type="number" name="fahrenheit" id="fahrenheit">
        </div>
        <button type="submit" name="submit">Kirim</button>
    </form>
</body>
</html>

<?php
if(isset($_POST['submit'])){
    $suhu_f = $_POST['fahrenheit'];

$suhu_c = ($suhu_f - 32)*5/9 ;

if($suhu_c > 30){
    echo "Suhu panas";
}
else if($suhu_c < 25){
    echo "Suhu dingin";
}
else{
    echo "Suhu normal";
}
}

?>