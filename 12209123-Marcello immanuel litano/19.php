<?php 
    $tiketVIP;
    $tiketEksekutif;
    $tiketEkonomi;
    $keuntunganVIP;
    $keuntunganEksekutif;
    $keuntunganEkonomi;
    $totalKeuntungan;
    $totalTiket;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Penjualan Tiket Bioskop</title>
</head>
<body>
    <h1>Penjualan Tiket Bioskop</h1>
    <form method="post" action="">
        <label for="tiketVIP">Jumlah Tiket VIP Terjual:</label>
        <input type="number" name="tiketVIP" required><br>
        
        <label for="tiketEksekutif">Jumlah Tiket Eksekutif Terjual:</label>
        <input type="number" name="tiketEksekutif" required><br>
        
        <label for="tiketEkonomi">Jumlah Tiket Ekonomi Terjual:</label>
        <input type="number" name="tiketEkonomi" required><br>
        
        <input type="submit" value="Hitung Keuntungan">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Jumlah tiket terjual per kelas
        $tiketVIP = $_POST['tiketVIP'];
        $tiketEksekutif = $_POST['tiketEksekutif'];
        $tiketEkonomi = $_POST['tiketEkonomi'];

        // Harga tiket per kelas
        $hargaVIP = 100000;
        $hargaEksekutif = 75000;
        $hargaEkonomi = 50000;

        // Menghitung keuntungan per kelas
        if ($tiketVIP >= 35) {
            $keuntunganVIP = $tiketVIP * $hargaVIP * 0.25;
        } elseif ($tiketVIP >= 20 && $tiketVIP < 35) {
            $keuntunganVIP = $tiketVIP * $hargaVIP * 0.15;
        } else {
            $keuntunganVIP = $tiketVIP * $hargaVIP * 0.05;
        }

        if ($tiketEksekutif >= 40) {
            $keuntunganEksekutif = $tiketEksekutif * $hargaEksekutif * 0.20;
        } elseif ($tiketEksekutif >= 20 && $tiketEksekutif < 40) {
            $keuntunganEksekutif = $tiketEksekutif * $hargaEksekutif * 0.10;
        } else {
            $keuntunganEksekutif = $tiketEksekutif * $hargaEksekutif * 0.02;
        }

        $keuntunganEkonomi = $tiketEkonomi * $hargaEkonomi * 0.07;

        // Menghitung total keuntungan
        $totalKeuntungan = $keuntunganVIP + $keuntunganEksekutif + $keuntunganEkonomi;

        // Menghitung total tiket dari seluruh kelas
        $totalTiket = $tiketVIP + $tiketEksekutif + $tiketEkonomi;

        // Menampilkan hasil
        echo "<h2>Hasil Perhitungan</h2>";
        echo "Keuntungan dari kelas VIP: " . $keuntunganVIP . " rupiah<br>";
        echo "Keuntungan dari kelas Eksekutif: " . $keuntunganEksekutif . " rupiah<br>";
        echo "Keuntungan dari kelas Ekonomi: " . $keuntunganEkonomi . " rupiah<br>";
        echo "Total Keuntungan: " . $totalKeuntungan . " rupiah<br>";
        echo "Jumlah tiket per kelas: VIP = " . $tiketVIP . ", Eksekutif = " . $tiketEksekutif . ", Ekonomi = " . $tiketEkonomi . "<br>";
        echo "Total Tiket dari Seluruh Kelas: " . $totalTiket;
    }
    ?>
</body>
</html>