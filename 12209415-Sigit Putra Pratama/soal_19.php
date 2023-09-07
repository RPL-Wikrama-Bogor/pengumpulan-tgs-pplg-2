<?php
$int_tiket;
$kategori_tiket;
$vip;
$eksekutif;
$ekonomi;
$tiket_perkelas;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Penjualan Tiket</title>
</head>
<body>
    <form action="" method="post">
    <!-- <div style="display: flex;"> -->
            <label for="vip">Input Tiket VIP</label>
            <br>
            <input type="number" name="vip" id="vip">
        </div>
        <br>
    <!-- <div style="display: flex;"> -->
            <label for="eksekutif">Input Tiket Eksekutif</label>
            <br>
            <input type="number" name="eksekutif" id="eksekutif">
        </div>
        <br>
    <!-- <div style="display: flex;"> -->
            <label for="ekonomi">Input Tiket Ekonomi</label>
            <br>
            <input type="number" name="ekonomi" id="ekonomi">
        </div>
        <br>
        <br><button type="submit" name="submit">submit</button>
    </form>

    <?php
      if (isset($_POST['submit'])) {
        // Mengambil data dari formulir
        // intval() digunakan untuk mengonversi nilai $_POST["vip"] menjadi tipe data integer
        // fungsi intval() juga digunakan untuk memastikan bahwa nilai yang Anda ambil dari input atau sumber data lainnya dalam format bilangan bulat 
        $vip = intval($_POST['vip']);
        $eksekutif = intval($_POST['eksekutif']);
        $ekonomi = intval($_POST['ekonomi']);

          // Harga tiket per kelas
          $hargaVIP = 100;
          $hargaEksekutif = 80;
          $hargaEkonomi = 60;

          // Menghitung keuntungan per kelas
        $keuntunganVIP = 0;
        $keuntunganEksekutif = 0;
        $keuntunganEkonomi = 0;

        if ($vip >= 35) {
            $keuntunganVIP = $vip * $hargaVIP * 0.25;
        } elseif ($vip >= 20) {
            $keuntunganVIP = $vip * $hargaVIP * 0.15;
        } else {
            $keuntunganVIP = $vip * $hargaVIP * 0.05;
        }

        if ($eksekutif >= 40) {
            $keuntunganEksekutif = $eksekutif * $hargaEksekutif * 0.20;
        } elseif ($eksekutif >= 20) {
            $keuntunganEksekutif = $eksekutif * $hargaEksekutif * 0.10;
        } else {
            $keuntunganEksekutif = $eksekutif * $hargaEksekutif * 0.02;
        }

        $keuntunganEkonomi = $ekonomi * $hargaEkonomi * 0.07;

        // Menghitung total keuntungan
        $totalKeuntungan = $keuntunganVIP + $keuntunganEksekutif + $keuntunganEkonomi;

        // Menampilkan hasil
        echo "<h2>Hasil Perhitungan Keuntungan</h2>";
        // number_format($keuntunganVIP, 2) menghasilkan hasil dengan dua digit desimal dan pemisah ribuan berupa koma.
        echo "Keuntungan Kelas VIP: $" . number_format($keuntunganVIP, 2) . "<br>";
        echo "Keuntungan Kelas Eksekutif: $" . number_format($keuntunganEksekutif, 2) . "<br>";
        echo "Keuntungan Kelas Ekonomi: $" . number_format($keuntunganEkonomi, 2) . "<br>";
        echo "Total Keuntungan Keseluruhan: $" . number_format($totalKeuntungan, 2) . "<br>";

      }
?>
</body>
</html>