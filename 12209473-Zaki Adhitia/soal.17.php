<?php 

$arrangka;
$nilaiterbesar;
$nilaiterkecil;
$ratarata;

?>

 <!-- imput -->
 <form action="" method="post">
    <div id="wrap">
        <div style="display: flex;">
        <!-- name dengan tanda [] berarti berarti bahwa semua input dengan name yang sama,
        valuenya akan di ambil semua dan disimpan doalam bentuk array -->
        <label for="angka">Masukan Angka</label>
        <input type="number" name="angka[]" id="angka">
        </div>
</div>
<!-- attribut yang memiliki kata depan "on" disebut dengan event yang valuenya berisi script (barisan kode js)  -->
<p style="cursor: pointer; color: blue" onclick="tambahinput()">tambah input form</p>
<button type="submit" name="submit">kirim</button>
    </form>
    <script>
        let jumlahInput = 1; 
        function tambahinput() {
            // untuk mendefinisikan variable pada JS menggunakan lest/const : let untuk variable yang bisa berubah value nya, const variable yang tidak bisa diubah valuenya//
           // backtip ('') digunakan untuk pembuatan string yang tidak satu baris : bisa dipake di php juga
           
           let inputElement =`
           <div style="display : flex;">
           <label for="angka">Masukan Angka</label>
           <input type="number" name="angka[]" id="angka">
           </div>`;
        
           //jumlah input
           jumlahInput += 1;
           //document : pengambil alihan baris kode HTML
           //getElementById = mengambil tag html yang memiliki id tersebut: selain itu, ada getElemenByClass, getElementByTagName, querySelector tergantung identitas yang akan di ambil
           if (jumlahInput < 10) {
                //kalau jumlah input nya masih kurang dari 10, input role baru dimuncul/ditambahkan
                //appenChild : menambahkan element/tag baru pada bagian bawah (sebelum penutup) tag yang dimaksud (yg dipanggil) pada 'document'.
                document.getElementById('wrap').innerHTML += inputElement;
           }
           
        }
    </script>
<!-- proses -->

<?php
if (isset($_POST['submit'])) {
    //mengisi arrAngka dengan seluruh value dari input yang memiliki name angka 
    $arrangka = $_POST['angka'];
    $nilaiterbesar = max($arrangka);
    $nilaiterkecil = min($arrangka);
    $ratarata = array_sum($arrangka) / count($arrangka);
    echo "Nilai terbesar :" . $nilaiterbesar . "<br> Nilai Terkecil : " . $nilaiterkecil . "<br> Rata-Rata : ". $ratarata;
}

?>

</body>
</html>