<?php
$listFilm = [
    [
        "judul" => "Miracle in Cell No.7",
        "min-usia" => "15",
        "harga" => "45000"
    ],
    [
        "judul" => "The Invitation",
        "min-usia" => "17",
        "harga" => "35000"
    ],
    [
        "judul" => "Luck",
        "min-usia" => "7",
        "harga" => "35000"
    ]
]
    ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <center>
        <form action="" method="post">
            <table>
                <tr>
                    <td>Usia</td>
                    <td><input type="number" name="usia"></td>
                </tr>
                <tr>
                    <td>Film</td>
                    <td>
                        <select name="judul">
                            <!-- hidden: menyembunyikan opsi ini dari list select, disabled: gabisa di pilih, selected: awal di buka, opsi ini yang muncul di select -->
                            <option hidden disabled selected>--Pilih Film--</option>
                            <!-- loop tiap item arraynya agar muncul di list opsi select -->
                            <?php
                            foreach ($listFilm as $key => $film) {
                                ?>
                                <!-- value di option : data yang di ambil sistem ketika opsi ini dipilih, ambil $key agar yang diambil sistem index dari arr nya bukan nama film. kenpa? agar nanti mengambil property lain dari arr nya gampang, ga harus ribet cari index dulu dari si judulnya. yang di pertengahan tag mengambil property judul karena agar yang dilihat user di opsinya itu judul bukan angka index-->
                                <!-- simbol php yang di value itu artinya tag php echo -->
                                <option value="<?= $key ?>">
                                    <?= $film["judul"] ?>
                                </option>
                                <!-- kenapa buat tanda kurung doang disimpen di tag php? karna tanda penutup kurung ini penutup dari foreach yang dibuat pake php -->
                                <?php
                            }
                            ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <!-- td kosong  karna di tr atasnya ada 2 td, biar sama dan sejajar ada 2 td di tr ini juga -->
                    <td></td>
                    <td><input type="submit" name="simpan" value="Simpan"></td>
                </tr>
            </table>
        </form>
        <?php
        if (isset($_POST['simpan'])) {
            $usia = $_POST['usia'];
            $filmId = $_POST['judul'];
            // karena tadi select nya sudah menyimoan value berupa key (index) dr judul yang dipilih, jadi untuk mengambil property min-usia atau harga dr arr yang sesuai dengan judul yang dipilih , tinggal mengambil dari arr listFILM index ke sesuai $_post ['judul'] terus ambil yang property min-usia/harga
            $minUsia = $listFilm[$filmId]['min_usia'];
            $harga = $listFilm[$filmId]['harga'];

            if ($usia >= $minUsia) {
                echo "<h2 style='color: green'> Silahkan untuk membayar seharga Rp. " . number_format($harga, 2, ',', ',') . "</h2>";
            }
            //number_format mengubah format ini ke rupiah, $harga var int nya, 2 jumlah nol  yang mau ditambahkan di belakang (,)  tanda pemisah 2 nol tersebut, (,) tanda pemisah per tiga angkaa
            else {
                echo "<h2 style='color: red'> Usia belum cukup</h2>";
            }
        }
        ?>
</body>

</html>