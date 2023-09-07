<?php
// Array awal
$nilai = [80, 78, 72, 84, 92, 88];

// Mengubah array menjadi string dengan dipisahkan koma
// implode untuk mengubah suatu array menjadi sebuah string
$nilai_string = implode(", ", $nilai);
echo "Nilai Saya: $nilai_string <br>";

// Mengambil nilai terbesar
// max untuk menemukan nilai maksimum di antara elemen-elemen array
$nilai_terbesar = max($nilai);
echo "Dari Keseluruhan Nilai terbesar: $nilai_terbesar <br>";

// Mengambil nilai terkecil
$nilai_terkecil = min($nilai);
echo "Sedangkan Nilai terkecil: $nilai_terkecil <br>";

// Mengurutkan dari terkecil ke terbesar
sort($nilai);
echo "Urutan dari terkecil ke terbesar: " . implode(", ", $nilai) . "<br>";

// Mengurutkan dari terbesar ke terkecil
rsort($nilai);
echo "Urutan dari terbesar ke terkecil: " . implode(", ", $nilai) . "<br>";

// Menghitung rata-rata
$rata_rata = round(array_sum($nilai) / count($nilai));
echo "Apabila dibulatkan, Rata-rata dari Keseluruhan: $rata_rata <br>";

$index = array_search(72, $nilai);
if ($index !== false) {
    $nilai[$index] = 75;
}
    echo "Array setelah mengubah nilai 72: " . implode(", ", $nilai) . "<br>";
    
    // Mengurutkan dari terbesar ke terkecil setelah mengubah nilai 72 menjadi 75
    rsort($nilai);
    echo "Urutan dari terbesar ke terkecil setelah mengubah nilai 72 menjadi 75: " . implode(", ", $nilai) . "<br>";
?>
