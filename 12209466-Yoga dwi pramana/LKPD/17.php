<!-- preparation -->
<?php
$arrAngka = [];
$nilaiterbesar = [];
$nilaiterkecil = [];
$rataRata;
?>

<!-- Input -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Array Max, Min, Ave</title>
</head>
<body>
    <form action="" method = "post">
     <div id= "wrap">
        <div style="display: flex;">
             <label for="angka">Masukkan Angka:</label>
              <!-- Name dengan tanda [] berarti bahwa semua input dengan name yang sama,
               value nya akan diambil semua dan di simpan dalam bentuk Array -->
               <input type="number" name="angka[]" id="angka">
        </div>
    </div>
        <!-- attribute yang memiliki kata depan "on" disebut dengan event yang valuenya berisi
        script (baris code JS) -->
        <!-- onclick untuk menggerakan JS setelah melakukan sesuatu -->
        <p style="cursor: pointer; color: blue;" onclick="tambahInput()">Tambah input form</p>
        <button type="submit" name="submit" >Kirim</button> 
    </form>

    <script>
        let jumlahInput = 1;
        function tambahInput() {
            // untuk mendefinisikan variable pada JS menggunakan let/const : let untuk variable yang bisa berubah valuenya, const variable yang tidak bisa di ubah valuenya
            // backtip ( `` ) digunakan untuk pembuatan string yang tidak satu baris : bisa dipake di php juga

            let inputElement = `
            <div style="display: flex;">
              <label for="angka">Masukkan angka : </label>
              <input type="sumber" name="angka[]" id="angka">
            </div>
            `;
            jumlahInput += 1;
            // jumlahInput  di increments untuk mengetahui sakarang jumlah inputnya udah ada berapa
            // jumlahInput = jumlahInput +1;
            // document : pengambil alihan baris code html
            // getElemenById : mengambil tag HTML yang dimiliki id tersebut : selain itu, ada getElementByClass, getElementByTagName,querySelector tergantung indentitas yang akan di ambil
            if (jumlahInput < 10 ) {
                // kalau jumlahInput nya masih kurang dari 10, input baru boleh dimuncul atau ditambahkan
                // appendChild : menambahkan element/tag baru pada bagian bawah (sebelum penutup) tag yang di maksud (yang dipanggil) pada 'document.' : biasanya di tag/html yang di buat lewat Js nya bukan HTML  langsung
                // innerHTML  menambahkan tag Html baru
                // document JS akan mengambil semua codingan html tersebut
                // getElementByclass jika memakai class
                // innnertext yang keluar output nya text
                document.getElementById('wrap').innerHTML += inputElement;
            }
        }
    </script>


                <!-- Proses -->
        <?php

            if(isset($_POST['submit'])) {
                // mengisi arrAngka dengan seluruh value dari input yang memiliki name angka
                $arrAngka = $_POST['angka'];
                $nilaiTerbesar = max('arraAngka');
                $nilaiTerkecil = min('arraAngka');
                // array_sum : seluruh item arr dijumlahkan, count : menghitung jumlah item yang terdapat pada array 
                $rataRata = array_sum($arrAngka) / count($arrAngka);    
                echo " Nilai Terbesar : " .$nilaiTerbesar . "<br> Nilai Terkecil : " . $nilaiTerkecil . "<br> Rata-Rata : " . $rataRata;
            }
        ?>
</body>
</html>