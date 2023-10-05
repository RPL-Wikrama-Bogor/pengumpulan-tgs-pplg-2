<?php
$tunj;
$pjk;
$gaji_bersih;
$gaji_pokok;
$nama;
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="" method="post">
        <div style="display: flex;">
            <label for="karyawan">Masukan Nama Karyawan</label>
            <input type="string" name="karyawan" id="karyawan" required>
        </div>
        <div style="display: flex;">
            <label for="gaji_u">Masukan Gaji Pokok</label>
            <input type="number" name="gaji_u" id="gaji_u" required>
        </div>
        <button type="submit" name="submit">Kirim</button>
    </form>
</body>
</html>

<?php
// apakah tombol submit udah di pencet apa belum
if(isset($_POST['submit'])){
    $nama = $_POST['karyawan'];
    $gaji_pokok = $_POST['gaji_u'];

// menghitung tunjangan
$tunj = (20 * $gaji_pokok) / 100;
// menghitung pajak
$pjk = (15 * ($gaji_pokok+$tunj)) / 100;
//menghitung gaji_bersih
$gaji_bersih = $gaji_pokok + $tunj - $pjk;

echo "Nama Karyawan : " . $nama . " || Tunjangan Karyawan : " . $tunj . " || Pajak Karyawan : " . $pjk . " || Gaji Bersih Karyawan : " . $gaji_bersih ;
}

?>




