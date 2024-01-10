<?php
$nilai = [72,78,80,84,92,99];

//mengubah array menjadi string
$stringKalimat = implode(",", $nilai);
echo "Nilai saya adalah : $stringKalimat <br>";

//nilai terbesar
$nilaiTerbesar = max($nilai);
echo "dari keseluruhan nilai yang paling besar adalah : $nilaiTerbesar <br> ";

//nilai terkecil
$nilaiTerkecil = min($nilai);
echo "Sedangkan nilai terkecilnya adalah : $nilaiTerkecil <br>";

//mengurutkan dari kecil ke besar
asort($nilai);
echo "Urutan nilai dari terkecil hingga terbesar: " . implode(",",$nilai). "<br>";

//mengurutkan dari terbesar hingga terkecil
arsort($nilai);
echo "Urutan nilai dari terbesar hingga terkecil: " . implode(",",$nilai). "<br>";

//menentukan rata rata nilai
$rata_rata = array_sum($nilai) / count($nilai);
echo "Rata-rata: $rata_rata<br>";

//membulatkan rata rata
$hitungRata = round($rata_rata);
echo "Rata-rata (dibulatkan) $hitungRata <br>";

//mrngubah nilai 72 menjadi 75
foreach($nilai as &$nilai_siswa){
    if ($nilai_siswa < 75) {
    $nilai_siswa = 75;
    }
}
echo "perubahan nilai:" . implode(",", $nilai). "<br>";


//mengurutkan nilai dari terbesar ke terkecil setelah mengubah nilai 72 menjadi 75
arsort($nilai);
echo "Urutan terbesar ke terkecil setelah mengubah nilai 72 menjadi nilai 75: " . implode(",",$nilai). "<br>";
?>
