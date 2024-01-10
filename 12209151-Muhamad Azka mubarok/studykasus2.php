<?php
$listMenu = [
    [
        'menu' => 'Nasi goreng',
        'harga' => 15000,
        'tipe' =>'Makanan',
    ],
    [
        'menu' => 'Mie Goreng',
        'harga' => 10000,
        'tipe' => 'Makanan',
    ],
    [
        'menu' => 'Kwetiaw',
        'harga' => 15000,
        'tipe' => 'Makanan',
    ],
    [
        'menu' => 'Es Jeruk',
        'harga' => 5000,
        'tipe' => 'Minuman',
    ],
    [
        'menu' => 'Teh Manis',
        'harga' => 5000,
        'tipe' => 'Minuman',
    ],
];

$pesanMakanan = '';
$pesanMinuman = '';
$totalPesanan = 0;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $makananIndex = $_POST['makanan'];
    $jumlahMakanan = (int)$_POST['jumlahmakanan'];
    $minumanIndex = $_POST['minuman'];
    $jumlahMinuman = (int)$_POST['jumlahminuman'];

    // Validasi dan pesan pembelian makanan
    if ($makananIndex !== '' && $jumlahMakanan > 0) {
        $menuMakanan = $listMenu[$makananIndex]['menu'];
        $hargaMakanan = $listMenu[$makananIndex]['harga'];
        $totalMakanan = $hargaMakanan * $jumlahMakanan;
        $pesanMakanan = "Makanan $jumlahMakanan ($menuMakanan)
        <br>
        Harga Makanan : Rp " . number_format($totalMakanan, 0, ',', '.');
        $totalPesanan += $totalMakanan;
    }

    // Validasi dan pesan pembelian minuman
    if ($minumanIndex !== '' && $jumlahMinuman > 0) {
        $menuMinuman = $listMenu[$minumanIndex]['menu'];
        $hargaMinuman = $listMenu[$minumanIndex]['harga'];
        $totalMinuman = $hargaMinuman * $jumlahMinuman;
        $pesanMinuman = "Minuman $jumlahMinuman ($menuMinuman)
        <br>
        Harga Minuman : Rp " . number_format($totalMinuman, 0, ',', '.');
        $totalPesanan += $totalMinuman;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        li {
            text-align: left;
        }
        .container {
            border: 1px solid black;
            width: 500px;
            max-width: 500px;
        }
        .container1 {
            border: 1px solid black;
            width: 460px;
            max-width: 500px;
            text-align: left;
            padding: 20px 20px;
            margin-top: 20px;
        }
        .output {
            border: 1px solid black;
            width: 480px;
            max-width: 500px;
            height: 200px;
            margin-top: 20px;
            text-align: left;
            padding: 10px;
        }
        .output p{
            margin-left: px;
        }
    </style>
</head>
<body>
    <center>
        <div class="container">
            <h2>Daftar Menu</h2>
            <ol>
                <?php foreach ($listMenu as $menu) { ?>
                    <li>
                        <p><?= $menu['menu'] ?><br>
                        Harga : <?= $menu['harga'] ?></p>
                    </li>
                <?php } ?>
            </ol>
        </div>
        <div class="container1">
            <form action="" method="post">
                <label for="makanan">Pilih Makanan :</label>
                <select name="makanan" id="makanan">
                    <option hidden disabled selected>-----Pilih makanan-----</option>
                    <?php foreach ($listMenu as $key => $menu) { ?>
                        <?php if ($menu['tipe'] === 'Makanan') { ?>
                            <option value="<?= $key ?>"><?= $menu['menu'] ?></option>
                        <?php } ?>
                    <?php } ?>
                </select>
                <br><br>
                <label for="jumlahmakanan">Jumlah Pembelian Makanan:</label>
                <input type="number" id="jumlahmakanan" name="jumlahmakanan" min="1" value="0">
                <br><br>
                <label for="minuman">Pilih Minuman:</label>
                <select id="minuman" name="minuman">
                    <option hidden disabled selected>-----Pilih minuman-----</option>
                    <?php foreach ($listMenu as $key => $menu) { ?>
                        <?php if ($menu['tipe'] === 'Minuman') { ?>
                            <option value="<?= $key ?>"><?= $menu['menu'] ?></option>
                        <?php } ?>
                    <?php } ?>
                </select>
                <br><br>
                <label for="jumlahminuman">Jumlah Pembelian Minuman:</label>
                <input type="number" id="jumlahminuman" name="jumlahminuman" min="1" value="0">
                <br><br>
                <input style="width: 450px;" type="submit" value="Beli">
            </form>
        </div>
        <div class="out">
            <?php if ($pesanMakanan !== "" || $pesanMinuman !== "") : ?>
                <h3 style="text-align: center;">Bukti Pembelian:</h3>
                <?php if ($pesanMakanan !== "") : ?>
                    <p><?= $pesanMakanan; ?></p>
                <?php endif; ?>
                <?php if ($pesanMinuman !== "") : ?>
                    <p><?= $pesanMinuman; ?></p>
                <?php endif; ?>
                <p>Total Pembayaran: Rp <?= number_format($totalPesanan, 0, ',', '.'); ?></p>
            <?php endif; ?>
        </div>
    </center>
</body>
</html>
