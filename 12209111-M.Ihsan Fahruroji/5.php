<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Konversi Waktu ke Total Detik</title>
</head>
<body>
    <form action="" method="post">
        <div style="display: flex;">
            <label for="jam">Jam</label>
            <input type="number" name="jam" id="jam">
        </div>
        <div style="display: flex;">
            <label for="menit">Menit</label>
            <input type="number" name="menit" id="menit">
        </div>
        <div style="display: flex;">
            <label for="detik">Detik</label>
            <input type="number" name="detik" id="detik">
        </div>
        <button type="submit" name="submit">Konversi</button>
    </form>

    <?php
    if(isset($_POST['submit'])) {
        $jam = $_POST['jam'];
        $menit = $_POST['menit'];
        $detik = $_POST['detik'];

        $total_detik = $jam * 3600 + $menit * 60 + $detik;

        echo "<h2>Hasil Konversi</h2>";
        echo "Jam: $jam, Menit: $menit, Detik: $detik<br>";
        echo "Total Detik: $total_detik detik";
    }
    ?>
</body>
</html>
