<?php 
    $nilai = [80, 78, 72, 84, 92, 88];

    // Ubah array menjadi string dengan dipisahkan koma
    $stringNilai = implode(', ', $nilai);

    // Mengambil nilai terbesar
    $nilaiTerbesar = max($nilai);

    // Mengambil nilai terkecil
    $nilaiTerkecil = min($nilai);

    // Mengurutkan dari terkecil
    sort($nilai);

    // Menentukan rata-rata
    $rataRata = round(array_sum($nilai) / count($nilai));
    
   
    echo "Nilai Saya : <b>" . $stringNilai . "</b><br>";
    echo "Dari keseluruhan nilai yang paling tinggi ialah : <b>" . $nilaiTerbesar . "</b><br>";
    echo "Sedangkan nilai yang paling kecil : <b>" . $nilaiTerkecil . "</b><br>";
    echo "Apabila diurutkan dari yang terkecil menjadi : <b>" . implode(', ', $nilai) . "</b><br>";
    echo "Apabila diurutkan dari yang terbesar menjadi : <b>" . implode(', ', array_reverse($nilai)) . "</b><br>";
    echo "Apabila dibulatkan, rata-rata dari keseluruhan nilai saya menjadi : <b>" . $rataRata . "</b><br>";
    echo "Setelah melakukan perbaikan untuk nilai <b>" . $nilaiTerkecil . "</b>, ";
    // Mengubah nilai 72 menjadi 75
    //fungsi array search = mencarii item pada arr dan menghasilkan indexnya
    $key = array_search(72, $nilai);
    if ($key !== false) {
        $nilai[$key] = 75;
    }

    // array_splice ($nilai $key 1,);
    $nilaiBaru = min($nilai);
    echo "saya mendapat nilai <b>" . $nilaiBaru . "</b>. Jadi nilai saya sekarang : <b>" . implode(', ', $nilai) . "</b><br>";
    echo "Sehingga sekarang, urutan nilai saya dari yang terbesar menjadi : <b>" . implode(', ', array_reverse($nilai)) . "</b>";
    
    ?>