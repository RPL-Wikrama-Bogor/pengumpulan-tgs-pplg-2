<?php

$list_film = [

    [
        "judul" => "miracle in cell no.7",
        "min_usia" => 15,
        "harga" => 45000
    ],

    [
        "judul" => "the invitation",
        "min_usia" => 17,
        "harga" => 35000
    ],

    [
        "judul" => "luck",
        "min_usia" => 7,
        "harga" => 35000
    ]

];
?>


<center>

    <form action="" method="post">

        <table>
            <tr>
                <td>Usia</td>
                <td><input type="number" name="usia" id=""></td>
            </tr>

            <tr>
                <td>Film</td>
                <td>

                    <select name="judu  l" id="">
                        <!-- hidden menyembunyikan opsi ini dari lisr select, disable: gabisa dipilih, selected: awal dibuka, opsi ini yang muncul di select -->
                        <option hidden disabled selected>-- pilih film--</option>
                        <!-- loop tiap item array nya agar muncul di list opsi select -->

                        <?php
                        foreach ($list_film as $key => $film) {
                        ?>
                            <option value="<?= $key ?>"> <?= $film['judul'] ?> </option>
                        <?php
                        }
                        ?>



                    </select>
                </td>
            </tr>

            <tr>
                <td></td>
                <td><input type="submit" name="simpan" value="simpan"></td>
            </tr>
        </table>
    </form>


    <?php

    if (isset($_POST['simpan'])) {
        $usia = $_POST['usia'];
        $filmId = $_POST['judul'];


        $min_usia = $list_film[$filmId]['min_usia'];
        $harga = $list_film[$filmId]['harga'];

        if ($usia >= $min_usia) {
            echo "<h2 style = 'color: green' silahkan untuk membaray sebesar Rp. " . number_format($harga, 2, '', '.') . "</h2>";
        } else {
            echo "<h2 style = 'color: red'> Usia belum cukup </h2>";
        }
    }

    ?>


</center>