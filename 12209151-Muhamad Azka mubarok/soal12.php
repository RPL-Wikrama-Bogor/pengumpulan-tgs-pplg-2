<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>data waktu</title>
    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Style</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: linear-gradient(135deg, #af6480,#e8f5c8, #c3cee5, #f6b5cc);
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            max-width: 500px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            width: 450px;
        }

        .input-group {
            margin-bottom: 15px;
        }

        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }

        input[type="number"] {
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 3px;
        }

        button[type="submit"] {
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 10px 15px;
            border-radius: 3px;
            cursor: pointer;
        }

        button[type="submit"]:hover {
            background-color: #0056b3;
        }

        .result {
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-top: 20px;
            padding: 20px;
        }

        .result label {
            font-weight: bold;
        }

        .result p {
            margin: 0;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Input Data Waktu</h2>
        <form method="POST">
            <div class="input-group">
                <label for="hh">Input jam</label>
                <input type="number" name="hh">
            </div>
            <div class="input-group">
                <label for="mm">Input menit</label>
                <input type="number" name="mm">
            </div>
            <div class="input-group">
                <label for="ss">Input detik</label>
                <input type="number" name="ss">
            </div>
            <button type="submit" name="submit">Kirim</button>
        </form>

        <?php
        if (isset($_POST['submit'])) {
            $ss = $_POST['ss'];
            $mm = $_POST['mm'];
            $hh = $_POST['hh'];

            $ss = $ss + 1;

            if ($ss >= 60) {
                $mm++;
                $ss = 0;

                if ($mm >= 60) {
                    $hh++;
                    $mm = 0;

                    if ($hh >= 24) {
                        $hh = 0;
                    }
                }
            }

            // Format waktu agar selalu dua digit
            $hh = str_pad($hh, 2, '0', STR_PAD_LEFT);
            $mm = str_pad($mm, 2, '0', STR_PAD_LEFT);
            $ss = str_pad($ss, 2, '0', STR_PAD_LEFT);

            echo '<div class="result">';
            echo '<h3>Hasil:</h3>';
            echo "<label>Waktu setelah penambahan 1 detik:</label> $hh:$mm:$ss<br>";
            echo '</div>';
        }
        ?>
    </div>
</body>
</html>
