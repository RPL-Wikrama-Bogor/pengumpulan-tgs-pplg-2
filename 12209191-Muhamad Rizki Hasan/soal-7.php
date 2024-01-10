<?php
    // Preparation
    $total_gram;
    $harga_sebelum;
    $diskon;
    $harga_setelah;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Soal-7</title>
</head>
<body>
    <!-- Siapkan Input -->
    <h1>Menghitung jumlah uang yang harus dibayarkan pembeli </h1>
    <form action="" method="post">
        <div style="display: flex;">
            <label for="total_gram">Total gram : </label>
            <input type="number" name="total_gram" id="total_gram">
        </div>
        <button type="submit" name="submit">Kirim!</button>
    </form>
</body>
</html>

<?php
    // Cek apakah button dgn name submit di klik
    if (isset($_POST['submit'])) {
        $total_gram = $_POST['total_gram'];
        
        $harga_sebelum = 5 * $total_gram;
        $diskon = 5 * $harga_sebelum / 100;
        $harga_setelah = $harga_sebelum - $diskon;

        echo "Harga Sebelum Diskon : " . $harga_sebelum;
        echo " || Diskon : " . $diskon;
        echo " || Harga Setelah Diskon : " . $harga_setelah;
    }
?>