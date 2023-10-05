<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menghitung Harga Dengan Konsep OOP</title>
</head>
<body>
    <form action="" method="post">
        <div style="display: flex;">
            <label for="liter">Masukkan jumlah liter pembelian : </label>
            <input type="number" name="liter" id="liter" required>
        </div>
        <div style="display: flex;">
            <label for="jenis">Pilih Jenis Bahan Bakar</label>
            <select name="jenis" required>
                <option value="SSuper">Shell Super</option>
                <option value="SVPower">Shell V-Power</option>
                <option value="SVPowerDiesel">Shel V-Power Diesel</option>
                <option value="SVPowerNitro">Shell V-Power Nitro</option>
            </select>
        </div>
        <button type="submit" name="beli">Beli</button>
    </form>

    <?php
        require 'logic.php';

        $logic = new Pembelian();
        $logic->setHarga(10000,15000,10000,20000);

        if (isset($_POST['beli'])) {
            $logic->jenisYangDipilih = $_POST['jenis'];
            $logic->totalLiter = $_POST['liter'];
            $logic->totalHarga();
            $logic->cetakBukti();
        }
    ?>
</body>
</html>