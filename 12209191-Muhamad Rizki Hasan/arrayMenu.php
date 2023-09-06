<?php
$menus = [
    [
        'menu' => 'Nasi Goreng',
        'harga' => 15000,
        'tipe' => 'makanan',
    ],
    [
        'menu' => 'Mie Goreng',
        'harga' => 10000,
        'tipe' => 'makanan',
    ],
    [
        'menu' => 'Kwetiau',
        'harga' => 15000,
        'tipe' => 'makanan',
    ],
    [
        'menu' => 'Es Jeruk',
        'harga' => 5000,
        'tipe' => 'minuman',
    ],
    [
        'menu' => 'Teh Manis',
        'harga' => 5000,
        'tipe' => 'minuman',
    ],
]
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu Makanan dan Minuman</title>
    <style>
        body {
            margin: 2% 30% 0 30%;
        }

        .menus {
            border: solid black 3px;
        }

        li {
            list-style: none;
            font-weight: bold;
        }

        h1 {
            text-align: center;
        }

        p {
            margin-left: 3%;
        }

        .input {
            border: solid black 3px;
            padding: 10px;
        }

        button {
            padding: 0 45% 0 45%;
        }
    </style>
</head>
<body>
    <div class="menus">
        <h1>Daftar Menu😁</h1>
        <?php foreach ($menus as $keyId => $menu) { ?>
            <ul>
                <?php $keyId += 1; ?>
                <li><?= $keyId ?>.Menu : <?= $menu['menu'] ?></li>
                <p>Harga : <?= $menu['harga'] ?></p>
            </ul>
        <?php } ?>
    </div>

    <br>

    <div class="input">
        <form action="" method="post">
            <span>Pilih Makanan : </span>
            <select name="makanan">
                <option hidden disabled selected>-----Pilih-----</option>
                <?php foreach ($menus as $key => $menu) { ?>
                    <option value="<?= $key ?>">
                        <?php if ($menu["tipe"] == "makanan") { ?>
                            <?= $menu["menu"]; ?>
                        <?php } else { ?>
                            <?= $menu["menu"] = "" ?>
                        <?php } ?>
                    </option>
                <?php } ?>
            </select>

            <br><br>
            <label for="makanan">Jumlah Pembelian Makanan : </label>
            <input type="number" name="jumlahMakanan" id="makanan">
            <br><br>

            <span>Pilih Minuman : </span>
            <select name="minuman">
                <option hidden disabled selected>-----Pilih-----</option>
                <?php foreach ($menus as $key => $menu) { ?>
                    <option value="<?= $key ?>">
                        <?php if ($menu["tipe"] == "minuman") { ?>
                            <?= $menu["menu"]; ?>
                        <?php } else { ?>
                            <?= $menu["menu"] = "" ?>
                        <?php } ?>
                    </option>
                <?php } ?>
            </select>

            <br><br>
            <label for="minuman">Jumlah Pembelian Minuman : </label>
            <input type="number" name="jumlahMinuman" id="minuman">
            <br><br>

            <button type="submit" name="beli">Beli</button>
        </form>
    </div>
    <br>
<?php
    if (isset($_POST["beli"])) {
        $jumlahMakanan = $_POST["jumlahMakanan"];
        $jumlahMinuman = $_POST["jumlahMinuman"];

        $makananId = $_POST["makanan"];
        $minumanId = $_POST["minuman"];

        $namaMakanan = $menus[$makananId]["menu"];
        $namaMinuman = $menus[$minumanId]["menu"];

        $hargaMakananAwal = $menus[$makananId]["harga"];
        $hargaMinumanAwal = $menus[$minumanId]["harga"];

        $hargaMakananAkhir = $jumlahMakanan * $hargaMakananAwal;
        $hargaMinumanAkhir = $jumlahMinuman * $hargaMinumanAwal;

        $totalHarga = $hargaMakananAkhir + $hargaMinumanAkhir;

        if ($totalHarga > 50000) {
            $diskon = $totalHarga * (10 / 100);
            $totalHarga -= $diskon;
        } else {
            $diskon = 0;
        }
?>
    <div style="border: solid black 3px;">
        <h1>Bukti Pembelian</h1>
        <p>Makanan : <?= $namaMakanan ?> (<?= $jumlahMakanan ?>)</p>
        <p>Harga Makanan : <?= $hargaMakananAkhir ?></p>

        <p>Minuman : <?= $namaMinuman ?> (<?= $jumlahMinuman ?>)</p>
        <p>Harga Minuman : <?= $hargaMinumanAkhir ?></p>

        <p>Diskon : <?= $diskon ?></p>
        <p>Total Pembayaran : <b>Rp <?= number_format($totalHarga, 2, ',', '.') ?></b></p>
    </div>
<?php } ?>
</body>
</html>