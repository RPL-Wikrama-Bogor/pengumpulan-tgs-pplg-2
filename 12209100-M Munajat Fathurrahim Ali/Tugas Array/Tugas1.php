<?php
$nilai =[80,78,72,84,92,88];
$sumNilai;
$rataNilai;

echo "nilai saya: ".implode(",",$nilai).
"<br>";

echo "Nilai tertinggi: " . max($nilai) . 
"<br>" ;

echo "Nilai terkecil: " . min($nilai). 
"<br>";

asort($nilai);

echo "Urutan dari terkecil ke terbesar: " . implode("," , $nilai);
 
echo "<br>";

arsort($nilai);

echo "Urutan dari terbesar ke terkecil: " . implode( "," , $nilai) ;


echo "<br>";

$sumNilai = array_sum($nilai);
$rataNilai = $sumNilai / 6 ;

echo "Rata-rata nilai saya: " . round($rataNilai) ;

echo "<br>";

$nilai[2] = 75;

ksort($nilai);

echo "setelah remedial nilai 72 sekarang menjadi 75, maka nilai saya menjadi: " . implode(",", $nilai) . "<br>";

arsort($nilai);

echo "sehingga sekarang urutan nilai terbesar saya adalah: " . implode(",",$nilai);

?>