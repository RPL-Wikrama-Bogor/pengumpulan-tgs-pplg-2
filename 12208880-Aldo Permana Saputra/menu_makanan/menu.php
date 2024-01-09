<?php
$listMenu = [
    [
        'menu' => 'Nasi goreng',
        'harga' => 15000,
        'tipe' => 'Makanan',
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

$pesanMakan = '';
$pesanMinum = '';
$total_pesanan = 0;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $makan = $_POST['makan'];
    $jumlah_makan = (int)$_POST['jumlahmakanan'];
    $minuman = $_POST['minuman'];
    $jumlah_minum = (int)$_POST['jumlahminuman'];

    // Validasi dan pesan pembelian makan
    if ($makan !== '' && $jumlah_makan > 0) {
        $menu = $listMenu[$makan]['menu'];
        $harga_makanan = $listMenu[$makan]['harga'];
        $tot = $harga_makanan * $jumlah_makan;
        $pesanMakan = "Makanan $jumlah_makan ($menu)
        <br>
        Harga Makanan : Rp " . number_format($tot, 0, ',', '.');
        $total_pesanan += $tot;
    }

    // Validasi dan pesan pembelian minuman
    if ($minuman !== '' && $jumlah_minum > 0) {
        $menu_makan = $listMenu[$minuman]['menu'];
        $harga_minum = $listMenu[$minuman]['harga'];
        $totalMinuman = $harga_minum * $jumlah_minum;
        $pesanMinum = "Minuman $jumlah_minum ($menu_makan)
        <br>
        Harga Minuman : Rp " . number_format($totalMinuman, 0, ',', '.');
        $total_pesanan += $totalMinuman;
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

        .content {
            border: 1px solid black;
            width: 500px;
            max-width: 500px;
        }

        .container {
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

        .output p {
            margin-left: px;
        }
    </style>
</head>

<body>
    <center>
        <div class="content">
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






        <div class="container">
            <form action="" method="post">

                <label for="makan">Pilih Makanan :</label>


                <select name="makan" id="makan">
                    <option hidden disabled selected>-----Pilih makan-----</option>
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





        <div class="output">

            <?php if ($pesanMakan !== "" || $pesanMinum !== "") : ?>

                <h3 style="text-align: center;">Bukti Pembelian:</h3>

                <?php if ($pesanMakan !== "") : ?>
                    <p><?= $pesanMakan; ?></p>
                <?php endif; ?>
                <?php if ($pesanMinum !== "") : ?>
                    <p><?= $pesanMinum; ?></p>
                <?php endif; ?>
                
                <p>Total Pembayaran: Rp <?= number_format($total_pesanan, 0, ',', '.'); ?></p>

            <?php endif; ?>
            
        </div>







    </center>
</body>

</html>