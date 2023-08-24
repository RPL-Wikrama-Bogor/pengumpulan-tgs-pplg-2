<?php
// preparasi
$tunj;
$pjk;
$gaji_bersih;
$gaji_pokok;
$nama;

// input
if(isset($_POST['submit'])) {
    $nama = $_POST['nama'];
    $gaji_pokok = $_POST['gaji'];

    // logika perhitungan gaji
    $tunj = 0.2 * $gaji_pokok; // tunjangan 20% dari gaji pokok
    $pjk = 0.15 * ($gaji_pokok + $tunj);// pajak 15% dari gaji pokok
    $gaji_bersih = $gaji_pokok + $tunj - $pjk; // gaji bersih = gaji pokok + tunjangan - pajak
}
?>

<!-- input form -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gaji karyawan</title>
</head>
<body>
    <form action="" method="post">
        <div style="display: flex;">
            <label for="nama">Masukkan Nama Anda</label>
            <input type="text" name="nama" id="nama">
        </div>
        <div style="display: flex;">
            <label for="gaji">Masukkan Gaji Pokok Anda</label>
            <input type="number" name="gaji" id="gaji">
        </div>
        <button type="submit" name="submit">Kirim</button>
    </form>

    <!-- Output hasil perhitungan gaji -->
    <?php if(isset($_POST['submit'])): ?>
        <h2>Hasil Perhitungan Gaji</h2>
        <p>Nama: <?php echo $nama; ?></p>
        <p>Gaji Pokok: <?php echo $gaji_pokok; ?></p>
        <p>Tunjangan: <?php echo $tunj; ?></p>
        <p>Pajak: <?php echo $pjk; ?></p>
        <p>Gaji Bersih: <?php echo $gaji_bersih; ?></p>
    <?php endif; ?>
</body>
</html>


