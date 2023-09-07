<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Konversi Waktu Ke Detik</title>
</head>

<body>

  <form method="post" action="#">
    <tr>
      <td><label for="jam">Input Jam</label></td>
      <td><input type="number" name="jam" id="jam" maxlength="2"></td>
    </tr>
    <tr>
      <td><label for="menit">Input Menit</label></td>
      <td><input type="number" name="menit" id="menit" maxlength="2"></td>
    </tr>
    <tr>
      <td><label for="detik">Input Detik</label></td>
      <td><input type="number" name="detik" id="detik" maxlength="2"></td>
    </tr>
    <tr>
      <td><input type="submit" name="submit" value="Submit"></td>
    </tr>
  </form>

  <?php
    if (isset($_POST['submit'])) {
      $jam = $_POST['jam'];
      $menit = $_POST['menit'];
      $detik = $_POST['detik'];
      $total;

      $jam = $jam * 3600;
      $menit = $menit * 60;
      $total = $jam + $menit + $detik;

      echo $total;
    }
  ?>

</body>
</html>