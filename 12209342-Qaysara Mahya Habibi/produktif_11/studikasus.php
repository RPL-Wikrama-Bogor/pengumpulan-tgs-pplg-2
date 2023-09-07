<?php
//all grades
$nilai = [80, 78, 72,84,92,88];
$stringNilai = implode(', ', $nilai);
echo "Nilai saya: $stringNilai <br>";

//nilai maximal dan minimal
$n_max = max($nilai);
echo "Dari keseluruhan nilai yang paling tinggi : $n_max <br>";
$n_min = min($nilai);
echo "sedangkan nilai yang paling kecil: $n_min <br>";

//mengurutkan nilai
$min_max = asort($nilai);
echo "Urutan Terkecil ke Terbesar: " . implode(', ', $nilai) . "<br> ";
$max_min = arsort($nilai);
echo "Urutan Terbesar ke Terkecil: " . implode(', ', $nilai) . " <br>";

// rata-rata
$avr = array_sum($nilai)/6;
$bavr = round($avr); 
echo "Setelah menghitung rata-rata keseluruhan nilai saya: $bavr <br>";

//mengubah nilai
$key = array_search(72, $nilai);
if ($key !== false) {
    $nilai[$key] = 75;
}
asort:($nilai);
echo"Setelah perbaikan dari nilai 72 ke 75 maka nilai saya sekarang : $stringNilai <br>";
arsort($nilai);
echo "Urutan Terbesar ke Terkecil (setelah mengubah 72 menjadi 75): " . implode(', ', $nilai) . " ";
?>
