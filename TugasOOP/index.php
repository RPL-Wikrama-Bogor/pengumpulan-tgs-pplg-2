<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rental Motor</title>
    <style>
        body {
            margin: 2% 35% 0 35%;
        }

        form {
            margin-bottom: 30px;
        }

        h1 {
            text-align: center;
        }
    </style>
</head>
<body>
    <form action="" method="post">
        <h1>Rental Motor</h1>
        <div style="display: flex;">
            <label for="nama">Nama Pelanggan : </label>
            <input type="text" name="nama" id="nama">
        </div>

        <div style="display: flex;">
            <label for="lamaWaktu">Lama Waktu Rental (Per hari) : </label>
            <input type="number" name="lamaWaktu" id="lamaWaktu">
        </div>

        <div style="display: flex;">
            <label for="jenis">Pilih Jenis Motor : </label>
            <select name="jenis" required>
                <option hidden selected><== Motor ==></option>
                <option value="Honda">Honda</option>
                <option value="Yamaha">Yamaha</option>
                <option value="Kawasaki">Kawasaki</option>
            </select>
        </div>
            <button type="submit" name="submit">Submit</button>
    </form>

    <?php 
        require 'logic.php';
        $logic = new Pembelian();
        $logic->setHarga(70000,60000,50000);

        if (isset($_POST['submit'])) {
            $logic->namaPelanggan = $_POST['nama'];
            $logic->jenisYangDipilih = $_POST['jenis'];
            $logic->lamaWaktu = $_POST['lamaWaktu'];
            $logic->hargaBayar();
    ?>
        <div style="border: solid black 1px; padding: 0 0 3% 3%; width: 400px;">
            <?php $logic->cetakBukti(); ?>
        </div>
    <?php } ?>
</body>
</html>

