<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Judul Film</title>
</head>
<body>
<?php 
    $titleFilm = [
        [
            "judul" => "Miracle in cell no 7",
            "min-usia" => 15,
            "harga" => 45000
        ],
        [
            "judul" => "The invitation",
            "min-usia" => 17,
            "harga" => 35000
        ],
        [
            "judul" => "Luck",
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
                        <option hidden disabled selected>Pilih Film</option>
                        <?php foreach($titleFilm as $key => $film) : ?>
                            <option value="<?= $key ?>"><?php echo $film['judul']; ?></option>
                        <?php endforeach; ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" name="simpan" value="Simpan"></td>
            </tr>
        </table>
    </form>
    <?php 
        if(isset($_POST["simpan"])) {
            $usia = $_POST['usia'];
            $filmId = $_POST['judul'];

            $minUsia = $titleFilm[$filmId]['min-usia'];
            $harga = $titleFilm[$filmId]['harga'];

            if ($usia >= $minUsia) {
                echo "<h2 style='color: green'>Silahkan untuk membayar sebesar Rp " . number_format($harga, 2, ',', '.') . "</h2>";
            } else {
                echo "<h2 style='color: red'>Usia belum cukup</h2>";
            }
        }
    ?>
</center>
</body>
</html>