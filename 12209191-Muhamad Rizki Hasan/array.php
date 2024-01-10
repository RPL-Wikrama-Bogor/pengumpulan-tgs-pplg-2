<?php 
    $nilai = [80, 78, 72, 84, 92, 88];
    echo "Nilai Saya: " . implode(", ", $nilai) . "<br>";

    // Nilai tertinggi
    $terbesar = max($nilai);
    echo "Dari keseluruhan nilai yang paling tinggi ialah : " . $terbesar . "<br>";
    
    // Nilai terkecil
    $terkecil = min($nilai); 
    echo "Sedangkan nilai yang paling kecil : " . $terkecil . "<br>";

    // Mengurutkan dari terkecil ke terbesar
    sort($nilai);
    echo "Apabila diurutkan dari yang terkecil menjadi : " . implode(", ", $nilai) . "<br>";
    
    // Mengurutkan dari terbesar ke terkecil
    rsort($nilai);
    echo "Apabila diurutkan dari yang terbesar menjadi : " . implode(", ", $nilai) . "<br>";
    
    // Rata-rata dan membulatkan
    $rataRata = round(array_sum($nilai) / count($nilai));
    echo "Apabila dibulatkan, rata-rata dari keseluruhan nilai saya menjadi : " . $rataRata . "<br>";

    // Setelah perbaikan
    $nilai = [80, 78, 72, 84, 92, 88];
    $key = array_search(72, $nilai);
    if ($key !== false) {
        $nilai[$key] = 75;
    }

    // Mengganti / menambah tergantung posisinya
    // array_splice($nilai, $key, 1, 75);
    echo "Setelah melakukan perbaikan untuk nilai 72, saya mendapat nilai 75. Jadi nilai saya sekarang : " . implode(", ", $nilai) . "<br>";
    
    // Mengurutkan dari terbesar ke terkecil
    rsort($nilai);
    echo "Sehingga sekarang, urutan nilai saya dari yang terbesar menjadi : " . implode(", ", $nilai) . "<br>";
?> 