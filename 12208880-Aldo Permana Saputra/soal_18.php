
<?php
// Mulai session
session_start();

// Inisialisasi array untuk menyimpan data siswa jika session belum ada
if (!isset($_SESSION['data_siswa'])) {
    $_SESSION['data_siswa'] = [];
}
//aldo

// Fungsi untuk menambahkan data siswa ke dalam session
function tambahDataSiswa($nama, $mtk, $indo, $ingg, $dpk, $agama, $kehadiran)
{
    $siswa = [
        'nama' => $nama,
        'mtk' => $mtk,
        'indo' => $indo,
        'ingg' => $ingg,
        'dpk' => $dpk,
        'agama' => $agama,
        'kehadiran' => $kehadiran,
    ];
    $_SESSION['data_siswa'][] = $siswa;
}

// Jumlah siswa yang ingin dimasukkan
$jumlah_siswa = 14;

if (isset($_POST['submit'])) {
    // Memeriksa apakah sudah ada 15 siswa dalam session
    if (count($_SESSION['data_siswa']) < $jumlah_siswa) {
        $nama = $_POST['nama'];
        $mtk = $_POST['mtk'];
        $indo = $_POST['indo'];
        $ingg = $_POST['ingg'];
        $dpk = $_POST['dpk'];
        $agama = $_POST['agama'];
        $kehadiran = $_POST['kehadiran'];

        // Menambahkan data siswa ke dalam session

        echo "<h2>Data siswa berhasil disimpan.</h2>";
    } else {
        echo "<h2>Batas maksimum $jumlah_siswa siswa telah tercapai.</h2>";
        // Menghapus seluruh session
        session_destroy();
    } 
}

function hitungTotalNilai($siswa)
{
    return $siswa['mtk'] + $siswa['indo'] + $siswa['ingg'] + $siswa['dpk'] + $siswa['agama'];
}

function cekStatusSiswa($siswa)
{
    $totalNilai = hitungTotalNilai($siswa);
    $kehadiran = $siswa['kehadiran'];

    if ($totalNilai >= 475 && $kehadiran == 100) {
        return 'Juara';
    } else {
        return 'Tidak Juara';
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Input dan Tampilkan Nilai Siswa</title>

    <style>
        .content label{
            display: block;
        }
    </style>

</head>

<body>

    <!-- Formulir input siswa -->
    <?php if (count($_SESSION['data_siswa']) < $jumlah_siswa) : ?>
        <h2>Input Data Siswa Ke-<?php echo count($_SESSION['data_siswa']) + 1; ?></h2>
        <form method="post">
            <div class="content">

                <label for="nama">Nama:</label>
                <input type="text" name="nama" required><br>

                <label for="mtk">Nilai MTK:</label>
                <input type="number" name="mtk" required><br>

                <label for="indo">Nilai IND:</label>
                <input type="number" name="indo" required><br>

                <label for="ingg">Nilai ING:</label>
                <input type="number" name="ingg" required><br>

                <label for="dpk">Nilai DPK:</label>
                <input type="number" name="dpk" required><br>

                <label for="agama">Nilai PAI:</label>
                <input type="number" name="agama" required><br>

                <label for="kehadiran"> Kehadiran:</label>
                <input type="number" name="kehadiran"  placeholder="%" required><br>

                <input type="submit" name="submit" value="Simpan Nilai Siswa">

            </div>

        </form>
    <?php endif; ?>

    <!-- Menampilkan data siswa -->
    <?php if (!empty($_SESSION['data_siswa'])) : ?>
        <h2>Data Siswa:</h2>
        <?php $index = 1; ?>
        <?php foreach ($_SESSION['data_siswa'] as $siswa) : ?>
            <?php echo "Siswa ke-$index: " . $siswa['nama']; ?>
            <?php echo " (" . cekStatusSiswa($siswa) . ")"; ?>
            <?php echo " dengan total nilai : " . hitungTotalNilai($siswa) . "<br>"; ?>
            <?php $index++; ?>
        <?php endforeach; ?>
    <?php endif; ?>
</body>

</html>
