<?php
//preparation
    $bilangan;
    $satuan;
    $puluhan;
    $ratusan;
?>
<!-- bagian input-->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Konversi Bilangan</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        .container {
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            width: 300px;
            text-align: center;
        }

        label {
            font-weight: bold;
        }

        input[type="number"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        button[type="submit"] {
            background-color: #007bff;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        button[type="submit"]:hover {
            background-color: #0056b3;
        }

        .result {
            font-weight: bold;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Konversi Bilangan ke bentuk ratusan, puluhan, satuan</h2>
        <form action="" method="post">
            <div>
                <label for="bilangan">Input bilangan :</label>
                <input type="number" id="bilangan" name="bilangan">
            </div>
            <button type="submit" name="submit">Kirim</button>
        </form>

        <?php
        if (isset($_POST['submit'])) {
            $bilangan = $_POST['bilangan'];
            $satuan = $bilangan % 10;
            $puluhan = ($bilangan / 10) % 10;
            $ratusan = floor($bilangan / 100);

            echo '<div class="result">';
            echo "Ratusan: " . $ratusan . "<br>";
            echo "Puluhan: " . $puluhan . "<br>";
            echo "Satuan: " . $satuan . "<br>";
            echo '</div>';
        }
        ?>
    </div>
</body>
</html>
