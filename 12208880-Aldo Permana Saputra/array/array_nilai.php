<?php
$nilai = [80, 78, 72, 84, 92, 88];

//implode funsi nya untuk menjadikan array menjadi text
echo "Nilai Saya :" . implode(", ", $nilai) . "</br>";


echo "Dari keseluruhan nilai yang paling tinggi adalah :" . max($nilai) . "</br>";

echo "Sedangkan nilai yang paling kecil :" . min($nilai) . "</br>";


// foreach buat ngisi variabel satu ke varbl yang lain dengan menginisialisai
$nilai1 = [];
foreach ($nilai as $nilaii) {
	$nilai1[] = $nilaii;
}

//asort di buat mengurutkan bilangan dari yang terkecil
asort($nilai1);
echo "Apabila diurutkan dari yang terkecil menjadi :" . implode(", ", $nilai1) . "</br>";

//arsort di buat mengurutkan bilangan dari yang terbesar
arsort($nilai1);
echo "Apabila diurutkan dari yang terbesar menjadi :" . implode(", ", $nilai1) . "</br>";

//round di gunakan buat membulatkkan bilangan
echo "Apabila dibulatkan, rata-rata dari keseluruhan nilai saya menjadi :" . round(array_sum($nilai)/count($nilai)) . "</br>";


// cari index 
$key = array_search(min($nilai), $nilai);


array_splice($nilai, $key, 1, 75);

echo "Setelah melakukan perbaikan untuk nilai" . min($nilai1) . "</b>, saya mendapat nilai$nilai[0]</b>. Jadi nilai saya sekarang :" . implode(", ", $nilai) . "</br>"; 

arsort($nilai);
echo "Sehingga sekarang, urutan nilai saya dari yang terbesar menjadi :" . implode(", ", $nilai) . "</br>";
?>









