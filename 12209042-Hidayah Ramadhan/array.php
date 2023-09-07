<?php
// Array awal
$nilaiSaya = array(80, 78, 72, 84, 92, 88);

// Menemukan nilai tertinggi
$nilaiTertinggi = max($nilaiSaya);

// Menemukan nilai terendah
$nilaiTerendah = min($nilaiSaya);

echo "Nilai Saya: " . implode(', ', $nilaiSaya) . "<br>";
echo "Dari keseluruhan nilai yang paling tinggi ialah: " . $nilaiTertinggi . "<br>";
echo "Sedangkan nilai yang paling kecil: " . $nilaiTerendah . "<br>";

// Mengurutkan dari yang terkecil
sort($nilaiSaya);
echo "Diurutkan dari yang terkecil: " . implode(', ', $nilaiSaya) . "<br>";

// Mengurutkan dari yang terbesar
rsort($nilaiSaya);
echo " Diurutkan dari yang terbesar: " . implode(', ', $nilaiSaya) . "<br>";
// rata rata
$rataRata = array_sum($nilaiSaya) / count($nilaiSaya);
echo "Apabila dibulatkan, rata-rata dari keseluruhan nilai saya menjadi: " . round($rataRata) . "<br>";


// Mencari indeks nilai 72 dan menggantinya dengan 75
$nilaiSaya = [80, 78, 72, 84, 92, 88];
$nilaiSaya[2] = 75;
echo " Setelah melakukan perbaikan, nilai saya menjadi: " . implode(', ', $nilaiSaya) . "<br>";
echo "Jadi nilai saya sekarang: " . implode(', ', $nilaiSaya) . "<br>";
?>