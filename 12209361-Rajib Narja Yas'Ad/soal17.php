<?php
    $arrAngka = [];
    $terbesar;
    $terkecil;
    $rata2;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Soal-1</title>
</head>
<body>
    <!-- Siapkan Input -->
    <h1></h1>
    <form action="" method="post">
        <div id="wrap">
            <div style="display: flex;">
                <label for="angka">Masukan Angka : </label>
                <!-- Name dengan tanda [] berarti bahwa semua input name yang sama, valuenya akan diambil semua dan disimpin dakam bentuk array -->
                <input type="number" name="angka[]" id="angka">
            </div>
        </div>
        <!-- Attribute yang memiliki kata depan "on" disebut dengan event yang valuenya berisi script (baris code js) -->
        <p style="cursor: pointer; color: blue" onclick="tambahInput()">Tambah Input Form</p>
        <button type="submit" name="submit">Kirim!</button>
    </form>
    <script>
        let jumlahInput = 1;
        function tambahInput() {
            // Untuk mendefinisikan variable pada JS menggunakan let/const : let untuk variable yang bisa berubah valuenya, const variable yang tidak bisa diubah valuenya
            // Backtip (``) digunakan untuk pembuatan string yang tidak satu baris : bisa dipake di php juga
            let inputElement = `
                <br><div style="display: flex;">
                    <label for="angka">Masukan Angka : </label>
                    <input type="number" name="angka[]" id="angka">
                </div>
            `;
            jumlahInput += 1;
            // Kalau jumlah input masih kurang dari 10, input baru bolee dimuncul/tambahin
            // appendChild : Menambahkan element/tag baru pada bagian bawah (sebelum penutup: tag yang dimaksud yang dipanggil pada 'document' : biasanya di tag/html yang dibuat lewat js nya bukan HTML langsung) 
            // document : pengambil alihan baris kode HTML
            // getElementByID : mengambil tag HTML yang memiliki id tersebut : selalu itu, ada getElementByClass, getElementBy, getElementByTagName, querySelector. Tergantung identitas yg akan diambil
            if (jumlahInput < 10) {
                document.getElementById('wrap').innerHTML += inputElement;
            } 
        }
    </script>
</body>
</html>

<?php
    // Cek apakah button dgn name submit di klik
    if (isset($_POST['submit'])) {
        // Mengisi arrAngka dengan seluruh value dari input yang memiliki name angka
        $arrAngka = $_POST['angka'];
        $terbesar = max($arrAngka);
        $terkecil = min($arrAngka);
        
        // array_sum : seluruh item arr dijumlahkan,
        // count : menghitung jumlah item yang terdapat pada array 
        $rata2 = array_sum($arrAngka) / count($arrAngka);
        echo "Nilai Terbesar : " . $terbesar . "<br> Nilai Terkecil : " . $terkecil . "<br> Rata-rata : " . $rata2;
    }
?>