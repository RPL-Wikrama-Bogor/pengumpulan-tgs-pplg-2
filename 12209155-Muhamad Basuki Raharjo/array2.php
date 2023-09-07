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
            "judul" => "Avanger End Game",
            "min-usia" => 15,
            "harga" => 45000
        ],
        [
            "judul" => "Terrifier 2",
            "min-usia" => 17,
            "harga" => 40000
        ],
        [
            "judul" => "Cars 3",
            "min-usia" => 7,
            "harga" => 35000
        ]
        ];
    ?>
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
                        <!-- hidden: menyembunyikan opsi ini dari list select, disabled: gabisa dipilih,  selected: awal dibuka, opsi ini yang muncul di select -->
                        <option hidden disabled selected>Pilih Film</option>
                        <!-- loop tiap item arraynya agar muncul di list opsi select -->
                        <?php
                            foreach($listFilm as $key => $film) {
                        ?>
                        <!-- value di option : data yang diambil sistem ketika opsi ini dipilih, ambil $key agar yg diambil sistem index dari array nya bukan nama film. kenapa? agar nnti mengambil property lain dari arraynya gampang, ga harus ribet nyari index dlu dari judulnya, yg dipertengahan tag mengambil property judul karena agar yg dilihat oleh user di opsinya itu judul bukan angka index-->
                        <!-- simbol php yg di value itu artinya tag php echo -->
                        <option value="<?= $key ?>"><?= $film['judul'] ?></option>
                        <!-- kenapa buat tanda kurung doang disimpen di tag php? karena tanda penutup kurung ini penutup dari foreach yg dibuat pada php -->
                        <?php
                            }
                        ?>
                    </select>
                </td>
            </tr>
        <tr>
            <!-- tadi kosong karena di tr atasnya ada 2 td, biar sama dan sejajar ada 2 td di tr ini juga -->
            <td></td>
            <td><input type="submit" name="simpan" value="simpan"></td>
        </tr>
    </table>
</form>
<?php
if(isset($_POST['simpan'])) {
    $usia = $_POST['usia'];
    $filmId= $_POST['judul'];
    // karena tadi select nya uda nyimpen balue berupa key (index) dr judul yang dipilih, jd buat ambil property min-usia atau harga dr arr yang sesuai dengan judul dipilih, tinggal ambil dari arr listfilm index ke sesuai $_post ['judul'] terus ambil yang property min-usia/harga
    $minUsia = $listFilm[$filmId]['min-usia'];
    $harga = $listFilm[$filmId]['harga'];

    if($usia >= $minUsia) {
        // number_format mengubah format int ke rupiah, $harga var int nya, 2 jumlah nol yang mau ditambahkan di belakang ( , ) tanda pemisah 2 nol tersebut, ( , ) tanda pemisah per dua angka
        echo "<h2 style='color:green'>silahkan untuk membayar sebesar Rp. " . number_format($harga, 2, ',', '.') . "</h2>";
    } else {
        echo "<h2 style='color:red'>usia belum cukup</h2>";
            }
    }
?>
</body> 
</html> 