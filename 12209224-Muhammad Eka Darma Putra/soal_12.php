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
            .container {
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
                width: 85%;
                padding: 10px;
                margin-bottom: 10px;
                border: 1px solid #ccc;
                border-radius: 4px;
            }
            button {
                background-color: orange;
                color: brown;
                border: none;
                border-radius: 4px;
                padding: 10px 20px;
                cursor: pointer;
                color: black;
            }
    </style>
    </head>
<body>
<div class="container">
    <h1>Form Data Waktu</h1>
        <form action="" method="post">
            <div style="display: flex;">
                <label for="hh">hh :</label>
                <input type="number" name="hh" id="hh" maxlength="11" required>
            </div>
            <div style="display: flex;">
                <label for="mm">mm :</label>
                <input type="number" name="mm" id="mm" maxlength="11" required>
            </div>
            <div style="display: flex;">
                <label for="ss">ss :</label>
                <input type="number" name="ss" id="ss" maxlength="11" required>
            </div>
            <button type="submit" name="submit">Kirim!</button>
        </form>
<div class="result">
<?php
    if (isset($_POST['submit'])) {
        $hh = $_POST['hh'];
        $mm = $_POST['mm'];
        $ss = $_POST['ss'];

        $ss = $ss + 1;

        if ($ss >= 60) {
            $mm = $mm + 1;
            $ss = 00;
        }
        if ($mm >= 60) {
            $hh = $hh + 1;
            $mm = 00;
            $ss = 00;
        }
        if ($hh >= 24) {
            $hh = 00;
            $mm = 00;
            $ss = 00;
        }
            echo "<h2>Hasil:</h2>";
            echo $hh . " : " . $mm . " : " . $ss;        
    }
?>
</div>
</div>
</body>
</html>