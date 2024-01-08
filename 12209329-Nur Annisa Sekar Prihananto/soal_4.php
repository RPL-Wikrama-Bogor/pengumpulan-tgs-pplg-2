<?php
//preparation
    $gaji_pokok;
    $tunjangan;
    $pajak;
    $gaji_bersih;
    $nama = "";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kalkulator Gaji</title>
    <style>
        body {
            font-family: Arial, sans-serif;
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
            background-color: #DAD4B5;
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
            background-color: white;
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
            background-color: #DAD4B5;
            border-radius: 8px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            width: 450px;
            margin: 215px;
            height: 150px;
        }

    </style>
</head>
<body>
    <form action="" method="post">
    <div class="form">
            <label for="nama">Nama :</label>
            <input type="text" name="nama" id="nama">
            <label for="gaji-pokok">Gaji pokok :</label>
            <input type="number" name="gaji-pokok" id="gaji-pokok">
        <button type="submit" name="submit">Kirim!</button>
    </form>
    </div>
    <div class="container">
    <?php
    if (isset($_POST['submit'])) {
        $nama = $_POST['nama'];
        $gaji_pokok = $_POST['gaji-pokok'];
        $tunjangan = (20 * $gaji_pokok) / 100;
        $pajak = (15 * ($gaji_pokok + $tunjangan) / 100);
        $gaji_bersih = $gaji_pokok + $tunjangan - $pajak;
        echo "<div class='result'>";
        echo "Nama: " . $nama . "<br>";
        echo "Tunjangan: " . $tunjangan . "<br>";
        echo "Pajak: " . $pajak . "<br>";
        echo "Gaji bersih: " . $gaji_bersih . "<br>";
        echo "</div>";
    }
    ?>
    </div>
</body>
</html>
