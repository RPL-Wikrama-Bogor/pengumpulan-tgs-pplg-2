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
    <title>Menambahkan Waktu Satu Detik</title>
    <style>
         body {
            font-family: Arial, sans-serif;
            background-image: url("https://e0.pxfuel.com/wallpapers/883/877/desktop-wallpaper-alarm-clock-minimal-background-walpaper-time-to-get-up-aesthetic-clock.jpg");
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-repeat: no-repeat;
            background-size: cover;
            background-position: center;
            float: left;
            margin: 2rem;

        }
       .form {
            background-color: #F3FDE8;
            border-radius: 8px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            width: 500px;
        }
        h1 {
            font-size: 24px;
            margin-bottom: 10px;
        }
        input {
            width: 95%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        button {
            background-color: #FFBFBF;
            color: brown;
            border: none;
            border-radius: 4px;
            padding: 10px 20px;
            cursor: pointer;
            color: black;
        }
        button:hover {
            background-color: #F4EEEE;
            transition: 0.3s;
        }
        .echo {
            margin-top: 50px;
            padding: 10px;
            background-color: #f4f4f4;
            border-radius: 4px;
            align-items: center;
            padding: 20px;
        }
        .container{
            background-color: #F3FDE8;
            border-radius: 8px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            width: 500px;
            margin: 215px;
            height: 240px;
        }
      
    </style>
</head>
<body>
    <div class="form">
        <form action="" method="post">
            <label for="hh">Input HH:</label>
            <br>
            <input type="number" name="hh" id="hh">
            <br>
            <label for="mm">Input MM:</label>
            <br>
            <input type="number" name="mm" id="mm">
            <br>
            <label for="ss">Input SS:</label>
            <br>
            <input type="number" name="ss" id="ss">
            <br>
            <button name="submit" id="submit">Kirim</button>
        </form>
      </div>
</body>
</html>
<div class="container">
  <h3> Hasil : </h3>
<div class="echo">
<?php
if (isset($_POST['submit'])) {
    $hh = $_POST['hh'];
    $mm = $_POST['mm'];
    $ss = $_POST['ss'];

    $ss = $ss +1;

    if ($ss>=60) {
        $mm= $mm +1;
        $ss= 00;
    }
    if ($mm>=60) {
        $hh= $hh +1;
        $mm= 00;
        $ss = 00;
    }
    if ($hh>= 24) {
        $hh= 00;
        $mm= 00;
        $ss= 00;
    }
        echo $hh . " : " . $mm . " : " . $ss;
}
?>
 </div>
</div>