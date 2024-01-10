<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menghitung Harga Dengan Konsep oop</title>
    <style>
        body{
        font-family: 'Poppins', sans-serif;
        background: #F8F6F4;
    }

    .container{
        border: 1px solid;
        border-radius: 2px;
        padding: 30px;
        margin-top: 50px;
        background: #F5F5F5;
        width: 400px;
    }
    .container h1{
        margin-top: -20px;
    }
    </style>
</head>
<body>
<center>
        <div class="container">
        <h1>Rental Motor</h1>
        <table> 
        <form action="" method="post">
                <td>Nama Pelanggan : </td>
                <td>
                    <label for="nama"></label>
                    <input type="text" name="nama" id="nama" required>
                </td>
            </tr>
            <tr>
                <td>Lama Waktu Rental : </td>
                <td>
                    <label for="hari"></label>
                    <input type="text" name="hari" id="hari" required>
                </td>
            </tr>
            <tr>
                <td>Pilih Jenis</td>
                <td>
                <label for="jenis"></label>
                <select name="jenis" required>
                <option value="Vario 160">Vario 160</option>
                <option value="Beat Street">Beat Street</option>
                <option value="KLX 150L">KLX 150L</option>
                <option value="Aerox 155">Aerox</option>
                </select>

                </td>
            </tr>    
            <tr>
                <td>
                    <button type="submit" name="beli">Pesan</button>
                </td>    
            </tr>
        </form> 
    </table>
</div>
</center>
    
    <?php
        require 'logic2.php';

        $logic = new Pembelian();
        $logic->setHarga(100000,150000,100000,200000);

        if (isset($_POST['beli'])) {
            $logic->jenisYangDipilih = $_POST['jenis'];
            $logic->namaPeminjam = $_POST['nama'];
            $logic->lamaRental = $_POST['hari'];
            $logic->hargaRental();

        
    ?>
        <?php $logic->cetakBukti(); ?>
    </div>
    <?php } ?>
</body>
</html>