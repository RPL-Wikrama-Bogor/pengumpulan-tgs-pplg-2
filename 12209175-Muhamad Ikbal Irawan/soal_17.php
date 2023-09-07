<!-- preparation -->
<?php 
 $arrAngka = [];
 $nilaiTerbesar;
 $nilaiTerkecil;
 $rataRata;
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
                <label for="angka">Masukan Angka : </label>
                <!-- name dengan tanda [] berarti bahwa semua input dengan name yang sama, valuenya akan diambil semua dan disimpan dalam bentuk array -->
                <input type="number" name="angka[]" id="angka">
            </div><br>
        </div>
    
    <!-- attribute yang memiliki kata depan "on" disebut dengan event yang valuenya berisi script (baris code js) -->
    <p style="cursor: pointer; color: blue; font-weight: bold;" onclick="tambahInput()">Tambah Input Form</p>
    <button type="submit" name="submit">Kirim</button>
    </form>

    <script>
        let jumlahInput = 0;
        function tambahInput() {
            // untuk mendefinisikan variable pada JS menggunakan let/const : let untuk variable yang bisa berubah valuenya, const variable yang tidak bisa diubah valuenya
            // backtip(``) digunakan untuk pembuatan string yang tidak satu baris : bisa dipake di php juga
            let inputElement = `
            <div style="display: flex;">
            <label for="angka">Masukan Angka : </label>
            <input type="number" name="angka[]" id="angka">
            </div><br>`;

            jumlahInput += 1;
            //document : pengambil alihan baris kode HTML
            //getElementById: mengambil tag HTML yang memiliki id tersebut : selain itu, ada getElementByClass, getElementByTagName, querySelector tergantung identitas yang akan diambil

            if (jumlahInput < 10){
                //kalau jumahInput nya masih kurang dari 10, input baru bole dimuncul/ditambahin
                //appenchild : menambahkan element/tag baru pada bagian bawah (sebelum penutup) tag yang dimaksud (yang dipanggil) pada 'document.'
                document.getElementById('wrap').innerHTML += inputElement;
            }
        }
    </script>

    <?php
        if (isset($_POST['submit'])) {
            $arrAngka = $_POST['angka'];
            $nilaiTerbesar = max($arrAngka);
            $nilaiTerkecil = min($arrAngka);
            $rataRata = array_sum($arrAngka) / count($arrAngka);
            $rataRata = floor($rataRata);
            echo "Nilai Terbesar : ".$nilaiTerbesar."<br> Nilai Terkecil : ".$nilaiTerkecil."<br> Rata-rata : ".$rataRata;
        }
    ?>

</body>
</html>