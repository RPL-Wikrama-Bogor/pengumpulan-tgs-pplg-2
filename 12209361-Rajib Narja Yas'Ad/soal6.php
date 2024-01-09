<?php
// Fungsi untuk mengkonversi total detik ke format jam-menit-detik
function konversiDetikKeWaktu($totalDetik) {
    $jam = floor($totalDetik / 3600);
    $sisaDetik = $totalDetik % 3600;
    $menit = floor($sisaDetik / 60);
    $detik = $sisaDetik % 60;

    return "$jam jam $menit menit $detik detik";
}

// Inisialisasi variabel
$totalDetik = 0;
$hasilKonversi = '';

// Memeriksa apakah ada input dari user
if (isset($_POST['submit'])) {
    $totalDetik = $_POST['total_detik'];

    // Memanggil fungsi konversiDetikKeWaktu() untuk mengkonversi total detik
    $hasilKonversi = konversiDetikKeWaktu($totalDetik);
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Detik ke Waktu</title>
</head>
<body>
    <h2>Detik ke Waktu</h2>
    <form method="post" action="">
        Masukkan total detik: <input type="number" name="total_detik" value="<?php echo $totalDetik; ?>" required>
        <input type="submit" name="submit" value="Konversi">
    </form>

    <?php
    // Menampilkan hasil konversi jika sudah ada input
    if ($hasilKonversi !== '') {
        echo "<p>Hasil konversi: $hasilKonversi</p>";
    }
    ?>
</body>
</html>