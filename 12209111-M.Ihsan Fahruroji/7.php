<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hitung Harga Buah Jeruk</title>
</head>
<body>
    <form action="" method="post">
        <div style="display: flex;">
            <label for="berat">Berat Buah (gram)</label>
            <input type="number" name="berat" id="berat">
        </div>
        <button type="submit" name="submit">Hitung</button>
    </form>

    <?php
    if(isset($_POST['submit'])) {
        $berat = $_POST['berat'];
        $harga_per_100_gram = 500; // harga per 100 gram dalam rupiah
        $diskon = 0.05; // diskon 5%

        $total_harga_sebelum_diskon = ($berat / 100) * $harga_per_100_gram;
        $jumlah_diskon = $total_harga_sebelum_diskon * $diskon;
        $total_harga_setelah_diskon = $total_harga_sebelum_diskon - $jumlah_diskon;

        echo "<h2>Hasil Perhitungan</h2>";
        echo "Berat Buah: $berat gram<br>";
        echo "Total Harga Sebelum Diskon: " . number_format($total_harga_sebelum_diskon, 2) . " rupiah<br>";
        echo "Diskon: " . number_format($jumlah_diskon, 2) . " rupiah<br>";
        echo "Total Harga Setelah Diskon: " . number_format($total_harga_setelah_diskon, 2) . " rupiah";
    }
    ?>
</body>
</html>
