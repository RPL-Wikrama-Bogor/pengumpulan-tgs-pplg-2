<?php

$listmenu = [
    [
        "menu" => "Nasi Goreng",
        "harga" => 15000,
        "tipe" => "Makanan"
    ],
    [
        "menu" => "Mie Goreng",
        "harga" => 10000,
        "tipe" => "Makanan"
    ],
    [
        "menu" => "Kwetiaw",
        "harga" => 15000,
        "tipe" => "Makanan"
    ],
    [
        "menu" => "Es Jeruk",
        "harga" => 5000,
        "tipe" => "Minuman"
    ],
    [
        "menu" => "Teh Manis",
        "harga" => 5000,
        "tipe" => "Minuman"
    ]
];

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Waroeng Online</title>
    <style>
        html{
            scroll-behavior: smooth;
        }

        body {
            font-weight: bold;
            background-image: linear-gradient(45deg, yellow, yellow, orange, orange);
            background-size: 400% 400%;
            animation: background 5s ease-in-out infinite;
        }

        @keyframes background{
            0%{
                background-position: 0 50%;
            }
            50%{
                background-position: 100% 50%;
            }
            100%{
                background-position: 0 50%;
            }

        }

        .card {
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 2);
            max-width: 500px;
            margin: auto;
            font-family: arial;
            border-radius: 20px;
        }

        ol {
            list-style-type: none;
        }

        li {
            padding: 12px;
        }

        form {
            padding: 10px;
        }

        .card2 {
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 2);
            max-width: 500px;
            margin: auto;
            font-family: arial;
            border-radius: 20px;
            display: flex;
        }

        select, input{
            border-radius: 20px;
        }

        .pilmenu {
            padding-bottom: 10px;
            display: flex;
        }

        .card3 {
            padding-top: 10px;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 2);
            max-width: 500px;
            margin: auto;
            font-family: arial;
            border-radius: 20px;
            padding: 10px;
        }

        .content {
            padding-top: 10px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }
    </style>
</head>

<body>
    <center>
        <div class="judul">
            <h1>↓ Berikut Menu Waroeng Kami ↓</h1>
        </div>
    </center>
    <div class="card">
        <div class="container">
            <?php foreach ($listmenu as $key => $menu) {
            ?>

                <ol>
                    <?php $key += 1 ?>
                    <li>
                        <?= $key . ". " . $menu['menu'] . "<br> Harga : " . $menu['harga'] ?>
                    </li>
                </ol>
            <?php } ?>
        </div>
    </div>

    <div class="card2">
        <form action="" method="post">
            <h4 style="font-style: italic; font-size: 15px;">Jika anda membeli lebih dari Rp. 50.000,00 anda dapat diskon 10%</h4>
            <div class="pilmenu">
                <tr>
                    <td>Pilih Makanan : </td>
                    <td>
                        <select name="makanan" required>
                            <option hidden disabled selected>==> Pilih <==</option>
                                    <?php
                                    foreach ($listmenu as $key => $menumakan) {
                                        if($menumakan['tipe'] == 'Makanan') {
                                    ?>
                            <option value="<?= $key ?>"><?= $menumakan["menu"] ?></option>
                        <?php }} ?>
                        </select>
                    </td>
                </tr>
            </div>

            <div class="pilmenu">
                <label for="jumlahmakan">Jumlah pembelian makanan : </label>
                <input type="number" name="jumlahmakan" id="jumlahmakan" required>
            </div>

            <div class="pilmenu">
                <tr>
                    <td>Pilih Minuman : </td>
                    <td>
                        <select name="minuman" required>
                            <option hidden disabled selected>==> Pilih <== </option>
                                    <?php
                                    foreach ($listmenu as $key => $menuminum) {
                                        if($menuminum['tipe'] == 'Minuman') {
                                    ?>
                            <option value="<?= $key ?>"><?= $menuminum["menu"] ?></option>
                        <?php }} ?>
                        </select>
                    </td>
                </tr>
            </div>

            <div class="pilmenu">
                <label for="jumlahmakan">Jumlah pembelian minuman : </label>
                <input type="number" name="jumlahminum" id="jumlahminum" required>
            </div>

            <tr>
                <td></td>
                <td><input type="submit" name="simpan" value="Simpan"></td>
            </tr>
        </form>
    </div>

    <div class="content" id="bayar">
        <?php
        if (isset($_POST["simpan"])) {

            echo '<div class="card3">';                        
            if(empty($_POST['makanan']) && empty($_POST['minuman'])){
                die("Cuma itu aja? yah jangan satu doang dong 😉"); 
            };
            $pilmakan = $_POST['makanan'];
            $pilminum = $_POST['minuman'];
            $makanan = $listmenu[$pilmakan]['menu'];
            $minuman = $listmenu[$pilminum]['menu'];
            $hargamakan = $listmenu[$pilmakan]["harga"];
            $hargaminum = $listmenu[$pilminum]["harga"];
            $jumlahmakan = $_POST['jumlahmakan'];
            $jumlahminum = $_POST['jumlahminum'];
            $total = $hargamakan * $jumlahmakan + $hargaminum * $jumlahminum;
            if ($total >= 50000) {
                $diskon = $total * (10 / 100);
            }else{
                $diskon = 0;
            }

            echo "Makanan : " . $makanan . " (" . $jumlahmakan . ")<br>";
            echo "Harga Makanan : " . $hargamakan . "<br>";
            echo "Minuman : " . $minuman . " (" . $jumlahminum . ")<br>";
            echo "Minuman : " . $hargaminum . "<br>-------------------------------------<br>";
            echo "Total Harga : " . $total."<br>";
            echo "Diskon :".$diskon."<br>";
            if ($diskon > 0){
            echo "Total setelah diskon : ". $total - $diskon;
            }
            echo '</div>';
        }

        ?>
    </div>
</body>

</html>