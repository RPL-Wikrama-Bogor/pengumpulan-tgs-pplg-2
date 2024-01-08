<?php
$listmenu = [
    [
        'menu' => 'Nasi Goreng',
        'harga' => 10000,
        'tipe' => 'makanan',
    ],
    [
        'menu' => 'Mie Goreng',
        'harga' => 10000,
        'tipe' => 'makanan',
    ],
    [
        'menu' => 'Kwetiaw',
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
    ]
];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Menu</title>
    <style>
        .container {
            border: 1px solid black;
            width: 500px;
            margin: 0 auto;
            text-align: center;
        }
        li {
            text-align: left;
        }
        .output {
            font-size: 20px;
            margin-top: 20px;
            margin-left: 570px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h3>Daftar Menu</h3>
        <ol>
            <?php foreach ($listmenu as $key => $menu) : ?>
                <li>
                    <p>Menu : <?= $menu['menu'] ?><br>
                    Harga : Rp. <?= number_format($menu['harga'], 0, ',', '.') ?>
                </li>
            <?php endforeach; ?>
        </ol>
    </div>
    <br>
    <br>

    <!-- Bagian Input -->
    <form action="" method="post">
        <div class="container">
            <div>
                <label for="makanan">Pilih Makanan :</label>
                <select name="makanan" id="makanan" style="width: 300px; height: 30px;">
                    <option hidden selected>--Pilih--</option>
                    <?php foreach ($listmenu as $menu) : ?>
                        <?php if ($menu['tipe'] === 'makanan') : ?>
                            <option value="<?= $menu['menu'] ?>"><?= $menu['menu'] ?></option>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </select>
            </div>

            <div>
                <label for="jmlmakanan">Jumlah Makanan:</label>
                <input type="number" id="jmlmakanan" name="jmlmakanan" min="1" value="1">
            </div>

            <div>
                <label for="minuman">Pilih Minuman :</label>
                <select name="minuman" id="minuman" style="width: 300px; height: 30px;">
                    <option hidden selected>--Pilih--</option>
                    <?php foreach ($listmenu as $menu) : ?>
                        <?php if ($menu['tipe'] === 'minuman') : ?>
                            <option value="<?= $menu['menu'] ?>"><?= $menu['menu'] ?></option>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </select>
            </div>

            <div>
                <label for="jmlminuman">Jumlah Minuman:</label>
                <input type="number" id="jmlminuman" name="jmlminuman" min="1" value="1">
            </div>
            <br>
            <div class="submit">
                <button type="submit" name="submit" style="width: 450px;">Beli</button>
            </div>
            <br>
        </div>
    </form>

    <?php
    if(isset($_POST['submit'])) {
        $makanan_terpilih = $_POST['makanan'];
        $minuman_terpilih = $_POST['minuman'];
        $jumlah_makanan = (int)$_POST['jmlmakanan'];
        $jumlah_minuman = (int)$_POST['jmlminuman'];

        $total_makanan = 0;
        $total_minuman = 0;

        // menghitung jumlah total yang dibeli
        foreach ($listmenu as $menu) {
            if ($menu['menu'] === $makanan_terpilih && $menu['tipe'] === 'makanan') {
                $total_makanan = $menu['harga'] * $jumlah_makanan;
            } elseif ($menu['menu'] === $minuman_terpilih && $menu['tipe'] === 'minuman') {
                $total_minuman = $menu['harga'] * $jumlah_minuman;
            }
        }

        $total = $total_makanan + $total_minuman;
        echo '<div class="output">Total : Rp. ' . number_format($total, 0, ',', ',') . '</div>';
    }
    ?>
</body>
</html>
