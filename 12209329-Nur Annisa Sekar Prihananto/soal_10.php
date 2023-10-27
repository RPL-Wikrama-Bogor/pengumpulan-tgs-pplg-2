<?php
$nilai_pabp;
$nilai_mtk;
$nilai_dpk;
$rata_rata;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Konversi Nilai</title>
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
        <h2>Konversi Nilai</h2>
        <form action="" method="post">
            <div>
                <label for="pabp">Input nilai PABP</label>
                <input type="number" name="pabp" id="pabp">
            </div>
            <div>
                <label for="dpk">Input nilai DPK</label>
                <input type="number" name="dpk" id="dpk">
            </div>
            <div>
                <label for="mtk">Input nilai MTK</label>
                <input type="number" name="mtk" id="mtk">
            </div>
            <button type="submit" name="submit">Kirim</button>
        </form>

        <?php
        if (isset($_POST['submit'])) {
            $nilai_pabp = $_POST['pabp'];
            $nilai_dpk = $_POST['dpk'];
            $nilai_mtk = $_POST['mtk'];

            $rata_rata = ($nilai_pabp + $nilai_mtk + $nilai_dpk) / 3;

            $nilai_huruf = '';

            if ($rata_rata >= 80 && $rata_rata <= 100) {
                $nilai_huruf = "A";
            } elseif ($rata_rata >= 75) {
                $nilai_huruf = "B";
            } elseif ($rata_rata >= 65) {
                $nilai_huruf = "C";
            } elseif ($rata_rata >= 45) {
                $nilai_huruf = "D";
            } elseif ($rata_rata >= 0) {
                $nilai_huruf = "E";
            } else {
                $nilai_huruf = "Angka tidak memenuhi persyaratan";
            }

            echo '<div class="result">';
            echo "Nilai huruf: " . $nilai_huruf;
            echo '</div>';
        }
        ?>
    </div>
</body>
</html>
