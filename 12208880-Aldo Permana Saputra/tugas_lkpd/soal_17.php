<?php


$arrAngka = [];
$nilaiTerbesar;
$nilaiTerkecil;
$ratarata;


?>

//aldo
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=\, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <form action="" method="post">

        <div id="wrap">

            <div style="display: flex;">

                <label for="angka"> Masukan angka : </label>

                <input type="number" name="angka[]" id="angka">

            </div>

        </div>

        <p style="cursor: pointer; color: blue" onclick = "tambahInput()"> Tambah input form </p>
        <button type="submit" name="submit" > kirim </button>

    </form>

    <script>

        let jumlahInput = 1;
        function tambahInput() {

            //untuk mendefinisikan variabel pada JS menggunakan let/const : let untuk variabel yang bisa berubah valuenya, const variabel yang tidak bisa diubah valuenya
            //backtip ('') digunakan untuk pembuatan string yang tidak satu baris : bisa diapakai di dalam bahasa pemrograman PHP juga

            let inputElement = `
            <div style = "display: flex;"> 

            <label for = "angka"  > Masukan angka : </label>
            <input type = "number"  name = "angka[]" id = "angka"> </input>
            
            </div>
            `;
            //jumlah input  di increments untuk mengetahui sekarang jumlah inputnya udah ada berapa
            jumlahInput++;
            //document : pengambil alihan baris kode HTML
            //getElementById : mengambil tag HTML yang dimiliki id tersebut : selain itu, ada getElementByClass, getElementByTagNamae, querySelector tergantung identitas yang akan diambil
            
            if (jumlahInput < 10) {
                //kalau jumlah input nya masih kurang dari 10, input baru akan terus dimunculkan
                //appendchild : menambahkan element/tag baru pada bagian bawah (sebelum angka) tag yang dimaksud (yang dipanggil) pada `document.` : biasanya di tag/html yang dibuat lewat js nya bukan html langsung
                //innerHTML : menambahkan tag html baru 
                document.getElementById  ('wrap').innerHTML += inputElement;
            }
        }

    </script>


        <?php

            //mengisi arrAngka dengan 
            if (isset($_POST['submit'])) {
                $arrAngka = $_POST['angka'];
                $nilaiTerbesar = max($arrAngka);
                $nilaiTerkecil = min($arrAngka);

                //array_sum = menjumlahkan
                //count = menghitung ada berapa bilangan
                $ratarata = array_sum($arrAngka) / count($arrAngka);
                echo "Nilai terbesar : " . $nilaiTerbesar . " <br> Nilai terkecil : " . $nilaiTerkecil . " <br> Nilai rata-rata : " . $ratarata;
                echo "</br>";
                echo "</br>";
                echo "</br>";

            }

        ?>

</body>

</html>