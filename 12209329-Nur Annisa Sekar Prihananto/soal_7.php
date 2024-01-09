<?php
//preparation
    $total_gram;
    $harga_sebelum;
    $diskon;
    $harga_setelah;
?>
<!-- bagian input-->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kalkulator Harga</title>
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
        <h2>Kalkulator Harga</h2>
        <form action="" method="post">
            <div>
                <label for="total_gram">Input total gram :</label>
                <input type="number" id="total_gram" name="total_gram">
            </div>
            <button type="submit" name="submit">Kirim</button>
        </form>

        <?php
        if (isset($_POST['submit'])) {
            $total_gram = $_POST['total_gram'];
            $harga_sebelum = 500 * $total_gram;
            $diskon = 5 * $harga_sebelum / 100;
            $harga_setelah = $harga_sebelum - $diskon;

            echo '<div class="result">';
            echo "Harga sebelum: " . number_format($harga_sebelum, 0, ',', '.') . " Rupiah<br>";
            echo "Diskon: " . number_format($diskon, 0, ',', '.') . " Rupiah<br>";
            echo "Harga setelah diskon: " . number_format($harga_setelah, 0, ',', '.') . " Rupiah<br>";
            echo '</div>';
        }
        ?>
    </div>
</body>
</html>
