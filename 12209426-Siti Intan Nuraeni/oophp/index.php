<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="post">
        <h1>Rental Motor</h1>
        <div style="display: flex;">
            <label for="nama">Nama Pelanggan : </label>
            <input type="string" name="nama" id="nama" required>
        </div>
        <br/>
        <div style="display: flex;">
            <label for="waktu">Lama Waktu Rental(per hari) : </label>
            <input type="number" name="waktu" id="waktu" required>
        </div>
        <br/>
        <div style="display: flex">
            <label for="jenis">Jenis Motor : </label>
            <select name="jenis" required>
                <option hidden disabled selected>--pilih jenis--</option>
                <option value="Scooter">Scooter</option>
                <option value="Sport">Sport</option>
                <option value="Cross">Cross</option>
            </select>
            <button type="submit" name="submit">Submit</button>
        </div>
    </form>

    <?php
    include 'proses.php';
    $proces = new Pembelian();
    $proces->setHarga(10000, 20000, 30000);

    if (isset($_POST['submit'])) {
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