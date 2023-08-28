<?php
//mendeklarasikan
$jam;
$menit;
$detik;
$total;
?>

<!DOCTYPE html>
<html>
<head>
    <title>Konversi Jam-Menit-Detik ke Total Detik</title>
    <style>
        body{
            background-color: #EEEDED;
        }
    </style>
</head>
<body>
    <!-- inputan user -->
    <h2>Konversi Jam-Menit-Detik ke Total Detik</h2>
    <form method="post" action="">
        <label>Jam:</label>
        <input type="number" name="jam" required><br><br>

        <label>Menit:</label>
        <input type="number" name="menit" required><br><br>

        <label>Detik:</label>
        <input type="number" name="detik" required><br><br>

        <input type="submit" name="submit" value="Hitung">
    </form>

    <?php
    //cek apakah button dgn name submit di klik
    if (isset($_POST['submit'])) {
        //pengisian form input
        $jam = $_POST['jam'];
        $menit = $_POST['menit'];
        $detik = $_POST['detik'];

        // Menghitung total detik
        $total = ($jam * 3600) + ($menit * 60) + $detik;

        // Menampilkan output
        echo "<br>Total Detik: " . $total . "<br>";
    }
    ?>
</body>
</html>