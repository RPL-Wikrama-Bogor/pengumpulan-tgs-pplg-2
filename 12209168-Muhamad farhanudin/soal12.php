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
            background-image: url("mb;.gif");
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-repeat: no-repeat;
            background-size: cover;
            background-position: center;

        }
        .form {
            background-color: white;
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
            background-color: #CEDEBD;
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
            margin-top: 20px;
            padding: 10px;
            background-color: #f4f4f4;
            border-radius: 4px;
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
</body>
</html>
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