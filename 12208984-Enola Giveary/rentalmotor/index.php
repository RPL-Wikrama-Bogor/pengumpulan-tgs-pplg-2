<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rental Motor</title>
</head>
<body>
    <form action="" method="post">
    <h1>Rental Motor</h1>
    <div style="display: flex;">
    <label for="nama">Nama Pelanggan: </label>
    <input type="text" name="nama" id="nama" required>
    </div>
    <div style="display: flex;">
    <label for="nama">Lama Waktu Rental: </label>
    <input type="number" name="waktu" id="waktu" required>
    </div>
    <div style="display: flex;">
    <label for="nama">Jenis Motor: </label>
   <select name="jenis" required>
    <option value="Aerox">Aerox</option>
    <option value="Vespa">Vespa</option>
    <option value="NMAX">NMAX</option>
    <option value="Ninja">Ninja</option>
   </select>
    </div>
    <button type="submit" name="rental">Rental</button>
    </form>
    <?php
    include 'sewa.php';

    $proces = new Rental();
    $proces->setHarga(10000, 20000, 30000, 40000);

    if (isset($_POST['rental'])) {
        $proces->namaPelanggan = $_POST['nama'];
        $proces->waktuRental = $_POST['waktu'];
        $proces->motorYangDipilih = $_POST['jenis'];

        $proces->totalHargaRental();
        $proces->hargaDiskon();
        $proces->cetakRental();
    }
    ?>
</body>
</html>