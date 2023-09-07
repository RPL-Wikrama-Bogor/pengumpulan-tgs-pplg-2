<?php
$hh = 0;
$mm = 0;
$ss = 0;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Waktu</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        h1 {
            text-align: center;
            margin-top: 20px;
        }

        form {
            max-width: 400px;
            margin: 0 auto;
            background: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        label, input {
            display: block;
            margin-bottom: 10px;
        }

        input[type="number"], input[type="text"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 3px;
        }

        button {
            background: #007bff;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 3px;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <h1>Jam Menit Detik</h1>
    <form action="" method="post">
      <div>
        <label for="jam">Masukkan Jam</label>
        <input type="number" name="jam" id="jam">
      </div>
      <div>
        <label for="menit">Masukkan Menit</label>
        <input type="number" name="menit" id="menit">
      </div>
      <div>
        <label for="detik">Masukkan Detik</label>
        <input type="text" name="detik" id="detik">
      </div>
      <br>
      <button type="submit" name="submit">Kirim</button>
     </form>
</body>
</html>

<?php
    if(isset($_POST['submit'])) {
        $hh = $_POST['jam'];
        $mm = $_POST['menit'];
        $ss = $_POST['detik'];

        $ss = $ss + 1;

        if ($ss >= 60) {
            $mm = $mm + 1;
            $ss = 0;
        } else if ($mm >= 60) {
            $hh = $hh + 1;
            $mm = 0;
            $ss = 0;
        } else if ($hh >= 24) {
            $hh = 0;
            $mm = 0;
            $ss = 0;
        }

        echo "<p style='text-align: center;'>Waktu : " . $hh . "Jam" . $mm . "Menit" . $ss . "Detik";
    }
?>