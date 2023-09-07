<?php
$nilai = [80, 78, 72, 84, 92, 88];

// Mengubah arr menjadi string dengan dipisahkan koma
$stringNilai = implode(', ', $nilai);
echo "Nilai saya: $stringNilai <br>";

// Mengambil nilai terbesar
$terbesar = max($nilai); 
echo "dari keseluruhan nilai yang paling tinggi : $terbesar <br>";

// Mengambil nilai terkecil
$terkecil = min($nilai);
echo "sedangkan nilai yang paling kecil: $terkecil <br>";

// Mengurutkan dari terkecil
sort($nilai);
echo "Urutan Terkecil ke Terbesar: " . implode(', ', $nilai) . "<br> ";

// Mengurutkan dari terbesar
rsort($nilai);
echo "Urutan Terbesar ke Terkecil: " . implode(', ', $nilai) . " <br>";

// Menentukan rata-rata
// Menentukan rata-rata
$average = array_sum($nilai) / count($nilai);
$roundedAverage = round($average); 
// Mem bulatkan rata-rata menjadi 82
echo "setelah menghitung rata-rata keseluruhan nilai saya: $roundedAverage <br>";

// Mengubah nilai 72 menjadi 75
// mencari item pada arr dan menghasilkan indexnya
$key = array_search(72, $nilai);
if ($key !== false) {
    $nilai[$key] = 75;
}

//mengurutkan nilai 72-72
asort:($nilai);
echo"setelah perbaikan dari nilai 72 ke 75 maka nilai saya sekarang : $stringNilai <br>";

// Mengurutkan dari terbesar ke terkecil setelah mengubah nilai 72 menjadi 75
arsort($nilai);
echo "Urutan Terbesar ke Terkecil (setelah mengubah 72 menjadi 75): " . implode(', ', $nilai) . " ";

?>