<?php
$siswa = [
    [
        "nama" => "Fema",
        "nis" => "1234567",
        "rombel" => "PPLG XI-2",
        "rayon" => "cicururg 3",
        "umur" => 18,
    ],
    [
        "nama" => "zahra",
        "nis" => "1234987",
        "rombel" => "PPLG XI-2",
        "rayon" => "cicururg 4",
        "umur" => 17,
    ],
    [
        "nama" => "maury",
        "nis" => "1234765",
        "rombel" => "PPLG XI-2",
        "rayon" => "ciawi 2",
        "umur" => 16,
    ],
    [
        "nama" => "putri",
        "nis" => "1234576",
        "rombel" => "PPLG XI-2",
        "rayon" => "cibedug 1",
        "umur" => 19,
    ]
];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Array Usia</title>
</head>
<body>
    <form action="" method="get">
        <h2>Data Siswa</h2>
        <a href="?cari=umur" style="text-decoration: none;">Cari data siswa yang di atas umur 17 tahun</a>
        <br>
        <label for="masukan_nama">Masukkan nama :</label>
        <input type="text" id="masukan_nama" name="masukan_nama">
        <input type="submit" name="submit" value="Cari">
    </form>

    <?php
    // Memeriksa apakah query parameter "cari" ada dan sama dengan "umur"
    if (isset($_GET['cari']) && $_GET['cari'] == 'umur') {
        echo 'Data Siswa dengan Umur >= 17';
        foreach ($siswa as $data) {
            
            if ($data['umur'] >= 17) {
                echo '<li>Nama: ' . $data['nama'] . ', Umur: ' . $data['umur'] . '</li>' ;
            }
        }
    }

    // Memeriksa apakah form pencarian nama dikirim
    if (isset($_GET['submit']) && isset($_GET['masukan_nama'])) {
        $nama_cari = $_GET['masukan_nama'];
        echo 'Hasil Pencarian untuk Nama: ' . $nama_cari . '';
        foreach ($siswa as $data) {
            if (strtolower($data['nama']) == strtolower($nama_cari)) {
                echo 'Nama: ' . $data['nama'] . ', Umur: ' . $data['umur'] . '';
            }
        }
    }
    ?>
</body>
</html>
