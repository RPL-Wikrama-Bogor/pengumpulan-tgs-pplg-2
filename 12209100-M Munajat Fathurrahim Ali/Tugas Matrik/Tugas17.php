<?php
$arrAngka = [];
$nilaiTerbesar;
$nilaiTerkecil;
$rataRata;
?>
<!--input-->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Array Max, Min, Ave</title>
</head>
<body>
    <form action="" method="post">
        <div id="wrap">
            <div style="display: flex;">
            <label for="angka">Masukan Angka : </label>
            <!-- name dengan tanda [] berarti bahwa semua input dengan name yang sama,
            valuenya akan diambil semua dan disimpan dalam bentuk array-->
            <input type="number" name="angka[]" id="angka">
            </div>
        </div>
        <p style="cursor: pointer; color: blue" onclick="tambahInput()">Tambah Input Form</p>
        <button type="submit" name="submit">Kirim</button>
    </form>
    <script>
        let jumlahInput = 1;
        function tambahInput() {
            let inputElement= `
            <div style="display: flex;">
                <label for="angka">Masukan Angka : </label>
                <input type="number" name="angka[]" id="angka">
            </div>
            `;
        //jumlah input di increment
        jumlahInput += 1;
        // document : pengambil alihan baris kode html
        if (jumlahInput < 10) {
            //kalau jumlah input nya masi kurang dari 10, input baru bole di munculkan/tambahin
            //appendChild : menambahkan element/tag baru pada bagian bawah (sebelum penutup) tag yang dimaksud (yng di panggil) pada'document.' : bisanya di tag/html yng di buat lewat js nya bukan HTML langsung
            //innerHTML : menambahkan tah html baru
            document.getElementById('wrap').innerHTML += inputElement;
        }
        }
    </script>
    <!--proses-->
<?php
    if (isset($_POST['submit'])){
    //mengisi arrangka dengan seluruh value dari input yang memliki name angka
    $arrAngka = $_POST['angka'];
    $nilaiTerbesar = max($arrAngka);
    $nilaiTerkecil = min($arrAngka);
    //array_sum : seluruh item dijumlahkan, count : menmghitung jumlah item yang terdapat pada array
    $rataRata = array_sum($arrAngka) / count($arrAngka);
    echo "nilai terbesar : " . $nilaiTerbesar . "<br> nilai terkecil : " . $nilaiTerkecil . "<br> rata-rata : " . $rataRata;
}
?>
</body>
</html>