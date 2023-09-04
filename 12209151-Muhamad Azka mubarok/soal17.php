<!-- preparation -->
<?php
$arrAngka = [];
$nilaiTerbesar;
$nilaiTerkecil;
$rataRata;
?>

<!-- input -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="post">
        <div id="wrap">
        <div style ="display:flex">
        <label for="angka">Masukan Angka :</label>
        <!-- name dengan tanda[] berarti bahwa semua input dengan name yang sama,valuenya akan diambil semua dan disimpan dalam bentuk array -->
        <input type="number" name="angka[]" id="angka">
        </div>
    </div>
    <!-- attribute yang dimiliki kata depan "on" disebut dengan event yang valuenya berisi script(baris code js) -->
    <p style="cursor: pointer; color:blue" onclick="tambahInput()">Tambah input form</p>
    <button type="submit" name="submit"> kirim </button>
    </form>
    <script>
        let jumlahInput =1;
        function tambahInput(){
        // untuk mendefinisikan variable pada JS menggunakan let/const : let untuk variable yang bisa berubah valuenya,const variable yang tidak bisa diubah valuenya
        //backtip('') digunakan untuk pembuatan sring yang tidak satu baris : bisa dipake di php juga
        let inputElement = `
        <div style="display: flex;">
        <label for"angka">Masukan Angka :</label>
        <input type="number" name="angka[]" id="angka">
        </div>
        `;
        //jumlah input di increment untuk mengetahui sekarang jumlah inputnya uda ada berapa
        jumlahInput+= 1;
        //bisa juga jumlahInput++
        //document: pengambil alihan baris kode HTML
        //getElementById : mengambil tag HTML uang memiliki id tersebut : selain itu, ada get ElementByClass, getElemetnByTagName,querySelector tergantung identitas yang akan diambil
        if (jumlahInput < 10) {
            //kalau jumlah input nya masi kurang dari 10, input baru bole dimuncul/ditambahin
            //appenChild : menambahkan element/tag baru pada bagian bawah(sebelum penutup) tag yang dimaksud(yang dipanggil) pada 'document.' :biasanya di tag/html yang dibuat lewat js nya bukan HTML langsung
            //innerHTML :menambahkan tag html baru
            document.getElementById ('wrap').innerHTML +=inputElement;
        }
    }
    </script>
    <!-- proses -->
    <?php
    if(isset($_POST['submit'])){
        //mengisi arrAngka dengan seluruh value dari input yang memiliki name angka
        $arrAngka =$_POST['angka'];
        $nilaiTerbesar=max($arrAngka);
        $nilaiTerkecil=min($arrAngka);
        $rataRata =array_sum($arrAngka) / count($arrAngka);
        echo "Nilai Terbesar :" . $nilaiTerbesar . "<br> Nilai Terkecil :" . $nilaiTerkecil . "<br> Rata-Rata : " . $rataRata;
    }
    ?>
</body>
</html>