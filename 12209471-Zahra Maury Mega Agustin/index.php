<?php
$nilai =[72,78,80,84,92,99];

// mengubah array menjadi string
$stringKalimat = implode(",", $nilai);
echo "Nilai saya adalah : $stingKalimat <br>";

// nilai terbesar 
$nilaiTerbesar =max($nilai);
echo "Dari keseluruhan nilai yang paling besar adalah : $nilaiTerbesar <br>";

//Nilai terkecil
$nilaiTerKecil =min($nilai);
echo "sedangkan nilai terkecilnya adalah : $nilaiTerkecil <br>";

//mengurutkan dari kecil ke besar
arsort($nilai);
echo "urutan nilai dari terkecil hingga terbesar :" implode(",", $nilai). "<br>";

//mengurutkan dari terbesar hinggaterkecil
arsort($nilai);
echo "urutan nilai dari terbesar hingga terkecil :" implode(",", $nilai). "<br>";

//menentukan rata rata nilai 
$rata_rata = array_sum($nilai) / count($nilai);
echo "rata-rata : $rata_rata<br>";

//membulatkan rata rata
$hitungRata = round($rata_rata);
echo "rata-rata (dibulatkan) $hitungrata <br>";

// mengubah nilai 72 menjadi 75
foreach($nilai as &$nilai_siswa){
    if ($nilai_siswa < 75) {
        $nilai_siswa = 75;
    }
}
echo "perubahan nilai : " . implode(",", $nilai). "<br>";

//mengurutkan nilai dari terbesar ke terkecil setelah mengubah nilai 72 menjadi 75
arsort($nilai);
echo "urutan terbesar ke terkecil setelah mengubah nilai 72 menjadi 75 : " . implode(",", $nilai). "<br>";
?>