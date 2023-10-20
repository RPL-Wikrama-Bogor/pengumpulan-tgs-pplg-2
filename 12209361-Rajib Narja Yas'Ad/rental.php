<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rental Motor</title>

</head>
<body>
    <h1>RENTAL MOTOR</h1>
    <form action="" method="post">
        <div style="display: flex; margin-bottom: 10px;">
        <label for="nama">Masukkan Nama Anda:</label>
        <input type="text" name="nama" id="nama">
        </div>
        <div style="display: flex; margin-bottom: 10px;">
        <label for="waktu">Waktu Rental(per Hari):</label>
        <input type="number" min="0" name="waktu" id="waktu">
        </div>
        <div style="display: flex; margin-bottom: 0px;">
        <label for="jenis">Jenis Motor:</label>
        <select name="jenis" require>
            <option hidden disabled selected>Pilih Jenis Motor</option>
            <option value="MotorButut">Motor Butut</option>
            <option value="MotorMahal">Motor Mahal</option>
            <option value="MotorBiasa">Motor Biasa</option>
        </select>
        </div>
        <button type="submit" name="sewa">Sewa Motor</button>
    </form>

    <?php
    require 'logic.php';
    $logic = new Pembelian();
    $logic->setHarga(70000,85000,82000);
    if(isset($_POST['sewa'])) {
        $logic->nama_pengguna = $_POST['nama'];
        $logic->lamaWaktu = $_POST['waktu'];
        $logic->jenisYangDipilih = $_POST['jenis'];

        $logic->cetakBukti();

    }
    ?>

</body>
</html>