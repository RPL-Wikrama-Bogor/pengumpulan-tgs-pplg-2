<?php 
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
    <style>
        .container {
            background-color: gray;
        }
    </style>
</head>
<body>
    <div class="container">
<form action="" method="post">
        <div style="display: flex;">
            <label for="hh">Masukan jam   :</label>
            <input type="number" name="hh" id="hh">
        </div>
        <div style="display: flex;">
            <label for="mm">Masukan menit :</label>
            <input type="number" name="mm" id="mm">
        </div>
        <div style="display: flex;">
            <label for="ss">Masukan detik :</label>
            <input type="number" name="ss" id="ss">
        </div>
        <button type="submit" name="submit">Kirim!</button>
    </form>
    <?php  

    // ini adalah proses
    if(isset($_POST['submit'])) {
        $hh = $_POST['hh'] ;
        $mm = $_POST['mm'] ;
        $ss = $_POST['ss'] ;
        $ss = $ss + 1;  
    if ($ss >= 60 ) {
        $ss = 00;
        $mm = $mm + 1;
    }
    if ($mm >= 60 ) {
        $mm = 00;
        $hh = $hh + 1;
    }
    if ($hh >=24 ) {
     $hh = 00;
     $mm = 00;
     $ss = 00;
    }
    echo $hh . " : " . $mm . " : " . $ss;
}
 ?>
 </div>
</body>
</html>
