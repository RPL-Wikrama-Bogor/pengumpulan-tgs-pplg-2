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
    ],
]
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
 <form action="" method="post">
    <div class="container">
        <h2>Daftar Menu</h2>
        <ol>
        <?php foreach ($menus as $key => $menu) : ?>
            <li>
                <p>Menu: <?= $menu['menu'] ?><br>
                Harga : Rp. <?= number_format($menu['harga'], 0, ',',',') ?></p>
                </li>
                <?php endforeach; ?>
        </div>
        </ol>
        <table>
    <!-- pilih menu -->
    <form action="" method="post" id="purchase-form">
        <div class="container1">
        <label for="food_menu">Pilih Makanan:</label>
        <select id="food_menu" name="food_menu" >
        <option hidden disabled selected>--pilih makanan--</option>
            <?php foreach ($menus as $item): ?>
                <?php if ($item['tipe'] == 'makanan'): ?>
                    <option value="<?= $item['menu']; ?>"><?= $item['menu']; ?> - Rp <?= number_format($item['harga'], 0, ',', '.'); ?></option>
                <?php endif; ?>
            <?php endforeach; ?>
        </select><br>

        <label for="food_quantity">Jumlah Pembelian Makanan:</label>
        <option hidden disabled selected>--pilih minuman--</option>
        <input type="number" id="food_quantity" name="food_quantity" ><br>

        <!-- <h2>Minuman</h2> -->
        <label for="drink_menu">Pilih Minuman:</label>
        <select id="drink_menu" name="drink_menu" >
        <option hidden disabled selected>--pilih minuman--</option>
            <?php foreach ($menus as $item): ?>
                <?php if ($item['tipe'] == 'minuman'): ?>
                    <option value="<?= $item['menu']; ?>"><?= $item['menu']; ?> - Rp <?= number_format($item['harga'], 0, ',', '.'); ?></option>
                <?php endif; ?>
            <?php endforeach; ?>
        </select><br>

        <label for="drink_quantity">Jumlah Pembelian Minuman:</label>
        <input type="number" id="drink_quantity" name="drink_quantity" ><br>

        <input type="submit" value="Beli">
    </form>

    <!-- Menampulkan struk-->
    <?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $food_menu = $_POST["food_menu"];
    $food_quantity = (int)$_POST["food_quantity"];
    $drink_menu = $_POST["drink_menu"];
    $drink_quantity = (int)$_POST["drink_quantity"];

    // Menghitung total
    $total_cost = 0;

    foreach ($menus as $item) {
        if ($item['menu'] == $food_menu) {
            $food_price = $item['harga'];
            $total_cost += $food_price * $food_quantity;
        } elseif ($item['menu'] == $drink_menu) {
            $drink_price = $item['harga'];
            $total_cost += $drink_price * $drink_quantity;
        }
    }
?>

<h2>Struk Pembelian</h2>
<p><?= $food_menu ?> <?= $food_quantity ?> = Rp <?= number_format($food_price * $food_quantity, 0, ',', '.'); ?></p>
<p><?= $drink_menu ?> <?= $drink_quantity ?> = Rp <?= number_format($drink_price * $drink_quantity, 0, ',', '.'); ?></p>
<p>Total: Rp <?= number_format($total_cost, 0, ',', '.'); ?></p>

<?php } ?>

</body>
</html>