<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        form {
            margin: 20px;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            width: 300px;
        }
        label {
            display: block;
            margin-bottom: 10px;
        }
        input[type="number"] {
            width: 100%;
            padding: 5px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 3px;
        }
        button {
            background-color: #007BFF;
            color: #fff;
            border: none;
            border-radius: 3px;
            padding: 10px 20px;
            cursor: pointer;
        }
        button:hover {
            background-color: #0056b3;
        }
        .result {
            margin-top: 20px;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <form action="" method="post">
        <div>
            <label for="hh">Masukan jam:</label>
            <input type="number" id="hh" name="hh" required>
        </div>
        <div>
            <label for="mm">Masukan menit:</label>
            <input type="number" id="mm" name="mm" required>
        </div>
        <div>
            <label for="ss">Masukan detik:</label>
            <input type="number" id="ss" name="ss" required>
        </div>
        <button type="submit" name="submit">Kirim</button>
    </form>
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
        

        echo "<div class='result'>Setelah ditambah 1 detik: " . $hh.":".$mm.":".$ss."</div>";
    }
    ?>
</body>
</html>
