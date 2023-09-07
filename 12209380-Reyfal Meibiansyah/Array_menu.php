<?php
 $listmenu = [
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
        'menu' =>'Kwetiaw',
        'harga' => 15000,
        'tipe' =>'makanan',
    ],
    [
        'menu' => 'Es Jeruk',
        'harga' => 5000,
        'tipe' =>'minuman',
    ],
    [
        'menu' => 'Coklat panas',
        'harga' => 8000,
        'tipe' =>'minuman',
    ],
    [
        'menu' => 'Teh Manis',
        'harga' => 5000,
        'tipe' =>'minuman',
    ]
];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .container{
            border: 1px solid black;
            width: 500px;
        }
        li {
            text-align: left;
        }
        .php{
            display: flex;
            justify-content: center;
            margin-top: 10px;
            font-size: 15px;
            border: 1px solid black;
            width: 500px;
            height:100px ;
        }
    .result{
        margin-top: 45px;
    }
    </style>
</head>
<body>
    <center>
     <div class="container">
        <h3>Daftar Menu</h3>
        <ol>
            <?php foreach ($listmenu as $key => $menu) {?>
                <li>
                    <p>Menu : <?=$menu['menu']?><br>
                     Harga : <?=$menu['harga']?>
                </li>
            <?php }?>
        </ol>
     </div>
    <br>
    <form action="" method="post">
        <div class="container">
            <div style="display: flex; padding-left: 20px">
            <p>Pilih Makanan :</p>
            <select name="makanan" style="width: 300px; height: 30px; margin-top: 10px;">
                <option hidden selected>--Pilih--</option>
              <?php  foreach ($listmenu as $menu) : ?>
                    <?php if($menu['tipe'] === 'makanan') : ?>
                    <option value="<?php echo $menu['menu'] ?>"><?php echo $menu['menu'] ?></option>
                     <?php endif;?>
                <?php endforeach;?>
            </select>
            </div>           
            <div style="display: flex; padding-left: 20px">
            <label for="jumlahmak">Jumlah Makanan:</label>
        <input type="number" id="jmlmakanan" name="jmlmakanan" min="0" value="0">
            </div>
            <div style="display: flex; padding-left: 20px">
            <p>Pilih Minuman :</p>
            <select name="minuman" style="width: 300px; height: 30px; margin-top: 10px;">
                <option hidden selected>--Pilih--</option>
              <?php  foreach ($listmenu as $menu) : ?>
                    <?php if($menu['tipe'] === 'minuman') : ?>
                    <option value="<?php echo $menu['menu'] ?>"><?php echo $menu['menu'] ?></option>
                     <?php endif;?>
                <?php endforeach;?>
            </select>
            </div>
            <div style="display: flex; padding-left: 20px">
            <label for="jumlahmak">Jumlah Minuman:</label>
        <input type="number" id="jmlminuman" name="jmlminuman" min="0" value="0">
            </div>
            <br>
            <div class="submit">
                <button type="submit" name="submit" style="width: 450px;">Beli</button>
            </div><br>
            </div>
        <div class="php">
                    <?php 
            if (isset($_POST['submit'])) {
                $makanan = $_POST['makanan'];
                $minuman = $_POST['minuman'];
                $jmlMakanan = $_POST['jmlmakanan'];
                $jmlMinuman = $_POST['jmlminuman'];
                $hargaMakanan = 0;
                $hargaMinuman = 0;

                foreach ($listmenu as $menu) {
                    if ($menu['menu'] === $makanan) {
                        $hargaMakanan = $menu['harga'];
                    }
                    if ($menu['menu'] === $minuman) {
                        $hargaMinuman = $menu['harga'];
                    }
                };

                $totalMakanan = $jmlMakanan * $hargaMakanan;
                $totalMinuman = $jmlMinuman * $hargaMinuman;
                $totalKomplit = $totalMakanan + $totalMinuman;

                ?>
            <div class="result">
                <?php
                if ($totalKomplit == 0) {
                                    echo "anda harus membeli terlebih dahulu ";
                                }
                elseif ($jmlMinuman == 0) {
                    echo "Anda membeli " . $jmlMakanan . " " . $makanan . " Dan total Anda menjadi Rp ". $totalMakanan ;
                }

                elseif ($jmlMakanan == 0) {
                    echo "Anda membeli " . $jmlMinuman . " " . $minuman . " Dan total Anda menjadi Rp ". $totalMinuman ;
                }

                elseif ($jmlMakanan > 0 && $jmlMinuman > 0) {
                    echo "Anda membeli " . $jmlMakanan . " " . $makanan . " Dan ". $jmlMinuman . " " . $minuman . " Dan total anda menjadi Rp" . $totalKomplit;
                }
              }?>
            </div>
        </div> 
</center>
</form>
</body>
</html>

