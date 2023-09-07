<?php
$arrAngka = [];
$nilaiterbesar;
$nilaiterkecil;
$ratarata;
?>
<!--input-->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>array max,min,ave</title>
</head>
<body>
    <form action="" method="post">
        <div id ="wrap">
            <div style="display: flex;">
            <label for="angka"> masukan angka</label>
            <!-- name dengan tanda [] berarti bahwa semua input dengan name yang sama, value nya akan di ambil semua dan disimpan dalam bentuk array -->
            <input typpe="number" name="angka[]" id="angka">
</div>
</div>
<!-- atribute yang memiliki kata yang depan nya "on" disebut dengan event yang valuenya berisi script (baris code js-->
<p style="cursor: pointer; color: blue" onclick="tambahInput()"> Tambah Input Form</p>
<button type="submit" name="submit">kirim</button>
</form>
<script>
    let jumlahInput = 1;
    function tambahInput() {
        //untuk mendefiniisikan variable pada js menggunakan let/const : let untuk variable yang bisa berubah valuenya, const variable yang tidak bibsa diubah valuenya
        // backip ("") digunakan untuk pembuatan string yang tidak satu baris : bisa  dipake di php juga 
        let inputElement= `
        <div style="display: flex;">
        <label for="angka">Masukkan Angka : </label>
        <input type="number" name="angka[]" id="angka">
        </div>
        `;
        // jumlah input increments untuk mengetahui skrg jumlah inputnya udah berapa
        jumlahInput += 1;
        // document : pengambil alihan baris kode HTML
        // getElementById : mengambil tag HTML yang memiliki id tersebut : selain itu, 
        // ada getElementByClass, getElementByTageName, querySelector tergantung identitas yang akan diambil
        if (jumlahInput < 10) {
            // kalau jumlah inputnya masih krg dari 10, input baru boleh di muncul/ditambahin
            // appendChild : menambahkan element/tag baru pada bagian bawah (sebelum penutup)
            // tag yang di maksud (yang dipanggil) pada 'document.'
            document.getElementById('wrap').innerHTML += inputElement;
        }
    }
    </script>
    <!--proses-->
    <?php
    if (isset($_POST{'submit'})) {
        // mengisi arrAngka dengan seluruh value dari input yang memiliki name angka
        $arrAngka = $_POST['angka'];
        $nilaiTerbesar = max($arrAngka);
        $nilaiTerkecil = min($arrAngka);
        // array_sum : seluruh item arr dijumlahkan, count : menghitung jumlah item yg terdapat pada array
        $rataRata = array_sum($arrAngka) / count ($arrAngka);
        echo "Nilai Terbesar : " . $nilaiTerbesar . " <br> Nilai Terkecil : " . $nilaiTerkecil . "<br> Rata-Rata : " . $rataRata;
        }