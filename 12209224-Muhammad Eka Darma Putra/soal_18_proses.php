<<<<<<< HEAD
<?php
// Mengambil data dari formulir

$nama = $_POST['nama'];
$nilai_mtk = $_POST['nilai_mtk'];
$nilai_indo = $_POST['nilai_indo'];
$nilai_inggris = $_POST['nilai_inggris'];
$nilai_dpk = $_POST['nilai_dpk'];
$nilai_agama = $_POST['nilai_agama'];
$kehadiran = $_POST['kehadiran'];

// Inisialisasi variabel untuk menyimpan nama juara dan nilai rata-rata juara
$juara = "";
$nilai_rata_rata_juara = 0;

    // Menghitung nilai rata-rata siswa
    $rata_rata_siswa = ($nilai_mtk[$i] + $nilai_indo[$i] + $nilai_inggris[$i] + $nilai_dpk[$i] + $nilai_agama[$i]) / 5;
    
    // Memeriksa apakah siswa memenuhi syarat sebagai juara
    if ($rata_rata_siswa >= 475 && $kehadiran[$i] == 100) {
        // Memeriksa apakah nilai rata-rata siswa lebih tinggi dari juara sebelumnya
        if ($rata_rata_siswa > $nilai_rata_rata_juara) {
            $nilai_rata_rata_juara = $rata_rata_siswa;
            $juara = $nama[$i];
        }
    }


// Menampilkan juara kelas
if (!empty($juara)) {
    echo "Juara kelas adalah: " . $juara . " dengan nilai rata-rata " . $nilai_rata_rata_juara;
} else {
    echo "Tidak ada juara kelas yang memenuhi syarat.";
}
=======
<?php
// Mengambil data dari formulir

$nama = $_POST['nama'];
$nilai_mtk = $_POST['nilai_mtk'];
$nilai_indo = $_POST['nilai_indo'];
$nilai_inggris = $_POST['nilai_inggris'];
$nilai_dpk = $_POST['nilai_dpk'];
$nilai_agama = $_POST['nilai_agama'];
$kehadiran = $_POST['kehadiran'];

// Inisialisasi variabel untuk menyimpan nama juara dan nilai rata-rata juara
$juara = "";
$nilai_rata_rata_juara = 0;

    // Menghitung nilai rata-rata siswa
    $rata_rata_siswa = ($nilai_mtk[$i] + $nilai_indo[$i] + $nilai_inggris[$i] + $nilai_dpk[$i] + $nilai_agama[$i]) / 5;
    
    // Memeriksa apakah siswa memenuhi syarat sebagai juara
    if ($rata_rata_siswa >= 475 && $kehadiran[$i] == 100) {
        // Memeriksa apakah nilai rata-rata siswa lebih tinggi dari juara sebelumnya
        if ($rata_rata_siswa > $nilai_rata_rata_juara) {
            $nilai_rata_rata_juara = $rata_rata_siswa;
            $juara = $nama[$i];
        }
    }


// Menampilkan juara kelas
if (!empty($juara)) {
    echo "Juara kelas adalah: " . $juara . " dengan nilai rata-rata " . $nilai_rata_rata_juara;
} else {
    echo "Tidak ada juara kelas yang memenuhi syarat.";
}
>>>>>>> 8ea81f78c3b089b87a85e1ca4c2c0162912ea2fa
?>