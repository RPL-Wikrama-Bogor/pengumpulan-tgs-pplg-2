<?php 

    $jam;
    $menit;
    $detik;
    $total;

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Konversi ke detik</title>
</head>
<body>
    <form action="" method="post">
        <div style="display: flex;">
            <label for="jam">Jam : </label>
            <input type="number" name="jam" id="jam">
        </div>
        <div style="display: flex;">
            <label for="menit">Menit : </label>
            <input type="number" name="menit" id="menit">
        </div>
        <div style="display: flex;">
            <label for="detik">Detik : </label>
            <input type="number" name="detik" id="detik">
        </div>
        <button type="submit" name="submit">Kirim</button>
    </form>
</body>
</html>

<?php 

    if(isset($_POST["submit"])) {
        $jam = $_POST["jam"];
        $menit = $_POST["menit"];
        $detik = $_POST["detik"];

        // proses konversi ke detik
        $jam = $jam * 3600;
        $menit = $menit * 60;
        $total = $jam + $menit + $detik;

        echo "$total Detik";
    }

?>