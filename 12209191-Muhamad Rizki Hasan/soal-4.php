<?php
    // Preparation
    $tunj;
    $pjk;
    $gaji_bersih;
    $gaji_pokok;
    $nama
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menentukan Gaji Karyawan</title>
</head>
<body>
    <!-- Siapkan Input -->
    <form action="" method="post">
        <div style="display: flex;">
            <label for="nama">Masukan Nama Anda :</label>
            <input type="text" name="nama" id="nama">
        </div>
        <div style="display: flex;">
            <label for="gaji_pokok">Masukan Gaji Pokok Anda :</label>
            <input type="text" name="gaji_pokok" id="gaji_pokok">
        </div>
        <button type="submit" name="submit">Kirim!</button>
    </form>
</body>
</html>

<?php
    // Cek apakah button dgn name submit di klik
    if (isset($_POST['submit'])) {
        $nama = $_POST['nama'];
        $gaji_pokok = $_POST['gaji_pokok'];

        $tunj = (20 * $gaji_pokok) / 100;
        $pjk = (15 * ($gaji_pokok + $tunj)) / 100;
        $gaji_bersih = $gaji_pokok + $tunj - $pjk;

        echo "Nama : " . $nama . "<br>";
        echo "Tunjangan : Rp. " . $tunj . "<br>";
        echo "Pajak : Rp. " . $pjk . "<br>";
        echo "Gaji Bersih : Rp. " . $gaji_bersih . "<br>";
    }
?>