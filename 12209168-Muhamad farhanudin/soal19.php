<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hitung Penghasilan Penjualan Tiket Bioskop</title>
</head>
<body>
    <h2>Form Penjualan Tiket Bioskop</h2>
    <form method="post" action="">
        <label for="vip">Jumlah Tiket VIP Terjual:</label>
        <input type="number" name="vip" id="vip" required><br><br>

        <label for="eksekutif">Jumlah Tiket Eksekutif Terjual:</label>
        <input type="number" name="eksekutif" id="eksekutif" required><br><br>

        <label for="ekonomi">Jumlah Tiket Ekonomi Terjual:</label>
        <input type="number" name="ekonomi" id="ekonomi" required><br><br>

        <input type="submit" name="submit" value="Hitung">
    </form>

    <?php
    if (isset($_POST['submit'])) {
        // Mengambil jumlah tiket dari form
        $jumlahVIP = $_POST['vip'];
        $jumlahEksekutif = $_POST['eksekutif'];
        $jumlahEkonomi = $_POST['ekonomi'];

        // Menghitung keuntungan per kelas tiket sesuai dengan ketentuan
        $keuntunganVIP = 0;
        if ($jumlahVIP >= 35) {
            $keuntunganVIP = $jumlahVIP = 25;
        } elseif ($jumlahVIP >= 20 && $jumlahVIP < 35) {
            $keuntunganVIP = $jumlahVIP = 15;
        } else {
            $keuntunganVIP = $jumlahVIP = 5;
        }

        $keuntunganEksekutif = 0;
        if ($jumlahEksekutif >= 40) {
            $keuntunganEksekutif = $jumlahEksekutif = 20;
        } elseif ($jumlahEksekutif >= 20 && $jumlahEksekutif < 40) {
            $keuntunganEksekutif = $jumlahEksekutif = 10;
        } else {
            $keuntunganEksekutif = $jumlahEksekutif = 2;
        }

        $keuntunganEkonomi = $jumlahEkonomi = 7;

        // Menghitung total tiket dari seluruh kelas
        $totalTiket = $jumlahVIP + $jumlahEksekutif + $jumlahEkonomi;

        // Menghitung keuntungan keseluruhan
        $keuntunganKeseluruhan = $keuntunganVIP + $keuntunganEksekutif + $keuntunganEkonomi;

        // Menampilkan hasil
        echo "<h2>Hasil Perhitungan</h2>";
        echo "Keuntungan VIP:" . number_format($keuntunganVIP) . "%<br>";
        echo "Keuntungan Eksekutif:" . number_format($keuntunganEksekutif) . "%<br>";
        echo "Keuntungan Ekonomi:" . number_format($keuntunganEkonomi) . "%<br>";
        echo "Total Tiket dari Seluruh Kelas: " . $totalTiket . "<br>";
        echo "Keuntungan Keseluruhan:" . number_format($keuntunganKeseluruhan) . "%";
    }
    ?>
</body>
</html>