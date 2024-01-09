<?php
$nilai = [80, 78, 72, 84, 92, 88];

// Ubah array menjadi string dengan dipisahkan koma
$arrString = implode(', ', $nilai);
echo "Nilai saya: $arrString\n"."<br>";

// Mengambil nilai terbesar
$maxValue = max($nilai);
echo "Dari keseluruhan nilai yang paling tinggi ialah: $maxValue\n"."<br>";

// Mengambil nilai terkecil
$minValue = min($nilai);
echo "Sedang yang paling kecil adalah: $minValue\n"."<br>";

// Mengurutkan dari terkecil
sort($nilai);
echo "Apabila diurutkan dari yang terkecil menjadi: " . implode(', ', $nilai) . "\n"."<br>";

// Mengurutkan dari terbesar
rsort($nilai);
echo "Apabila diurutkan dari yang terbesar menjadi: " . implode(', ', $nilai) . "\n"."<br>";

// Menentukan rata-rata
$average = array_sum($nilai) / count($nilai);
$roundedAverage = round($average); // Mem bulatkan rata-rata menjadi 82
echo "Apabila dibulatkan, rata-rata dari keseluruhan nilai saya menjadi: $roundedAverage\n"."<br>";


// Mengubah nilai 72 menjadi 75
$key = array_search(72, $nilai);
if ($key !== false) {
    $nilai[$key] = 75;
    
    echo "Setelah melakukan perbaikan untuk nilai 72, saya mendapat nilai 75. Jadi nilai saya sekarang: " . implode(', ', $nilai) . "\n"."<br>";
}

// Mengurutkan dari terbesar ke terkecil dari hasil terbaru
rsort($nilai);
echo "Sehingga sekarang, urutan nilai saya dari yang terbesar menjadi: " . implode(', ', $nilai) . "\n"."<br>";


?>