<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
$listFilm = [
    [
        "judul" => "miracle in cell no. 7",
        "min-usia" => 15,
        "harga" => 45000
    ],
    [
        "judul" => "the invitation",
        "min-usia" => 17,
        "harga" => 35000
    ],
    [
        "judul" => "luck",
        "min-usia" => 7,
        "harga" => 35000
    ]
    ];
?>
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
                            <!-- hidden: menyembunyikan opsi ini dari list select disabled: gabisa dipilih, selected: awal dibuka, opsi ini yg munvul di select -->
                            <option hidden disabled selected>--pilif film--</option>
                            <!-- loop tiap item arraynya agar muncul di list opsi select -->
                            <?php
                            foreach($listFilm as $key => $film) { 
                            ?>
                            <!-- value di option : data yang diambil sistem ketika opsi ini dipilih, ambil $key agar yang diambil sistem indexdr arr nya bukan nama film. kenapa? agar nnti mengambil property lain dari arr nya gampang, ga harus ribet cari index dlu dr si judulnya. ug dipertengahan tag mengambil property judul karena agar yang dilihat user di opsinya itu judul bukan angka index -->
                            <!-- simbol php yang di value itu artinya tag php echo -->
                            <option value="<?= $key ?>"><?= $film["judul"] ?></option>
                            <!-- kenapa buat tanda kurung doang disimpen di tag php? karna tanda penutup kurung ini peuntup dr foreach yg dibuat pake php -->
                            <?php
                            }
                            ?>
                        </select>
                    </td>
                </tr>
                <!-- td kosong karna di tr atasnya ada 2 td, biar sama dan sejajar ada 2 td di tr ini juga -->
                <td></td>
                <td><input type="submit" name="simpan" value="Simpan">
                </td>
                     </tr>
            </table>
        </form>
        <?php
        if(isset($_POST['simpan'])) {
            $usia = $_POST['usia'];
            $filmid = $_POST['judul'];
            // karena tadi select nya uda nyimpen value berupa key (index) dr judul yang dipilih, kd buat ambil property min-usia atau harga dr arr yg sesuai denga judul dipilih, tinggal ambil dr arr listFilm index ke sesuai $_POST ['judul'] terus ambil yg property min-usia/harga
            $minUsia = $listFilm[$filmid]['min-usia'];
            $harga = $listFilm[$filmid]['harga'];

            if ($usia >= $minUsia) {
                // number_format mengubah format int ke rupiah, $harga var int nya, 2 jumlah nol yg mau ditambahkan di belakang ( , ) tanda pemisah 2 nol tersebut, ( , ) tanda pemisah per tiga angka
                echo "<h2 style='color: green'>silahkan untuk membayar sebesar Rp. " . number_format($harga, 2,
                ',','.') . "</h2>";
            }else {
                echo "<h2 style='color: red'>Usia belum cukup</h2>";
            }
        }
        ?>
    </center>
    </body>
</html>