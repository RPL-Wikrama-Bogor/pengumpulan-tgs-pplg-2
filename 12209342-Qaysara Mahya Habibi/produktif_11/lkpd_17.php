<!-- preparation -->
<?php
$arrAngka = [];
$nmax;
$nmin;
$avr
    ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="" method="post">
        <div id="wrap">
            <div style="display: flex;">
                <label for="angka">Masukan Angka</label>
                <input type="number" name="angka[]" id=angka>
                <!-- name dengan [] berarti semua input dengan nama yang sama, valuenya akan diambil semua dan disimpan dalam bentuk array-->
            </div>
        </div>
        <!-- attribute yang memiliki kata depan "on" disebut dengan event yang valuenya berisi script   -->
        <p style="cursor: pointer; color:blue" onclick="tambahInput()">Tambah input form</p>
        <button type="submit" name="submit">send</button>
    </form>
    <script>
        let jumlahInput = 1;
        function tambahInput() {
            // untuk mendefinisikan variable pada JS menggunakan let/const : let untuk variable yg bisa berubah valuenya, const variable yang tidak bisa diubah valuenya
            // backtip (``) digunakan untuk pembuatan string yang tidak satu baris :bisa dipake di php juga
            let inputElement = `
            <div style="display : flex;">
            <label for="angka">Masukan Angka</label>
            <input type="number" name="angka[]" id=angka>
            </div>
        `;
        // jumlah input increment
        jumlahInput += 1;
        // document : pengambilan alihan baris kode html
        // getElementById : mengambil tag html yang memiliki id tersebut : selain itu, ada getElementClass, getElementTagName,QuerySelector tergantung identitas yang diambil
        if(jumlahInput<10){
        // kalau jumlahInput nya masi kurang dari 10 , input baru boleh muncul/tambahkan
        // appendChild : menambahkan element/tag baru pada bagian bawah (sebelum penutup) tag yang dimakusd (dipanggil) pada 'document.' : bisanya di tag/html yg dibuat lewat js nya bukan HTML langsung
        // innerHTML : menambahkan tag html baru
            document.getElementById('wrap').innerHTML += inputElement;
        }
        }
    </script>

    <!-- proses -->
    <?php
    if(isset($_POST['submit'])){
        // mengisi arrAngka dengan seluruh value dari input yang memiliki name angka
        $arrAngka = $_POST['angka'];
        $nmax = max($arrAngka);
        $nmin = min($arrAngka);
        // array_sum : seluruh item arr dijumlahkan, count : menghitung jumlah item yang terdapat pada array
        $avr = array_sum($arrAngka) / count($arrAngka);
        echo "Nilai Terbesar : " . $nmax . "<br> Nilai Terkecil : " . $nmin . "<br> Rata-rata : " . $avr;
        }
    ?>
</body>

</html>