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
        'menu' => 'Kwetiaw Goreng',
        'harga' => 15000,
        'tipe' => 'makanan',
    ],
    [
        'menu' => 'Es jeruk anget',
        'harga' => 5000,
        'tipe' => 'minuman',
    ],
    [
        'menu' => 'Es Teh Manis Anget',
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
    <title>M & M</title>
    <style>
        .container{
            border: 1px solid black;
            width: 500px;
            margin: 0 auto;
            text-align: center;
        }
        .container1{
            border: 1px solid black;
            width: 500px;
            margin: 0 auto;
            text-align: center;
            margin-top: 30px;
            padding-top: 10px ;
        }
        li{
            text-align: left;
        }

    </style>
</head>
<body>
    <form action="" method="post">
        <div class="container">
            <h2>Daftar Menu</h2>
        <ol>
            <?php foreach ($menus as $key => $menu) : ?>
            <li>
                <p>Menu : <?= $menu['menu']?><br>
            Harga : Rp. <?= number_format($menu['harga'], 0, ',', ',') ?></p>
            </li>
            <?php endforeach; ?>
        </ol>
        </div>

        <div class="container1">
            <label for="makanan">Pilih Makanan : </label>
            <select name="makanan" id="makanan">
        <option hidden disabled selected>---pilih makanan---</option>
        <?php foreach($menus as $menu): ?>
            <?php if ($menu['tipe'] === 'makanan'): ?>
        <option value="<?= $menu['menu']?>"><?= $menu['menu']?></option>
        <?php endif; ?>
        <?php endforeach; ?>
        </div>
        </select>
        <br>
    <label for="jmlhMakanan">Jumlah Makanan:</label>
    <input type="number" id="jmlhMakanan" name="jmlhMakanan">
<br>
<label for="minuman">Pilih Minuman : </label>
            <select name="minuman" id="minuman">
        <option hidden disabled selected>---pilih minuman---</option>
        <?php foreach($menus as $menu): ?>
            <?php if ($menu['tipe'] === 'minuman'): ?>
        <option value="<?= $menu['menu']?>"><?= $menu['menu']?></option>
        <?php endif; ?>
        <?php endforeach; ?>
        </div>
        </select>
<br>
        <label for="jmlhMinuman">Jumlah Minuman : </label>
        <input type="number" id="jmlhMinuman" name="jmlhMinuman">

        
    <div class="submit">
        <button type="submit" name="submit" style="width: 300px;">Pesan</button>
    </div>
   
    </form>

    <?php
    if(isset($_POST['submit'])) {
        $makanan_pesanan = $_POST['makanan'];
        $minuman_pesanan = $_POST['minuman'];
        $jumlahMakanan = $_POST['jmlhMakanan'];
        $jumlah_minuman = $_POST['jmlhMinuman'];

        foreach ($menus as $menu) {
            if ($menu['menu'] === $makanan_pesanan && $menu['tipe'] === 'makanan') {
                $total_makanan = $menu['harga'] * $jumlahMakanan;
            } elseif ($menu['menu'] === $minuman_pesanan && $menu['tipe'] === 'minuman') {
                $total_minuman = $menu['harga'] * $jumlah_minuman;
            }
        }

        $total = $total_makanan + $total_minuman;
        echo '<div class="container1">Makanan:' .$makanan_pesanan . "($jumlahMakanan)" . "<br>";        
        echo "Harga:" .$total_makanan . "<br>";        
        echo "Minuman:" . $minuman_pesanan . "($jumlah_minuman)" . "<br>";        
        echo "Harga:" .$total_minuman . "<br>";        
        echo "Total Pembayaran:" .$total . "<br>";        


    }
    ?>
</body>
</html>