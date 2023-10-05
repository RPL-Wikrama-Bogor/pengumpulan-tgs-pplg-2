<?php
$menit;
$detik;
$jam;
$total;
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, intial-scale=1.0">
        <title>menghitung total detik</title>
</head>
<body>
    <form action="" method="post">
        <div style="display : flex;">
        <label for="jam">masukan jam</label>
        <input type="number" name="jam" id="jam">
</div>
        <div style="display : flex;">
        <label for="menit">masukan menit</label>
        <input type="number" name="menit" id="menit">
</div>
        <div style="display : flex;">
        <label for="detik">masukan detik</label>
        <input type="number" name="detik" id="detik">
</div>
<button type="submit" name="submit">kirim</button>
</form>
</body>
</html>

<?php
 if(isset($_POST['submit'])){
    $jam = $_POST['jam'];
    $menit = $_POST['menit'];
    $detik = $_POST['detik'];

    $jam = $jam * 3600;
    $menit = $menit * 60;
    $total = $jam + $menit + $detik ;

    echo "total = " . $total;
 }
 ?>