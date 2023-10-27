<?php
// Array awal
$nilaiSaya = array(80, 78, 72, 84, 92, 88);

// Menemukan nilai tertinggi
$nilaiTertinggi = max($nilaiSaya);

// Menemukan nilai terendah
$nilaiTerendah = min($nilaiSaya);

//memisahkan array menjadi string dengan koma
echo "Nilai Saya: <b> " . implode(', ', $nilaiSaya) .  "</b> <br>";
echo "Dari keseluruhan nilai yang paling tinggi ialah: <b> " . $nilaiTertinggi . " </b><br>";
echo "Sedangkan nilai yang paling kecil: <b> " . $nilaiTerendah . " </b><br>";

// Mengurutkan dari yang terkecil
sort($nilaiSaya);
echo "Diurutkan dari yang terkecil: <b> " . implode(', ', $nilaiSaya) . "</b> <br>";

// Mengurutkan dari yang terbesar
rsort($nilaiSaya);
echo " Diurutkan dari yang terbesar: <b> " . implode(', ', $nilaiSaya) . "</b> <br>";

// rata rata
$rataRata = array_sum($nilaiSaya) / count($nilaiSaya);
echo "Apabila dibulatkan, rata-rata dari keseluruhan nilai saya menjadi: <b> " . round($rataRata) . "</b> <br>";

// Mencari indeks nilai 72 dan menggantinya dengan 75
// mencari item pada array dan menghasilkan indexnya
 $key = array_search(72, $nilai);
 if ($key !== false) {
 $nilai[$key] =75;
 }
$nilaiSaya = [80, 78, 72, 84, 92, 88];
$nilaiSaya[2] = 75;
echo " Setelah melakukan perbikan, nilai saya menjadi: <b> " . implode(', ', $nilaiSaya) . "</b> <br>";
echo "Jadi nilai saya sekarang: <b> " . implode(', ', $nilaiSaya) . "</b> <br>";
?>