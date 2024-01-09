<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rental Motor</title>
    <style>
    </style>
</head>
<body>
    <center>
        <h1>Rental Motor</h1>
        <form action="" method="post" >
                <label for="nama">Nama Peminjam : </label>
                <input type="text" name="nama" id="nama" required>
                <br>
                <label for="waktu">Waktu Hari Peminjaman : </label>
                <input type="number" name="waktu" id="waktu" required>
                <br>
                <label for="jenis">Pilih Motor : </label>
                <select name="jenis" required>
                    <option value="Beat">Beat</option>
                    <option value="Vespa">Vespa</option>
                    <option value="Vario">Vario</option>
                    <option value="NinjaZX">Ninja ZX</option>
                </select>
                <br>
            <button type="submit" name="beli">Submit</button>
        </form><br>
        
        <?php
            require 'logic.php';
    
            $logic = new Pembelian();
            $logic->setHarga(50000,
                             70000,
                             80000,
                             100000);
    
            if (isset($_POST['beli'])) {
                $logic->jenisYangDipilih = $_POST['jenis'];
                $logic->namaPeminjam = strtolower($_POST['nama']);
                $logic->lamaRental = $_POST['waktu'];
                $logic->hargaRental();
    
            
        ?>
        <div style="border: solid black 1px; width: 500px;">
            <?php $logic->cetakBukti(); ?>
        </div>
        <?php } ?>
    </center>
</body>
</html>