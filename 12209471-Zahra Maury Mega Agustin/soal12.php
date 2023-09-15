<?php
$hh = 0;
$mm = 0;
$ss = 0;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>data waktu</title>
    <style>
        .tabel{
            background-color: #DFCCFB;
            border-radius: 5px;
            padding: 20px;
            box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.1);
            max-width: 100%;
            width: 550px;
            margin: 0 auto;
            margin-top: 150px;
        }
        button{
            background-color: #DFCCFB;
        }
        </style>
        </head>
            <body>
            <form action="" method="post">
        <div class="tabel">
        <label for="bilangan"> Masukan hh :</label>
        <br>
        <input type="number" name="jam" id="jam">
        <br>
        <label for="bilangan"> Masukan mm :</label>
        <br>
        <input type="number" name="menit" id="menit">
        <br>
        <label for="bilangan"> Masukan ss :</label>
        <br>
        <input type="number" name="detik" id="detik">
 
        <button type="submit" name="submit">Kirim</button>
    </div>
     </form>
    </body>
    </html>

    <?php
if(isset($_POST['submit'])) {
    $hh = $_POST['jam'];
    $mm = $_POST['menit'];
    $ss = $_POST['detik'];

    $ss = $ss + 1;

    if($ss >= 60 ){
        $mm - $mm + 1;
        $ss = 00;
    } else if($mm >= 60){
    $hh = $hh +1;
    $mm = 0;
    $ss = 0;
    } else if($hh >= 24){
        $hh = 0;
        $mm = 0;
        $ss = 0;
    }
    echo " Waktu :" . $hh . " Jam " . $mm . " Menit " . $ss . " Detik " . "<br>";
}