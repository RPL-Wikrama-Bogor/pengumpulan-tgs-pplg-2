<?php
$menus = [
    [
        'menu' => 'Nasi Goreng',
        'harga' => 15000,
        'tipe' => 'makanan'
    ],
    [
        'menu' => 'Mie Goreng',
        'harga' => 10000,
        'tipe' => 'makanan'
    ],
    [
        'menu' => 'Kwetiaw',
        'harga' => 15000,
        'tipe' => 'makanan'
    ],
    [
        'menu' => 'Es Jeruk',
        'harga' => 5000,
        'tipe' => 'minuman'
    ],
    [
        'menu' => 'Teh Manis',
        'harga' => 5000,
        'tipe' => 'minuman'
    ]
]
    ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>makan</title>
    <style>
        body {
            font-family: Arial, sans-serif;             
            margin: 0;
            padding: 0;
        }

        h2 {
            text-align: center;
        }

        form {
            background-color: #ffffff;
            padding: 20px;
            border-radius: 5px;
            width: 400px;
            margin: 0 auto;
        }

        .struk{
            background-color: #ffffff;
            padding: 20px;
            border-radius: 5px;
            width: 400px;
            margin: 0 auto;
        }


        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        table,
        th,
        td {
            border: 1px solid #ccc;
        }

        th,
        td {
            padding: 10px;
            text-align: left;
        }

        select,
        .number {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 3px;
        }

        label {
            font-weight: bold;
        }

        .submit {   
            padding: 10px 200px;
            border: none;
            border-radius: 3px;
            cursor: pointer;
        }

        h2 {
            font-size: 20px;
            margin-top: 20px;
        }

        p {
            margin-bottom: 20px;
        }
    </style>

</head>

<body>
    <form action="" method="post">
        <h2>DAFTAR MENU</h2>
        <table>
            <tr>
                <td><strong>Menu</strong></td>
                <td><strong>Harga</strong></td>
            </tr>
            <?php foreach ($menus as $key => $item): ?>
                <tr>
                    <td>
                        <?= $item['menu'] ?>
                    </td>
                    <td>
                        <?= number_format($item['harga'], 0, ',', '.'); ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
        <br>
        <br>

        <form action="" method="post">
            <h2>PESAN</h2>
            <label for="food_menu">Pilih Makanan:</label>
            <select id="food_menu" name="food_menu">
                <option hidden disabled selected>---select here---</option>
                <?php foreach ($menus as $key => $value): ?>
                    <?php if ($value['tipe'] == 'makanan'): ?>
                        <option value="<?= $value['menu']; ?>"><?= $value['menu']; ?></option>
                    <?php endif; ?>
                <?php endforeach; ?>
            </select><br>

            <label for="food_quantity">Jumlah Pembelian Makanan:</label>
            <input class="number" type="number" id="food_quantity" name="food_quantity" required><br>

            <label for="drink_menu">Pilih Minuman:</label>
            <select id="drink_menu" name="drink_menu">
                <option hidden disabled selected>---select here---</option>
                <?php foreach ($menus as $key => $value): ?>
                    <?php if ($value['tipe'] == 'minuman'): ?>
                        <option value="<?= $value['menu']; ?>"><?= $value['menu']; ?></option>
                    <?php endif; ?>
                <?php endforeach; ?>
            </select><br>

            <label for="drink_quantity">Jumlah Pembelian Minuman:</label>
            <input class="number" type="number" id="drink_quantity" name="drink_quantity" required><br>
            <input class="submit" type="submit" name="submit" value="Beli">
        </form>


        <?php
        if (isset($_POST['submit'])) {
            $food_menu = $_POST["food_menu"];
            $food_quantity = $_POST["food_quantity"];
            $drink_menu = $_POST["drink_menu"];
            $drink_quantity = $_POST["drink_quantity"];

            foreach ($menus as $item) {
                if ($item['menu'] == $food_menu) {
                    $food_price = $item['harga'];
                    $total_makan = $food_price * $food_quantity;
                } elseif ($item['menu'] == $drink_menu) {
                    $drink_price = $item['harga'];
                    $total_minum = $drink_price * $drink_quantity;
                }
            }

            $total = $total_makan + $total_minum;
            ?>
            <div class="struk">
                <h2>STRUK PEMBELIAN</h2>
                <p> Makanan :
                    <?= $food_menu ?> x
                    <?= $food_quantity ?><br> Harga Makanan :
                    <?= number_format($total_makan, 0, ',', '.'); ?>
                    <br>Minuman :
                    <?= $drink_menu ?> x
                    <?= $drink_quantity ?><br> Harga Minuman :
                    <?= number_format($total_minum, 0, ',', '.'); ?>
                    <br>Total Pembayaran: <b>Rp
                <?= number_format($total, 0, ',', '.'); ?>
            </b></p>
            </div>


        <?php } ?>

</body>

</html>