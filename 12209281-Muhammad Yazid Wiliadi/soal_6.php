<?php
// Fungsi untuk mengkonversi total detik ke format jam-menit-detik
// floor untuk membulatkan ke bawah
// ceil untuk membulatkan ke atas
// round untuk membulatkan ke bawah dan keatas
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
    <title>Konversi Detik ke Waktu</title>
</head>
<style>
.card {
 width: 400px;
 height: 150px;
 margin: 0 auto;
 margin-top: 150px;
 background-color: #D8D9DA;
 border-radius: 8px;
 box-shadow: 1px 1px 15px #526D82;
}
h1 {
    color: #000;
}
</style>
<body>
    <div class= "card">
    <h1>Konversi Detik ke Waktu</h1>
    <form method="post" action="">
        Masukkan total detik: <input type="number" name="total_detik" value="<?php echo $totalDetik; ?>" required>
        <input type="submit" name="submit" value="Konversi">
    </form>
    </div>
    <?php
    // Menampilkan hasil konversi jika sudah ada input
    if ($hasilKonversi !== '')
     // Melakukan sesuatu jika $hasilKonversi tidak identik dengan string kosong ('')
    {
        echo  "<p>Hasil konversi: $hasilKonversi</p>";
    }
    ?>
</body>
</html>