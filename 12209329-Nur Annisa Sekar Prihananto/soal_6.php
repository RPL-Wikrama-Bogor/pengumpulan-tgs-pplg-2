<?php
$waktu;
$jam;
$menit;
$detik;
$hasil = ""; 
//= "" untuk mendefinisikan variable ini tipe data string
?>
<!-- bagian input-->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Konversi Waktu</title>
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
        <h2>Konversi Waktu</h2>
        <form action="" method="post">
            <div>
                <label for="waktu">Masukkan waktu awal (detik) :</label>
                <input type="number" id="waktu" name="waktu">
            </div>
            <button type="submit" name="submit">Kirim</button>
        </form>

        <?php
        if (isset($_POST['submit'])) {
            $waktu = $_POST['waktu'];
            $hasil = '';

            if ($waktu >= 3600) {
                $jam = floor($waktu / 3600);
                $waktu -= ($jam * 3600);
                $hasil .= $jam . " jam ";
            }

            if ($waktu >= 60) {
                $menit = floor($waktu / 60);
                $waktu -= ($menit * 60);
                $hasil .= $menit . " menit ";
            }

            $detik = $waktu;
            $hasil .= $detik . " detik ";

            echo '<div class="result">' . $hasil . '</div>';
        }
        ?>
    </div>
</body>
</html>
