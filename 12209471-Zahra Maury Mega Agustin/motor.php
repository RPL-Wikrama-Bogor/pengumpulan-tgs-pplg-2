<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rental Motor</title>
</head>
<body>
    <form method="POST">
    <h2>Rental Motor</h2>
    <div style="display: flex;">
        <label for="nama">Nama Pelanggan:</label>
        <input type="text" id="nama" name="nama">
        </div>
        <div style="display: flex;">
        <label for="lamaRental">Lama Rental (hari):</label>
        <input type="number" id="lamaRental" name="lamaRental" >
        </div>
        <div style="display: flex;">
        <label for="jenisMotor">Jenis Motor:</label>
        <select id="jenisMotor" name="jenisMotor">
            <option value="scoopy" >Vespa</option>
            <option value="beat" >Nmx</option>
            <option value="nmx">Beat</option>
        </select>
        </div>
        <br>
       
    <button type="submit" name="submit">Beli</button>
    </form>
    <?php
    require 'rental.php';
    $proses = new rental();
    $proses->setHarga(10000, 20000, 30000, 40000);


    if (isset($_POST['submit'])) {
    $proses->namaPelanggan = $_POST['nama'];
    $proses->waktuRental = $_POST['lamaRental'];
    $proses->motorYangDipilih = $_POST['jenisMotor'];

    $proses->totalHargaRental();
    $proses->hargaDiskon();
    $proses->cetakRental();
    }
    ?>
</body>
</html>


