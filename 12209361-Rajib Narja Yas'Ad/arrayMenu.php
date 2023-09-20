<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>sipaling menu</title>
    <?php
    $menus = [
        [
            'menu' => 'nasi goreng kecap asem',
            'harga' => 'Rp15.000' ,
            'tipe' => 'makanan'
        ],
        [
            'menu' => 'mie goreng mozarella',
            'harga' => 'Rp11.000',
            'tipe' => 'makanan'
        ],
        [
            'menu' => 'ayam tiren geprek balado',
            'harga' => 'Rp10.000' ,
            'tipe' => 'makanan'
        ],
        [
            'menu' => 'es jeruk makan jeruk',
            'harga' => 'Rp5000' ,
            'tipe' => 'minuman'
        ],
        [
            'menu' => 'es teh anget',
            'harga' => 'Rp5000' ,
            'tipe' => 'minuman'
        ],
    ];

    ?>
    <style>
        li {
            list-style: none;
        }

        .form-group {
            display: flex;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <div class="table1">
    <table>
        <h1>menu rumah makan rumah</h1>
        <ul>
            <h3>ingfo makanan dan minuman</h3>
            <?php foreach($menus as $menuDanHarga) { ?>
                <li> menu :<?= $menuDanHarga['menu'] ?> </li>
                <li> harga :<?= $menuDanHarga['harga'] ?> </li>
            <?php } ?>
        </ul>
    </table>
    </div>
    <div class="table2">
    <table>

        <form action="" method="post">
            <div class="form-group">
                <label>pilih makanan : </label>   
                <select name="pilihMakan">
                    <option hidden disabled selected>---pilih makanan----</option>
                    <?php foreach($menus as $key => $makan) { ?>
                            <?php if($makan['tipe'] == 'makanan')
                             { ?> <option value="<?= $key ?>"> <?= $makan['menu'];?></option> 
                             <?php }?>
                        </option>
                    <?php } ?>
                </select>
            </div>

            <div class="form-group">
                <label>beli berapa?</label>
                <input type="number" name="jumlahMakan">
            </div>

            <div class="form-group">
                <label>pilih minuman : </label>   
                <select name="pilihMinum">
                    <option hidden disabled selected>---pilih minuman----</option>
                    <?php foreach($menus as $key => $makan) { ?>
                            <?php if($makan['tipe'] == 'minuman')
                             { ?> <option value="<?= $key ?>"> <?= $makan['menu'];?></option> 
                             <?php }?>
                        </option>
                    <?php } ?>
                </select>
            </div>

            <div class="form-group">
                <label>beli berapa?</label>
                <input type="number" name="jumlahMinum" value="simpan">
            </div>
            <div class="form-group">
                <input name="submit" type="submit" value="tombol kematian">
            </div>
        </form>
    </table>
    </div>
    <?php 
        if (isset($_POST['submit'])) {
            $pilihMakan = $_POST['pilihMakan'];
            $pilihMinum = $_POST['pilihMinum'];

            $jumlahMakan = $_POST['jumlahMakan'];
            $jumlahMinum = $_POST['jumlahMinum'];

            $hargaMakan = $menus[$pilihMakan]["harga"];
            $hargaMinum = $menus[$pilihMinum]["harga"];

            $namaMakan = $menus[$pilihMakan]["menu"]; 
            $namaMinum = $menus[$pilihMinum]["menu"]; 

            $totalHargaMakan = $hargaMakan * $jumlahMakan;
            $totalHargaMinum = $hargaMinum * $jumlahMinum;

            $totalpembayaran = $totalHargaMakan + $totalHargaMinum;
            ?> 
            <p>makanan : <?= $namaMakan ?>(<?=$jumlahMakan ?>)</p>
            <p> total harga makanan : Rp <?= number_format($totalHargaMakan, 0, ",", ".")?></p>
            <p>minuman : <?= $namaMinum ?>(<?=$jumlahMinum ?>)</p> 
            <p>total harga minuman : Rp <?= number_format($totalHargaMinum, 0, ",", ".")?></p>
            <p>total harga pembayaran : Rp<?= number_format($totalpembayaran, 0, ",", ".") ?></p>

        <?php }
        ?>
    

</body>
</html>
