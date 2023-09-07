<!-- deklarasi -->
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
    <title>Konversi waktu</title>
</head>
<body>
    

<!-- input -->
    <h1>Hitung jam</h1>
    <form action="" method="post">
      <div class="display: flex;" >
        <label for="jam">Masukkan Jam</label>
        <br>
        <input type="number" name="jam" id="jam">
        <br>
      </div>
      <div class="display: flex;" >
        <label for="menit">Masukkan Menit</label>
        <br>
        <input type="number" name="menit" id="menit">
        <br>
      </div>
      <div class="display: flex;" >
        <label for="detik">Masukkan Detik</label>
        <br>
        <input type="number" name="detik" id="detik">
        <br>
      </div>
      <br>
      <button type="submit" name="submit">Kirim</button>
    </form>
</body>
</html>

<?php
if(isset($_POST['submit'])) {
    $jam = $_POST['jam'];
    $menit = $_POST['menit'];
    $detik = $_POST['detik'];

    $jam = $jam * 3600;
    $menit = $menit * 60;
    $total = $jam + $menit + $detik;

    echo " Total : " . $total;
}
?>
    