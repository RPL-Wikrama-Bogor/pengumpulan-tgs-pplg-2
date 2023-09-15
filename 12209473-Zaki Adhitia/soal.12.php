<?php
$hh = 0;
$mm = 0;
$ss = 0;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Waktu</title>
</head>
<body>
    <h1>Jam Menit Detik</h1>
    <form action="" method="post">
      <div>
        <label for="jam">Masukkan Jam</label>
        <input type="number" name="jam" id="jam">
      </div>
      <div>
        <label for="menit">Masukkan Menit</label>
        <input type="number" name="menit" id="menit">
      </div>
      <div>
        <label for="detik">Masukkan Detik</label>
        <input type="text" name="detik" id="detik">
      </div>
      <br>
      <button type="submit" name="submit">Kirim</button>
     </form>
</body>
</html>

<?php
    if(isset($_POST['submit'])) {
        $hh = $_POST['jam'];
        $mm = $_POST['menit'];
        $ss = $_POST['detik'];

        $ss = $ss + 1;

        if ($ss >= 60) {
            $mm = $mm + 1;
            $ss = 0;
        } else if ($mm >= 60) {
            $hh = $hh + 1;
            $mm = 0;
            $ss = 0;
        } else if ($hh >= 24) {
            $hh = 0;
            $mm = 0;
            $ss = 0;
        }

        echo "<p style='text-align: center;'>Waktu : " . $hh . "Jam" . $mm . "Menit" . $ss . "Detik";
    }
?>