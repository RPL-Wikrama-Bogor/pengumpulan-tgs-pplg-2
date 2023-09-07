<?php 
    $menus = [
        [
            "menu" => "Nasi Goreng",
            "harga" => 15000,
            "tipe" => "makanan"
        ],
        [
            "menu" => "Mie Goreng",
            "harga" => 10000,
            "tipe" => "makanan"
        ],
        [
            "menu" => "Kwetiaw",
            "harga" => 15000,
            "tipe" => "makanan"
        ],
        [
            "menu" => "Es Jeruk",
            "harga" => 5000,
            "tipe" => "minuman"
        ],
        [
            "menu" => "Teh Manis",
            "harga" => 5000,
            "tipe" => "minuman"
        ]
        
        ];

    $pesanMakanan = "";
    $pesanMinuman = "";
    
    if ( $_SERVER["REQUEST_METHOD"] == "POST") {
        $makanan = $_POST["makanan"];
        $jumlahMakanan = $_POST["jmlmakanan"];
        $minuman = $_POST["minuman"];
        $jumlahMinuman = $_POST["jmlminuman"];
    
        $totalMakanan = 0;
        $totalMinuman = 0;

        foreach ($menus as $menu) {
            if ($menu["menu"] === $makanan) {
                $totalMakanan = $menu["harga"] * $jumlahMakanan;
            } elseif ($menu["menu"] === $minuman) {
                $totalMinuman = $menu["harga"] * $jumlahMinuman;
            }
        }
    
        $totalPesanan = $totalMakanan + $totalMinuman;

        if (($jumlahMakanan + $jumlahMinuman) > 5) {
            $diskon = 0.1 * $totalPesanan; // 10% diskon
            $totalPesanan -= $diskon;
        } else{
            $diskon = 0;
        }
            
        $pesanMakanan = "$makanan x $jumlahMakanan = $totalMakanan";
        $pesanMinuman = "$minuman x $jumlahMinuman = $totalMinuman";
    }
       
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Warung Makanan dan Minuman</title>
    <style>
        .container{
            border: 1px solid black;
            width: 500px;
        }
        li{
            text-align: left;
        }
        select{
            width: 200px;
            height: 30px;
            margin-top: 10px;
        }
        input[type]{
            width: 200px;
            height: 25px;
            margin-top: 10px;
        }
        input[type="submit"]{
            width: 450px;
        }
        .list li{
            list-style: none;
        }
        .list ol{
            padding-left: -50px;
        }
    </style>
</head>
<body>
    <center>    
        <div class="container">
            <h3>Daftar Menu</h3>
                <ol>
            <?php
                foreach( $menus as $menu => $daftar ) {
            ?>
                    <li>                       
                        <p>Menu : <?= $daftar["menu"] ?> <br>
                         Harga : <?= $daftar["harga"] ?></p>
                    </li>
            <?php 
                }
            ?>
                </ol>
        </div><br>

        <div class="container">
            <br>
            <form action="<?= $_SERVER["PHP_SELF"]; ?>" method="post">
                <div style="display: flex; padding-left: 20px;"><br>
                    <p>Pilih Makanan : </p>
                        <select name="makanan" required>            
                            <option hidden disabled selected>--Pilih Makanan--</option>
                            <?php foreach($menus as $menu) : ?>
                                <?php if ($menu["tipe"] === "makanan") : ?>
                                    <option value="<?= $menu['menu'] ?>"><?= $menu["menu"] ?></option>
                                <?php endif ; ?>
                            <?php endforeach ; ?>
                        </select>
                    </div>

                    <div style="display: flex; padding-left: 20px;">
                        <p>Jumlah Pembelian Makanan :</p>
                        <input type="number" name="jmlmakanan" min="1" value="0" required >
                        <br>
                    </div>

                    <div style="display: flex; padding-left: 20px;">
                        <p>Pilih Minuman : </p>
                            <select name="minuman" required>            
                                <option hidden disabled selected>--Pilih Minuman--</option>
                                <?php foreach($menus as $menu) : ?>
                                    <?php if ($menu["tipe"] === "minuman") : ?>
                                        <option value="<?= $menu['menu'] ?>"><?= $menu["menu"] ?></option>
                                    <?php endif ; ?>
                                <?php endforeach ; ?>
                            </select>
                        </div>

                        <div style="display: flex; padding-left: 20px;">
                        <p>Jumlah Pembelian Minuman :</p>
                        <input type="number" name="jmlminuman" min="0" value="0" max="50">
                    </div>                
                <input type="submit" value="Beli"></input>
            </form>
            <br>
        </div><br>

        <?php if ($pesanMakanan !== "" || $pesanMinuman !== "") : ?>
            <div class="container">
                <br>
                <div class="list">
                    <h3>Bukti Pembelian</h3>
                    <ul>
                        <li>Makanan : <?= $makanan . " (". $jumlahMakanan .") "; ?></li>
                        <li>Harga Makanan : Rp <?= $totalMakanan ?></li>
                        <li>minuman : <?= $minuman . " (". $jumlahMinuman .") "; ?></li>
                        <li>Harga Minuman : Rp <?= $totalMinuman ?></li>
                        <li>Diskon yang didapat : Rp <?= $diskon ?></li>
                        <li>Total Pembayaran : <b>Rp <?= number_format($totalPesanan, 0, ',', '.'); ?></b></li>
                    </ul>
                </div>
            </div>
        <?php endif; ?>
    </center>
</body>
</html>