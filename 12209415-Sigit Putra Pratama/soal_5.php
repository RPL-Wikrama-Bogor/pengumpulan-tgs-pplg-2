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
    <title>Konversi waktu 5</title>
</head>
<body>

<!--  input -->
<h1>Hitung Jam</h1>
<!-- kenapa pakai post?  metode pengiriman data yang Datanya tidak disimpan pada URL. -->
     <form action="" method="post">
      <div class="display: flex;" >
        <label for="nama">Masukkan Jam</label>
        <br>
        <input type="number" name="jam" id="jam">
        <br>
      </div>
      <div class="display: flex;" >
        <label for="">Masukkan Menit</label>
        <br>
        <input type="number" name="menit" id="menit" required>
        <br>
      </div>
      <div class="display: flex;" >
        <label for="">Masukkan Detik</label>
        <br>
        <input type="number" name="detik" id="detik" required>
        <br>
      </div>
      <br>
      <button type="submit" name="submit">Kirim</button>
     </form>
</body>
</html>

<?php
//  mengapa post? berfungsi untuk memanggil data yang telah diinputkan agar bisa ditampilkan di file action.
    if (isset($_POST['submit'])) {
        $jam = $_POST['jam'];
        $menit = ($_POST['menit']);
        $detik = ($_POST['detik']);

        // Menghitung jam
        $jam = $jam * 3600;
        // Menghitung menit
        $menit = $menit * 60;
        // Menghitung total
        $total = $jam + $menit + $detik;

        echo " Total : " . $total;
        
    }
    ?>