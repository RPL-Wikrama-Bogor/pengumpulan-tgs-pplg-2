<?php
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
    <title>Bilangan bulat</title>
</head>
<body>
    <form action="" method="post">
        <div style="display: flex;">
            <label for="bil">Bilangan :</label>
            <input type="number" name="bil" id="bil">
        </div>
        <button type="submit" name="submit">Kirim!</button>
    </form>
</body>
</html>

<?php
    if (isset($_POST['submit'])) {
        $bilangan = $_POST['bil'];

        $satuan = $bilangan % 10;
        $puluhan = ( $bilangan / 10) % 10;
        $ratusan = ( $bilangan / 100) % 10;

        echo "<br>satuan: " . $satuan . "<br>","<br>puluhan: " . $puluhan . "<br>",
        "<br>ratusan: " . $ratusan . "<br>";
    }
?>