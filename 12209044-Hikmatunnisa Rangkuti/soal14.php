<?php
    $tunj;
    $pjk;
    $gaji_bersih;
    $gaji_pokok;
    $nama = "";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form action="" method="post">
        <div style="display: flex;">
            <label for="nama">Nama :</label >
            <input type="text" name="nama" id="nama" >
        </div>
        <div style="display: flex;">
            <label for="gaji-pokok">Gaji pokok :</label>
            <input type="number" name="gaji-pokok" id="gaji-pokok">
        </div>
        <button type="submit" name="submit" required>Kirim!</button>
    </form>
</body>
</html>

<?php
    if (isset($_POST['submit'])) {
        $nama = $_POST['nama'];
        $gaji_pokok = $_POST['gaji-pokok'];

        $tunj = (20 * $gaji_pokok) / 100;
        $pjk = (15 * $gaji_pokok + $tunj) / 100;
        $gaji_bersih = $gaji_pokok + $tunj - $pjk;

        echo "<br>Nama: " . $nama . "<br>","<br>Tunj: " . $tunj . "<br>",
        "<br>Pjk: " . $pjk . "<br>","<br>Gaji bersih: " . $gaji_bersih . "<br>";
}
?>