<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rental Motor</title>
</head>
<body>
   <center><h2>Rental Motor</h2></center>
    <form action="" method="post">
        <div style="display: flex;">
        <label for="nama">Masukkan Nama Anda : </label>
        <input type="text" min="0" name="nama" id="nama" autocomplete="off" require>
        </div><br>
        <div style="display: flex;">
        <label for="waktu">Lama Waktu Rental(per Hari) : </label>
        <input type="number" min="0" name="waktu" id="waktu" require>
        </div><br>
        <div style="display: flex;">
        <label for="jenis">Jenis Motor : </label>
        <select name="jenis" require>
            <option hidden disabled selected>Pilih Jenis Motor</option>
            <option value="Beat">Beat</option>
            <option value="Vario">Vario</option>
            <option value="Mio">Mio</option>
        </select>
        </div><br>
        <button type="submit" name="sewa">Sewa Motor</button>
    </form>

    <?php
    require 'belakang.php';
    $belakang = new Pembelian();
    $belakang->setHarga(60000,70000,55000);
    if(isset($_POST['sewa'])) {
        $belakang->nama_pengguna = $_POST['nama'];
        $belakang->lamaWaktu = $_POST['waktu'];
        $belakang->jenisYangDipilih = $_POST['jenis'];
        $belakang->cetakBukti();

    }
    ?>

</body>
</html>