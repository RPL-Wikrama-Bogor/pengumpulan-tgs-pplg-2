<?php
    // Preparation
    $jam;
    $menit;
    $detik;
    $total;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Soal-5</title>
</head>
<body>
    <!-- Siapkan Input -->
    <h1>Mengkonversi jam-menit-detik ke total detik</h1>
    <form action="" method="post">
        <div style="display: flex;">
            <label for="jam">Jam : </label>
            <input type="text" name="jam" id="jam">
        </div>
        <div style="display: flex;">
            <label for="menit">Menit : </label>
            <input type="text" name="menit" id="menit">
        </div>
        <div style="display: flex;">
            <label for="detik">Detik : </label>
            <input type="text" name="detik" id="detik">
        </div>
        <button type="submit" name="submit">Kirim!</button>
    </form>
</body>
</html>

<?php
    // Cek apakah button dgn name submit di klik
    if (isset($_POST['submit'])) {
        $jam = $_POST['jam'];
        $menit = $_POST['menit'];
        $detik = $_POST['detik'];

        $jam = $jam * 3600;
        $menit = $menit * 60;
        $total = $jam + $menit + $detik;
        
        echo "Total detik : " . $total;
    }
?>