
<!-- Nilai Saya: 80, 78, 72, 84, 92, 88
Dari keseluruhan nilai yang paling tinggi ialah : 92 Sedangkan nilai yang paling kecil: 72
Apabila diurutkan dari yang terkecil menjadi : 72, 78, 80, 84, 88, 92
Apabila diurutkan dari yang terbesar menjadi : 92, 88, 84, 80, 78, 72
Apabila dibulatkan, rata-rata dari keseluruhan nilai saya menjadi : 82
Setelah melakukan perbaikan untuk nilai 72, saya mendapat nilai 75. Jadi nilai saya sekarang: 80, 78, 75, 84, 92, 88
Sehingga sekarang, urutan nilai saya dari yang terbesar menjadi: 92, 88, 84, 80, 78, 75 -->

<?php
// Array nilai awal
$nilai_awal = array(80, 78, 72, 84, 92, 88);

// Menghitung nilai tertinggi dan terendah awal
$nilai_tertinggi_awal = max($nilai_awal);
$nilai_terendah_awal = min($nilai_awal);
echo "Nilai Saya: " ."<b>" . implode(', ', $nilai_awal) . "</b> <br>";

// Menghitung rata-rata awal
$rata_rata_awal = array_sum($nilai_awal) / count($nilai_awal);


echo "Dari keseluruhan nilai yang paling tinggi ialah: " . "<b>" . $nilai_tertinggi_awal . "</b><br>";
echo "Dari keseluruhan nilai yang paling rendah ialah: " . "<b>" . $nilai_terendah_awal . "</b><br>";
echo "Apabila dibulatkan, rata-rata dari keseluruhan nilai saya menjadi :" ."<b>" . round($rata_rata_awal) . "</b><br>";
echo "<br>";

// Memperbaiki nilai 72 menjadi 75
$key = array_search(72, $nilai_awal);
if ($key !== false) {
    $nilai_awal[$key] = 75;
}

// Menghitung nilai tertinggi setelah perbaikan
$nilai_tertinggi_setelah_perbaikan = max($nilai_awal);


// Menghitung rata-rata setelah perbaikan
$rata_rata_setelah_perbaikan = array_sum($nilai_awal) / count($nilai_awal);


// Menampilkan semua nilai

echo "Setelah Perbaikan:<br>";
echo "Jadi nilai saya sekarang: ". "<b>" . implode(', ', $nilai_awal) . "</b><br>";

// Mengurutkan nilai dari yang terbesar ke yang terkecil awal
arsort($nilai_awal);

echo "Nilai Tertinggi Setelah Perbaikan: " . "<b>" . $nilai_tertinggi_setelah_perbaikan . "</b><br>";
echo "Rata-rata Setelah Perbaikan: " ."<b>". round($rata_rata_setelah_perbaikan) . "</b><br>";
echo "<br>";

// Menampilkan urutan nilai dari yang terkecil sampai terbesar
echo "Urutan Nilai dari Terbesar ke Terkecil: " . "<b>" . implode(', ', $nilai_awal) . "</b><br>";

// Mengurutkan nilai dari yang terbesar sampai terkecil
sort($nilai_awal);

// Menampilkan urutan nilai dari yang terbesar ke terkecil
echo "Urutan Nilai dari Terkecil ke Terbesar: " . "<b>" . implode(', ', $nilai_awal) . "</b><br>";
?>




