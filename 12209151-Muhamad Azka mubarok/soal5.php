<?php
//preparation
$jam;
$menit;
$detik;
$total;
?>
<!-- input -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Konversi waktu 2</title>
</head>
<body>
    <form action="" method="post">
        <h2>Konversi waktu</h2>
    <div class="display: flex;">
        <label for="jam">Masukkan Jam</label>
        <br>
        <input type="number" name="jam" id="jam">
        </div>
        <div class="display: flex;">
        <label for="menit">Masukkan Menit</label>
        <br>
        <input type="number" name="menit" id="menit">
        </div>
        <div class="display: flex;">
        <label for="detik">Masukkan Detik</label>
        <br>
        <input type="number" name="detik" id="detik">
     </div>
     <button type="submit" name="submit">kirim</button>
    </form>
</body>
</html>
<!-- proses -->
<?php
    if(isset($_POST['submit'])){
        $jam = $_POST['jam'];
        $menit = $_POST['menit'];
        $detik = $_POST['detik'];
    
        $jam = $jam * 3600;
        $menit = $menit * 60;
        $total = $jam + $menit + $detik;

        echo "total detik: " .$total;
    }
?>
