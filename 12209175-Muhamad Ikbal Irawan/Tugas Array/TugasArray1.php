<?php

    $nilai = [80, 78, 72 ,84, 92, 88];

    $kalimat = implode(", ",$nilai);
    echo "Nilai saya : <b>".$kalimat."</b><br>";

    $max = max($nilai);
    echo "Dari Keseluruhan nilai yang paling tinggi ialah : <b>".$max."</b><br>";

    $min = min($nilai);
    echo "Sedangkan nilai yang paling kecil : <b>".$min."</b><br>";

    $mintomax = asort($nilai);
    $mintomax = implode(", ",$nilai);
    print_r("Apabila diurutkan dari yang terkecil menjadi : <b>".$mintomax."</b><br>");

    $maxtomin = arsort($nilai);
    $maxtomin = implode(", ",$nilai);
    print_r("Apabila diurutkan dari yang terbesar menjadi : <b>".$maxtomin."</b><br>");

    $sum = array_sum($nilai);
    $rata = floor($sum / 6);
    echo "Apabila dibulatkan, rata-rata dari keseluruhan nilai saya menjadi : <b>". $rata."</b><br>";

    $nilai = [80, 78, 72,84, 92, 88];
    $nilai[2] = 75;
    $perbaikan = implode(", ",$nilai);
    echo "Setelah melakukan perbaikan untuk nilai <b>72</b>, saya mendapat nilai <b>75</b>. Jadi nilai saya sekarang : <b>".$perbaikan."</b></br>";

    $maxtomin2 = arsort($nilai);
    $maxtomin2 = implode(", ",$nilai);
    print_r("Apabila diurutkan dari yang terbesar menjadi : <b>".$maxtomin2."</b><br>");

?>