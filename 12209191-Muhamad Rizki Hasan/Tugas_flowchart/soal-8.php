<?php
    // Preparation
    $bilangan;
    $satuan;
    $puluhan;
    $ratusan;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Soal-8</title>
</head>
<body>
    <!-- Siapkan Input -->
    <h1>Bilangan bulat</h1>
    <form action="" method="post">
        <div style="display: flex;">
            <label for="bilangan">Bilangan : </label>
            <input type="number" name="bilangan" id="bilangan">
        </div>
        <button type="submit" name="submit">Kirim!</button>
    </form>

    <!-- <script src="script.js"></script> -->
</body>
</html>

<?php
    // Cek apakah button dgn name submit di klik
    if (isset($_POST['submit'])) {
        $bilangan = $_POST['bilangan'];

        $satuan = $bilangan % 10;
        $puluhan = ($bilangan / 10) % 10;
        $ratusan = floor($bilangan / 100);
    
        if($ratusan >= 10) {
            $ratusan = floor($ratusan % 10);
        }

        echo $satuan . " Satuan || ";
        echo $puluhan . " Puluhan || ";
        echo $ratusan . " Ratusan";
        

    }
?>