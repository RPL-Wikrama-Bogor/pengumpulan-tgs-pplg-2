
<!DOCTYPE html>
<html>
<head>
    <title>Penghasilan Penjualan Tiket Bioskop</title>
</head>

<body>
    <h2 class="container">Penghasilan Penjualan Tiket Bioskop</h2>
    <form action="" method="post">
        <h3 class="login">Kelas VIP</h3>
        <label for="tiket_vip">Jumlah Tiket Terjual:</label> 
        <input type="number" name="tiket_vip" required><br>

        <h3>Kelas Eksekutif</h3>
        <label for="tiket_eksekutif">Jumlah Tiket Terjual:</label> 
        <input type="number" name="tiket_eksekutif" required><br>

        <h3>Kelas Ekonomi</h3>
        <label for="tiket_ekonomi">Jumlah Tiker Terjual:</label> 
        <input type="number" name="tiket_ekonomi" required><br>

        <br>
        <button type="submit" name="submit">Hitung Penghasilan</button>
    </form>

    <?php
    if (isset($_POST['submit'])) {
        $tiket_vip = $_POST['tiket_vip'];
        $tiket_eksekutif = $_POST['tiket_eksekutif'];
        $tiket_ekonomi = $_POST['tiket_ekonomi'];

        $keuntungan_vip = 0;
        $keuntungan_eksekutif = 0;
        $keuntungan_ekonomi = 0;
        $total_keuntungan = 0;

        if ($tiket_vip >= 35) {
            $keuntungan_vip = 0.25;
        } elseif ($tiket_vip >= 20) {
            $keuntungan_vip = 0.15;
        } else {
            $keuntungan_vip = 0.05;
        }

        if ($tiket_eksekutif >= 40) {
            $keuntungan_eksekutif = 0.20;
        } elseif ($tiket_eksekutif >= 20) {
            $keuntungan_eksekutif = 0.10;
        } else {
            $keuntungan_eksekutif = 0.02;
        }

        $keuntungan_ekonomi = 0.07;

        $total_keuntungan = ($tiket_vip * 50 * $keuntungan_vip) + ($tiket_eksekutif * 50 * $keuntungan_eksekutif) + ($tiket_ekonomi * 50 * $keuntungan_ekonomi);

        echo "<h3>Hasil Penghitungan</h3>";
        echo "Keuntungan Kelas VIP: Rp. " . number_format($tiket_vip * 50 * $keuntungan_vip, 2) . "<br>";
        echo "Keuntungan Kelas Eksekutif: Rp. " . number_format($tiket_eksekutif * 50 * $keuntungan_eksekutif, 2) . "<br>";
        echo "Keuntungan Kelas Ekonomi: Rp. " . number_format($tiket_ekonomi * 50 * $keuntungan_ekonomi, 2) . "<br>";
        echo "Total Keuntungan: Rp. " . number_format($total_keuntungan, 2);
    }
    ?>
</body>
</html>