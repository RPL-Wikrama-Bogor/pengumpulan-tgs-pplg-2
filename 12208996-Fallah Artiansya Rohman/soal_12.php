<?php
$integer;
$hh;
$mm;
$ss;
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
            <label for="hh">masukan hh :</label>
            <input type="number" id="hh" name="hh">
        </div>
        <div style="display:flex;">
            <label for="mm">masukan mm :</label>
            <input type="number" id="mm" name="mm">
        </div>
        <div style="display:flex;">
            <label for="ss">masukan ss :</label>
            <input type="number" id="ss" name="ss">
        </div>
        <button type="submit" name="submit">Kirim</button>
</form>
<?php 
if (isset($_POST['submit'])){
    $hh = $_POST["hh"];
    $mm = $_POST["mm"];
    $ss = $_POST["ss"];

    $ss = $ss + 1;

if ($ss >= 60){
    $mm = $mm + 1;
    $mm =00;
}
else{
    $ss = 00;
}
if($mm >= 60){
    $hh = $hh + 1;
    $mm = 00;
    $ss = 00;
}
if($hh>=24){
    $hh =00;
    $mm =00;
    $ss =00;
}
 echo $hh . ":" . $mm . ":" . $ss ;
}
?>
</body>
</html>