<?php 
$menus = [
    [
        'menu' => 'Nasi Goreng',
        'harga' => 5000,
        'tipe' => 'makanan',
    ],
    [
        'menu' => 'Mie Goreng',
        'harga' => 5000,
        'tipe' => 'makanan',
    ],
    [
        'menu' => 'Kwetiaw',
        'harga' => 5000,
        'tipe' => 'makanan',
    ],
    [
        'menu' => 'Es Jeruk',
        'harga' => 3000,
        'tipe' => 'minuman',
    ],
    [
        'menu' => 'Teh Manis',
        'harga' => 3000,
        'tipe' => 'makanan',
    ],
]
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Menu</title>
    <style>
        body{
            position: center;
        }
    </style>
</head>
<body>
    <form action="" method="post">
        <table>
            <center><h2>Daftar Menu</h2></center>
            foreach()
            <ol>
                <li>
                    <?= 'Nama Makanan: ' . $menu['menu'] ?>
                    <?= 'Nama Makanan: ' . $menu['menu'] ?>
                    <?= 'Nama Makanan: ' . $menu['menu'] ?>
                </li>
            </ol>
        </table>
    </form>
</body>
</html>