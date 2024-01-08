<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Selamat Memesan</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f3f3f3;
            background-image:url(https://images-wixmp-ed30a86b8c4ca887773594c2.wixmp.com/f/c59510a7-ebc6-4309-8ab6-176537281719/dc2ywuu-c5ab7211-38bd-45f1-8fdd-e849f25bdc1b.png/v1/fill/w_900,h_561,q_80,strp/cafe_background_by_xibxib_dc2ywuu-fullview.jpg?token=eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOiJ1cm46YXBwOjdlMGQxODg5ODIyNjQzNzNhNWYwZDQxNWVhMGQyNmUwIiwiaXNzIjoidXJuOmFwcDo3ZTBkMTg4OTgyMjY0MzczYTVmMGQ0MTVlYTBkMjZlMCIsIm9iaiI6W1t7ImhlaWdodCI6Ijw9NTYxIiwicGF0aCI6IlwvZlwvYzU5NTEwYTctZWJjNi00MzA5LThhYjYtMTc2NTM3MjgxNzE5XC9kYzJ5d3V1LWM1YWI3MjExLTM4YmQtNDVmMS04ZmRkLWU4NDlmMjViZGMxYi5wbmciLCJ3aWR0aCI6Ijw9OTAwIn1dXSwiYXVkIjpbInVybjpzZXJ2aWNlOmltYWdlLm9wZXJhdGlvbnMiXX0.-OOSgkpu7Wv-zSUr1u6ZRZwXMTLfnm8rFiAWBF1tysE);
            margin: 0;
            padding: 0;
        }

        h1 {
            text-align: center;
            background-color: #333;
            color: #fff;
            padding: 10px;
            margin: 0;
        }

        .container {
            max-width: 600px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            border-radius: 5px;
        }

        .menu-list {
            list-style-type: none;
            padding: 0;
        }

        .menu-item {
            margin-bottom: 10px;
            border: 1px solid #ccc;
            padding: 10px;
            border-radius: 5px;
            background-color: #fff;
        }

        .menu-item label {
            font-weight: bold;
        }

        .select-input {
            margin-bottom: 20px;
        }

        select, input[type="number"] {
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 3px;
        }

        .submit-button {
            background-color: #333;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 3px;
            cursor: pointer;
        }

        .submit-button:hover {
            background-color: #555;
        }

        .bukti-pembelian {
            margin-top: 20px;
            border: 1px solid #ccc;
            padding: 10px;
            border-radius: 5px;
            background-color: #fff;
        }

        .total-pembayaran {
            font-weight: bold;
            font-size: 18px;
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <h1>Daftar Menu</h1>
    <div class="container">
        <ul class="menu-list">
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
                        'menu' => 'Es Teh',
                        'harga' => 5000,
                        'tipe' => 'minuman',
                    ],
                ];

                foreach ($menus as $key => $menu) {
                    echo "<li class='menu-item'>";
                    echo "<label>Menu : {$menu['menu']}</label><br>";
                    echo "Harga : Rp {$menu['harga']}<br>";
                    echo "</li>";
                }
            ?>
        </ul>

        <form method="post">
            <div class="select-input">
                <label>Pilih makanan</label>
                <select name="makanan">
                <option value="Pilih">----Pilih----</option> 
                    <?php
                        foreach ($menus as $menu) {
                            if ($menu['tipe'] == 'makanan') {
                                echo "<option value='{$menu['menu']}'>{$menu['menu']}</option>";
                            }
                        }
                    ?>
                </select>
            </div>
            <div class="select-input">
                <label>Jumlah pembelian makanan</label>
                <input type="number" name="jumlah_makanan" value="0">
            </div>

            <div class="select-input">
                <label>Pilih minuman</label>
                <select name="minuman">
                <option value="Pilih">----Pilih----</option> 
                    <?php
                        foreach ($menus as $menu) {
                            if ($menu['tipe'] == 'minuman') {
                                echo "<option value='{$menu['menu']}'>{$menu['menu']}</option>";
                            }
                        }
                    ?>
                </select>
            </div>
            <div class="select-input">
                <label>Jumlah pembelian minuman</label>
                <input type="number" name="jumlah_minuman" value="0">
            </div>

            <input type="submit" name="submit" value="Beli" class="submit-button">
        </form>

        <?php
            if (isset($_POST['submit'])) {
                $makanan = $_POST['makanan'];
                $jumlah_makanan = (int)$_POST['jumlah_makanan'];
                $minuman = $_POST['minuman'];
                $jumlah_minuman = (int)$_POST['jumlah_minuman'];

                echo "<div class='bukti-pembelian'>";
                echo "<h2>Bukti Pembelian</h2>";
                echo "<ul class='menu-list'>";
                if ($jumlah_makanan > 0) {
                    echo "<li class='menu-item'>$makanan ($jumlah_makanan)</li>";
                }
                if ($jumlah_minuman > 0) {
                    echo "<li class='menu-item'>$minuman ($jumlah_minuman)</li>";
                }
                echo "</ul>";

                $total_harga_makanan = 0;
                $total_harga_minuman = 0;

                foreach ($menus as $menu) {
                    if ($menu['menu'] == $makanan) {
                        $total_harga_makanan = $menu['harga'] * $jumlah_makanan;
                    }
                    if ($menu['menu'] == $minuman) {
                        $total_harga_minuman = $menu['harga'] * $jumlah_minuman;
                    }
                }

                $total_pembayaran = $total_harga_makanan + $total_harga_minuman;
                echo "<p class='total-pembayaran'>Total Pembayaran: Rp $total_pembayaran</p>";
                echo "</div>";
            }
        ?>
    </div>
</body>
</html>

