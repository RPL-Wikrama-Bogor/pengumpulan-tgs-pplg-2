<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menghitung Harga Dengan Konsep oop</title>
    <style>
        .form {
            display: flex;
            justify-content: center;
            margin-top: 20px;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <div class="form">
    <form action="" method="post" >
        <div style="display: flex;">
            <label for="nama">Nama Peminjam : </label>
            <input type="text" name="nama" id="nama" required>
        </div>
        <div style="display: flex;">
            <label for="hari">Lama Waktu Rental : </label>
            <input type="number" name="hari" id="hari" required>
        </div>
        <div style="display: flex;">
            <label for="jenis">Pilih Motor : </label>
            <select name="jenis" required>
                <option value="Suprabapak">Supra bapak</option>
                <option value="adv">adv</option>
                <option value="Vario">Vario</option>
                <option value="Aeroxngabers">Aeroxngabers</option>
            </select>
        </div>
        
        <button type="submit" name="submit">Submit</button>
    </form>
    </div>
    
    <?php
        require 'logic2.php';

        $logic = new Pembelian();
        $logic->setHarga(100000,150000,100000,200000);

        if (isset($_POST['submit'])) {
            $logic->jenisYangDipilih = $_POST['jenis'];
            $logic->namaPeminjam = $_POST['nama'];
            $logic->lamaRental = $_POST['hari'];
            $logic->hargaRental();
        
    ?>
    <div style="border: solid black 1px; margin-left: 35%; padding: 0 0 3% 3%; width: 400px;">
        <?php $logic->cetakBukti(); ?>
    </div>
    <?php } ?>
</body>
</html>